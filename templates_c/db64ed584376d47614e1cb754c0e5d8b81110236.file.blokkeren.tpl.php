<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 14:21:44
         compiled from "templates\blokkeren.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2104850f816935fd399-64312574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db64ed584376d47614e1cb754c0e5d8b81110236' => 
    array (
      0 => 'templates\\blokkeren.tpl',
      1 => 1359463577,
      2 => 'file',
    ),
    'c131b6f68001cba64f85338acea39c6401c3aaeb' => 
    array (
      0 => '.\\templates\\index_beheer.tpl',
      1 => 1359465654,
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
<?php }else{ ?>
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
						<a href="?page=rapportages">Rapportages</a>
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
<?php if (isset($_smarty_tpl->tpl_vars['block']->value)){?>
	<p class="updateGelukt">Gebruiker is geblokkeerd</p>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['unblock']->value)){?>
	<p class="updateGelukt">Gebruiker is gedeblokkeerd</p>
<?php }?>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?page=blokkeren" method="POST" name="findAccount">
	<label for="klantVoornaam">Voornaam klant</label>
	<input type="text" id="klantVoornaam" name="klantVoornaam" />
	<br />
	<label for="klantAchternaam">Achternaam klant</label>
	<input type="text" id="klantAchternaam" name="klantAchternaam" />
	<br />
	<input type="submit" name="submit" value="Zoek op" />
	<input type="hidden" name="search" value="1" />
</form>

<?php if (isset($_smarty_tpl->tpl_vars['showCards']->value)||isset($_smarty_tpl->tpl_vars['blocked']->value)){?>
<hr>

<p>Kaarten voor gebruiker <b><?php echo $_smarty_tpl->tpl_vars['voornaam']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['achternaam']->value;?>
</b>: </p>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?page=blokkeren" method="POST" name="blockForm">
	<table class="passen" cellspacing="5">
		<tr>
			<th>Klant NR</th>
			<th>Pas ID</th>
			<th>Waarde</th>
			<th>RFID</th>
			<th>Type</th>
			<th>Inrijdtijd</th>
			<th>Geblokkeerd</th>
		</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nr'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['name'] = 'nr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['results']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['nr']['total']);
?>
			<tr>
				<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['KLANT_NR'];?>
</td>
				<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['PAS_ID'];?>
</td>
				<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['WAARDE'];?>
</td>
				<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['RFID'];?>
</td>
				<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['TYPE'];?>
</td>
				<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['INRIJDTIJD'];?>
</td>
				<td valign="middle">
					<input type="checkbox" name="blockCbx" <?php if ($_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['STATUS']==0){?> checked="checked"<?php }?> />
				</td>
			</tr>
			<?php endfor; endif; ?>
		<tr>
			<td colspan="7" valign="middle" align="right">
				<input type="submit" name="block" value="(de)blokkeren" />
				<input type="hidden" name="blocked" value="1" />
				<input type="hidden" name="klantnr" value="<?php echo $_smarty_tpl->tpl_vars['klantnr']->value;?>
" />
			</td>
		</tr>
	</table>

</form>

<?php }?>

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html>
<?php }?><?php }} ?>