<div data-role="header" data-theme="a">
	<h1>Pappersbiljett</h1>
</div>

<div id="progressBar">
	<span class="done">1. Välj tjänst</span>
	<span class="done">2. Välj tid</span>
	<span class="done">3. Biljettyp</span>
	<span class="active">4. Bekräfta</span>
</div>

<div id="main">
	<h1>Kontrollera uppgifterna och bekräfta köpet</h1>
	
	<table id="confirmTable">
		<tr>
			<td>
				<h1>Tid fram till:</h1>
				<h2 class="confirmTid"></h2></br>
				<h1>Total kostnad:</h1>
				<h2 class="confirmKostnad"></h2></br>
				<h1>Biljettyp:</h1>
				<h2>Pappersbiljett</h2>
			</td>
		</tr>
	</table>



</div>

<div data-role="footer" data-theme="a" data-position="fixed">
	<p>
		<a class="back" href="#ticket" data-role="button" data-inline="true" data-icon="back">Tillbaka</a>
				<span style="float:left; margin-left:350px;"><a class="cancel" href="#start" data-role="button" data-icon="delete">Avbryt</a></span>
		<a class="forward" href="#donePopupPaper" data-rel="dialog" data-transition="slidedown" data-role="button" data-inline="true" data-icon="forward" onclick="checkValue()">Bekräfta köp</a>
	</p>
</div>
