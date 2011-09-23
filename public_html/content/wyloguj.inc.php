<?php
/**
 * Podstrona do wylogowania użytkownika.
 *
 * @package wyloguj.inc.php
 * @author Wojtek Zając
 * @version 1.2 23.09.2011
 */
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