#include <WiFi.h>
#include <WiFiManager.h>  // Menggunakan WiFiManager untuk pengaturan WiFi
#include <PubSubClient.h>
#include "esp32-hal-timer.h"

// Update these with values suitable for your network.
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
int batt = 76;

hw_timer_t *timer = NULL;  // Timer untuk interrupt
volatile bool timerFlag = false;

// Fungsi interrupt untuk pengambilan sampel
void IRAM_ATTR onTimer() {
  timerFlag = true; 
  batt++;
  snprintf(interupsi, MSG_BUFFER_SIZE, "MEJA #%ld BATTERAI #%d", value1, batt);
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

  // Inisialisasi WiFiManager untuk koneksi WiFi
  WiFiManager wm;
  bool res;
  res = wm.autoConnect("AutoConnectAP", "password"); // AP dengan password jika koneksi gagal

  //wm.resetSettings();//PENGAPLIKASIAN DITAMBAHKAN KE BUTTON
  
  if (!res) {
    Serial.println("Failed to connect to WiFi");
    // Bisa restart jika perlu
    // ESP.restart();
  } else {
    Serial.println("WiFi connected successfully");
    Serial.println("IP Address: ");
    Serial.println(WiFi.localIP());
  }

  client.setServer(mqtt_server, 1883);

  // Inisialisasi timer dengan timer 0, divider 80, dan count up
  timer = timerBegin(0, 80, true);  // Timer 0, divider 80 (prescaler 80 MHz), hitung ke atas
  
  // Hubungkan interrupt ke fungsi onTimer, dengan rising edge (true)
  timerAttachInterrupt(timer, &onTimer, true);
  
  // Atur alarm ke 10.000.000 mikrodetik (10 detik), dengan autoreload
  timerAlarmWrite(timer, 10000000, true);  // 10 juta microseconds, autoreload diaktifkan
  
  // Aktifkan alarm
  timerAlarmEnable(timer);
}

void loop() {
  if (!client.connected()) {
    reconnect();
  }
  client.loop();
  unsigned long now = millis();
  
  if(timerFlag){
    client.publish("outTopic", interupsi);
    Serial.printf("BATERAI ");
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
