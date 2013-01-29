<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 09:35:41
         compiled from "templates\tariefbeheer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1983550f82a44346f01-76672211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd44e278aa0c10926942db3b4b1e17bc7b885896b' => 
    array (
      0 => 'templates\\tariefbeheer.tpl',
      1 => 1359364835,
      2 => 'file',
    ),
    'c131b6f68001cba64f85338acea39c6401c3aaeb' => 
    array (
      0 => '.\\templates\\index_beheer.tpl',
      1 => 1359375476,
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
<?php if ($_valid && !is_callable('content_50f82a44362513_72164384')) {function content_50f82a44362513_72164384($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'C:\\Users\\Pim\\Documents\\GitHub\\Citypark_beheer\\libs\\plugins\\function.html_options.php';
?><?php if (!isset($_SESSION['ingelogd'])){?>
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
					

<h1>Tariefbeheer</h1>

<p>Op deze pagina is het mogelijk om extra tarieven in te voeren. <br />
Hieronder een overzicht van de bestaande tarieven welke gelden op de daarbij horende dagen.</p>

<?php if (isset($_smarty_tpl->tpl_vars['added']->value)){?>
	<p class="updateGelukt">Tarief is toegevoegd</p>
<?php }?>

<table class="bestaandeTarieven" cellspacing="5">
	<tr>
		<th>Dag</th>
		<th>Starttijd</th>
		<th>Eindtijd</th>
		<th>Categorie</th>
		<th>Ingangsdatum</th>
	</tr>
	<?php if ((isset($_smarty_tpl->tpl_vars['results']->value))){?>
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
			<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['DAG'];?>
</td>
			<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['STARTTIJD'];?>
</td>
			<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['EINDTIJD'];?>
</td>
			<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['CAT_NR'];?>
</td>
			<td valign="middle"><?php echo $_smarty_tpl->tpl_vars['results']->value[$_smarty_tpl->getVariable('smarty')->value['section']['nr']['index']]['INGANGSDATUM'];?>
</td>
		</tr>
		<?php endfor; endif; ?>
	<?php }else{ ?>
		<tr>
			<td valign="middle">-</td>
			<td valign="middle">-</td>
			<td valign="middle">-</td>
			<td valign="middle">-</td>
			<td valign="middle">-</td>
		</tr>
	<?php }?>
	
</table>

<h2>Tarief toevoegen</h2>
	<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?page=tariefbeheer" method="POST" name="tariefForm">
		<table class="nieuwTarief" cellspacing="5" >
			<tr>
				<th>Dag</th>
				<th>Starttijd</th>
				<th>Eindtijd</th>
				<th>Categorie</th>
				<th>Ingangsdatum</th>
			</tr>
		<?php if ((isset($_smarty_tpl->tpl_vars['dagen']->value)||isset($_smarty_tpl->tpl_vars['cats']->value))){?>
			<tr>
				<td>
					<select name="dagen" size="<?php echo count($_smarty_tpl->tpl_vars['dagen']->value);?>
">
						<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['dagen']->value,'output'=>$_smarty_tpl->tpl_vars['dagen']->value),$_smarty_tpl);?>

					</select>
				</td>
				<td><input type="text" name="starttijd" /></td>
				<td><input type="text" name="eindtijd" /></td>
				<td>
					<select name="cats" size="<?php echo count($_smarty_tpl->tpl_vars['cats']->value);?>
">
					<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['cats']->value,'output'=>$_smarty_tpl->tpl_vars['cats']->value),$_smarty_tpl);?>

				</td>
				<td><input type="text" name="ingangsdatum" /></td>
			</tr>
		</table>
		<input type="Submit" value="Verzenden" />
		<input type="hidden" name="addFare" value="1" />
		
		<?php }else{ ?>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
		</table>
		<?php }?>
	</form>
	

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html><?php }} ?>