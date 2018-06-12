
<!DOCTYPE html>
<html lang="en">
<head>
	<title>GWN Map</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery, Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	/* Page style */
		html, #page {padding:0; margin:0;}
		#page {background:#f1f1f1;}
		
		/* Style for top navigatin bar containing links to Home, About, and Contact */
		.navbar {
			margin-bottom:0;
			border-radius:0;
		}
    
		/* For .sidenav so it can be 100% */
		.row.content {
			height:750px;
		}
    
		/* Style for left naviagation bar. Background color is gray and height is 100%  */
		.sidenav {
			padding-top:3%;
			padding-left:4%;
			height:100%;
		}
    
		/* Style for footer. Background color is gray, black text and padding */
		footer {
			color:black;
			padding:15px;
		}
    
		/* This is for small screens. Height is set to 'auto' for .sidenav and grid */
		@media screen and (max-width:767px) {
			.sidenav {
				height:auto;
				padding:15px;
			}
			.row.content {height:auto;} 
	</style>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <style>
    html, body, #map_canvas{width:100%;height:100%;}
    #map {
        height: 40%;
      }
    </style>
	    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">
    <meta name="HandheldFriendly" content="True">
    <p class="not-support" hidden>Your browser doesn't support the Battery Status API :(</p>   

   <link rel="stylesheet" href="style.css">
	
	 <script src="index.js"></script>
	 
</head>
<body onload="locate()">
<div id="page">
	<!-- Top navigation bar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#"><img src="GWN_Logo.jpg" class="img-rounded" width="43" height="33"></img></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="F:https://offthegrid.000webhostapp.com/GWN_home.html">Home</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Content -->
	<div class="container-fluid">    
		<div class="row content">
			<div class="col-sm-2 sidenav">
				<p><li class="active"><a href="#">Map</a></li></p>
				<p><a href="https://offthegrid.000webhostapp.com/resourceinfo.html">Shelter Information</a></p>
				<p><a href="https://offthegrid.000webhostapp.com/chat.html">Chat</a></p>
			</div>
			<div class="col-sm-8"> 
				<h1>Map</h1>
				<p style="margin-bottom:10%">Users in network</p>
				<hr>
				<h1 style="margin-top:5%; margin-bottom:5%">Users</h1>
			</div>
      
    <div id="map_canvas"></div>
	


	   <div class="battery-box">
        <strong class="battery-percentage"></strong>
        <i class="battery"></i>
      </div>
	  
	  
	    <dt>Power Source</dt>  
		<dd class="battery-status">---</dd>

        <dt>Level percentage</dt>
        <dd class="battery-level">---</dd>

        <dt>Fully charged in</dt>
        <dd class="battery-fully">---</dd>

        <dt>Remaining time</dt>
        <dd class="battery-remaining">---</dd>

<script>

 var im = 'http://www.robotwoods.com/dev/misc/bluecircle.png';


    function locate(){
        navigator.geolocation.getCurrentPosition(initialize,fail);
    }
     var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
	 var paddle = 'http://maps.google.com/mapfiles/kml/paddle/';
        var icons = {
          caution: {
            icon: iconBase + 'caution.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };
    function initialize(position) {
        var myLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		var shelter = new google.maps.LatLng(40.007417499999995, -105.2750722);
		var danger_area = new google.maps.LatLng(40.008417499999995, -105.2650722);
		var danger_area1 = new google.maps.LatLng(40.003417499999995, -105.2670722);
	
		
		var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Info </h1>' +
      '<div id="bodyContent">' +
      '<br>Battery Life: ' + ' <dd class="battery-level">---</dd>' +
      '<br>Time Left: ' +  ' <dd class="battery-remaining">---</dd>' +
      '<br>Is Charging? ' +  '<dd class="battery-status">---</dd>' +
      '<br>Latitude: '+ position.coords.latitude+
      '<br>Longtitude:'+ position.coords.longitude+
      '</div>'+
      '</div>';

	  var infowindow = new google.maps.InfoWindow({
		content: contentString
		});
	  
        var mapOptions = {
          zoom: 15,
          center: myLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map_canvas'),
                                      mapOptions);
        var userMarker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon:  paddle + 'red-circle.png'
        });
		 userMarker.addListener('click', function() {
         infowindow.open(map, userMarker);
  });	
  
  
		 var Marker = new google.maps.Marker({ 
		  position: shelter,
          map: map,
          icon:iconBase + 'homegardenbusiness.png'	
        });
		
		
		
		 var Marker = new google.maps.Marker({ 
		  position: danger_area,
          map: map,
          icon:iconBase + 'caution.png'	
        });
		var Marker = new google.maps.Marker({ 
		  position: danger_area1,
          map: map,
          icon:iconBase + 'caution.png'	
        });
      }

     function fail(){
         alert('navigator.geolocation failed, may not be supported');
     }

</script>


		</div>
	</div>
	<!-- Footer -->
	<footer class="container-fluid text-center">
		<p>&copy; Copyright <a href="#">GWN</a> &#124; <a href="#">Terms of Use</a> &#124; <a href="#">Privacy Policy</a></p>
	</footer>
</div>

</body>
</html>
