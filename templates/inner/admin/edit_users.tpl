<div data-role="collapsible-set" class="users-page">
	<div data-role="collapsible">
		<h3>Obecni użytkownicy</h3>
		
		{if isset($uzytkownicy)}
		<ol>
		{foreach from=$uzytkownicy item=uzytkownik}
			<li{if $uzytkownik.typ == 'nauczyciel'} class="nauczyciel"{/if}>
				{$uzytkownik.imie}
				{$uzytkownik.nazwisko}
				({$uzytkownik.login}) {if $uzytkownik.typ == 'nauczyciel'}*{/if}
			</li>
		{/foreach}
		</ol>
		<p>* – nauczyciel
		{else}
		<p>Wystąpił błąd.</p>
		{/if}		
	</div>
	<div data-role="collapsible">
		<h3>Usuń użytkownika</h3>

		{if isset($uzytkownicy)}
		<form action="{$smarty.server.REQUEST_URI}" method="get">
			<fieldset>
				<input type="hidden" name="wyswietl" value="edit_users">
				
				<ol>
				{foreach from=$uzytkownicy item=uzytkownik}
					<li><label for="usun_{$uzytkownik.id}">{$uzytkownik.login}</label> <input type="radio" name="usun" id="usun_{$uzytkownik.id}" value="{$uzytkownik.id}"></li>
				{/foreach}
				</ol>
				<input type="submit" value="Usuń zaznaczonych" data-theme="b">
			</fieldset>
		</form>
		{else}
		<p>Wystąpił błąd.</p>
		{/if}
	</div>

	<div data-role="collapsible"{if $smarty.post.login} data-collapsed="false"{/if}>
		<h3>Dodaj użytkownika</h3>
		<form action="{$smarty.server.REQUEST_URI}" method="post">
			<fieldset>
				<input type="text" name="imie" id="imie"{if isset($dane.imie)} value="{$dane.imie}"{/if} placeholder="Imię">
				{if isset($komunikat.imie)}
		            <div>
		                {$komunikat.imie}
		            </div>      
				{/if}
				<input type="text" name="nazwisko" id="nazwisko"{if isset($dane.nazwisko)} value="{$dane.nazwisko}"{/if} placeholder="Nazwisko">
				{if isset($komunikat.nazwisko)}
		            <div>
		                {$komunikat.nazwisko}
		            </div>      
				{/if}
				<select name="typ" id="typ">
					<option value="student">Student</option>
					<option value="nauczyciel"{if $dane.typ == 'nauczyciel'}selected{/if}>Nauczyciel</option>
				</select>
				<input type="text" name="login" id="login"{if isset($dane.login)} value="{$dane.login}"{/if} placeholder="Login">
				{if isset($komunikat.login)}
		            <div>
		                {$komunikat.login}
		            </div>      
				{/if}
				<input type="password" name="haslo" id="haslo" placeholder="Hasło">
				{if isset($komunikat.haslo)}
		            <div>
		                {$komunikat.haslo}
		            </div>      
				{/if}
				<input type="submit" value="Dodaj">
			</fieldset>
		</form>
	</div>
</div>