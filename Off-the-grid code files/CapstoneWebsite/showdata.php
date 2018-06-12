<?php
header("Content-type: text/xml");
echo "<?xml version='1.0' ?>";
// Start XML file, echo parent node

require("connection.php");



// Select all the rows in the markers table
$query = "SELECT * FROM offthegrid WHERE 1";
$result = mysqli_query($conn,$query);

echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'fname="' . $row['fname'] . '" ';
  echo 'lname="' .$row['lname'] . '" ';
  echo 'organization="' . $row['organization'] . '" ';
  echo 'username="' . $row['username'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

echo '</markers>';

?>