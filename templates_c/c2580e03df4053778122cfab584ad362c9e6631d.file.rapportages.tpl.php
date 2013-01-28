<?php /* Smarty version Smarty-3.1.12, created on 2013-01-28 10:08:18
         compiled from "templates\rapportages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1800750f82a878dc018-27541100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2580e03df4053778122cfab584ad362c9e6631d' => 
    array (
      0 => 'templates\\rapportages.tpl',
      1 => 1358497974,
      2 => 'file',
    ),
    'c131b6f68001cba64f85338acea39c6401c3aaeb' => 
    array (
      0 => '.\\templates\\index_beheer.tpl',
      1 => 1359102818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1800750f82a878dc018-27541100',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f82a8792c896_98320354',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f82a8792c896_98320354')) {function content_50f82a8792c896_98320354($_smarty_tpl) {?><?php if (!isset($_SESSION['ingelogd'])){?>
<h1>Access denied</h1>
<?php }?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>CityPark Beheer - Rapportages</title>
	</head>
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
	<body>
		<div id="beheer_container">
			<div id="top">
				<div class="header">
					<h1>Citypark Beheer</h1>
				</div>
			</div>
			<div class="left">
				<ul>
					<li>
						<a href="?page=home">Home</a>
					</li>
					<li>
						<a href="?page=blokkeren">Pas blokkeren</a>
					</li>
					<li>
						<a href="?page=tariefbeheer">Tariefbeheer</a>
					</li>
					<li>
						<a href="?page=rapportages">Rapporgages</a>
					</li>
					<li>
						<a href="?page=uitloggen">Uitloggen</a>
					</li>
				</ul>	
				<div class="clearfix"></div>					
			</div>	
			<div class="right">
				<div class="rightInner">
					

Rapportages


				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html><?php }} ?>