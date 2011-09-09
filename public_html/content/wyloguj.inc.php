<?php
	if ( autoryzacja() ) { 

	    $layout = 'empty';
	    $strona['komunikat'] 
	                = 'Wylogowanie zakończone powodzeniem.';

	    if ( isset($_SESSION['uzytkownik']) ) {
	        unset($_SESSION['uzytkownik']);
	        session_destroy();
	    }
	}
?>