<?php /* Smarty version Smarty-3.1.12, created on 2013-01-17 16:44:21
         compiled from "templates\tariefbeheer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1983550f82a44346f01-76672211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd44e278aa0c10926942db3b4b1e17bc7b885896b' => 
    array (
      0 => 'templates\\tariefbeheer.tpl',
      1 => 1358441059,
      2 => 'file',
    ),
    'c131b6f68001cba64f85338acea39c6401c3aaeb' => 
    array (
      0 => '.\\templates\\index_beheer.tpl',
      1 => 1358436417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1983550f82a44346f01-76672211',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f82a44362513_72164384',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f82a44362513_72164384')) {function content_50f82a44362513_72164384($_smarty_tpl) {?><?php if (!isset($_SESSION['ingelogd'])){?>
<h1>Access denied</h1>
<?php }?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>CityPark Beheer - Tariefbeheer</title>
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
					

Tariefbeheer


				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html><?php }} ?>