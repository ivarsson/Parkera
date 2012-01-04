<!DOCTYPE html> 
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1.0, user-scalable = no">
	<meta name="apple-mobile-web-app-capable" content="yes" /> 
	<title>P-automat</title> 
	<link rel="stylesheet" href="jqueryMobile.css" />
	<link rel="stylesheet" href="style.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="jqueryMobile.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	<script type="text/javascript" src="maps.js"></script>
	<script type="text/javascript" charset="utf-8">
	
	$.mobile.fixedToolbars
	   .setTouchToggleEnabled(false);
	
	$.mobile.fixedToolbars
	   .show(true);
	
	var timeStore = {
        h:     undefined,
        m:     undefined,
        price: undefined,
	    getPrice: function() {
	        return (this.h.val()*20) + parseInt((this.m.val()/3));
	    },
        updatePrice: function() {
            console.log(this);
            timeStore.price.val(timeStore.getPrice());
        },
	    init: function() {
            this.h     = $('#timmar');
            this.m     = $('#minuter');
            this.price =  $('#betala');
	        this.h.change(this.updatePrice);
	        this.m.change(this.updatePrice);
	    }
	};

	$(function() { timeStore.init(); });

	
	$(document).ready(function() {
		
		$("#mobile").click(function() {
			$("#mobile").hide(1000, function() {
				$("#smsTicket").show(1000);
			});

		});
	
	});
	</script>
	
	
	<script language="javascript" type="text/javascript">
	 function playSound(soundfile) {
	 document.getElementById("dummy").innerHTML=
	 "<embed src=\""+soundfile+"\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
	 }
	 </script>
	
</head>
<body>
	
	<!-- Start of first page: #start -->
	<div data-role="page" id="start">
		
		<div data-role="header" id="header">
			<div id="langBar"><a href="#noFunction" data-rel="dialog" data-transition="slidedown"><img src="images/swe.png"><img src="images/de.png"><img src="images/uk.png"></a></div>
		</div><!-- /header -->
		
		<span id="dummy"></span>
		
		<div data-role="content" id="main">

			<h1>Välkommen, välj ett alternativ</h1>

			<div class="buttonCont">

				<a href="#pay" class="button" style="background-image:url('images/payTicket.png'); repeat:none;" onClick="window.location.reload()" data-role="button">Betala parkering</a>
				<a href="#map" class="button" style="background-image:url('images/mapsIcon.png'); repeat:none;" onClick="window.location.reload()" data-role="button">Andra parkeringar i närheten</a>
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
	
	<div data-role="page" id="insertCardMobile">
		<div data-role="header" data-theme="a">Sätt in ditt betalkort</div>
		<div data-role="content"><a href="#confirmMobile" data-role="button" data-icon="next">Tryck här för att sätta in kort!</a></div>
		<div data-role="footer"><a href="#start" class="cancel" data-role="button" data-inline="true" data-icon="delete">Avbryt</a></div>
	</div>

	</div>

</body>

</html>