{if isset($strona.status.komunikaty.bledy_formularza)}
<div>
Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
</div>
{/if}

<form method="post" action="{$smarty.server.PHP_SELF}">
    <fieldset>
        <legend>Logowanie</legend>
        <div>
            <label for="login">Identyfikator użytkownika:</label>
            <input type="text" id="login" name="login" size="16" maxlength="16" value="{if isset($strona.dane.login)}{$strona.dane.login}{/if}" />
        </div>
		{if isset($strona.status.komunikaty.bledy_formularza.login)}
            <div>
                {$strona.status.komunikaty.bledy_formularza.login}
            </div>      
		{/if}
        <div>
            <label for="haslo">Hasło:</label>
            <input type="password" id="haslo" name="haslo" size="16" maxlength="16"  />
        </div>
		{if isset($strona.status.komunikaty.bledy_formularza.haslo)}
            <div>
                {$strona.status.komunikaty.bledy_formularza.haslo}
            </div>      
		{/if}
        <div>
            <input type="submit" id="przycisk" name="przycisk" value="Zaloguj się" />
        </div>
    </fieldset>
</form>