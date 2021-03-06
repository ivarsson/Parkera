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
	<h1>Fyll i uppgifter och bekräfta köp</h1></br>

	<table id="confirmTable">
		<tr>
			<td>
				<h1>Registreringsnummer:</h1>
				<input type="text" name="regnr" id="regnr" value="Ex. ABC123" onfocus="if (this.value == 'Ex. ABC123') {this.value=''; this.style.color='#000000';}" />
				<h3 id="regNrFel"></h3>
				<h1>Mobilnummer:</h1>
				<input type="text" name="telnr" id="telnr" value="Ex. 0739982351" onfocus="if (this.value == 'Ex. 0739982351') {this.value=''; this.style.color='#000000';}"/>
				<h3 id="telNrFel"></h3>
			</td>
			<td>
				<h1>Tid fram till:</h1>
				<h2 class="confirmTid"></h2></br>
				<h1>Total kostnad:</h1>
				<h2 class="confirmKostnad"></h2></br>
				<h1>Biljettyp:</h1>
				<h2>SMS</h2>
			</td>
		</tr>
	</table>

</div>

<div data-role="footer" data-theme="a" data-position="fixed">
	<p>
		<a class="back" href="#ticket" data-role="button" data-inline="true" data-icon="back" data-direction="reverse">Tillbaka</a>
		<span style="float:left; margin-left:350px;"><a class="cancel" href="#start" data-role="button" data-icon="delete" onClick="window.location.reload()">Avbryt</a></span>
		<a id="confirmMobileButton" class="forward" href="#"  data-rel="dialog" data-transition="slidedown" data-role="button" data-inline="true" data-icon="forward">Bekräfta köp</a>
	</p>
</div>