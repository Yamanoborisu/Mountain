<?php
// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$link = mysqli_connect('pdb50.awardspace.net', '3460944_mountain', 'root88root', '3460944_mountain');
      if (!$link) {
      die('Ошибка подключения (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
      } 

// Select all the rows in the markers table

$result = mysqli_query($link, "SELECT * FROM markers WHERE 1");
if (!$result) {
  die('Invalid query: ' . mysql_error());
} 

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("year", $row['year']);
}

echo $dom->saveXML();
$dom->save('markersData.xml');

?>