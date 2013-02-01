<?php
session_start();
if((empty($_POST['ww_oud'])) || (empty($_POST['ww_nw1'])) || (empty($_POST['ww_nw2']))){
	header('Location: ../profiel.php?emessage=yes');
}else{
	if($_POST['ww_nw1'] == $_POST['ww_nw2']){
	include 'db.php';
	mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
	mysql_select_db($dbname)or die(mysql_error());
	$mypassword = sha1($_POST['ww_nw1']."ditiseenhash");
	$query = "UPDATE `login` SET `PASS` = '".$mypassword."' WHERE `login`.`KLANT_NR` ='".$_SESSION['klantnr']."';";
	$result = mysql_query($query);
	print "Uw wachtwoord in nu geupdate";
	}else{
		header('Location: ../profiel.php?emessage=yes');
	}
}