{if isset($komunikat)}
<h2>{$komunikat}</h2>
{/if}


{if isset($menu)}
<ul>
{foreach from=$menu key=id item=menu_poz}
{strip}
	<li><a href="/?wyswietl={$menu_poz.adres}">{$menu_poz.nazwa}</a></li>
{/strip}
{/foreach}
</ul>
{/if}

{if !isset($smarty.session.uzytkownik)}
<h2>Witaj w systemie zarządzania studentów!</h2>

<p>To jest prototyp Systemu Obsługi Studenta dostosowanego pod urządzenia mobilne.</p>

<a href="?wyswietl=logowanie" data-rel="dialog" data-ajax="true" data-role="button">Zaloguj</a>
{/if}