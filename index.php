<?php
require_once 'libs/Smarty.class.php';
require_once 'functions.php';

error_reporting(E_ALL);
session_start();



//debug

print_r($_POST);


$smarty =  new Smarty();

$smarty->compile_check = true;
$smarty->caching = false;


if($_SERVER['REQUEST_METHOD'] == "POST"){
	if (isset($_POST['loginForm'])){
		processLogin();
	}
	if (isset($_POST['search'])){
		displayCostumerCards();
	}
	if (isset($_POST['blocked'])){
		$klantnr = $_POST['klantnr'];
		blockCosumerCard($klantnr);
	}
	if (isset($_POST['addFare'])){
		addFare();
	}
	
}

if(!isset($_GET['page'])){
	$smarty->display("templates/index.tpl");
}
else {
	
	switch ($_GET['page']){
		case 'uitloggen':
			logoutUser();
		break;
		case 'tariefbeheer':
			showFares();
		break;
	}

	
	if (file_exists("templates/".$_GET["page"].".tpl")){
		$smarty->display("templates/".$_GET["page"].".tpl");
	}
	else {
		$smarty->display("templates/index.tpl");
	}
}
?>
