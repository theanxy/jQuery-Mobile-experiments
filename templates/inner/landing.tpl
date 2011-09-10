{if isset($komunikat)}
<h2>{$komunikat}</h2>
{/if}

{if !isset($smarty.session.uzytkownik)}
<h2>Witaj w systemie zarządzania studentów!</h2>

<p>To jest prototyp Systemu Obsługi Studenta dostosowanego pod urządzenia mobilne.</p>
{/if}

{if !empty($smarty.session.uzytkownik)}
	<h3>Witaj, {$smarty.session.uzytkownik.imie} {$smarty.session.uzytkownik.nazwisko}!</h3>
{/if}

{if isset($menu)}
<ul data-role="listview">
{foreach from=$menu key=id item=menu_poz}
{strip}
	<li{if $menu_poz.visibility_public == '0' && $menu_poz.visibility_student == '0'} data-theme="e"{/if}><a href="/?wyswietl={$menu_poz.adres}">{$menu_poz.nazwa}</a></li>
{/strip}
{/foreach}
</ul>
{/if}

{if !isset($smarty.session.uzytkownik)}
<a href="?wyswietl=logowanie" data-rel="dialog" data-ajax="true" data-role="button">Zaloguj</a>
{/if}