<!DOCTYPE html>
<html>
<head>

<title>Škola informatike</title>
<meta name="description" content="Obrazovanje i podučavanje informatičkih tehnologija u programiranja">
<meta name="keywords" content="škola, obrazovanje, programiranje, poduka">
<meta charset="UTF-8">
  
<link rel="stylesheet" type="text/css" href="stil.css">	
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
 function initialize() {
   var mapProp = {
     center:new google.maps.LatLng(45.5511100, 18.6938900),
     zoom:14,
     mapTypeId:google.maps.MapTypeId.ROADMAP
   };
   var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
 }
 google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<ul style="float:right;list-style-type:none;">
    <li><a href="registracija.php">Registracija</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</ul>
<h1>ŠKOLA INFORMATIKE</h1>


<ul>
   <li><a href="index.php">Početna</a></li>
   <li><a href="onama.php">O nama</a></li>
   <li><a class="active" href="gdjesmo.php">Gdje smo</a></li>
 
</ul> 

<h2>Naša lokacija:</h2>


<br>	
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>

</html> 