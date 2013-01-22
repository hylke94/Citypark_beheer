<?php /* Smarty version Smarty-3.1.12, created on 2013-01-22 10:44:54
         compiled from "templates\blokkeren.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2104850f816935fd399-64312574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db64ed584376d47614e1cb754c0e5d8b81110236' => 
    array (
      0 => 'templates\\blokkeren.tpl',
      1 => 1358848499,
      2 => 'file',
    ),
    'c131b6f68001cba64f85338acea39c6401c3aaeb' => 
    array (
      0 => '.\\templates\\index_beheer.tpl',
      1 => 1358497974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2104850f816935fd399-64312574',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f816936556f6_02338567',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f816936556f6_02338567')) {function content_50f816936556f6_02338567($_smarty_tpl) {?><?php if (!isset($_SESSION['ingelogd'])){?>
<h1>Access denied</h1>
<?php }?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>CityPark Beheer - Pas blokkeren</title>
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
					

<h2>Pas blokkeren</h2>

<p>Op deze pagina kunt u een pasnummer blokkeren, vul onderstaand formulier in.</p>

<?php if (!empty($_smarty_tpl->tpl_vars['errors']->value)){?>
	<div class="errors">
		<ul>
		<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
			  <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
		<?php } ?>
		</ul>
	</div>
<?php }?>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?page=blokkeren" method="POST" name="blockForm">
	<label for="klantNaam">Klantnaam</label>
	<input type="text" id="klantNaam" name="klantNaam" />
	
	<input type="submit" name="submit" value="blokkeren" />
	<input type="hidden" name="blokkeren" value="1" />
</form>


				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html><?php }} ?>