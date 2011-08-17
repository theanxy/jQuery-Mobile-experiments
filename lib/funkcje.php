<?php
/*
  Funkcje wykorzystywane w aplikacji.
*/


/*
  Wyświetla podaną stronę
*/
function wyswietl_strone($smarty, $szablony, $szablon = '404') {

	if (empty($szablon)) $szablon = '404';

	$smarty->display(
		$szablony['tpl_start'].
		$szablon.
		$szablony['tpl_end']
	);

};


/*
 Sprawdza wynik w bazie danych.
 @return array Content.
*/
function sprawdz_wyniki($baza, $zapytanie) {
	$result_txt = '';
	//$zapytanie = mysql_real_escape_string($zapytanie);

	mysql_connect($baza['host'], $baza['user'], $baza['pass']) or
	    die('Nie można się połączyć: ' . mysql_error());
	mysql_select_db($baza['db']);

	$result = mysql_query("SELECT * FROM `ksiazka_telefoniczna` WHERE `imie` LIKE '%" . $zapytanie . "%' OR `nazwisko` LIKE '%" . $zapytanie . "%'");

	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	    //printf ("Imię: %s, Nazwa: %s Tel: %s<br>", $row[1], $row[2], $row[3]);
		$result_txt .= "Imię: $row[1], Nazwa: $row[2] Tel: $row[3]<br>\n";
	}
	mysql_free_result($result);

	return $result_txt;
}

?>
