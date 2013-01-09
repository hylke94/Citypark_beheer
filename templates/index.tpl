<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>{block name="title"}CityPark Beheer {/block}</title>
	</head>
	<link rel="stylesheet" href="styles/style.css" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
	<body>
		{block name=body}
		<div id="container">
			<div id="loginForm">
				<h1>Inloggen</h1>
				
				<form action="{$SCRIPT_NAME}" method="post" name="loginForm">
					<p>Username: <input type="text" name="username" value="" /></p>
					<p>Password: <input type="password" name="password" value="" /></p>
					<input type="submit" name="login" value="Log in" />
					<input type="hidden" name="loginForm" value="1" />
				</form>
			</div>
		</div>
		{/block}
	</body>
</html>