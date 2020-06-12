<html>
<head meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset = "UTF-8">
<title>Mountain Memory</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>
   
   <?php
   $headerButtonLink = "index.php";
   $headerButtonText = "Main Page";
   $headerText = "Let's find where to go!";
    include 'header.php'; 
    ?>
    
   
   <div class="mainArea" style="flex-grow: 1;">
         
      

   <div class="rightArea"> <!-- actually left in this page, because of order of PHP code and don't want to rewrite css -->
    <?php 
      if(!empty($_GET)) {
      $lat = $_GET['lat']; $lng = $_GET['lng'];
		include 'mapVijetAfterGET.php';
		} else {include 'mapVijet.php';
      }
   ?>

   <form action="formPage.php" method="GET" style="margin-left: 3em;">
	<input type="text" id="lat" name="lat" value="" style="background-color: white; border: 1px solid #000;">
	<input type="text" id="lng" name="lng" value="" style="background-color: white; border: 1px solid #000;">
	<input type="submit" value="Get weather here">
	</form>
			 
	
	<?php		
				
	// making request to weather API
   $url = "https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lng&units=metric&exclude=hourly,current,minutely&appid=3aa9d9753bdd574d819b24640b740acc";

   $data = @file_get_contents($url); // getting data into $data
            
   if($data){  // check if we got them
      $dataJson = json_decode($data, true); // end decoding, return objects as arrays
      $weekArray = $dataJson['daily']; //get only important part of first array
   	} 

   //write coordinates and weather info in file, to be able to get them after refreshing the page be "submit"
   if( !empty($_GET)) {
       file_put_contents('coordinates.txt', $lat . PHP_EOL . $lng . PHP_EOL . $weekArray['0']['temp']['day'].'°C, '. $weekArray['0']['weather']['0']['description'] . PHP_EOL . $weekArray['1']['temp']['day'].'°C, '. $weekArray['1']['weather']['0']['description'] . PHP_EOL . $weekArray['2']['temp']['day'].'°C, '. $weekArray['2']['weather']['0']['description'] . PHP_EOL . $weekArray['3']['temp']['day'].'°C, '. $weekArray['3']['weather']['0']['description'] . PHP_EOL . $weekArray['4']['temp']['day'].'°C, '. $weekArray['4']['weather']['0']['description'] . PHP_EOL . $weekArray['5']['temp']['day'].'°C, '. $weekArray['5']['weather']['0']['description'] . PHP_EOL . $weekArray['6']['temp']['day'].'°C, '. $weekArray['6']['weather']['0']['description']);
   		}

   // calculate names of next 7 days from today data
   $dayNames = array('0' =>'Mon', '1' => 'Tue', '2' => 'Wed', '3' => 'Thu', '4' => 'Fri', '5' => 'Sat', '6' => 'Sun',);
	$today = date('D');

	foreach ($dayNames as $key => $value) {
		if ($value == $today) {
		$initialDayKey = $key; //define which key match to today
		}}

	//and put it in $one
	$one = $dayNames[$initialDayKey % 7];
	$two = $dayNames[($initialDayKey+1) % 7];
	$three = $dayNames[($initialDayKey+2) % 7];
	$four = $dayNames[($initialDayKey+3) % 7];
	$five = $dayNames[($initialDayKey+4) % 7];
	$six = $dayNames[($initialDayKey+5) % 7];
	$seven = $dayNames[($initialDayKey+6) % 7];
 	?>

 <!--  make a table and fill it with values of decoded JSON array from weather API and names of the days -->
<table class="table" border="1">
<caption>Current point weather</caption>
<tr>
<th>Parameter</th>
<th><?php echo "$one"; ?></th>
<th><?php echo "$two"; ?></th>
<th><?php echo "$three"; ?></th>
<th><?php echo "$four"; ?></th>
<th><?php echo "$five"; ?></th>
<th><?php echo "$six"; ?></th>
<th><?php echo "$seven"; ?></th>
</tr>
<tr><td>Average temp,°C</td><td><?php echo "{$weekArray['0']['temp']['day']}"; ?></td><td><?php echo "{$weekArray['1']['temp']['day']}"; ?></td><td><?php echo "{$weekArray['2']['temp']['day']}"; ?></td><td><?php echo "{$weekArray['3']['temp']['day']}"; ?></td><td><?php echo "{$weekArray['4']['temp']['day']}"; ?></td><td><?php echo "{$weekArray['5']['temp']['day']}"; ?></td><td><?php echo "{$weekArray['6']['temp']['day']}"; ?></td></tr>
<tr><td>Max temp,°C</td><td><?php echo "{$weekArray['0']['temp']['max']}"; ?></td><td><?php echo "{$weekArray['1']['temp']['max']}"; ?></td><td><?php echo "{$weekArray['2']['temp']['max']}"; ?></td><td><?php echo "{$weekArray['3']['temp']['max']}"; ?></td><td><?php echo "{$weekArray['4']['temp']['max']}"; ?></td><td><?php echo "{$weekArray['5']['temp']['max']}"; ?></td><td><?php echo "{$weekArray['6']['temp']['max']}"; ?></td></tr>
<tr><td>Min temp,°C</td><td><?php echo "{$weekArray['0']['temp']['min']}"; ?></td><td><?php echo "{$weekArray['1']['temp']['min']}"; ?></td><td><?php echo "{$weekArray['2']['temp']['min']}"; ?></td><td><?php echo "{$weekArray['3']['temp']['min']}"; ?></td><td><?php echo "{$weekArray['4']['temp']['min']}"; ?></td><td><?php echo "{$weekArray['5']['temp']['min']}"; ?></td><td><?php echo "{$weekArray['6']['temp']['min']}"; ?></td></tr>
<tr><td>Wind Speed,m/s</td><td><?php echo "{$weekArray['0']['wind_speed']}"; ?></td><td><?php echo "{$weekArray['1']['wind_speed']}"; ?></td><td><?php echo "{$weekArray['2']['wind_speed']}"; ?></td><td><?php echo "{$weekArray['3']['wind_speed']}"; ?></td><td><?php echo "{$weekArray['4']['wind_speed']}"; ?></td><td><?php echo "{$weekArray['5']['wind_speed']}"; ?></td><td><?php echo "{$weekArray['6']['wind_speed']}"; ?></td></tr> 
<tr><td>Humidity,%</td><td><?php echo "{$weekArray['0']['humidity']}"; ?></td><td><?php echo "{$weekArray['1']['humidity']}"; ?></td><td><?php echo "{$weekArray['2']['humidity']}"; ?></td><td><?php echo "{$weekArray['3']['humidity']}"; ?></td><td><?php echo "{$weekArray['4']['humidity']}"; ?></td><td><?php echo "{$weekArray['5']['humidity']}"; ?></td><td><?php echo "{$weekArray['6']['humidity']}"; ?></td></tr> 
<tr><td>Summary</td><td><?php echo "{$weekArray['0']['weather']['0']['description']}"; ?></td><td><?php echo "{$weekArray['1']['weather']['0']['description']}"; ?></td><td><?php echo "{$weekArray['2']['weather']['0']['description']}"; ?></td><td><?php echo "{$weekArray['3']['weather']['0']['description']}"; ?></td><td><?php echo "{$weekArray['4']['weather']['0']['description']}"; ?></td><td><?php echo "{$weekArray['5']['weather']['0']['description']}"; ?></td><td><?php echo "{$weekArray['6']['weather']['0']['description']}"; ?></td></tr>
</table>
 			
			
<div class="logo"></div>  
</div>

<div class="leftArea"> <!-- actually right in this page, because of order of PHP code and don't want to rewrite css -->
      
	<div id="offerForm">
		<div class="formheader">Tell us about your Idea!</div>
			 <form action="formPage.php" method="POST">
				<div class="offerFormBlock"><input type="text" placeholder="Your Name" name="username" value="" id="textInput" required="true"></div>
				<div ><input class="phoneNumber" type="tel" placeholder="Phone number" name="userphone" value="" required="true">
				<input class="email" type="text" placeholder="Email adress" name="usermail" value="" required="true"></div>
				<div class="offerFormBlock"><input type="text" placeholder="Mountain (Place) Name" name="placename" value="" required="true"></div>
				<div><textarea placeholder="Tell about your Idea" name="freeWords" id="freewordForm" required="true"></textarea></div>
				<div id="direction"><p>Sea or Mountains?</p></div>
				<div class="checkList">
			      <select name="direction" autocomplete='off' required="true">
				      <option value="Mountains">To the Mountains</option>
				      <option value="Coast">To the Sea</option>
				   </select>
		      </div>
		      <div id="howManyPerson"><p>How many person?</p></div>
		      <div class="checkList">
			      <select name="howManyPerson" autocomplete='off' required="true">
				      <option value="2">2</option>
				      <option value="3">3</option>
				      <option value="4">4</option>
				      <option value="5">5</option>
				      <option value="6">6</option>
				      <option value="7">7</option>
				      <option value="8">8</option>
				      <option value="9">9</option>
				      <option value="10">10</option>
				   </select>
		      </div>
		      <div class="offerFormBlock">
			      <button type="submit" style="margin-right: 1em; padding: 0 0.5em;">Send mail</button>
			      <button type="reset" style="padding: 0 0.5em;">Clear form</button>
		      </div>
				</form></div>
			
			
				
					
<?php
$fileread = file("coordinates.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //taking coordinates and weather data from file to send a mail

$subject = 'New hike reqest';
$message = "User: {$_POST['username']} is going to offer us a new Hike! \r\n\n His(Her) phone number is {$_POST['userphone']} \r\n\n Where we want to go this time: {$_POST['direction']}\r\n\n The place name is: {$_POST['placename']},\r\n\nCoordinates: lattitude: $fileread[0] \r\n\longitude: $fileread[1]\r\n\n We already have {$_POST['howManyPerson']} members\r\n\n Shortly about a plan down here:\r\n {$_POST['freeWords']} \r\n The weather at the point is:\r\n
$one: $fileread[2]\r\n
$two: $fileread[3]\r\n
$three: $fileread[4]\r\n
$four: $fileread[5]\r\n
$five: $fileread[6]\r\n
$six: $fileread[7]\r\n
$seven: $fileread[8]";
$to = "baolisichumakov@gmail.com";
$headers = "From: " . strip_tags($_POST['usermail']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['usermail']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// We can send a mail only if POST-Array is not empty
if (!empty($_POST)) {
$resultMail = mail($to, $subject, $message, $headers);}

?>

</div>
</div>

</body>
</html>


