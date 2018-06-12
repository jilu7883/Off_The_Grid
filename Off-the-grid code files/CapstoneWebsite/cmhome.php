<?php

	include "header.php";

	myHeader("GWN - Welcome");

?>
					<li class="active"><a href="http://offthegrid.000webhostapp.com/hdoc/homepage.php">Home</a></li>
					<li><a href="http://offthegrid.000webhostapp.com/hdoc/resourcesinput.php">Resources Information</a></li>
					<li><a href="http://offthegrid.000webhostapp.com/hdoc/map.php">Map</a></li>
					<li><a href="http://offthegrid.000webhostapp.com/hdoc/chat.php">Chat</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid">
		<div class="row content">
			<div class="col-sm-8 col-sm-offset-2"> 
				<center style="margin-top:5%">
					<h1>How does it work?</h1>
				</center>
				<div class="col-sm-offset-1" style="margin-bottom:5%">
					
					<h4>1. Answer the following questions to inform Rescue Units of your circumstances and submit</h4>
					<h4>2. Click on "Resources Information" to view shelter, food, and water locations</h4>
					<h4>3. Click on "Map" and see current users in network</h4>
				</div>
				<hr>
				<center>
					<h1 style="margin-top:5%; margin-bottom:2%">Questionnaire</h1>
				</center>
				<div class="col-sm-4 col-sm-offset-4" style="margin-bottom:5%">
					<form>	
						<label for="qone">Can you move?</label>
						<input type="text" class="form-control" id="qone" placeholder="yes/no" name="qone" style="margin-bottom:4%">
						<label for="qtwo">Are you alone?</label>
						<input type="text" class="form-control" id="qtwo" placeholder="yes/no" name="qtwo" style="margin-bottom:4%">
						<label for="qthree">Do you need assistance?</label>
						<input type="text" class="form-control" id="qthree" placeholder="yes/no" name="qthree" style="margin-bottom:4%">
						<center>
							<a href="http://offthegrid.000webhostapp.com/hdoc/login.php"><button type="submit" class="btn btn-success" style="margin-bottom:10%">Submit</a></button>
						
								
						</center>	
					</form>
				</div>
				
			
			</div>
		</div>
	
<?php

	include "footer.php";