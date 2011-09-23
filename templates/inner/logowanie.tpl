{* 
	Logowanie użytkowników.
    
    @package logowanie.tpl
    @author Wojciech Zając
    @version 1.2 23.09.2011
*}
{if isset($komunikat)}
<div class="error">
Formularz został wypełniony nieprawidłowo. Proszę poprawić wskazane pola.
</div>
{/if}
{if $smarty.get.blad == zaloguj}
<div class="error">
Musisz być zalogowany, aby dostać się do tej podstrony.
</div>
{/if}

{if $smarty.get.demo == 1}
<aside>
	<strong>Wersja demo (kliknij aby zalogować)</strong>
	<ul class="users">
{if $smarty.get.admin != 1}
		<li data-user="Jan0Kowalski" data-password="Jan0Kowalski1" data-type="student">Student: Jan0Kowalski / Jan0Kowalski1</li>
		<li data-user="Artur0Nowak" data-password="Artur0Nowak1" data-type="nauczyciel">Nauczyciel: Artur0Nowak / Artur0Nowak1</li>
		<li class="link-to-admin"><a href="./?wyswietl=logowanie&amp;demo=1&amp;admin=1">Panel admina</a></li>
{else}
		<li data-user="administrator" data-password="administrator123">Admin: administrator / administrator123</li>
{/if}
	</ul>
</aside>
{/if}
<form method="post" action="{$smarty.server.REQUEST_URI}">
	<div data-role="fieldcontain">
	    <fieldset data-role="controlgroup" data-type="horizontal" class="user-type">
			{if $smarty.get.admin != 1}
			<input type="radio" name="typ" value="student" id="student" checked="checked">
			<label for="student">Student</label>
			
			<input type="radio" name="typ" value="nauczyciel" id="nauczyciel">
			<label for="nauczyciel">Nauczyciel</label>
			{else}
			<input type="radio" name="typ" value="admin" id="admin" checked="checked">
			<label for="admin">Admin</label>
			{/if}
	    </fieldset>
	</div>
    <fieldset>
        <div data-role="fieldcontain">
            <input type="text" id="login" name="login" size="16" maxlength="16" value="{if isset($dane.login)}{$dane.login}{/if}" placeholder="Login" />
        </div>
		{if isset($komunikat.login)}
            <div>
                {$komunikat.login}
            </div>      
		{/if}
        <div data-role="fieldcontain">
            <input type="password" id="haslo" name="haslo" size="16" maxlength="16" placeholder="Hasło" />
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