<?php
session_start();
if(isset($_SESSION['klantnr'])){
	include 'includes/db.php';
	//Connect to server and select database
	mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
	mysql_select_db($dbname)or die(mysql_error());
	if(@$_POST['submit']=="blokeer"){
		$query = "UPDATE `pas` SET `STATUS` = '0' WHERE KLANT_NR =".$_SESSION['klantnr']." AND (`PAS_TYPE` = '2' OR `PAS_TYPE` = '3');";
		$result = mysql_query($query);
		print "<p>Uw passen zijn nu geblokeerd</p>";
	}else{
		print"
			<p>Met de onderstande knop kunt u al uw passen in een keer blokeren.<br />
			<form name=\"blokeer_pad\" method=\"post\" action=\"pasblok.php\">
			<input type=\"submit\" name=\"submit\" value=\"blokeer\"/>
			</form></p>
			";
	}
}else{
	header('Location: index.php');
}
?>