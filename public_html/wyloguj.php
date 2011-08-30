<?php
    /**
     * Skrypt odpowiedzialny zalogowanie użytkownika.
     *
     * @package wyloguj.php
     */
    
    session_start();
    session_regenerate_id();

    include '../lib/cms.h.php';

	$strona = array();
	
	if ( autoryzacja() ) { 

        $layout = 'komunikat';
        $strona['status']['komunikaty']['operacje'][] 
                    = 'Wylogowanie zakończone powodzeniem.';

        if ( isset($_SESSION['uzytkownik']) ) {
            unset($_SESSION['uzytkownik']);
            session_destroy();
        }

    }
    
    wyswietl_strone($strona, $layout);
?>