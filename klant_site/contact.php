<?php 
session_start();
include 'includes/db.php';
mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
mysql_select_db($dbname)or die(mysql_error());
if(isset($_SESSION['klantnr'])){
	$query="select * from klanten where `KLANT_NR`=".$_SESSION['klantnr'].";";
	$result= mysql_query($query);
	$data = mysql_fetch_assoc($result);
}

?><form method="post" action="formulierverzenden.php"><?php
if(isset($_SESSION['klantnr'])){
print	"<ul>
		<li>Uw voornaam *</li>
		<li><input type=\"text\" name=\"voornaam\" value=\"".$data['VOORNAAM']."\"/></li>
		<li>Uw achternaam *</li>
		<li><input type=\"text\" name=\"achternaam\" value=\"".$data['ACHTERNAAM']."\"/></li>
		<li>Uw e-mail adres *</li>
		<li><input type=\"text\" name=\"email\" value=\"".$data['EMAIL']."\" /></li>	
	</ul>";
}else{
	print	"<ul>
		<li>Uw voornaam *</li>
		<li><input type=\"text\" name=\"voornaam\" /></li>
		<li>Uw achternaam *</li>
		<li><input type=\"text\" name=\"achternaam\" /></li>
		<li>Uw e-mail adres *</li>
		<li><input type=\"text\" name=\"email\" /></li>
	</ul>";
}?>
	Uw bericht/vraag/opmerking *

		<textarea cols="50" rows="12" name="bericht"></textarea><BR />
		<input type="reset" value="Begin opnieuw" /> <input type="submit" name="versturen" value="Verstuur bericht" />

	<p>Alle velden gemarkeerd met een * zijn verplicht.</p>
</form>