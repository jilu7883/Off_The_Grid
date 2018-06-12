<?php
	
	include "header.php";

	myHeader("GWN - Resources Information Input");

?>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/inbetween.php">Home</a></li>
					<li  class="active"><a href="/resourcesinput.php">Resources Information</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/map.php">Map</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/chat.php">Chat</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid">
		<div class="row content">
			<div class="col-sm-12">
				<div class="col-sm-8 col-sm-offset-2">
					<h1>Resources Information</h1>
					<p style="margin-bottom:10%">Please add the following information regarding the location and contact information of safe and reliable shelters, food, water, and any other resource available to affected community</p>
					<hr>
					<center>
						<h1 style="margin-top:5%; margin-bottom:5%">Add Information Here:</h1>
					</center>
					<form action="resinputhandler.php"  method="post">
						<div class="col-lg-4 col-lg-offset-4">
							<div class="form-group">
								<label for="Type">Resource:</label>
								<input type="text" class="form-control" id="Type" placeholder="restaurant/bar" name="Type" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="address">Address:</label>
								<input type="text" class="form-control" id="address" placeholder="Enter address" name="address" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="city">City:</label>
								<input type="text" class="form-control" id="city" placeholder="Enter city" name="city" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="state">State:</label>
								<input type="text" class="form-control" id="state" placeholder="Enter state" name="state" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="latitude">Geolocation Latitude:</label>
								<input type="text" class="form-control" id="latitude" placeholder="Enter Latitude" name="latitude" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="longtitude">Geolocation Longitude:</label>
								<input type="text" class="form-control" id="longtitude" placeholder="Enter Longtitude" name="longtitude" style="margin-bottom:4%">
							</div>
							<div class="form-group">
								<label for="telephone">Telephone:</label>
								<input type="text" class="form-control" id="telephone" placeholder="xxx-xxx-xxxx" name="telephone" style="margin-bottom:4%">
							</div>
						
							<div class="form-group">
								<center>
									<button type="submit" class="btn btn-success" style="margin-bottom:10%">Submit</button>
									<button type="reset" class="btn btn-danger" style="margin-bottom:10%">Reset</button>
								</center>	
							</div>
						</div>
					</form>
				</div>
		</div>
			</div>
				</div>


	
<?php
	
	include "footer.php";