<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title>Citypark</title>

  
  
  <link href="main.css" rel="stylesheet" type="text/css">

</head><body class="mainbody">
<div class="mainbody">
<div class="menu"><img src="images/logo.jpg" border="0" height="150">
<?php if(isset($_SESSION['klantnr'])){
	include 'includes/menu_logged_in.php';
}else{
	include 'includes/menu_anonymous.php';
}?>
</div><?php
if(isset($_GET['page'])){
	$page = $_GET['page'].".php";
}else{
	$page="main.php";
}
print "<div class=\"main\"><iframe name=\"main\" src=\"".$page."\" frameborder=\"0\" height=\"550\" scrolling=\"auto\" width=\"600\"></iframe></div>";
?>
</div>

</body></html>