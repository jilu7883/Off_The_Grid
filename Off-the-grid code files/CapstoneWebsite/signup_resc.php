

<?php
	
	// Team Name: Off-The-Grid
	// Product Name: G.W.N (Gridless Wireless Network)
	// Webpage: SignUp page for Rescue Units - Create account 

	include "header.php";

	myHeader("GWN - Sign Up")

?>

					<li><a href="http://offthegrid.000webhostapp.com/hdoc/homepage.php">Main</a></li>
					<li><a href="http://offthegrid.000webhostapp.com/hdoc/loginresc.php">Login</a></li>
					<li class="active"><a href="http://offthegrid.000webhostapp.com/hdoc/signup_resc.php">Sign Up</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid">
		<div class="row content" style="margin-bottom:15%">
			<div class="col-sm-8 col-sm-offset-2" style="margin-bottom:1%"> 
				<center style="margin-top:5%">
					<h1>How does it work?</h1>
				</center>
				<div class="col-sm-offset-5" style="margin-bottom:5%">
					
					<h4>1. Create an account</h4>
					<h4>2. Login to account</h4>
					<h4>3. Share information</h4>
				</div>
				<hr>
				<center>
					<div align="center">
						<?php 
							// $remarks=$_GET['remarks'];
							if (!isset($_GET['remarks']))
							{
								echo "<h1 style='margin-top:10%; margin-bottom:4%'>Sign Up!</h1>";
							}
							if (isset($_GET['remarks']) && $_GET['remarks']=='success')
							{
								echo "<h1 style='margin-top:10%; margin-bottom:4%'>Registration Success!</h1>";
							}
						?>  
					</div>
				</center>
				<form name="reg" action="code_execresc.php" onsubmit="return validateForm()" method="post">
					<div class="col-sm-4 col-sm-offset-4">
						<label for="text">First Name:</label>
						<input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname"  style="margin-bottom:6%">
						<label for="text">Last Name:</label>
						<input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname"  style="margin-bottom:6%">
						<label for="text">Organization:</label>
						<input type="text" class="form-control" id="organization" placeholder="Enter organization" name="organization"  style="margin-bottom:6%">
						<label for="text">Username:</label>
						<input type="text" class="form-control" id="username" placeholder="Enter username" name="username"  style="margin-bottom:6%">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" style="margin-bottom:6%">
						<!--<label for="rpwd">Repeat Password:</label>
						<input type="password" class="form-control" id="rpwd" placeholder="Enter password again" name="rpwd" style="margin-bottom:8%">-->
						<center>
							<button type="submit" class="btn btn-success">Submit</button>
							<button type="reset" class="btn btn-danger">Cancel</button>
						</center>
					</div>						
				</form>
			</div>
			<center>
				<a href="http://offthegrid.000webhostapp.com/hdoc/loginresc.php"><button type="button" class="btn btn-link">Alredy have an account, Click Here!</button></a>
			</center>
		</div>
		
<?php
	
	include "footer.php";

?>
