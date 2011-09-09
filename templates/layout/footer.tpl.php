{if !empty($smarty.session.uzytkownik)}
	<a href="wyloguj.php" data-role="button">Wyloguj</a>
{/if}
</div><!-- /content -->

<div data-role="footer">
	{if !empty($smarty.session.uzytkownik)}
		<h4>{$smarty.session.uzytkownik.imie} {$smarty.session.uzytkownik.nazwisko} ({$smarty.session.uzytkownik.typ}) </h4>
	{else}
		<h4>Niezalogowany!</h4>
	{/if}
</div><!-- /footer -->
</div>
</html>