<h2>Dodaj nowy wpis</h2>

<form action="{$smarty.server.REQUEST_URI}" method="post">
	<fieldset>
		<div>
			<textarea name="content">Testowy wpis</textarea>
		</div>
		<small><strong>Autor</strong>: {$smarty.session.uzytkownik.imie} {$smarty.session.uzytkownik.nazwisko}</small>
		<input type="submit" value="Wyślij">
	</fieldset>
</form>