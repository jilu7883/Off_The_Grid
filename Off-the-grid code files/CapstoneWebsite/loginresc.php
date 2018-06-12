<?php

	include "header.php";

	myHeader("GWN - Log In");


?>
					<li><a href="http://offthegrid.000webhostapp.com/hdoc/homepage.php">Main</a></li>
					<li class="active"><a href="http://offthegrid.000webhostapp.com/hdoc/loginresc.php">Login</a></li>
					<li><a href="http://offthegrid.000webhostapp.com/hdoc/signup_resc.php">Sign Up</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid"> 
		<div class="row content">
			<div class="col-sm-8 col-sm-offset-2">
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
				<center>
					<h1 style="margin-top:10%; margin-bottom:4%">Log in</h1>
				</center>
				<form name="loginform" action="loginresc_exec.php" method="post">
					<div class="col-sm-4 col-sm-offset-4">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" placeholder="Enter username" name="username"  style="margin-bottom:6%">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" style="margin-bottom:6%">
						<center>
							<button type="submit" class="btn btn-success" style="margin-bottom:6%">Submit</button>
						</center>
					</div>						
				</form>
			</div>
			<center>
				<a href="http://offthegrid.000webhostapp.com/hdoc/signup_resc.php"><button type="button" class="btn btn-link">Don't have an account yet, Click Here!</button></a>
			</center>
		</div>

<?php

	
	include "footer.php";
	
?>