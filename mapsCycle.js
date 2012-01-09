// page#mapsCycle
$(document).delegate('#cycles', 'pageshow',function(event){

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
	var map = new google.maps.Map(document.getElementById('map_cyclediv'), options);

	// Define Marker properties
	var image = new google.maps.MarkerImage('images/cycling.png',
		// This marker is 129 pixels wide by 42 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 18,42.
		new google.maps.Point(5, 10)
	);
	
		// Define Marker properties
	var imageHere = new google.maps.MarkerImage('images/you-are-here.png',
		// This marker is 129 pixels wide by 42 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 18,42.
		new google.maps.Point(5, 10)
	);
	
	var infowindows = [];

	// Add Marker
	var marker1 = new google.maps.Marker({
		position: new google.maps.LatLng(57.712676, 11.947074),
		map: map,
		icon: image,
		animation: google.maps.Animation.DROP
		 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add listener for a click on the pin
	google.maps.event.addListener(marker1, 'click', function() {
		infowindows.forEach(function(w) { w.close(); });
		infowindow1.open(map, marker1);
	});

	// Add information window
	var infowindow1 = new google.maps.InfoWindow({
		content:  createInfo('Styr & Ställ','<br />Lediga cyklar: 22')
	});
	
	infowindows.push(infowindow1);
	

//MARK 2 //

	// Add Marker2
	var marker2 = new google.maps.Marker({
		position: new google.maps.LatLng(57.710600, 11.944900),
		map: map,
		icon: imageHere,
		animation: google.maps.Animation.DROP
		 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});
	

	// Add listener for a click on the pin2
	google.maps.event.addListener(marker2, 'click', function() {
		infowindows.forEach(function(w) { w.close(); });
		infowindow2.open(map, marker2);
	});

	// Add information window2
	var infowindow2 = new google.maps.InfoWindow({
		content:  createInfo('Du är här!','')
	});
	
	infowindows.push(infowindow2);
	

	// Create information window2
	function createInfo(title, content) {
		return '<div class="infowindow"><strong>'+ title +'</strong>'+content+'</div>';
	};
	

//MARK 3 //

	// Add Marker3
	var marker3 = new google.maps.Marker({
		position: new google.maps.LatLng(57.708939, 11.927419),
		map: map,
		icon: image,
		animation: google.maps.Animation.DROP
		 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});
	
	// Add listener for a click on the pin3
	google.maps.event.addListener(marker3, 'click', function() {
		infowindows.forEach(function(w) { w.close(); });
		infowindow3.open(map, marker3);
	});

	// Add information window3
	var infowindow3 = new google.maps.InfoWindow({
		content:  createInfo('Styr & Ställ','</br>Antal platser: 10')
	});
	
	infowindows.push(infowindow3);
	

});

$(document).delegate('#cycles', 'pagehide', function() {
	$('#map_cyclediv').html("");
});