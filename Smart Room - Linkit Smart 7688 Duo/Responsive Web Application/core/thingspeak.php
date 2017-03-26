<?php
require_once("config.php");


//Ajax Call Responders
if(isset($_POST['LastValue']) && !empty($_POST['LastValue'])) {
	echo GetTheLastValuesofChannel();
}
if(isset($_POST['SensorValue']) && !empty($_POST['SensorValue'])) {
	echo GetTheSensorValues();
}
if(isset($_POST['field']) && !empty($_POST['field'])) {
	$TSObje=new ThingSpeak();
	echo $TSObje->UpdateTheValueToChannel($_POST['field'],$_POST['btnValue']);
}

function GetTemperature(){
	
	$TSObj=new ThingSpeak();
	return (float) $TSObj->GetLastValue(1);
}

function GetHumidity(){
	$TSObj=new ThingSpeak();
	return (float) $TSObj->GetLastValue(2);
}

function GetLightLevel(){
	$TSObj=new ThingSpeak();
	return (float) $TSObj->GetLastValue(4);
}

function GetGasLevel(){
	$TSObj=new ThingSpeak();
	return (float) $TSObj->GetLastValue(3);
}

function GetLightStatus(){
	$TSObj=new ThingSpeak();
	return (int) $TSObj->GetLastValue(5);
}

function GetFanStatus(){
	$TSObj=new ThingSpeak();
	return (int) $TSObj->GetLastValue(6);
}
function GetHeaterStatus(){
	$TSObj=new ThingSpeak();
	return (int) $TSObj->GetLastValue(7);
}
function GetGeneralSocketStatus(){
	$TSObj=new ThingSpeak();
	return (int) $TSObj->GetLastValue(8);
}

function GetTheSensorValues(){
	$ControlArray[]= GetTemperature();
	$ControlArray[]= GetHumidity();
	$ControlArray[]= GetLightLevel();
	$ControlArray[]= GetGasLevel();	
	return json_encode($ControlArray);
}

function GetTheLastValuesofChannel(){
	$ControlArray[]= GetTemperature();
	$ControlArray[]= GetHumidity();
	$ControlArray[]= GetLightLevel();
	$ControlArray[]= GetGasLevel();
	$ControlArray[]= GetLightStatus();
	$ControlArray[]= GetFanStatus();
	$ControlArray[]= GetHeaterStatus();
	$ControlArray[]= GetGeneralSocketStatus();
	return json_encode($ControlArray);
	
	
}

class ThingSpeak{

	function GetLastValue($field){
			$value = file_get_contents("https://api.thingspeak.com/channels/".ChannelID."/fields/".$field."/last?key=".ReadAPIKey);
			return $value;
	}
	
	function GetTheLastUpdatedValuesofChannel(){
			$JsonArray=file_get_contents("https://api.thingspeak.com/channels/".ChannelID."/feeds/last");
			return $JsonArray;
	}
	
	function GetTheLatestEightReocrdsofChannel(){
			$JsonArray=file_Get_contents("https://api.thingspeak.com/channels/".ChannelID."/feeds.json?results=8");
	}
	function UpdateTheValueToChannel($field,$value){
		if($value=="true")
			$JsonArray=file_Get_contents("https://api.thingspeak.com/update?api_key=".WriteAPIKey."&field".$field."=1");
		else
			$JsonArray=file_Get_contents("https://api.thingspeak.com/update?api_key=".WriteAPIKey."&field".$field."=0");
		echo $JsonArray;
	}

}
?>
