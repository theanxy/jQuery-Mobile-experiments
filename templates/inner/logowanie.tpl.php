{if isset($komunikat)}
<div>
Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
</div>
{/if}

<form method="post" action="{$smarty.server.PHP_SELF}">
    <fieldset>
        <legend>Logowanie</legend>
		<div>
			<input type="radio" name="typ" value="student" id="student" checked="checked"> <label for="student">Student</label>
			<input type="radio" name="typ" value="nauczyciel" id="nauczyciel"> <label for="nauczyciel">Nauczyciel</label>
		</div>
        <div>
            <label for="login">Identyfikator użytkownika:</label>
            <input type="text" id="login" name="login" size="16" maxlength="16" value="{if isset($dane.login)}{$dane.login}{/if}Jan0Kowalski" />
        </div>
		{if isset($komunikat.login)}
            <div>
                {$komunikat.login}
            </div>      
		{/if}
        <div>
            <label for="haslo">Hasło:</label>
            <input type="password" id="haslo" name="haslo" size="16" maxlength="16" value="Jan0Kowalski1" />
        </div>
		{if isset($komunikat.haslo)}
            <div>
                {$komunikat.haslo}
            </div>      
		{/if}
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Zaloguj się" />
        </div>
    </fieldset>
</form>