</div><!-- /content -->

<div data-role="footer">
	{if !empty($smarty.session.uzytkownik)}
		<h4>{$smarty.session.uzytkownik.typ|capitalize}</h4>
	{else}
		<h4>Niezalogowany!</h4>
	{/if}
</div><!-- /footer -->
</div>
</html>