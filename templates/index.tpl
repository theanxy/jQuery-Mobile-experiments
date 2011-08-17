{include file="header.tpl" title="Wyszukiwarka wpisów w książce adresowej"}

{include file="content/search.tpl"}

{if $Wyniki != '' }	

Wyszukałeś: {$smarty.get.s}
<h2>Wyniki:</h2>
{$Wyniki}

{/if}