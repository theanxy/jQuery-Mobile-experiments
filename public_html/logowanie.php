<?php
    /**
     * Skrypt odpowiedzialny zalogowanie użytkownika.
     *
     * @package logowanie.php
     * @author Tomasz Chojna
     * @link http://www.epi.chojna.info.pl
     * @since 1.0.1 1.03.2011
     * @version 1.0.1 1.03.2011
     */
    
    session_start();
    session_regenerate_id();

    include '../lib/cms.h.php';

    $layout = 'logowanie';
	$strona = array();

    if ( isset($_POST) && count($_POST)  ) {
        
        $wzorzec = array('login', 'haslo');
        $strona['dane'] = pobierz_dane_z_formularza($_POST, $wzorzec);
        
        $strona['status']['komunikaty']['bledy_formularza'] = array();

        sprawdz_formularz_logowania($strona['status']['komunikaty']['bledy_formularza'], $strona['dane'], $wzorzec);

        if (!count($strona['status']['komunikaty']['bledy_formularza'])) {
            
            unset($strona['status']['komunikaty']['bledy_formularza']);

            $dane_uzytkownika = zaloguj_uzytkownika($sql, $strona['dane']);
            
            if(count($dane_uzytkownika)) {

                // autoryzacja powiodła się, a zatem rejestrujemy dane w sesji:
                $_SESSION['uzytkownik'] = $dane_uzytkownika;
                
                // i przekierowujemy użytkownika na przykładową treść dostępną wyłącznie dla zalogowanych użytkowników:
                header('Location:index.php');
                exit;
                
            }
            else {
                $strona['status']['komunikaty']['bledy'][] = 'Nieprawidłowe dane autoryzacyjne.';
                $strona['zawartosc'] = 'blad';              
            }
            
        }

    }

    wyswietl_strone($strona, $layout);
?>