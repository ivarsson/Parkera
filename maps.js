// page#maps
$(document).delegate('#map', 'pageshow',function(event){

	//------- Google Maps ---------//

	// Creating a LatLng object containing the coordinate for the center of the map
	var latlng = new google.maps.LatLng(57.710306, 11.944825);

	// Creating an object literal containing the properties we want to pass to the map
	var options = {
		zoom: 15, // This number can be set to define the initial zoom level of the map
		center: latlng,
		disableDefaultUI: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
	};
	// Calling the constructor, thereby initializing the map
	var map = new google.maps.Map(document.getElementById('map_div'), options);

	// Define Marker properties
	var image = new google.maps.MarkerImage('parking.png',
		// This marker is 129 pixels wide by 42 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 18,42.
		new google.maps.Point(5, 10)
	);


	var infowindows = (new Array);

	// Create information window
	var createInfo = function(title, content) {
		return '<div class="infowindow"><strong>'+ title +'</strong><br/>'+content+'</div>';
	};
	
	
	var imageHere = new google.maps.MarkerImage('images/you-are-here.png',
		// This marker is 129 pixels wide by 42 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 18,42.
		new google.maps.Point(5, 10)
	);
	
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(57.710600, 11.944900),
		map: map,
		icon: imageHere,
		animation: google.maps.Animation.DROP
		 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});
	
	
	// Add information window2
	var infowindow = new google.maps.InfoWindow({
		content:  createInfo('Du är här!','')
	});
	
	infowindows.push(infowindow);

	// Add listener for a click on the pin2
	google.maps.event.addListener(marker, 'click', function() {
		infowindows.forEach(function(w) { w.close(); });
		infowindow.open(map, marker);
	});
	
	parkInfo.forEach(function (info) {

		// Add Marker
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(info.lat,info.long),
			map: map,
			icon: image,
			animation: google.maps.Animation.DROP
			// This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
		});
	
		// Add information window
		var infowindow = new google.maps.InfoWindow({
			content:  createInfo(info.name,'Ant. lediga platser: ' + info.free)
		});
		
		infowindows.push(infowindow);
	
		// Add listener for a click on the pin
		google.maps.event.addListener(marker, 'click', function() {
			infowindows.forEach(function(w) { w.close(); });
			infowindow.open(map, marker);
		});

	});
	
});

$(document).delegate('#map', 'pagehide', function() {
	$('#map_div').html("");
});