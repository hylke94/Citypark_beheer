<?php /* Smarty version Smarty-3.1.12, created on 2013-01-22 10:44:52
         compiled from "templates\index_beheer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1388250f6d8d75ebc07-26476951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '722e5b69aefd6abadc38843470b86736d3a09ac1' => 
    array (
      0 => 'templates\\index_beheer.tpl',
      1 => 1358497974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1388250f6d8d75ebc07-26476951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f6d8d75ec987_04786407',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f6d8d75ec987_04786407')) {function content_50f6d8d75ec987_04786407($_smarty_tpl) {?><?php if (!isset($_SESSION['ingelogd'])){?>
<h1>Access denied</h1>
<?php }?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>CityPark Beheer </title>
	</head>
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
	<body>
		<div id="beheer_container">
			<div id="top">
				<div class="header">
					<h1>Citypark Beheer</h1>
				</div>
				<div class="welcome">
					<span class="welcometext">Welkom <?php echo $_SESSION['naam'];?>
</span>
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
					
						Test
					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html><?php }} ?>