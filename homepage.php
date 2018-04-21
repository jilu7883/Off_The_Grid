<?php

	include "header.php";

	myHeader("GWN - Main");


?>
					<li class="active"><a href="http://offthegrid.000webhostapp.com/hdoc/homepage.php">Main</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid"> 
		<div class="row content">
			<div class="col-sm-8 col-sm-offset-2"> 
				<h1>Welcome</h1>
				<h4 style="margin-top:5%">Our goal is to provide wireless communication during the aftermath of major disasters such as earthquakes, hurricanes, and tsunamis.
				Individuals will be better suited to communicate with each other, receive directions for nearby shelters, and facilitate fast response for rescue.</h4>
				<hr>
				<h1 style="text-align:center;">Terms and Privacy Policy</h1>
				<p>In order to provide the information necessary to both parties (Rescue Units and Community members), this website will be need to 
				access your Geolocation from your device. This information will be used to let users know about other user's location and where they can
				find resources such as shelter, water, food, and other. This information will also help Rescue Units using this website of the location of 
				disaster victims and come to their aid.</p>
				<p>This website has been design to aid affected communities and Rescue Units during natural disasters, users are asked to use this website as
				a resource to aid those in need</p>
				<input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> I Agree to Terms and Privary Policy<br>
				<center>
					<p id="title"></p>
					<p id="resunit"></p>
					<p id="comemb"></p>
				</center>
				<script>
					function activateButton(element) {
						if(element.checked) {
							document.getElementById("title").innerHTML = "<h3 style='margin-top:5%; margin-bottom:2%'>Thank You! Click the box that represents you:</h3>";
							document.getElementById("resunit").innerHTML = "<a href='http://offthegrid.000webhostapp.com/hdoc/login.php' class='btn btn-info btn-lg' role='button' style='margin-bottom:2%'>Rescue Unit</a><br>";
							document.getElementById("comemb").innerHTML = "<a href='http://offthegrid.000webhostapp.com/hdoc/cmhome.php' class='btn btn-info btn-lg' role='button'>Community Member</a>";
						} else {
							document.getElementById("title").innerHTML = "<h3 style='margin-top:5%; margin-bottom:2%'>You must accept Terms and Privacy Policy to use GWN Website</h3>";
							document.getElementById("resunit").innerHTML = "";
							document.getElementById("comemb").innerHTML = "";
						}
					}
				</script>
			</div>
		</div>
	
<?php

include "footer.php";