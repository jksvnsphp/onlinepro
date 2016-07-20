<!DOCTYPE html>
<head>
<title>Get Current Position - Latitude & Longitude using HTML 5</title>
<script>
if(!navigator.geolocation){
	alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
}
navigator.geolocation.getCurrentPosition(success, error);
function success(position){
	var latitude  = position.coords.latitude;	
	var longitude = position.coords.longitude;	
	var accuracy  = position.coords.accuracy;
	document.getElementById("lat").value  = latitude;
	document.getElementById("lng").value  = longitude;
	document.getElementById("acc").value  = accuracy;
	alert(latitude);
	alert(longitude);
}
function error(err){
	alert('ERROR(' + err.code + '): ' + err.message);
}
</script>
<body>
Latitude: <input type="text" id="lat" name="lat" /><br />
Longitude: <input type="text" id="lng" name="lng" /><br />
More or Less <input type="text" id="acc" /> Meters.

<?php 
echo lat

?>
</body>
</html>