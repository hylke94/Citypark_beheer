<?php 
if(isset($_GET['emessage'])){
	print "<hr><center><strong>U moet het formulier voledig en correct invullen.</strong></center><hr>";
}
?>

<form name="register" method="post" action="includes/register.php">
<table>
	<tr>
    <td>Aanhef:</td><td>Naam:</td></tr>
	<tr>
    <td><input name="aanhef" type="text" value="" size="20"/></td><td><input name="voornaam" type="text" value="" size="20"/></td></tr>
	<tr>
    <td>Achternaam:</td></tr>
	<tr>
    <td><input name="achternaam" type="text" value=""/></td></tr>
    <tr>
    <td>Straat:</td>    <td>Huisnummer:</td></tr>
    <tr><td><input name="straat" type="text" value=""/></td>    <td><input name="huisnummer" type="text" value="" size="5"/></td></tr>
    <tr>
    <td>Postcode:</td>    <td>Plaats:</td></tr>
	<tr>
    <td><input name="postcode" type="text" value="" size="6"/></td><td><input name="plaats" type="text" value=""/></td>
    <tr>
    <td>Telefoonnummer:</td></tr>
	<tr>
    <td><input name="telefoonnummer" type="text" value=""/></td></tr>
    <tr><td>Telefoonnummer mobiel:</td></tr>
	<tr>
    <td><input name="telefoonnummer_mob" type="text" value=""/></td></tr>
    <tr>
    <td>E-mail:</td></tr>
	<tr>
    <td><input name="email" type="email" value=""/></td></tr>
    <tr>
    <td>Rekeningnummer:</td></tr>
	<tr>
    <td><input name="rekeningnr" type="text" size="20"/><br/></td></tr>
</table>
<input type="submit" name="submit" value="vraag aan"/>

</form>