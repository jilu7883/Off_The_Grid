<?php
session_start();
     
    include('connection.php');
     
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $organization=$_POST['organization'];
    $username=$_POST['username'];
    $password=$_POST['password'];
     
    mysqli_query($conn, "INSERT INTO offthegrid(fname, lname, organization, username, password)VALUES('$fname', '$lname', '$organization', '$username', '$password')");
     
    header("location: login.php?remarks=success");
     
    mysqli_close($conn);
?>