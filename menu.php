<?php

	$title = "";
	$pages = [];
	$links = [];
	
	if(isset($_SESSION['SESS_MEMBER_ID'])){
		$pages = ["Home", "Resources Information", "Map", "Logout"];
		$links = ["/inbetween.php", "/resourcesinput.php", "/map.php", "/logout.php"];
	}else{
		$pages = ["Main"];
		$links = ["/hompage.php"];
	}
	
	for ($i=0; $i < count($pages); $i++) {
		if ($title == $pages[$i]) {
			echo "<li class='active'><a href='#'>$title</a></li>";
		}else {
			echo "<li><a href='$links[$i]'>$pages[$i]</a></li>";
		}
	}
	
	
?>