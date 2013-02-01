<?php
session_start();
if(isset($_POST['maand']) && isset($_POST['jaar'])){
	$query = "select * from transacties where year(DATUM)=".$_POST['jaar']." and month(DATUM)=".$_POST['maand'].";";

	
}
?>