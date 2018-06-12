<?php

#require_once('auth.php');

include "header.php";

myHeader("GWN - Welcome");


?>
					<li class="active"><a href="https://offthegrid.000webhostapp.com/hdoc/inbetween.php">Home</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/resourcesinput.php">Resources Information</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/map.php">Map</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/chat.php">Chat</a></li>
					<li class="my-sm-6"><a href="https://offthegrid.000webhostapp.com/hdoc/logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid">
		<div class="row content">
			<div class="col-sm-8 col-sm-offset-2"> 
				<h1 style="margin-top:5%; margin-bottom:2%">What's next?</h1>
				<h4>Go to "Map" and view users currently in network</h4>
				<h4 style="margin-bottom:5%">Go to "Chat" to message other users in network</h4>
				<hr>
				<center>
					<h3 style="margin-top:5%; margin-bottom:5%">Click option to start</h3>

					<a href="https://offthegrid.000webhostapp.com/hdoc/map.php" class="btn btn-info btn-lg" role="button" style="margin-bottom:5%">Map</a><br >
					<a href="https://offthegrid.000webhostapp.com/hdoc/chat.php" class="btn btn-info btn-lg" role="button">Chat</a>
				</center>
			</div>
		</div>
	<?php

include "footer.php";
