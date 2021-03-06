{if !isset($smarty.session.ingelogd) }
<h1>Access denied</h1>
{else}
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <title>{block name="title"}CityPark Beheer {/block}</title>
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
					{block name="contentRight"}
						Welkom op de beheerspagina, {$smarty.session.naam}
					{/block}
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</body>
</html>
{/if}