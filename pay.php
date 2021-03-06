<div data-role="header" data-theme="a">
	<h1>Hur länge vill du parkera?</h1>
</div>

<div id="progressBar">
	<span class="done">1. Välj tjänst</span>
	<span class="active">2. Välj tid</span>
	<span class="inactive">3. Biljettyp</span>
	<span class="inactive">4. Bekräfta</span>
</div>
	
<div data-role="fieldcontain" >

	<h1>Kostnad: 20 SEK / timme</br> Dra i reglagen för att justera timmar och minuter</h1>


	<form method="post">

	<table id="hoursMinTable">
		
	<tr>
		<td class="headerTd"><label for="timmar">Timmar: </label></td>
		<td><input type="range" name="timmar" readonly="readonly" id="timmar" value="0" min="0" max="23"  /></td>
	</tr>
	
	<tr>
		<td><label for="minuter">Minuter: </label></td>
		<td><input type="range" name="minuter" id="minuter" readonly="readonly" value="0" min="0" max="59"  /></td>
	</tr>
	</table>
	
		<div id="totalTime">
	<label for="slider">Parkeringstid t.o.m:</label>
	<input type="text" id="tid" name="tid" value=" ----"readonly="readonly"/>
	</div>
	
	
	<div id="totalSum">
	<label for="slider">Totalsumma: </label>
	<input type="text" id="betala" name="betala" readonly="readonly" value="0 SEK"/>	
	</div>
	
	
</div>


<div data-role="footer" data-theme="a" data-position="fixed">
	<p>
		<a class="back" href="#start" data-role="button" data-inline="true" data-icon="back" data-direction="reverse" onClick="window.location.reload()">Tillbaka</a>
		<span style="float:left; margin-left:350px;"><a class="cancel" href="#start" data-role="button" onClick="window.location.reload()" data-icon="delete">Avbryt</a></span>
		<a id="payForward" class="forward" href="#" data-rel="forward" data-role="button" data-inline="true" data-icon="forward">Nästa</a>
	</p>
	</form>
</div>

