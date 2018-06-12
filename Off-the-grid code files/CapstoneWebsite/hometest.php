<?php

	//Start session
    session_start();	
    //Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_LAST_NAME']);

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Registration</title>
	  

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
    <body>
     
    <form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
      <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td colspan="2">
            <div align="center">
              <?php 
              // $remarks=$_GET['remarks'];
              if (!isset($_GET['remarks']))
              {
                echo 'Register Here';
              }
              if (isset($_GET['remarks']) && $_GET['remarks']=='success')
              {
                echo 'Registration Success';
              }
              ?>  
            </div></td>
          </tr>
          <tr>
            <td width="95"><div align="right">First Name:</div></td>
            <td width="171"><input type="text" name="fname" /></td>
          </tr>
          <tr>
            <td><div align="right">Last Name:</div></td>
            <td><input type="text" name="lname" /></td>
          </tr>
          <tr>
            <td><div align="right">Organization:</div></td>
            <td><input type="text" name="organization" /></td>
          </tr>
          <tr>
            <td><div align="right">Username:</div></td>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td><div align="right">Password:</div></td>
            <td><input type="text" name="password" /></td>
          </tr>
          <tr>
            <td><div align="right"></div></td>
            <td><input name="submit" type="submit" value="Submit" /></td>
          </tr>
        </table>
      </form>
	  
	  

    <form name="loginform" action="login_exec.php" method="post">
    <table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
      <tr>
        <td colspan="2">
    		<!--the code bellow is used to display the message of the input validation-->
    		 <?php
    			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
    			echo '<ul class="err">';
    			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
    				echo '<li>',$msg,'</li>'; 
    				}
    			echo '</ul>';
    			unset($_SESSION['ERRMSG_ARR']);
    			}
    		?>
    	</td>
      </tr>
      <tr>
        <td width="116"><div align="right">Username</div></td>
        <td width="177"><input name="username" type="text" /></td>
      </tr>
      <tr>
        <td><div align="right">Password</div></td>
        <td><input name="password" type="text" /></td>
      </tr>
      <tr>
        <td><div align="right"></div></td>
        <td><input name="" type="submit" value="login" /></td>
      </tr>
    </table>
    </form>
	
    </body>
    </html>
