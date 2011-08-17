<?php
/*
  Funkcje wykorzystywane w aplikacji.
*/


/**
 * Wyświetlenie szablonu.
 *
 * @param array $strona Dane do wyświetlenia w szablonie
 * @param string $layout "Layout" strony
 * @global object $smarty Obiekt klasy Smarty
 * @global object $sciezki Scieżki wykorzystywane w aplikacji
 */
function wyswietl_strone($strona, $layout = 'index') {
	global $smarty;
	global $sciezki;
	
	$smarty->assign($strona);
	$smarty->display(
		$sciezki['szablony_katalog'].
		$layout.
		$sciezki['szablony_rozszerzenie']
	);
};


/**
 * Sprawdza wynik w bazie danych.
 *
 * @param string $zapytanie
 * @return array Content.
 */
function sprawdz_wyniki($zapytanie) {
	global $baza;
	
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
