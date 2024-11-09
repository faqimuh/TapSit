#include <WiFi.h>
#include <WiFiManager.h>  // Menggunakan WiFiManager untuk pengaturan WiFi
#include <PubSubClient.h>
#include "esp32-hal-timer.h"
#include <Preferences.h>
#include <SPI.h>
#include <MFRC522.h>

Preferences preferences;

#define TRIGGER_PIN 13
#define level 34
#define RST_PIN 22      // RST Pin
#define SS_PIN  21       // SDA Pin (CS)
#define red_led 26
#define green_led 27
#define buzzer  14


MFRC522 mfrc522(SS_PIN, RST_PIN);
bool wm_nonblocking = false; // change to true to use non blocking
WiFiManager wm; // global wm instance
WiFiManagerParameter custom_field; // global param ( for non blocking w params )

// Update these with values suitable for your network.

//const char* mqtt_server = "d5e72eb1c29c4bab93d8e504533ce17f.s1.eu.hivemq.cloud";
const char* mqtt_server = "broker.mqtt.cool";
const int mqttPort = 1883; // Port default untuk MQTT
const char* mqttUser = "TapSit";
const char* mqttPassword = "TapSit";

WiFiClient espClient;
PubSubClient client(espClient);

unsigned long lastMsg = 0;
#define MSG_BUFFER_SIZE (50)
char msg[MSG_BUFFER_SIZE];
String meja;

int batt;

hw_timer_t *timer = NULL;  // Timer untuk interrupt
volatile bool timerFlag = false;
bool res;
// Fungsi interrupt untuk pengambilan sampel
void IRAM_ATTR onTimer() {
  timerFlag = true; 
  batt=(int)((analogRead(level)/4095.0)*100); 
}

// Fungsi reconnect untuk koneksi ke MQTT broker
void reconnect() {
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    String clientId = "ESP32Client-";
    clientId += String(random(0xffff), HEX);
    if (client.connect(clientId.c_str(), mqttUser, mqttPassword)) {
      Serial.println("connected");
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(5000);
    }
  }
}
void saveParamCallback();
void setup() {
  Serial.begin(115200);
  
  pinMode(level,INPUT);
  pinMode(TRIGGER_PIN, INPUT);
  pinMode(red_led,OUTPUT);
  pinMode(green_led,OUTPUT);

  ledcSetup(0, 2000, 8);  // Kanal 0, frekuensi awal 2000 Hz, resolusi 8-bit
  ledcAttachPin(buzzer, 0);


  SPI.begin();           // Memulai SPI bus
  mfrc522.PCD_Init();    // Inisialisasi RFID reader
  
  WiFi.mode(WIFI_STA); // explicitly set mode, esp defaults to STA+AP  
  
  Serial.setDebugOutput(true);  
  delay(3000);
  Serial.println("\n Starting");

  
  preferences.begin("identitas", true);
  meja = preferences.getString("deviceID", "NULL");
  preferences.end();
   if (meja == "0") {
        Serial.println("No saved username found. Using default.");
    } else {
        Serial.print("Saved Username: ");
        Serial.println(meja);
    }
   //wm.resetSettings(); // wipe settings

  if(wm_nonblocking) wm.setConfigPortalBlocking(false);

  // Menggunakan HTML kustom
  const char *customHtml = "<label for='myFieldId'>INPUT NOMOR MEJA</label><input type='int' name='myFieldId' placeholder='Chair number at integer value'>";
  WiFiManagerParameter customField3(customHtml); // Menggunakan HTML kustom

  // Menambahkan parameter ke WiFiManager
  wm.addParameter(&customField3);

  
  wm.setSaveParamsCallback(saveParamCallback);

  // custom menu via array or vector
   std::vector<const char *> menu = {"wifi","info","param","sep","restart","exit"};
  wm.setMenu(menu);

  // set dark theme
  wm.setClass("invert");


  // wm.setConnectTimeout(20); // how long to try to connect for before continuing
  wm.setConfigPortalTimeout(30); // auto close configportal after n seconds
  
  // res = wm.autoConnect(); // auto generated AP name from chipid
   res = wm.autoConnect("TAPSIT"); // anonymous ap
  //res = wm.autoConnect("AutoConnectAP","password"); // password protected ap

  if(!res) {
    Serial.println("Failed to connect or hit timeout");
    // ESP.restart();
  } 
  else {
    //if you get here you have connected to the WiFi    
    Serial.println("connected...yeey :)");
  }
 
  client.setServer(mqtt_server, mqttPort);

  // Inisialisasi timer dengan timer 0, divider 80, dan count up
  timer = timerBegin(0, 80, true);  // Timer 0, divider 80 (prescaler 80 MHz), hitung ke atas
  
  // Hubungkan interrupt ke fungsi onTimer, dengan rising edge (true)
  timerAttachInterrupt(timer, &onTimer, true);
  
  // Atur alarm ke 10.000.000 mikrodetik (10 detik), dengan autoreload
  timerAlarmWrite(timer, 10000000, true);  // 10 juta microseconds, autoreload diaktifkan
  
  // Aktifkan alarm
  timerAlarmEnable(timer);
}
void checkButton(){
  // check for button press
  if ( digitalRead(TRIGGER_PIN) == LOW ) {
    // poor mans debounce/press-hold, code not ideal for production
    delay(50);
    if( digitalRead(TRIGGER_PIN) == LOW ){
      Serial.println("Button Pressed");
      // still holding button for 3000 ms, reset settings, code not ideaa for production
      delay(3000); // reset delay hold
      if( digitalRead(TRIGGER_PIN) == LOW ){
        Serial.println("Button Held");
        Serial.println("Erasing Config, restarting");
        wm.resetSettings();
        ESP.restart();
      }
      
      // start portal w delay
      Serial.println("Starting config portal");
      wm.setConfigPortalTimeout(120);
      
      if (!wm.startConfigPortal("TAPSIT")) {
        Serial.println("failed to connect or hit timeout");
        delay(3000);
        // ESP.restart();
      } else {
        //if you get here you have connected to the WiFi
        Serial.println("connected...yeey :)");
      }
    }
  }
}
String getParam(String name){
  //read parameter from server, for customhmtl input
  String value;
  if(wm.server->hasArg(name)) {
    value = wm.server->arg(name);
  }
  return value;
}

void saveParamCallback(){
   getParam("myFieldId");
   // Mulai Preferences di namespace "config"
    preferences.begin("identitas", false);
    
    // Simpan nilai custom parameter
    preferences.putString("deviceID", getParam("myFieldId"));
    meja = preferences.getString("deviceID", "NULL");
    // Tutup Preferences
    preferences.end();
  Serial.println("[CALLBACK] saveParamCallback fired");
  Serial.println("PARAM customfieldid = " + getParam("myFieldId"));
}
void loop() {
  
  if(wm_nonblocking) wm.process(); // avoid delays() in loop when non-blocking and other long running code  
  checkButton();
  if(res){
  if (!client.connected() ) {
    reconnect();
  }
  client.loop();
  unsigned long now = millis();
  
  if(timerFlag){
    timerFlag = false;  // Reset flag
  }
  
  //if (now - lastMsg > 2000) {
    //lastMsg = now;
    if (!mfrc522.PICC_IsNewCardPresent() || !mfrc522.PICC_ReadCardSerial()) {
      digitalWrite(green_led,HIGH);
      digitalWrite(red_led,LOW);
      return;
    }
    
    // Membaca UID kartu dan mencetaknya
    Serial.print("UID Kartu Terdeteksi: ");
    String uid = "";
    for (byte i = 0; i < mfrc522.uid.size; i++) {
      if (mfrc522.uid.uidByte[i] < 0x10) {
       // Serial.print("0");
      }
      //Serial.print(mfrc522.uid.uidByte[i], HEX);
      uid += String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : "") + String(mfrc522.uid.uidByte[i], HEX);
    }

    snprintf(msg, MSG_BUFFER_SIZE, "meja:%s,rfid:%s,batt:%d,", meja, uid, batt);
    delay(1000);  // Delay untuk menunggu kartu diangkat
    mfrc522.PICC_HaltA(); // Menghentikan komunikasi dengan kartu
    
   
  
    Serial.print("Publish message: ");
    Serial.println(msg);
    client.publish("tapsit", msg);  // Kirim pesan ke broker MQTT 
    
     digitalWrite(red_led,HIGH);
    digitalWrite(green_led,LOW);
   ledcWriteTone(0, 1500); 
    delay(1500);
     ledcWriteTone(0, 0); 
  }
  }
//}