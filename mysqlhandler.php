<?php

//1. Write PHP code to connect to the database
//$connection = @mysqli_connect ("127.0.0.1", "gwn_system", "SeniorDesign1718", "gwn_database");
	session_start();
	
	include('connection.php');

	//2. Run an Insert query on the database to insert a row with the user input data into the store table
	$Id = $_REQUEST['res_id'];
	$Resource = $_REQUEST['resource'];
	$Name = $_REQUEST['name'];
	$Address = $_REQUEST['address'];
	$City = $_REQUEST['city'];
	$State = $_REQUEST['state'];
	$Zipcode = $_REQUEST['zipcode'];
	$Telephone = $_REQUEST['telephone'];
	$Pet = $_REQUEST['pet'];

	$sql = "INSERT INTO resources (res_id,resource,name,address,city,state,zipcode,telephone,pet) VALUES($Id,$Resource,$Name,$Address,$City,$State,$Zipcode,$Telephone,$Pet);";

	if(mysqli_query($bd,$sql)){
	echo "Inserted successfully into the database";
	} else {
	echo "ERROR $sql.".mysqli_error($bd);
	}

	include 'resourcesinfo.php';

	mysqli_close($bd);

?>