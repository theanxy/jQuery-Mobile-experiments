{if isset($uzytkownicy)}
<form action="{$smarty.get.REQUEST_URI}" method="post">
	<fieldset>
		<ol>
		{foreach from=$uzytkownicy item=uzytkownik}
			<li>{$uzytkownik.login} <input type="checkbox" value="{$uzytkownik.id}"></li>
		{/foreach}
		</ol>
		
		Zaznaczone: <input type="submit" value="usuń">
	</fieldset>
</form>
{else}
Wystąpił błąd
{/if}

<h3>Dodaj użytkownika</h3>
<form action="{$smarty.get.REQUEST_URI}" method="post">
	<fieldset>
		<input type="text" name="imie" id="imie" placeholder="Imię">
		<input type="text" placeholder="Nazwisko">
		<input type="text" placeholder="Hasło">
		<input type="submit" value="Dodaj">
	</fieldset>
</form>