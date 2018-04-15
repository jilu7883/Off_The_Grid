<?php

 include('connection.php');
 $percentage= $_POST["percentage"];
  $time_left= $_POST["time_left"];
 
     

     
    mysqli_query($conn, "INSERT INTO offthegrid(percentage,time_left )VALUES('$percentage', '$time_left')");
     
    mysqli_close($conn);
?>