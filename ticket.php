<div data-role="header" data-theme="a">
	<h1>Välj biljett-typ</h1>
</div>

<div id="progressBar">
	<span class="done">1. Välj tjänst</span>
	<span class="done">2. Välj tid</span>
	<span class="active">3. Biljettyp</span>
	<span class="inactive">4. Bekräfta</span>
</div>

<div id="main">

	<div id="buttonCont">
		<h1>Tryck på det biljettalternativ du önskar</h1>

		<a href="#insertCardPaper" class="button" style="background-image:url('images/paperTicket.png'); repeat:none;" data-role="button" data-rel="dialog" data-transition="slidedown">Pappersbiljett</a>

		<a href="#insertCardMobile" class="button" style="background-image:url('images/smsTicket.png'); repeat:none;" data-role="button" data-rel="dialog" data-transition="slidedown">SMS-biljett</a>

	</div>
</div>

<div data-role="footer" data-theme="a" data-position="fixed">
	<p>
		<a class="back" href="#pay" data-role="button" data-inline="true" data-icon="back" data-direction="reverse">Tillbaka</a>
				<span style="float:left; margin-left:350px;"><a class="cancel" href="#start" data-role="button" data-icon="delete">Avbryt</a></span>
	</p>
</div>
