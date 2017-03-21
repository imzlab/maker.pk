/*
 * MKR1000 Smart Room 
 * Made By M. Afzal avilable to every one for free use ;)
 */
#include <SimpleTimer.h>
#define BLYNK_PRINT Serial  
#include <SPI.h>
#include <WiFi101.h>
#include <BlynkSimpleMKR1000.h>
#include <DHT.h>
#include "ThingSpeak.h"

// You should get Auth Token in the Blynk App.
// Go to the Project Settings (nut icon).
char auth[] = "-------------Blynk App Token----------";


#define LDRPin A0
#define MQ2Pin A1

#define DHTPIN 7     // what pin we're connected to
#define DHTTYPE DHT22   // DHT 22  (AM2302)
DHT dht(DHTPIN, DHTTYPE); //// Initialize DHT sensor for normal 16mhz Arduino

int status = WL_IDLE_STATUS;
WiFiClient  client;

// Your WiFi credentials.
// Set password to "" for open networks.
char ssid[] = "attari";
char pass[] = "03216017309";

SimpleTimer timer;
//========Things Speak Channel Number & WriteAPIKey
unsigned long myChannelNumber = 000000;
const char * myWriteAPIKey = "-----Write API Key";

float temp,hum;
float GasValue;
float LDRValue;

//char Line[100];

void setup()
{
  Serial.begin(9600);
  Blynk.begin(auth, ssid, pass);
  dht.begin();
  WiFi.begin(ssid, pass);
  ThingSpeak.begin(client);
  timer.setInterval(5000L,UploadTHdataToTS);
}

void loop()
{
  timer.run();
  Blynk.run();
}


void UploadTHdataToTS(void){

      //Read The Gas Level
      GasValue=analogRead(MQ2Pin);
      
      //Read The Light Level
      LDRValue=analogRead(LDRPin);
      
      //Read Temperature Level
      temp= dht.readTemperature();

      //Read Humidity Level
      hum = dht.readHumidity();
      //Print temp and humidity values to serial monitor
      Serial.print(" Humidity:");
      Serial.print(hum);
      Serial.print(" Temperature:");
      Serial.print(temp);
      Serial.print(" Gas Level:");
      Serial.print(GasValue);
      Serial.print(" Light Level:");
      Serial.print(LDRValue);
      Serial.print("\r\n");
      //sprintf(Line,"Humidity:%f Temperature:%f Gas Level:%f  Light Level:%f \r\n",hum,temp,GasValue,LDRValue);
      //Serial.print(Line);

      //Upload to Blynk & ThingSpeak
      UploadToBlynk();
      UploadToThingSpeak();
      
}

void UploadToBlynk(void){
    Blynk.virtualWrite(0, temp); //Virtual Pin0
    Blynk.virtualWrite(1, hum); //Virtual Pin1
    Blynk.virtualWrite(2,GasValue); //Virtual Pin2 For Gas
    Blynk.virtualWrite(3,LDRValue); //Virtual Pin3 For LDR
}

void UploadToThingSpeak(void){
    ThingSpeak.setField(1,temp);
    ThingSpeak.setField(2,hum);
    ThingSpeak.setField(3,GasValue);
    ThingSpeak.setField(4,LDRValue);
    ThingSpeak.writeFields(myChannelNumber, myWriteAPIKey);  
}
