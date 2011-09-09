<h1>Plan zajęć</h1>

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
{else}
Wystąpił błąd
{/if}