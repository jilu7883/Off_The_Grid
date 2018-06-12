<?php

	/* 
	   Team Name: Off-The-Grid
	   Product Name: G.W.N (Gridless Wireless Network)
	   Contains: Header for website
	*/
	
	//Start session
    if(!isset($_SESSION)) 
    { 
//session_start(); 
    }
	
	//Unset the variables stored in session
//	unset($_SESSION['SESS_MEMEBER_ID']);
//	unset($_SESSION['SESS_USER_NAME']);
//	unset($_SESSION['SESS_PASSWORD']);

	//include 'function.php';
//Adding function.php file for now but with no functionality
	function myHeader($title){

?>

	<!DOCTYPE html>
	<html lang="en">
	<head>	
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
		
		<!-- AJAX -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" media="screen"/>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery, Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- Map library -->
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<!-- Link to style -->
		<link rel="stylesheet" href="main.css" type="text/css" media="screen" />
		
		<!-- Account Validation -->
		<script type="text/javascript">
		  function validateForm()
		  {
			var a=document.forms["reg"]["fname"].value;
			var b=document.forms["reg"]["lname"].value;
			var c=document.forms["reg"]["organization"].value;
			var d=document.forms["reg"]["username"].value;
			var e=document.forms["reg"]["password"].value;
			if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e==""))
			{
			  alert("All Field must be filled out");
			  return false;
			}
			if (a==null || a=="")
			{
			  alert("First name must be filled out");
			  return false;
			}
			if (b==null || b=="")
			{
			  alert("Last name must be filled out");
			  return false;
			}
			if (c==null || c=="")
			{
			  alert("organization must be filled out");
			  return false;
			}
			if (d==null || d=="")
			{
			  alert("username must be filled out");
			  return false;
			}
			if (e==null || e=="")
			{
			  alert("password must be filled out");
			  return false;
			}
		  }
		</script>	
	</head>
	<body onload="disableSubmit(); locate()">
		<!-- Top navigation bar -->
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#"><img src="http://offthegrid.000webhostapp.com/GWN_Logo.jpg" class="img-rounded" width="43" height="33"></img></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
					
<?php

	}
			
