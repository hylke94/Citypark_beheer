<?php
require_once 'libs/Smarty.class.php';
require_once 'functions.php';

error_reporting(E_ALL);
session_start();



//debug

print_r($_SESSION);
print_r($_POST);
print_r($_GET);


$smarty =  new Smarty();

$smarty->compile_check = true;
$smarty->caching = false;


if($_SERVER['REQUEST_METHOD'] == "POST"){
	if (isset($_POST['loginForm'])){
		processLogin();
	}
	if (isset($_POST['passnumber'])){
		processBlockCard();
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
	}

	
	if (file_exists("templates/".$_GET["page"].".tpl")){
		$smarty->display("templates/".$_GET["page"].".tpl");
	}
	else {
		$smarty->display("templates/index.tpl");
	}
}
?>
