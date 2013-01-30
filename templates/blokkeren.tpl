{extends file="index_beheer.tpl"}

{block name="title" append}- Pas blokkeren{/block}

{block name="contentRight"}

<h2>Pas blokkeren</h2>

<p>Op deze pagina kunt u een pasnummer blokkeren, vul onderstaand formulier in.</p>

{if !empty($errors)}
	<div class="errors">
		<ul>
		{foreach from=$errors item=error}
			  <li>{$error}</li>
		{/foreach}
		</ul>
	</div>
{/if}
{if isset($block) }
	<p class="updateGelukt">Gebruiker is geblokkeerd</p>
{/if}
{if isset($unblock) }
	<p class="updateGelukt">Gebruiker is gedeblokkeerd</p>
{/if}

<form action="{$SCRIPT_NAME}?page=blokkeren" method="POST" name="findAccount">
	<label for="klantVoornaam">Voornaam klant</label>
	<input type="text" id="klantVoornaam" name="klantVoornaam" />
	<br />
	<label for="klantAchternaam">Achternaam klant</label>
	<input type="text" id="klantAchternaam" name="klantAchternaam" />
	<br />
	<input type="submit" name="submit" value="Zoek op" />
	<input type="hidden" name="search" value="1" />
</form>

{if isset($showCards) || isset($blocked)}
<hr>

<p>Kaarten voor gebruiker <b>{$voornaam} {$achternaam}</b>: </p>

<form action="{$SCRIPT_NAME}?page=blokkeren" method="POST" name="blockForm">
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
			{section name=nr loop=$results}
			<tr>
				<td valign="middle">{$results[nr].KLANT_NR}</td>
				<td valign="middle">{$results[nr].PAS_ID}</td>
				<td valign="middle">{$results[nr].WAARDE}</td>
				<td valign="middle">{$results[nr].RFID}</td>
				<td valign="middle">{$results[nr].TYPE}</td>
				<td valign="middle">{$results[nr].INRIJDTIJD}</td>
				<td valign="middle">
					<input type="checkbox" name="blockCbx" {if $results[nr].STATUS == 0} checked="checked"{/if} />
				</td>
			</tr>
			{/section}
		<tr>
			<td colspan="7" valign="middle" align="right">
				<input type="submit" name="block" value="(de)blokkeren" />
				<input type="hidden" name="blocked" value="1" />
				<input type="hidden" name="klantnr" value="{$klantnr}" />
			</td>
		</tr>
	</table>

</form>

{/if}
{/block}