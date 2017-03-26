<footer class="app-footer">
        <span class="float-right">Powered by <a href="http://www.imzlab.com" target="_blank">M. Afzal</a>
        </span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/pace/pace.min.js"></script>




    <!-- GenesisUI main scripts -->

    <script src="js/app.js"></script>





	<script>
	//Ajax Call For AllData
	$(document).ready(function(){
	$.ajax({type: "POST",url: "core/thingspeak.php",data: "LastValue=1", success: function(result){
			result=result.replace("[","");
			result=result.replace("]","");
			var Data=result.split(",");
			//Assign Value To Temperature
			$("#Temperature").html(parseFloat(Data[0]));
			//Assign Value to Humidity
			$("#Humidity").html(parseFloat(Data[1]));
			//Assign Value to Light Level
			$("#LightLevel").html(parseFloat(Data[2]));
			//Assign Value to Gas Level
			$("#GasLevel").html(parseFloat(Data[3]));
			
			//Assign Value to Light button
			if(Data[4]==1)
				$("#btnLight").prop('checked',true);
			else
				$("#btnLight").prop('checked',false);
			
			//Assign Value to Fan button
			if(Data[5]==1)
				$("#btnFan").prop('checked',true);
			else
				$("#btnFan").prop('checked',false);
			
			//Assign Value to Heater button
			if(Data[6]==1)
				$("#btnHeater").prop('checked',true);
			else
				$("#btnHeater").prop('checked',false);
			
			//Assign Value to Other button
			if(Data[7]==1)
				$("#btnOther").prop('checked',true);
			else
				$("#btnOther").prop('checked',false);
			
		}});
		
		 // use setTimeout() to execute
		setTimeout(GetLatestUpdates, 10000)
	});
	
	function GetLatestUpdates(){
		console.log("ok");
		$.ajax({type: "POST",url: "core/thingspeak.php",data: "SensorValue=1", success: function(result){
			
			result=result.replace("[","");
			result=result.replace("]","");
			var Data=result.split(",");
			//Assign Value To Temperature
			$("#Temperature").html(parseFloat(Data[0]));
			//Assign Value to Humidity
			$("#Humidity").html(parseFloat(Data[1]));
			//Assign Value to Light Level
			$("#LightLevel").html(parseFloat(Data[2]));
			//Assign Value to Gas Level
			$("#GasLevel").html(parseFloat(Data[3]));
			
			 // use setTimeout() to execute
			setTimeout(GetLatestUpdates, 10000)
		}});
	}
	$("#btnLight").click(function(){
		$.ajax({type: "POST",url: "core/thingspeak.php",data: "field=5&btnValue="+$("#btnLight").prop("checked"), success: function(result){
			if(result<=0){
				if($("#btnLight").prop("checked")==true)
					$("#btnLight").prop('checked',false);
				else
					$("#btnLight").prop('checked',true);
				
				alert("Unable to Perform Operation. Please try Again.");
			}else
				alert("Operation Successfully Performed.");
				
		}});
		
	});
	
	$("#btnFan").click(function(){
		$.ajax({type: "POST",url: "core/thingspeak.php",data: "field=6&btnValue="+$("#btnFan").prop("checked"), success: function(result){
			if(result<=0){
				if($("#btnFan").prop("checked")==true)
					$("#btnFan").prop('checked',false);
				else
					$("#btnFan").prop('checked',true);
				
				alert("Unable to Perform Operation. Please try Again.");
			}else
				alert("Operation Successfully Performed.");
				
		}});
		
	});
	
		$("#btnHeater").click(function(){
		$.ajax({type: "POST",url: "core/thingspeak.php",data: "field=7&btnValue="+$("#btnHeater").prop("checked"), success: function(result){
			if(result<=0){
				if($("#btnHeater").prop("checked")==true)
					$("#btnHeater").prop('checked',false);
				else
					$("#btnHeater").prop('checked',true);
				
				alert("Unable to Perform Operation. Please try Again.");
			}else
				alert("Operation Successfully Performed.");
				
		}});
		
	});
	
		$("#btnOther").click(function(){
		$.ajax({type: "POST",url: "core/thingspeak.php",data: "field=8&btnValue="+$("#btnOther").prop("checked"), success: function(result){
			if(result<=0){
				if($("#btnOther").prop("checked")==true)
					$("#btnOther").prop('checked',false);
				else
					$("#btnOther").prop('checked',true);
				
				alert("Unable to Perform Operation. Please try Again.");
			}else
				alert("Operation Successfully Performed.");
				
		}});
		
	});
	
	</script>


</body>

</html>