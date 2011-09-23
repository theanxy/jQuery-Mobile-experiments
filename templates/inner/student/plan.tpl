{* 
    Plan zajęć.
    
    @package plan.tpl
    @author Wojciech Zając
    @version 1.2 23.09.2011
*}
{if isset($plan)}
<table style="border: 1px solid #000;">
	<thead>
		<th>Godzina</th>
		<th>Przedmiot</th>
		<th>Sala</th>
	</thead>
	<tbody>
{foreach name=outer from=$plan item=plan_poz}
		<tr>
			<td>{$plan_poz.poczatek} - {$plan_poz.koniec}</td>
			<td>{$plan_poz.przedmiot}</td>
			<td>{$plan_poz.sala}</td>
		</tr>
{/foreach}
	</tbody>
</table>

<a href="./?wyswietl=plan&amp;generuj=ics" data-role="button">Pobierz kalendarz</a>
{else}
Wystąpił błąd
{/if}