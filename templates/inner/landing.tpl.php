<h1>USOS</h1>
{if isset($test)}
Test: {$test}
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

{*
<ul>
	<li><a href="/?wyswietl=plan">Plan zajęć</a></li>
</ul>
*}