<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
     
    <title> GWN Map </title>
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" media="screen"/>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery, Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- Map library -->
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<!-- Link to style -->
		<link rel="stylesheet" href="main.css" type="text/css" media="screen" />

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width:80%;
        height:80%;
        overflow:scroll;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
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
<script>
    window.onload = function () {
      function updateBatteryStatus(battery) {
        document.querySelector('#charging').textContent = battery.charging ? 'charging' : 'not charging';
        document.querySelector('#level').textContent = battery.level;
        document.querySelector('#dischargingTime').textContent = battery.dischargingTime / 60;
      }

      navigator.getBattery().then(function(battery) {
        // Update the battery status initially when the promise resolves ...
        updateBatteryStatus(battery);

        // .. and for any subsequent updates.
        battery.onchargingchange = function () {
          updateBatteryStatus(battery);
        };

        battery.onlevelchange = function () {
          updateBatteryStatus(battery);
        };

        battery.ondischargingtimechange = function () {
          updateBatteryStatus(battery);
        };
      });
    };
  </script>
  </head>

  <body>
    <div id="page">     
    <nav class="navbar navbar-inverse">
     <div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#"><img src="https://offthegrid.000webhostapp.com/GWN_Logo.jpg" class="img-rounded" width="43" height="33" \></a>
			  </div>
			  <div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="https://offthegrid.000webhostapp.com/hdoc/cmhome.php">Home</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
				
			</div>
		</div>  
    </nav>
    <div class="row content">
	
			<div class="col-sm-2 sidenav">
				<p class="active"><a href="#">Map</a></p>
				<p><a href="https://offthegrid.000webhostapp.com/hdoc/resourcesinput.php">Shelter Information</a></p>
				<p><a href="https://offthegrid.000webhostapp.com/hdoc/chat.php">Chat</a></p>
				
			</div>
         <div class="col-sm-8"> 
		<h1>Map</h1>
		
    </div>
    
   <div id="map"></div>
  
    <script>
     var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
	 var paddle = 'http://maps.google.com/mapfiles/kml/paddle/';
    /*    var customLabel = {
          restaurant: {
            icon: iconBase + 'caution.png'
          },
          bar: {
            icon: iconBase + 'info-i_maps.png'
          }
        };*/
     
        function initMap() {
       
         var uluru = {lat: 40.0075082, lng: -105.2625296};
         
         if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

           // infoWindow.setPosition(pos);
         //   infoWindow.setContent('Your current location.');
            infoWindow.open(map);
            map.setCenter(pos);
             var currloc = new google.maps.Marker({
                  position: pos,
                     map: map
         });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(40.0075082, -105.2625296),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;
       
         
         
          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://offthegrid.000webhostapp.com/hdoc/mapmarker.php', function(data) {
            var xml = data.responseXML;
            console.log(data);
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
             var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var state = markerElem.getAttribute('state');
              var telephone = markerElem.getAttribute('telephone');
              var city = markerElem.getAttribute('city');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = city +', ' + state + ', Telephone:' + telephone + 'Lat+lng'+point
              infowincontent.appendChild(text);
              //var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
               // label: icon.icon
                icon:iconBase + 'homegardenbusiness.png'	
              });
              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

     function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPXyQYDCgsEr3Q_5qH4-hkEnjN42D1WSE&callback=initMap">
    </script>
   <div id="charging">(charging state unknown)</div>
  <div id="level">(battery level unknown)</div>
  <div id="dischargingTime">(discharging time unknown)</div>
  </body>
</html>