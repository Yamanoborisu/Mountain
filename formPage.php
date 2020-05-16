<html>
<head meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset = "UTF-8">
<title>Mountain Memory</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>
   
   <?php
   $headerButtonLink = "index.php";
   $headerButtonText = "To Main Page";
   $headerText = "Let's find where to go!";
    include 'header.php'; ?>
    
   
   <div class="mainArea">
         
      <div class="leftArea">
         
      </div>

      <div class="rightArea">
         <?php include 'mapVijet.php' ?>
         <div class="logo"></div>  
      </div>
   
   </div>


</body>
</html>