<?php
	session_start();
	if(@isset($_SESSION['klantnr'])){
	session_destroy();
	print "<body onload=\"parent.location.reload()\">";
	}else{header('Location: main.php');}
?>