{if isset($komunikat)}
<div>
Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
</div>
{/if}
<aside>
	<ul class="users">
		<li>Student: Jan0Kowalski / Jan0Kowalski1</li>
		<li>Nauczyciel: Artur0Nowak / Artur0Nowak1</li>
	</ul>
</aside>
<form method="post" action="{$smarty.server.REQUEST_URI}">
	<div data-role="fieldcontain">
	    <fieldset data-role="controlgroup" data-type="horizontal">
			<input type="radio" name="typ" value="student" id="student" checked="checked">
			<label for="student">Student</label>
			
			<input type="radio" name="typ" value="nauczyciel" id="nauczyciel">
			<label for="nauczyciel">Nauczyciel</label>
	    </fieldset>
	</div>
    <fieldset>
        <div data-role="fieldcontain">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" size="16" maxlength="16" value="{if isset($dane.login)}{$dane.login}{/if}Jan0Kowalski" />
        </div>
		{if isset($komunikat.login)}
            <div>
                {$komunikat.login}
            </div>      
		{/if}
        <div data-role="fieldcontain">
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