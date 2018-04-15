<?php
    	//Start session
    	session_start();
     
    	//Include database connection details
    	require_once('connection.php');
     
    	//Array to store validation errors
    	$errmsg_arr = array();
     
    	//Validation error flag
    	$errflag = false;
     
    	//Function to sanitize values received from the form. Prevents SQL injection
    	function clean($str) {
    		echo "str: ".$str;
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($str);
    	}
     
    	//Sanitize the POST values
    	$username = $_POST['username'];
    	$password = $_POST['password'];
     
    	//Input Validations
    	if($username == '') {
    		$errmsg_arr[] = "<center><h4 style='margin-top:10%; margin-bottom:2%'><font color='red'>Username missing</font></h4></center>";
    		$errflag = true;
    	}
    	if($password == '') {
    		$errmsg_arr[] = "<center><h4 style='margin-top:10%; margin-bottom:2%'><font color='red'>Password missing</font></h4></center>";
    		$errflag = true;
    	}
     
    	//If there are input validations, redirect back to the login form
    	if($errflag) {
    		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    		session_write_close();
    		header("location: login.php");
    		exit();
    	}
     
    	//Create query
    	$qry="SELECT * FROM offthegrid WHERE username='$username' AND password='$password'";
    	$result=mysqli_query($conn, $qry);
     
    	//Check whether the query was successful or not
    	if($result) {
    		if(mysqli_num_rows($result) > 0) {
    			//Login Successful
    			session_regenerate_id();
    			$member = mysqli_fetch_assoc($result);
				$_SESSION['username'] = $member['username'];
    			$_SESSION['SESS_USER_NAME'] = $member['username'];
    			$_SESSION['SESS_PASSWORD'] = $member['password'];
    			session_write_close();
    			header("location: inbetween.php");
    			exit();
    		}else {
    			//Login failed
    			$errmsg_arr[] = "<center><h4 style='margin-top:10%; margin-bottom:2%'><font color='red'>Username and password not found</font></h4></center>";
    			$errflag = true;
    			if($errflag) {
    				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    				session_write_close();
    				header("location: https://offthegrid.000webhostapp.com/hdoc/inbetween.php.php");
    				exit();
    			}
    		}
    	}else {
    		die("Query failed");
    	}
?>