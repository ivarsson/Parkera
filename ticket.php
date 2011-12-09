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
		<h1>Tryck på det biljettalternativ du önskar</h1>

	<a href="#confirmPaper" class="button" style="background-image:url('images/paperTicket.png'); repeat:none;"  data-role="button">Pappersbiljett</a>
		<a href="#insertCardMobile" class="button" style="background-image:url('images/smsTicket.png'); repeat:none;" data-role="button" data-rel="dialog" data-transition="slidedown">SMS-biljett</a>

</div>

<div data-role="footer" data-theme="a" data-position="fixed">
	<p>
		<a class="back" onClick="window.location.reload()" href="#pay" data-role="button" data-inline="true" data-icon="back">Tillbaka</a>
	</p>
</div>