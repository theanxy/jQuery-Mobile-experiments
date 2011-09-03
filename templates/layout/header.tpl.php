<!DOCTYPE html>
<html>
<meta charset=utf-8>
<title>USOS{$title}</title>

<body>
{if isset($smarty.session.uzytkownik)}
Zalogowano: {$smarty.session.uzytkownik.login}
(<a href="wyloguj.php">Wyloguj</a>)<br>
{else}
Niezalogowany! <a href="logowanie.php">Zaloguj</a> 
{/if}
<a href="/">Główna</a>

{if isset($komunikat)}
<div class="komunikat">{$komunikat}</div>
{/if}