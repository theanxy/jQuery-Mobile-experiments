{* 
    Aktualizacja zajęć.
    
    @package plan_aktualizuj.tpl
    @author Wojciech Zając
    @version 1.2 23.09.2011
*}
<h2>Edytor zajęć</h2>

{if isset($plan)}
<form id="removeClasses" action="{$smarty.server.REQUEST_URI}" method="post">
	<h3>Usuń zajęcia:</h3>
	<div class="confirm">Czy na pewno usunąć zajęcia "<mark id="zajecia"></mark>"?
		<div data-role="controlgroup">
			<a href="{$smarty.server.REQUEST_URI}" data-role="button" id="delete-yes">Tak</a>
			<a href="{$smarty.server.REQUEST_URI}" data-role="button" id="delete-no">Nie</a>
		</div>
	</div>
	
	<table>
		<thead>
			<th>Godzina</th>
			<th>Przedmiot</th>
			<th colspan="2">Sala</th>
		</thead>
		<tbody>
	{foreach name=outer from=$plan item=plan_poz}
			<tr>
				<td>{$plan_poz.poczatek} - {$plan_poz.koniec}</td>
				<td class="przedmiot">{$plan_poz.przedmiot}</td>
				<td>{$plan_poz.sala}</td>
				<td class="delete"><a href="{$smarty.server.REQUEST_URI}&amp;usun=5" data-role="button" data-id="{$plan_poz.id}" data-icon="delete" data-iconpos="notext">Usuń</a></td>
			</tr>
	{/foreach}
		</tbody>
	</table>
</form>
{/if}

<h3>Dodaj zajęcia</h3>
<form id="addClasses" action="{$smarty.server.REQUEST_URI}" method="post">
	<fieldset>
		<aside>Zalecany format godziny: 14:00</aside>
		<input type="text" placeholder="Start"{if isset($nowe_zajecia.start)} value="{$nowe_zajecia.start}"{/if} name="start" id="start">
		{if isset($komunikat.start)}
            <div>
                {$komunikat.start}
            </div>      
		{/if}
		<input type="text" placeholder="Koniec"{if isset($nowe_zajecia.koniec)} value="{$nowe_zajecia.koniec}"{/if} name="koniec" id="koniec">
		{if isset($komunikat.koniec)}
            <div>
                {$komunikat.koniec}
            </div>      
		{/if}
		<input type="text" placeholder="Przedmiot"{if isset($nowe_zajecia.przedmiot)} value="{$nowe_zajecia.przedmiot}"{/if} name="przedmiot" id="przedmiot">
		{if isset($komunikat.przedmiot)}
            <div>
                {$komunikat.przedmiot}
            </div>      
		{/if}
		<input type="text" placeholder="Sala"{if isset($nowe_zajecia.sala)} value="{$nowe_zajecia.sala}"{/if} name="sala" id="sala">
		{if isset($komunikat.sala)}
            <div>
                {$komunikat.sala}
            </div>      
		{/if}
		<input type="submit" name="dodaj-submit" value="Dodaj">
	</fieldset>
</form>