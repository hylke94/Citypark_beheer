<?php /* Smarty version Smarty-3.1.12, created on 2013-01-22 10:44:16
         compiled from "templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2646650ed8c3438ffe1-34399703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90be83b235fb03cc225b11607032e9ddd415899' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1358163519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2646650ed8c3438ffe1-34399703',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50ed8c343e9b09_26182879',
  'variables' => 
  array (
    'errors' => 0,
    'error' => 0,
    'SCRIPT_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ed8c343e9b09_26182879')) {function content_50ed8c343e9b09_26182879($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>CityPark Beheer </title>
	</head>
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
	<body>
		
		<div id="container">
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
			<div id="loginForm">
				<h1>Inloggen</h1>
				
				<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
" method="post" name="loginForm">
					<p>Username: <input type="text" name="username" value="" /></p>
					<p>Password: <input type="password" name="password" value="" /></p>
					<input type="submit" name="login" value="Log in" />
					<input type="hidden" name="loginForm" value="1" />
				</form>
			</div>
		</div>
		
	</body>
</html><?php }} ?>