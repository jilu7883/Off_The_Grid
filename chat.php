<?php
	
	include "header.php";

	myHeader("GWN - Chat");

?>

					<li><a href="https://offthegrid.000webhostapp.com/hdoc/resourcesinfo.php">Resources Information</a></li>
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/map.php">Map</a></li>
					<li class="active"><a href="https://offthegrid.000webhostapp.com/hdoc/chat.php">Chat</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
    <div class="container">
		<div class="col-sm-4 col-sm-offset-4" style="margin-bottom:20%;"> 
			<header class="header">
				<h1>Chat with other users</h1>
			</header>
			<main>
				<div class="userSettings">
					<label for="userName">Username:</label>
					<input id="userName" type="text" placeholder="Username" maxlength="32" value="Somebody">
				</div>
				<div class="chat">
					<div id="chatOutput"></div>
					<input id="chatInput" type="text" placeholder="Input Text here" maxlength="128">
					<button id="chatSend">Send</button>
				</div>
			</main>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="chathandler.js"></script>

<?php
	
	include "footer.php";