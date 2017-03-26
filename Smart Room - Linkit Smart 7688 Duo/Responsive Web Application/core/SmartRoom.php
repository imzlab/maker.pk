<?php
	
	/*
	 * Smart Room Class Contains the Methods which will Take the Data From ThingSpeak Class
	 * and it's bridge between Interface & ThingSpeak
	 *
	 *
	 */
	
	class SmartRoom{
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
			return (bool) $TSObj->GetLastValue(5);
		}

		function GetFanStatus(){
			$TSObj=new ThingSpeak();
			return (bool) $TSObj->GetLastValue(6);
		}
		function GetHeaterStatus(){
			$TSObj=new ThingSpeak();
			return (bool) $TSObj->GetLastValue(7);
		}
		function GetGeneralSocketStatus(){
			$TSObj=new ThingSpeak();
			return (bool) $TSObj->GetLastValue(8);
		}
	}
?>