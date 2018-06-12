<?php
header("Content-type: text/xml");
echo "<?xml version='1.0' ?>";
// Start XML file, echo parent node
require("connection.php");
// Select all the rows in the markers table
$query = "SELECT * FROM resources WHERE 1";
$result = mysqli_query($conn,$query);
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'name="' .$row['name'] . '" ';
  echo 'city="' . $row['city'] . '" ';
  echo 'state="' . $row['state'] . '" ';
  echo 'telephone="' . $row['telephone'] . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo 'type="' . $row['Type'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}
// End XML file
echo '</markers>';
?>