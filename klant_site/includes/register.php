<?php
if((empty($_POST['aanhef'])) || (empty($_POST['voornaam'])) || (empty($_POST['achternaam'])) || (empty($_POST['straat'])) || (empty($_POST['huisnummer'])) || (empty($_POST['postcode'])) || (empty($_POST['plaats'])) || (empty($_POST['telefoonnummer'])) || (empty($_POST['telefoonnummer_mob'])) || (empty($_POST['email'])) || (empty($_POST['rekeningnr']))){
	header('Location: ../aanmelden.php?emessage=yes');
}else{
	include 'db.php';

	$query = "select * from PAS where `TYPE` = '2';";
	$result= mysql_query($query);
	if(mysql_num_rows($result)<150){
	
	//Connect to server and select database
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
	
	$query="insert into klanten (`KLANT_NR`, `AANHEF`, `VOORNAAM`, `ACHTERNAAM`, `STRAAT`, `HUIS_NR`, `PLAATS`, `POSTCODE`, `EMAIL`, `REK_NR`, `TEL`, `TEL_MOB` )
	values ('NULL','".$aanhef."','".$voornaam."','".$achternaam."','".$straat."','".$huisnummer."','".$plaats."','".$postcode."','".$email."','".$rekeningnr."','".$telefoonnummer."','".$telefoonnummer_mob."');";
	$result = mysql_query($query) or die (mysql_error());
	if ($result == true){
		$mypassword = sha1($postcode."ditiseenhash");
		$id=mysql_insert_id();
		$query="INSERT INTO `citypark`.`login` (`ID`, `KLANT_NR`, `USER`, `PASS`, `ADMIN`) VALUES (NULL, '".$id."', '".$email."', '".$mypassword."', '0');";
		$result = mysql_query($query) or die (mysql_error());
	}
header('Location: regklaar.php');
	}else{
		print "U kunt helaas geen abbonee worden omdat:\n<BR />Er geen ruimte meer is.";
	}
	
}
	//TODO: Controle middels soap.
	//rekennr bedrag(maandbedrag*6)	
	
/*	if(krediet == true){

		}
	}else{
		print "U kunt helaas geen abbonee worden omdat:\n<BR />U niet kredietwaardig bent bevonden.";
	}*/
?>