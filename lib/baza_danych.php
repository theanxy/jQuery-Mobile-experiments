<?php
/**
* Obsługa bazy danych.
*
* @package baza_danych.inc.php
* @author Wojciech Zając
*/

/**
* Utworzenie połączenia i wybór bazy danych.
* 
* @param array $sql Tablica parametrów dla połączenia z bazą danych
* @return mixed Wynik tworzenia połączenia.
*/
function sql_polacz(&$sql) {

	if (!($sql['uchwyt'] = @mysql_connect($sql['host'], $sql['user'], $sql['pass']))) {
		return false;
	}
	elseif ( !@mysql_select_db($sql['db']) ) {
		return false;
	}
	else {
		mysql_query('SET NAMES latin2');
		return $sql['uchwyt'];
	}
}

/**
* Wykonanie zapytania do bazy danych.
*
* @param string $zapytanie Zapytanie do bazy danych
* @return integer Wynik zapytania do bazy danych
*/
function sql_zapytanie($zapytanie) {

	if (!($wynik = @mysql_query($zapytanie))) {
		return false;
	}
	else {
		return $wynik;
	}

}

/**
* Pobranie listy elementów z bazy danych.
* 
* @param string $sql Konfiguracja połączenia z bazą danych
* @param array $zapytanie Tablica warunków 
* @return mixed Fałsz lub tablica asocjacyjna danych pobranych z bazy
*/
function pobierz_elementy(&$sql, $zapytanie) {

	if( !sql_polacz($sql) ) {
		return false;
	}   
	else {

		$wynik = sql_zapytanie($zapytanie);

		$dane = array();
		while ($wiersz=mysql_fetch_assoc($wynik)) {
			foreach ($wiersz as $klucz => $wartosc) {
				$wiersz[$klucz] = $wartosc;
			}
			$dane[]= $wiersz;
		}
		mysql_free_result($wynik);          
		return $dane;

	}

}


/**
* Przygotowanie danych do zapisu do bazy.
*
* @param array $dane Tablica pól jakie mają zostać zapisane do bazy danych
* @return array Tablica danych przygotowanych do zapisu do bazy
*/ 
function sql_przygotuj_dane(&$dane) {

	$dane_do_zapisu = array();

	foreach ($dane as $klucz => $wartosc) {
		$dane_do_zapisu[$klucz] = mysql_real_escape_string($wartosc);
	}

	return $dane_do_zapisu;

}

?>
