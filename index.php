<!doctype html>
<html>

<head meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset = "UTF-8">
<title>Mountain Memory</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
   
<?php
$headerButtonLink = "formPage.php";
$headerButtonText = "Offer a New Hike";
$headerText = "Hike History";
include 'header.php'; ?>

<div class="mainArea">
         
<div class="leftArea">
   <?php include 'hike_buttons_area.php';?>
</div>
   <?php include 'phpsqlajax_dbinfo.php';?>

<div class="rightArea">
   <div style="position: fixed; min-height: 36em; width: 55%;"><div id="map">
   <script src="JS/markersMap.js"></script>
   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVpvd7SOVCDWe3XiCps1r6428suI7BMq0&callback=initMap">
   </script>
   </div>
   </div>

   <div class="logo"></div>  
   </div>
   </div>

</body>
</html>