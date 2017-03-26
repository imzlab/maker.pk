#include <SimpleTimer.h>
#include <DHT.h>
#include "ThingSpeak.h"
#include "YunClient.h"
YunClient client;

#define LDRPin A0 //LDR Pin
#define MQ2Pin A1 //MQ-2 Gas sensor PIN

//Relay Pin
#define Other 8
#define Heater 9
#define Fan 10
#define Light 11

#define DHTPIN 7     // what pin we're connected to
#define DHTTYPE DHT22   // DHT 22  (AM2302)
DHT dht(DHTPIN, DHTTYPE); //// Initialize DHT sensor for normal 16mhz Arduino

SimpleTimer timer;

unsigned long SmartRoomChannelNumber = 239124;
const char * myWriteAPIKey = "9CLLVW8DYYBBCU6W";

float temp,hum;
float GasValue;
float LDRValue;

void setup()
{
  pinMode(Other,OUTPUT);
  pinMode(Heater,OUTPUT);
  pinMode(Fan,OUTPUT);
  pinMode(Light,OUTPUT);
  
  Serial.begin(9600);
  dht.begin();
  Bridge.begin();
  ThingSpeak.begin(client);
  timer.setInterval(20000L,UploadTHdataToTS);
  timer.setInterval(1000L,ReadButtonValues);
}

void loop()
{
  timer.run();
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

      //Upload to ThingSpeak
      UploadToThingSpeak();
      
}

void UploadToThingSpeak(void){
    ThingSpeak.setField(1,temp);
    ThingSpeak.setField(2,hum);
    ThingSpeak.setField(3,GasValue);
    ThingSpeak.setField(4,LDRValue);
    ThingSpeak.writeFields(SmartRoomChannelNumber, myWriteAPIKey);  
}

void ReadButtonValues(void){

  //Light Control
  int btnLight= ThingSpeak.readIntField(SmartRoomChannelNumber, 5);
  if(btnLight>0)
    digitalWrite(Light,HIGH);
  else
    digitalWrite(Light,LOW);
    
  Serial.print("Light=");
  Serial.print(btnLight);

  //Fan Control
  int btnFan= ThingSpeak.readIntField(SmartRoomChannelNumber, 6);
  if(btnFan>0)
    digitalWrite(Fan,HIGH);
  else
    digitalWrite(Fan,LOW);
    
  Serial.print(" Fan=");
  Serial.print(btnFan);

  //Heater Control
  int btnHeater= ThingSpeak.readIntField(SmartRoomChannelNumber, 7);
  if(btnHeater>0)
    digitalWrite(Heater,HIGH);
  else
    digitalWrite(Heater,LOW);
    
  Serial.print(" Heater=");
  Serial.print(btnHeater);

  //Other Control
  int btnOther= ThingSpeak.readIntField(SmartRoomChannelNumber, 8);
  if(btnOther>0)
    digitalWrite(Other,HIGH);
  else
    digitalWrite(Other,LOW);
    
  Serial.print(" Other=");
  Serial.print(btnOther);
  Serial.print("\r\n");
}

