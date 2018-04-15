<?php

	//resinputhandler.php inserts the information of resource into the database: "gwn_database" on table: "resources"

	session_start();
     
    include('connection.php');
     
    $name=$_POST['name'];
    $Type=$_POST['Type'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $latitude=$_POST['latitude'];
    $longtitude=$_POST['longtitude'];
    $telephone=$_POST['telephone'];

  
    
   mysqli_query($conn, "INSERT INTO resources(name,Type,city,state,latitude,longitude,telephone)VALUES('$name', '$Type', '$city', '$state', '$latitude', '$longtitude', '$telephone')");
    
    header("location: inbetween.php?remarks=success");
     
    mysqli_close($conn);
	
?>