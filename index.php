<?php
error_reporting(E_ALL);
print_r($_POST);
require_once 'libs/Smarty.class.php';
require_once 'functions.php';
$smarty =  new Smarty();

$smarty->compile_check = true;
$smarty->caching = false;

$smarty->display('templates/index.tpl');


if($_SERVER['REQUEST_METHOD'] == "POST"){
	if (isset($_POST['loginForm'])){
		processLogin();
	}
	
}

// if(!isset($_GET['page'])){
// 	$smarty->display("templates/home.tpl");
// }
// else {
// 	if (file_exists("templates/".$_GET["page"].".tpl")){
// 		$smarty->display("templates/".$_GET["page"].".tpl");
// 	}
// 	else {
// 		$smarty->display("templates/home.tpl");
// 	}
// }
?>