<?php
session_start();
if((empty($_POST['aanhef'])) || (empty($_POST['voornaam'])) || (empty($_POST['achternaam'])) || (empty($_POST['straat'])) || (empty($_POST['huisnummer'])) || (empty($_POST['postcode'])) || (empty($_POST['plaats'])) || (empty($_POST['telefoonnummer'])) || (empty($_POST['telefoonnummer_mob'])) || (empty($_POST['email'])) || (empty($_POST['rekeningnr']))){
	header('Location: ../profiel.php?emessage=yes');
}else{
	include 'db.php';
	mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
	mysql_select_db($dbname)or die(mysql_error());
	//
	$aanhef=stripslashes($_POST['aanhef']);
	$aanhef=mysql_real_escape_string($aanhef);
	//
	$voornaam=stripslashes($_POST['voornaam']);
	$voornaam=mysql_real_escape_string($voornaam);
	//
	$achternaam=stripslashes($_POST['achternaam']);
	$achternaam=mysql_real_escape_string($achternaam);
	//
	$straat=stripslashes($_POST['straat']);
	$straat=mysql_real_escape_string($straat);
	//
	$huisnummer=stripslashes($_POST['huisnummer']);
	$huisnummer=mysql_real_escape_string($huisnummer);
	//
	$postcode=stripslashes($_POST['postcode']);
	$postcode=mysql_real_escape_string($postcode);
	//
	$plaats=stripslashes($_POST['plaats']);
	$plaats=mysql_real_escape_string($plaats);
	//
	$telefoonnummer=stripslashes($_POST['telefoonnummer']);
	$telefoonnummer=mysql_real_escape_string($telefoonnummer);
	//
	$telefoonnummer_mob=stripslashes($_POST['telefoonnummer_mob']);
	$telefoonnummer_mob=mysql_real_escape_string($telefoonnummer_mob);
	//
	$email=stripslashes($_POST['email']);
	$email=mysql_real_escape_string($email);
	//
	$rekeningnr=stripslashes($_POST['rekeningnr']);
	$rekeningnr=mysql_real_escape_string($rekeningnr);
	//UPDATE `citypark`.`klanten` SET `AANHEF` = 'dhr' WHERE `klanten`.`KLANT_NR` =1;

	
	$query="UPDATE `citypark`.`klanten` SET `AANHEF` = '".$aanhef."', `VOORNAAM`= '".$voornaam."',`ACHTERNAAM` = '".$achternaam."', `STRAAT` ='".$straat."',`HUIS_NR` = '".$huisnummer."', `PLAATS` = '".$plaats."', `POSTCODE` ='".$postcode."', `EMAIL` ='".$email."',  `REK_NR` = '".$rekeningnr."', `TEL` = '".$telefoonnummer."', `TEL_MOB` = '".$telefoonnummer_mob."' WHERE `klanten`.`KLANT_NR` = '".$_SESSION['klantnr']."';";
	$result = mysql_query($query) or die (mysql_error());

	if ($result == true){
		print "Uw profiel in nu geupdate.";
	}

}
?>