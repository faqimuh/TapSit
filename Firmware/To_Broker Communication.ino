#include <WiFi.h>
#include <PubSubClient.h>
#include "esp32-hal-timer.h"

// Update these with values suitable for your network.
const char* ssid = "KSH Nurul 2";
const char* password = "Nurulhikmah3";
const char* mqtt_server = "broker.mqtt.cool";

WiFiClient espClient;
PubSubClient client(espClient);

unsigned long lastMsg = 0;
#define MSG_BUFFER_SIZE (50)
#define BAT_BUFFER_SIZE (50)
char msg[MSG_BUFFER_SIZE];
char interupsi[BAT_BUFFER_SIZE];

int value = 0;
long value1 = 1;
const char* value2 = "gvhbjnkja809i"; 
int batt=76;

hw_timer_t *timer = NULL;  // Timer untuk interrupt
volatile bool timerFlag = false;

// Fungsi untuk menghubungkan ke WiFi
void setup_wifi() {
  delay(10);
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  randomSeed(micros());

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

// Fungsi interrupt untuk pengambilan sampel
void IRAM_ATTR onTimer() {
  timerFlag = true; 
  batt++;
  snprintf(interupsi, MSG_BUFFER_SIZE, "MEJA #%ld BATTERAI #%d", value1, batt);
  //client.publish("outTopic", msg);
  //Serial.printf("BATERAI");
  //Serial.println(interupsi);
}

// Fungsi reconnect untuk koneksi ke MQTT broker
void reconnect() {
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    String clientId = "ESP32Client-";
    clientId += String(random(0xffff), HEX);
    if (client.connect(clientId.c_str())) {
      Serial.println("connected");
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(5000);
    }
  }
}

void setup() {
  Serial.begin(115200);
  setup_wifi();
  client.setServer(mqtt_server, 1883);
  
  // Inisialisasi timer dengan frekuensi 1 MHz (1 us per tick)
  timer = timerBegin(1000000);  // Menggunakan 1 MHz sebagai frekuensi
  
  // Hubungkan interrupt ke fungsi onTimer
  timerAttachInterrupt(timer, &onTimer);  // Tidak ada argumen ketiga
  
  // Atur alarm ke 5 detik (5.000.000 mikrodetik), dengan autoreload
  timerAlarm(timer, 10000000, true, 0); // Tambahkan 0 sebagai argumen reload_count
  
  // Aktifkan alarm
  timerStart(timer);
}

void loop() {
  if (!client.connected()) {
    reconnect();
  }
  client.loop();
  unsigned long now = millis();
  
  if(timerFlag){
    client.publish("outTopic", interupsi);
    Serial.printf("BATERAI");
    Serial.println(interupsi);
    timerFlag = false;  // Reset flag
  }
  
  if (now - lastMsg > 2000) {
    lastMsg = now;
    value++;
    snprintf(msg, MSG_BUFFER_SIZE, "MEJA #%ld RFID #%s%d", value1, value2, value);
    
    Serial.print("Publish message: ");
    Serial.println(msg);
    client.publish("outTopic", msg);  // Kirim pesan ke broker MQTT
  }
  
}
