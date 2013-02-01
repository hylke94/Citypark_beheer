<?php
	session_start();

	if(isset($_GET['emessage'])){
		print "<hr><center><strong>U moet het formulier voledig en correct invullen.</strong></center><hr>";
	}
	
	
	//Connect to server and select database
	include 'includes/db.php';
	mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
	mysql_select_db($dbname)or die(mysql_error());
	if(isset($_SESSION['klantnr'])){
		$query="select * from klanten where `KLANT_NR`=".$_SESSION['klantnr'].";";
		$result= mysql_query($query);
		$data = mysql_fetch_assoc($result);
	}
?>
<hr />
Wachtwoord
<hr />
<form name="profiel" method="post" action="includes/update_wachtwoord.php">
<table>
<tr>
<td>Oud:</td><td>Nieuw:</td><td>Nieuw herhaald:</td>
</tr>
<tr>
<td><input name="ww_oud" type="password" size="20"/></td><td><input name="ww_nw1" type="password" size="20"/></td><td><input name="ww_nw2" type="password" size="20"/></td>
</tr>
</table>
<input type="submit" name="submit" value="wijzig wachtwoord"/>
</form>
<hr />
Gegevens
<hr />
<form name="profiel" method="post" action="includes/update_profiel.php">
<table>
<tr>
<td>Aanhef:</td><td>Naam:</td></tr>
<tr>
<td><input name="aanhef" type="text" value="<?php echo $data['AANHEF']; ?>" size="20"/></td><td><input name="voornaam" type="text" value="<?php echo $data['VOORNAAM']; ?>" size="20"/></td></tr>
<tr>
<td>Achternaam:</td></tr>
<tr>
<td><input name="achternaam" type="text" value="<?php echo $data['ACHTERNAAM']; ?>"/></td></tr>
<tr>
<td>Straat:</td>    <td>Huisnummer:</td></tr>
<tr><td><input name="straat" type="text" value="<?php echo $data['STRAAT']; ?>"/></td>    <td><input name="huisnummer" type="text" value="<?php echo $data['HUIS_NR']; ?>" size="5"/></td></tr>
<tr>
<td>Postcode:</td>    <td>Plaats:</td></tr>
<tr>
<td><input name="postcode" type="text" value="<?php echo $data['POSTCODE']; ?>" size="6"/></td><td><input name="plaats" type="text" value="<?php echo $data['PLAATS']; ?>"/></td>
<tr>
<td>Telefoonnummer:</td></tr>
<tr>
<td><input name="telefoonnummer" type="text" value="<?php echo $data['TEL']; ?>"/></td></tr>
<tr><td>Telefoonnummer mobiel:</td></tr>
<tr>
<td><input name="telefoonnummer_mob" type="text" value="<?php echo $data['TEL_MOB']; ?>"/></td></tr>
<tr>
<td>E-mail:</td></tr>
<tr>
<td><input name="email" type="email" value="<?php echo $data['EMAIL']; ?>"/></td></tr>
<tr>
<td>Rekeningnummer:</td></tr>
<tr>
<td><input name="rekeningnr" type="text" size="20" value="<?php echo $data['REK_NR']; ?>"/><br/></td></tr>
</table>
<input type="submit" name="submit" value="pas aan"/>

</form>