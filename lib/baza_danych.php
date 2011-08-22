<?php
/**
 * Obsługa bazy danych.
 *
 * @package baza_danych.inc.php
 * @author Tomasz Chojna
 * @link http://www.epi.chojna.info.pl
 * @since 1.0.1 1.03.2011
 * @version 1.0.1 1.03.2011
 */

/**
 * Utworzenie połączenia i wybór bazy danych.
 * 
 * @param array $sql Tablica parametrów dla połączenia z bazą danych
 * @return mixed Wynik tworzenia połączenia.
 */
function sql_polacz(&$sql) {

    if (!($sql['uchwyt'] = @mysql_connect($sql['host'], $sql['uzytkownik'], $sql['haslo']))) {
        return false;
    }
    elseif ( !@mysql_select_db($sql['baza']) ) {
        return false;
    }
    else {
        mysql_query('SET NAMES latin2');
        return $sql['uchwyt'];
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
 * @param array $sql Konfiguracja połączenia z bazą danych
 * @param array $zapytanie Tablica warunków 
 * @return mixed Fałsz lub tablica asocjacyjna danych pobranych z bazy
 */
function pobierz_elementy(&$sql, $zapytanie) {
        
    if( !sql_polacz($sql) ) {
        return false;
    }   
    else {
        
        if( !sql_zapytanie($zapytanie) ) {
            return false;
        }
        else {
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

}


/**
 * Sprawdza wynik w bazie danych.
 *
 * @param string $zapytanie
 * @return array Content.
 */
function sprawdz_wyniki(&$sql, $zapytanie) {
	
	if( !sql_polacz($sql) ) {
		return false;
	}   
	else {

		$dane = sql_przygotuj_dane($dane);

		$zapytanie = "SELECT * FROM `ksiazka_telefoniczna` WHERE `imie` LIKE '%jan%' OR `nazwisko` LIKE '%kow%'";

		if( !sql_zapytanie($zapytanie) ) {
			return false;
		}
		else {
			return true;
		}

	}
	
	
/*	
	global $sql;
	
	$result_txt = '';
	//$zapytanie = mysql_real_escape_string($zapytanie);

	mysql_connect($sql['host'], $sql['user'], $sql['pass']) or
	    die('Nie można się połączyć: ' . mysql_error());
	mysql_select_db($sql['db']);

	$result = mysql_query("SELECT * FROM `ksiazka_telefoniczna` WHERE `imie` LIKE '%" . $zapytanie . "%' OR `nazwisko` LIKE '%" . $zapytanie . "%'");

	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	    //printf ("Imię: %s, Nazwa: %s Tel: %s<br>", $row[1], $row[2], $row[3]);
		$result_txt .= "Imię: $row[1], Nazwa: $row[2] Tel: $row[3]<br>\n";
	}
	mysql_free_result($result);

	return $result_txt;
	*/
}

?>
