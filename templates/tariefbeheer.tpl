{extends file="index_beheer.tpl"}

{block name="title" append}- Tariefbeheer{/block}

{block name="contentRight"}

<h1>Tariefbeheer</h1>

<p>Op deze pagina is het mogelijk om extra tarieven in te voeren. <br />
Hieronder een overzicht van de bestaande tarieven welke gelden op de daarbij horende dagen.</p>

{if isset($added) }
	<p class="updateGelukt">Tarief is toegevoegd</p>
{/if}

<table class="bestaandeTarieven" cellspacing="5">
	<tr>
		<th>Dag</th>
		<th>Starttijd</th>
		<th>Eindtijd</th>
		<th>Categorie</th>
		<th>Ingangsdatum</th>
	</tr>
	{section name=nr loop=$results}
	<tr>
		<td valign="middle">{$results[nr].DAG}</td>
		<td valign="middle">{$results[nr].STARTTIJD}</td>
		<td valign="middle">{$results[nr].EINDTIJD}</td>
		<td valign="middle">{$results[nr].CAT_NR}</td>
		<td valign="middle">{$results[nr].INGANGSDATUM}</td>
	</tr>
	{/section}
	
</table>

<h2>Tarief toevoegen</h2>

<form action="{$SCRIPT_NAME}?page=tariefbeheer" method="POST" name="tariefForm">
	<table class="nieuwTarief" cellspacing="5" >
		<tr>
			<th>Dag</th>
			<th>Starttijd</th>
			<th>Eindtijd</th>
			<th>Categorie</th>
			<th>Ingangsdatum</th>
		</tr>
		<tr>
			<td>
				<select name="dagen" size="{$dagen|@count}">
					{html_options values=$dagen output=$dagen}
				</select>
			</td>
			<td><input type="text" name="starttijd" /></td>
			<td><input type="text" name="eindtijd" /></td>
			<td>
				<select name="cats" size="{$cats|@count}">
				{html_options values=$cats output=$cats}
			</td>
			<td><input type="text" name="ingangsdatum" /></td>
		</tr>
	</table>
	<input type="Submit" value="Verzenden" />
	<input type="hidden" name="addFare" value="1" />
</form>
{/block}