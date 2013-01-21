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

<form action="{$SCRIPT_NAME}?page=blokkeren" method="POST" name="blockForm">
	<label for="klantNaam">Klantnaam</label>
	<input type="text" id="klantNaam" name="klantNaam" />
	
	<input type="submit" name="submit" value="blokkeren" />
	<input type="hidden" name="blokkeren" value="1" />
</form>

{/block}