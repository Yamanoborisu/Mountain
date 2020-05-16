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
   $headerText = "Походы были таковы";
    include 'header.php'; ?>
    
   
   <div class="mainArea">
         
      <div class="leftArea">
         <?php include 'hike_buttons_area.php' ?>
      </div>

      <div class="rightArea">
         <?php include 'mapVijet.php' ?>
         <div class="logo"></div>  
      </div>
   
   </div>


</body>
</html>
