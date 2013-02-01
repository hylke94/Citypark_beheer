<?php
session_start();
if(isset($_SESSION['klantnr'])){
	include 'includes/db.php';
	//Connect to server and select database
	mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
	mysql_select_db($dbname)or die(mysql_error());
	if(@$_POST['submit']=="opzeggen"){
		$maand=date('m');
		$jaar=date('Y');
		$maand++;
		if($maand == 13){
			$maans = 1;
			$jaar++;
		}
		$klantnr=$_SESSION['klantnr'];
		$tijd=$jaar."-".$maand."-01 00:00:00";
		
		$sql="CREATE EVENT IF NOT EXISTS `opzeggen_".$klantnr."` 
		ON SCHEDULE AT '".$tijd."'
		DO
		UPDATE `pas` SET `STATUS` = '0' WHERE KLANT_NR = '".$klantnr."';";
		$result = mysql_query($sql);
	}else{
		print"
			<p>Uw kunt ten alle tijden uw abbonement opzeggen.<br />
			De opzegging gaat op de eerste van de maand in en zal per email bevestigt worden.<BR />
			<form name=\"blokeer_pad\" method=\"post\" action=\"opzeggen.php\">
			<input type=\"submit\" name=\"submit\" value=\"opzeggen\"/>
			</form></p>
			";
	}
}else{
	header('Location: index.php');
}
