<?php
/**
 * Podstrona dodawania komunikatów.
 *
 * @package dodaj_komunikat.inc.php
 * @author Wojtek Zając
 * @version 1.2 23.09.2011
 */
	if ( autoryzacja() && in_array($_SESSION['uzytkownik']['typ'], array('nauczyciel', 'admin'))) { 
		$strona['title'] = "Dodaj komunikat";
		$layout = 'nauczyciel/dodaj_komunikat';
		
		if($_POST) {
			$wzorzec = array('content');
			$strona['dane'] = pobierz_dane_z_formularza($_POST, $wzorzec);
			
			$wpis_dodany = dodaj_wpis($sql, $strona['dane']);

			if($wpis_dodany) {
				$strona['komunikat'] = 'Sukces! Dodano wpis.';
				$layout = 'empty';
			}
			else {
				$strona['komunikat'] = 'Coś nie działa.';
				$layout = 'empty';
			}
		}
	} else {
		$layout = "empty";
		$strona['komunikat'] = 'Nie masz dostępu do tej strony.<br>Nie próbuj nawet się włamać.';
	}
?>