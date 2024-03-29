<?php
    /**
     * Autoryzacja użytkownika w systemie.
     *
     * @package autoryzacja.php
     * @author Wojtek Zając
     * @version 1.2 23.09.2011
     */

    /**
     * Próba zalogowania użytkownika w systemie.
     *
     * @param array $sql Konfiguracja połączenia z bazą danych  
     * @param array $dane Tablica z danymi pochodzącymi z formularza logowania
     * @return array Wynik autoryzacji
     */
    function zaloguj_uzytkownika(&$sql, $dane) {

        $wynik = pobierz_elementy($sql, 'SELECT * FROM uzytkownicy WHERE login = \''.$dane['login'].'\' AND haslo = md5(\''.$dane['haslo'].'\') AND typ = \''.$dane['typ'].'\'');
        
        if(count($wynik)!=1) {
            return array();
        }
        else {
            return $wynik[0];
        }

    }

    /**
     * Sprawdzenie czy użytkownik jest zalogowany.
     * 
     * @return mixed Wynik operacji
     */
     function autoryzacja($noredirect = false) {
        
        if ( isset($_SESSION['uzytkownik'])  && count($_SESSION['uzytkownik']) ) {	
            return true; 
        }
        else {
            // przekierowujemy użytkownika na stronę logowania:
            if (!isset($noredirect) || $noredirect != true) {
				header('Location: ./?wyswietl=logowanie&blad=zaloguj');
	            exit;
			};
        }
        
     }

?>