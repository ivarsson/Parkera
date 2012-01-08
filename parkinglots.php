var parkInfo = [
<?php 

		$APIKey = '88094d85-d0fa-4ecb-a259-9f8d06a2aa66';
		$currentLatitude = 57.710306;
		$currentLongitude = 11.944825;

		$url = 'http://data.goteborg.se/ParkingService/v1.0/PrivateParkings/' . $APIKey . '?latitude=' . $currentLatitude . '&longitude=' . $currentLongitude . '&radius=2000&format=JSON';

		$parkInfo = json_decode(file_get_contents(($url)));
		foreach($parkInfo as $park) {
?>
{
	name: "<?= $park->Name; ?>",
	free: "<?= $park->ParkingSpaces ?>",
	lat:  "<?= $park->Lat; ?>",
	long: "<?= $park->Long ?>",
},
<?PHP
		}
?>
];