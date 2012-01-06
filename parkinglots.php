<?php 

		$APIKey = '88094d85-d0fa-4ecb-a259-9f8d06a2aa66';
		$currentLatitude = 57.708549;
		$currentLongitude = 11.94042;

		$url = 'http://data.goteborg.se/ParkingService/v1.0/PrivateParkings/' . $APIKey . '?latitude=' . $currentLatitude . '&longitude=' . $currentLongitude . '&radius=800&format=JSON';

		$parkInfo = json_decode(file_get_contents(($url)));


		print_r($parkInfo);
		echo "<br><br>";

		echo $parkInfo[0]->Name;

?>