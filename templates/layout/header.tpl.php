<!DOCTYPE html>
<html>
<meta charset=utf-8>
<title>USOS{$title}</title>

<body>
{if !empty($smarty.session.uzytkownik)}
Zalogowano: {$smarty.session.uzytkownik.imie} {$smarty.session.uzytkownik.nazwisko} ({$smarty.session.uzytkownik.typ})
(<a href="wyloguj.php">Wyloguj</a>)<br>
{else}
Niezalogowany! <a href="logowanie.php">Zaloguj</a> 
{/if}
<a href="/">Główna</a>

{*
{if isset($komunikat)}
{foreach $komunikat as $wiadomosc}
{strip}
<div class="komunikat">{$wiadomosc}</div>
{/strip}
{/foreach}
{/if}
*}