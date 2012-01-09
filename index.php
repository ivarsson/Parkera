<!DOCTYPE html> 
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1.0, user-scalable = no">
	<meta name="apple-mobile-web-app-capable" content="yes" /> 
	<meta name="viewport" content="user-scalable=no,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<title>P-automat</title> 
	<link rel="stylesheet" href="jqueryMobile.css" />
	<link rel="stylesheet" href="style.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="jqueryMobile.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	<script type="text/javascript" src="maps.js"></script>
	<script type="text/javascript" src="mapsCycle.js"></script>
	<script src="DP_DateExtensions.js"></script>

	<script type="text/javascript" charset="utf-8">

	function save() {
		var tid = document.getElementById('tid').value;
		var betala = document.getElementById('betala').value;
		
		localStorage.setItem("tid", tid);
		localStorage.setItem("betala", betala);
	}
	
	var freeSpaces = 0;
	
	$(document).ready(function() {
		$('.confirmTid').html(localStorage.getItem("tid"));
		$('.confirmKostnad').html(localStorage.getItem("betala"));
		
		$('#demo').text(freeSpaces);
		$('#demoButton').click(function() {
			if (freeSpaces == 0) {
				freeSpaces = Math.floor(Math.random()*100);
				document.getElementById('demo').style.color = 'black';

			} else {
				freeSpaces = 0;
				document.getElementById('demo').style.color = 'red';
			}
			$('#demo').text(freeSpaces);
		})
		
		$("#regnr").keyup(function() {
			var value = $(this).val()
			
			if (value.match(/[^A-z0-9 ]/)) {
				if (value != "Ex. ABC123") {
					$("#regNrFel").text("Ogiltligt Registreringsnummer, inga specialtecken är tillåtna");
					this.style.background='#FF4040';					
				}
			}
			else {
				$("#regNrFel").text("");
				this.style.background='';
			}
		}).keyup();
		
		$("#telnr").keyup(function() {
			var value = $(this).val()
			if (value.match(/[^0-9]/)) {
				if (value != "Ex. 0739982351") {
					$("#telNrFel").text("Ogiltligt mobilnummer, endast siffror (0-9) är tillåtet");
					this.style.background='#FF4040';
				}
			}
			else {
				$("#telNrFel").text("");
				this.style.background='';
			}
		}).keyup();
	});
	
	function checkFreeSpace() {
		if (freeSpaces == 0) {
			$.mobile.changePage('#noneFreeSpaces', {transition: "slidedown", role: "dialog"});
		}
		else {
			$.mobile.changePage('#pay');
		}
	}
	
	$(document).delegate('#payButton', 'tap', checkFreeSpace);
	
	function checkSliderValue() {
		if ($('#timmar').val() == "0" && $('#minuter').val() == "0") {
			alert("Du måste ange hur länge du vill parkera");
		}
		else {
			$.mobile.changePage('#ticket');
		}
	}
	
	$(document).delegate('#payForward', 'tap', checkSliderValue);
	
	function checkSMSConfirm() {	
		if ($('#regnr').val() == "Ex. ABC123") {
			alert("Fyll i registreringnummer!");
		}
		else if ($('#regnr').val() == "") {
			alert("Du måste fylla i ett registreringsnummer!");
		}
		else if ($('#telnr').val() == "Ex. 0739982351") {
			alert("Fyll i ett telefonnummer!");
		}
		else if ($('#telnr').val() == "") {
			alert("Du måste fylla i ett telefonnummer!");
			return false;
		}
		else if ($("#telNrFel").text() == "Ogiltligt Registreringsnummer, inga specialtecken är tillåtna") {
			alert("Ogiltligt Registreringsnummer, inga specialtecken är tillåtna");
		}
		else if ($("#telNrFel").text() == "Ogiltligt mobilnummer, endast siffror (0-9) är tillåtet") {
			alert("Ogiltligt mobilnummer, endast siffror (0-9) är tillåtet");
		}
		else {
			$.mobile.changePage('#donePopupSMS', {transition: "slidedown", role: "dialog"});
		}
	}
	$(document).delegate('#confirmMobileButton', 'tap', checkSMSConfirm);
	
	$.mobile.fixedToolbars
	   .setTouchToggleEnabled(false);
	
	$.mobile.fixedToolbars
	   .show(true);
	

	// Slidersection //
	var dateObj = new Date();
	var timeStore = {
        h:     undefined,
        m:     undefined,
        price: undefined,
        time:  undefined,
        
	    getPrice: function() {
	        return ((this.h.val()*20) + parseInt((this.m.val()/3)) + " SEK");
	    },
	    
	    getTime: function() {
	    	dateObj = (new Date()).add(parseInt(this.h.val()), "hours");
	    	dateObj = dateObj.add(parseInt(this.m.val()), "minutes");
	        return (dateObj.timeFormat("H:mm") + " den " + dateObj.dateFormat("D/M"));
	    },
	    updateTime: function() {
            console.log(this);
            timeStore.time.val(timeStore.getTime());
        },
        updatePrice: function() {
            console.log(this);
            timeStore.price.val(timeStore.getPrice());
        },
	    init: function() {
            this.h     = $('#timmar');
            this.m     = $('#minuter');
            this.price =  $('#betala');
            this.time  = $('#tid');
            this.h.change(this.updateTime);
            this.m.change(this.updateTime);
	        this.h.change(this.updatePrice);
	        this.m.change(this.updatePrice);
	    }
	};

	// page#pay
	$(document).delegate('#pay', 'pageinit',function(event){
		timeStore.init();
	});

	// Slidersection END //
	<?php include 'parkinglots.php'; ?>
	</script>
	
</head>
<body>

	
	<!-- Start of first page: #start -->
	<div data-role="page" id="start">
		
		<div data-role="header" id="header">
			<div id="langBar">
				<a href="#noFunction" data-rel="dialog" data-transition="slidedown">
					<img src="images/swe.png"><img src="images/de.png"><img src="images/uk.png">
				</a>
			</div>
			<button id="demoButton">Demo</button>
		</div>
		<!-- /header -->
		
		<span id="dummy"></span>
		
		<div data-role="content" id="main">
			

			<h1><span id="demo"></span> parkeringar lediga, välj ett alternativ</h1>

			<div id="buttonCont">

				<a id="payButton" href="#" class="button" style="background-image:url('images/payTicket.png'); repeat:none;" data-role="button">Betala parkering</a>
				<a href="#map" class="button" style="background-image:url('images/mapsIcon.png'); repeat:none;" data-role="button">Andra parkeringar i närheten</a>
				<a href="#cycles" class="button" style="background-image:url('images/freeBikes.png'); repeat:none;" data-role="button">Lediga hyrcyklar i närheten</a>
				<a href="#publicTrans" class="button" style="background-image:url('images/publicTransport.png'); repeat:none;" data-role="button">Kommande avgångar i kollektivtrafiken</a>
			</div>

		</div>
		
		<div data-role="footer" data-position="fixed">
			<h4>Välkommen</h4>
		</div><!-- /footer -->
	</div>
	
	<!-- Map page-->
	<div data-role="page" id="map">
		<?php include 'map.php'; ?>
	</div>
	
	<!-- MapCycle page-->
	<div data-role="page" id="cycles">
		<?php include 'mapCycle.php'; ?>
	</div>
	
	<!--Pay page-->
	<div data-role="page" id="pay">
		<?php include 'pay.php'; ?>
	</div>
	
	<!--Ticket page-->
	<div data-role="page" id="ticket">
		<?php include 'ticket.php'; ?>
	</div>
	
	<!--Confirm mobile-->
	<div data-role="page" id="confirmMobile">
		<?php include 'confirmMobile.php'; ?>
	</div>
	
	<!--Confirm paper-->
	<div data-role="page" id="confirmPaper">
		<?php include 'confirmPaper.php'; ?>
	</div>
	
	<!--Public transport-->
	<div data-role="page" id="publicTrans">
		<?php include 'publicTrans.php'; ?>
	</div>
	
	<!--No function-->
	<div data-role="page" id="noFunction">
		<div data-role="header" data-theme="a">Inte klart än...</div>
		<div data-role="content">Denna funktion är fortfarande under utveckling!</div>
		<div data-role="footer"><a href="#start" data-rel="back" data-role="button" data-inline="true" data-icon="delete">Stäng</a></div>
	</div>
	
	<!--NoneFreeSpaces popup-->
	<div data-role="page" id="noneFreeSpaces">
		<div data-role="header" data-theme="a">Det finns inga lediga parkeringsplatser just nu...</div>
		<div data-role="content"><a href="#map" data-role="button" data-icon="next">Tryck här för att att se andra närliggande parkeringsplatser.</a></div>
		<div data-role="content"><a href="#pay" data-role="button" data-icon="next">Tryck här för att fortsätta, om du ändå vill erlägga p-avgift!</a></div>
		<div data-role="footer">
		<a href="#start" class="cancel" data-role="button" data-inline="true" data-icon="delete">Avbryt</a></div>
	</div>
	
	<!--Insert card Mobile-->
	<div data-role="page" id="insertCardMobile">
		<div data-role="header" data-theme="a">Sätt in ditt betalkort</div>
		<div data-role="content">
			<a href="#confirmMobile" data-role="button" data-icon="next">Tryck här för att sätta in kort!</a>
		</div>
		<div data-role="footer">
			<a href="#start" data-role="button" data-rel="back" data-inline="true" data-icon="back">Tillbaka</a>
			<a href="#start" class="cancel" data-role="button" data-inline="true" data-icon="delete">Avbryt</a>
		</div>
	</div>
	
	<!--Insert card Paper-->
	<div data-role="page" id="insertCardPaper">
		<div data-role="header" data-theme="a">Sätt in ditt betalkort</div>
		<div data-role="content"><a href="#confirmPaper" data-role="button" data-icon="next">Tryck här för att sätta in kort!</a></div>
		<div data-role="footer">
		<a href="#start" data-role="button" data-rel="back" data-inline="true" data-icon="back">Tillbaka</a>
		<a href="#start" class="cancel" data-role="button" data-inline="true" data-icon="delete">Avbryt</a></div>
	</div>

	<!--Done-popupPaper-->
	<div data-role="page" id="donePopupPaper">
		<div data-role="header" data-theme="a">Tack!</div>
		<div data-role="content">
			Köpet är nu genomfört. </br>Vänligen placera pappersbiljetten i bilens vindruta väl synlig.
		</div>
		<div data-role="footer">
			<a href="#start" data-role="button" data-inline="true" data-icon="delete">Stäng</a>
		</div>
	</div>

	<!--Done-popupSMS-->
	<div data-role="page" id="donePopupSMS">
		<div data-role="header" data-theme="a">Tack!</div>
		<div data-role="content">
			Köpet är nu genomfört. </br>Ett SMS kommer skickas till din mobiltelefon som bekräftelse på ditt köp.
		</div>
		<div data-role="footer">
			<a href="#start" data-role="button" data-inline="true" data-icon="delete">Stäng</a>
		</div>
	</div>
	</div>

</body>

</html>