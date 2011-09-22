<?php

/**
 * Sprawdzenie poprawności identyfikatora użytkownika.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param string $pole Nazwa pola do sprawdzenia
 * @return boolean Wynik sprawdzania pola
 */
function sprawdz_pole_login(&$bledy_formularza, $formularz, $pole) {
    
    if ( strlen($formularz[$pole]) < 8 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Identyfikator użytkownika jest za krótka.');
        return false;
    }
    elseif ( strlen($formularz[$pole]) > 16 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Identyfikator użytkownika jest za długa.');
        return false;
    }       
    elseif ( !preg_match('/^[A-Za-z0-9]+$/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'Pole Identyfikator użytkownika zawiera nieprawidłowe znaki.');
        return false;
    }
    else {
        return true;
    }
    
} 

/**
 * Sprawdzenie poprawności hasła.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param string $pole Nazwa pola do sprawdzenia
 * @return boolean Wynik sprawdzania pola
 */
function sprawdz_pole_haslo(&$bledy_formularza, $formularz, $pole) {
    
    if ( strlen($formularz[$pole]) < 8 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Hasło jest za krótka.');
        return false;
    }
    elseif ( strlen($formularz[$pole]) > 16 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w pole Hasło jest za długa.');
        return false;
    }       
    elseif ( !preg_match('/^[A-Za-z0-9]+$/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'Pole Hasło zawiera nieprawidłowe znaki.');
        return false;
    }
    elseif ( !preg_match('/[0-9]+/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'Pole Hasło musi zawierać co najmniej jedną cyfrę.');
        return false;
    }
    elseif ( !preg_match('/[A-Za-z]+/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'Pole Hasło musi zawierać co najmniej jedną literę.');
        return false;
    }
    else {
        return true;
    }
    
}

/**
 * Sprawdzenie poprawności identyfikatora użytkownika.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param string $pole Nazwa pola do sprawdzenia
 * @return boolean Wynik sprawdzania pola
 */
function sprawdz_pole_imienazwisko(&$bledy_formularza, $formularz, $pole) {
    
    if ( strlen($formularz[$pole]) < 2 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za krótka.');
        return false;
    }
    elseif ( strlen($formularz[$pole]) > 16 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za długa.');
        return false;
    }       
    elseif ( !preg_match('/^[A-Za-z]+$/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'To pole zawiera nieprawidłowe znaki.');
        return false;
    }
    else {
        return true;
    }    
}

/**
 * Sprawdzenie poprawności podanej godziny.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param string $pole Nazwa pola do sprawdzenia
 * @return boolean Wynik sprawdzania pola
 */
function sprawdz_pole_godzina(&$bledy_formularza, $formularz, $pole) {
    
    if ( strlen($formularz[$pole]) < 2 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za krótka.');
        return false;
    }
    elseif ( strlen($formularz[$pole]) > 5 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za długa.');
        return false;
    }
    else {
        return true;
    }
    
}

/**
 * Sprawdzenie poprawności przedmiotu.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param string $pole Nazwa pola do sprawdzenia
 * @return boolean Wynik sprawdzania pola
 */
function sprawdz_pole_przedmiot(&$bledy_formularza, $formularz, $pole) {
    
    if ( strlen($formularz[$pole]) < 2 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za krótka.');
        return false;
    }
    elseif ( strlen($formularz[$pole]) > 16 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za długa.');
        return false;
    }       
    elseif ( !preg_match('/^[A-Za-z]+$/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'To pole zawiera nieprawidłowe znaki.');
        return false;
    }
    else {
        return true;
    }
    
}

/**
 * Sprawdzenie poprawności podanej sali.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param string $pole Nazwa pola do sprawdzenia
 * @return boolean Wynik sprawdzania pola
 */
function sprawdz_pole_sala(&$bledy_formularza, $formularz, $pole) {
    
    if ( strlen($formularz[$pole]) < 3 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za krótka.');
        return false;
    }
    elseif ( strlen($formularz[$pole]) > 16 ) {
        blad_formularza($bledy_formularza, $pole, 'Wprowadzona wartość w tym polu jest za długa.');
        return false;
    }       
    elseif ( !preg_match('/^[A-Za-z0-9]|.+$/', $formularz[$pole]) ) {
        blad_formularza($bledy_formularza, $pole, 'To pole zawiera nieprawidłowe znaki.');
        return false;
    }
    else {
        return true;
    }
    
}

/**
 * Sprawdzenie poprawności formularza logowania.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
 */
function sprawdz_formularz_logowania(&$bledy_formularza, $formularz, $wzorzec) {
    wymagaj_danych($formularz, $wzorzec, $bledy_formularza);
    sprawdz_pole_login($bledy_formularza, $formularz, 'login');
    sprawdz_pole_haslo($bledy_formularza, $formularz, 'haslo');
}

/**
 * Sprawdzenie poprawności formularza edycji użytkowników.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
 */
function sprawdz_edycje_uzytkownikow(&$bledy_formularza, $formularz, $wzorzec) {
    wymagaj_danych($formularz, $wzorzec, $bledy_formularza);
	sprawdz_pole_imienazwisko($bledy_formularza, $formularz, 'imie');
	sprawdz_pole_imienazwisko($bledy_formularza, $formularz, 'nazwisko');
    sprawdz_pole_login($bledy_formularza, $formularz, 'login');
    sprawdz_pole_haslo($bledy_formularza, $formularz, 'haslo');
}

/**
 * Sprawdzenie poprawności formularza logowania.
 * 
 * @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza   
 * @param array $formularz Tablica pól pochodzących z formularza
 * @param array $wzorzec Tablica zawierająca informację o polach w formularzu
 */
function sprawdz_dodawanie_zajec(&$bledy_formularza, $formularz, $wzorzec) {
    wymagaj_danych($formularz, $wzorzec, $bledy_formularza);
	sprawdz_pole_godzina($bledy_formularza, $formularz, 'start');
	sprawdz_pole_godzina($bledy_formularza, $formularz, 'koniec');
    sprawdz_pole_przedmiot($bledy_formularza, $formularz, 'przedmiot');
    sprawdz_pole_sala($bledy_formularza, $formularz, 'sala');
}

?>