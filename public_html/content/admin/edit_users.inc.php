<?php
/**
 * Podstrona edycji użytkowników.
 *
 * @package edit_users.inc.php
 * @author Wojtek Zając
 * @version 1.2 23.09.2011
 */

	if ( autoryzacja() && $_SESSION['uzytkownik']['typ'] == 'admin') { 
		$strona['title'] = "Edytuj użytkowników";
		$layout = 'admin/edit_users';
		
		$strona['uzytkownicy'] = pobierz_elementy($sql, 'SELECT * FROM uzytkownicy');
		
		// Usuwanie użytkownika
		
		if (isset($_GET['usun'])) {
			if ($_SESSION['uzytkownik']['typ'] == 'admin') {
				
				$uzytkownik_usuniety = usun_uzytkownika($sql, $_GET['usun']);
				
				if ($uzytkownik_usuniety) {
					$strona['komunikat'] = 'Sukces! Usunięto użytkownika.';
					$layout = 'empty';
				} else {
					$strona['komunikat'] = 'Coś nie działa.';
					$layout = 'empty';
				}
			}
		}
		
		// Dodawanie użytkownika
		if($_POST) {
			$wzorzec = array('imie', 'nazwisko', 'typ', 'login', 'haslo');
			$strona['dane'] = pobierz_dane_z_formularza($_POST, $wzorzec);
			
			$strona['komunikat'] = array();

			sprawdz_edycje_uzytkownikow($strona['komunikat'], $strona['dane'], $wzorzec);

			if (!count($strona['komunikat'])) {

				unset($strona['komunikat']);

				$dane_uzytkownika = dodaj_uzytkownika($sql, $strona['dane']);

				if($dane_uzytkownika) {
					$strona['komunikat'] = 'Sukces! Dodano użytkownika.';
					$layout = 'empty';
				}
				else {
					$strona['komunikat'] = 'Coś nie działa.';
					$layout = 'empty';
				}
			}
		}
	} else {
		$layout = "empty";
		$strona['komunikat'] = 'Nie masz dostępu do tej strony.<br>Nie próbuj nawet się włamać.';
	}
?>