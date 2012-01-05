<div data-role="header" data-theme="a">
	<h1>SMS-Biljett</h1>
</div>

<div id="progressBar">
	<span class="done">1. Välj tjänst</span>
	<span class="done">2. Välj tid</span>
	<span class="done">3. Biljettyp</span>
	<span class="active">4. Bekräfta</span>
</div>

<div id="main">
	<h1>Bekräfta köp</h1>

		<label for="regnr">Registreringsnummer (Ex. ABC123): </label>
		<input type="text" name="regnr" id="regnr" />
		<br />
		<label for="telnr">Mobilnummer: </label>
		<input type="text" name="telnr" id="telnr" />
		<button type="button">Bekräfta</button>




</div>

<div data-role="footer" data-theme="a" data-position="fixed">
	<p>
		<a class="back" href="#ticket" data-role="button" data-inline="true" data-icon="back">Tillbaka</a>
		<span style="float:left; margin-left:350px;"><a class="cancel" href="#start" data-role="button" data-icon="delete">Avbryt</a></span>
		<a class="forward" href="#donePopupSMS" data-rel="dialog" data-transition="slidedown" data-role="button" data-inline="true" data-icon="forward">Bekräfta köp</a>
	</p>
</div>