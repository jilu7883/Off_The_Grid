<?php

	session_start();
	
	include('connection.php');
	
	$strSQL = "SELECT * FROM resources";
	$rs = mysqli_query($bd,$strSQL);
	while($row = mysqli_fetch_array($rs)){

?>

<div class="container-fluid">

		<div class="row content">
			<div class="col-sm-8 col-sm-offset-2"> 
				<h1 style="text-align:center;">Resources Information</h1>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">Name: </li>
					<li class="horizontal" style="display: inline; font-size:120%;"><?php echo $row['name']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">Resource: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['resource']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">Address: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['address']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">City: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['city']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">State: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['state']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">Zip Code: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['zipcode']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">Telephone: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['telephone']; ?></li>
				</ul>
				<ul>
					<li class="horizontal" style="display: inline; font-size:150%;">Pet: </li>
					<li class="horizontal" style="display: inline;"><?php echo $row['pet']; ?></li>
				</ul>
			</div>	
		</div>