<?php

	session_start();
	
	include('connection.php');
	include ('header.php');

	myHeader("GWN - Resources Information");
	
?>

					<li><a href="https://offthegrid.000webhostapp.com/hdoc/cmhome.php">Home</a></li>
					<li class="active"><a href="https://offthegrid.000webhostapp.com/hdoc/resourcesinfo.php">Resources Information</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/map.php">Map</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/chat.php">Chat</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid">
		<div class="row content">
			<div class="col-sm-8 col-sm-offset-2"> 
				<h1 style="text-align:center;">Resources Information</h1>
					<div class="col-sm-4 col-sm-offset-4">

<?php
	
	$strSQL = "SELECT * FROM resources";
	$rs = mysqli_query($bd,$strSQL);
	while($row = mysqli_fetch_array($rs)){

?>

						<span>Name: </span><p class="horizontal" style="display: inline;"><?php echo $row['name']; ?></p><br >
						<span>Resource: </span><p class="horizontal" style="display: inline;"><?php echo $row['resource']; ?></p><br >
						<span>Longitude:</span><p class="horizontal" style="display: inline;"><?php echo $row['address']; ?></p><br >
						<span>Latitude: </span><p class="horizontal" style="display: inline;"><?php echo $row['zipcode']; ?></p><br >
						<span>City: </span><p class="horizontal" style="display: inline;"><?php echo $row['city']; ?></p><br >
						<span>State: </span><p class="horizontal" style="display: inline;"><?php echo $row['state']; ?></p><br >
					
						<span>Telephone: </span><p class="horizontal" style="display: inline;"><?php echo $row['telephone']; ?></p><br >
						<span>Are pets allow? </span><p class="horizontal" style="display: inline;"><?php echo $row['pet']; ?></p><br >
						<hr>
<?php

	}
	
?>
				</div>
			</div>	
		</div>

<?php

	include "footer.php";