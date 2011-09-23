<?php
	/**
	 * Obsługa bazy danych.
	 *
	 * @package baza_danych.php
	 * @author Wojtek Zając
	 * @version 1.2 23.09.2011
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
	* @return mixed Wynik zapytania do bazy danych
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
	 * Dodanie nowego użytkownika do bazy danych.
	 *
	 * @param array $sql Konfiguracja połączenia z bazą danych
	 * @param array $dane Tablica danych do zapisania do bazy
	 * @return integer Wynik zapytania do bazy danych
	 */
	function dodaj_uzytkownika(&$sql, $dane) {
    
	    if( !sql_polacz($sql) ) {
	        return false;
	    }   
	    else {

	        $dane = sql_przygotuj_dane($dane);

	        $zapytanie = 'INSERT INTO uzytkownicy (imie, nazwisko, typ, login, haslo) VALUES (\''.
	            $dane['imie'].'\',\''.$dane['nazwisko'].'\',\''.$dane['typ'].'\',\''.$dane['login'].'\',MD5(\''.$dane['haslo'].'\'))';

	        if( !sql_zapytanie($zapytanie) ) {
	            return false;
	        }
	        else {
	            return true;
	        }

	    }
	}

	/**
	 * Dodanie nowych zajęć do bazy.
	 *
	 * @param array $sql Konfiguracja połączenia z bazą danych
	 * @param array $dane Tablica danych do zapisania do bazy
	 * @rerurn integer Wynik zapytania do bazy danych
	 */
	function dodaj_zajecia(&$sql, $dane) {
    
	    if( !sql_polacz($sql) ) {
	        return false;
	    }   
	    else {

	        $dane = sql_przygotuj_dane($dane);

	        $zapytanie = 'INSERT INTO plan_zajec (poczatek, koniec, przedmiot, sala) VALUES (\''.
	            $dane['start'].'\',\''.$dane['koniec'].'\',\''.$dane['przedmiot'].'\',\''.$dane['sala'].'\')';

	        if( !sql_zapytanie($zapytanie) ) {
	            return false;
	        }
	        else {
	            return true;
	        }

	    }
	}

	/**
	 * Usuwanie użytkownika.
	 *
	 * @param array $sql Konfiguracja połączenia z bazą danych
	 * @param array $id Identyfikator użytkownika
	 * @rerurn integer Wynik zapytania do bazy danych
	 */
	function usun_uzytkownika(&$sql, $id) {
    
	    if( !sql_polacz($sql) ) {
	        return false;
	    }   
	    else {

			$id = intval($id);
		
	        $zapytanie = 'DELETE FROM uzytkownicy WHERE id = '.$id;

	        if( !sql_zapytanie($zapytanie) ) {
	            return false;
	        }
	        else {
	            return true;
	        }

	    }
	}

	/**
	 * Usuwanie zajęć.
	 *
	 * @param array $sql Konfiguracja połączenia z bazą danych
	 * @param array $id Identyfikator zajęć
	 * @rerurn integer Wynik zapytania do bazy danych
	 */
	function usun_zajecia(&$sql, $id) {
    
	    if( !sql_polacz($sql) ) {
	        return false;
	    }   
	    else {

			$id = intval($id);
		
	        $zapytanie = 'DELETE FROM plan_zajec WHERE id = '.$id;

	        if( !sql_zapytanie($zapytanie) ) {
	            return false;
	        }
	        else {
	            return true;
	        }

	    }
	}

	/**
	 * Dodanie nowego wpisu do komunikatów
	 *
	 * @param array $sql Konfiguracja połączenia z bazą danych
	 * @param array $dane Tablica danych do zapisania do bazy
	 * @rerurn integer Wynik zapytania do bazy danych
	 */
	function dodaj_wpis(&$sql, $dane) {
    
	    if( !sql_polacz($sql) ) {
	        return false;
	    }   
	    else {

	        $dane = sql_przygotuj_dane($dane);

	        $zapytanie = 'INSERT INTO news (content, author, date_added) VALUES (\''.$dane['content'].'\',\''.$_SESSION['uzytkownik']['imie'].' '.$_SESSION['uzytkownik']['nazwisko'].'\',\''.date("Y-m-d H:i:s").'\')';
		
	        if( !sql_zapytanie($zapytanie) ) {
	            return false;
	        }
	        else {
	            return true;
	        }

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