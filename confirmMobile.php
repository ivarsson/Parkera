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
	<h1>Bekräfta</h1>

	<div class="button">
		<label for="regnr">Registreringsnummer: </label>
		<input type="text" name="regnr" id="regnr" />
		<br />
		<label for="telnr">Mobilnummer: </label>
		<input type="text" name="telnr" id="telnr" />
		<button type="button">Bekräfta</button>
	</div>
	
	<div class="button">
		<label for="time">Tid: </label>
		<input type="text" name="time" id="time" />
		<br />
		<label for="price">Pris: </label>
		<input type="text" name="price" id="price" />
	</div>



</div>

<div data-role="footer" data-theme="a">
	<p>
		<a class="back" onClick="window.location.reload()" href="#ticket" data-role="button" data-inline="true" data-icon="back">Tillbaka</a>
	</p>
</div>