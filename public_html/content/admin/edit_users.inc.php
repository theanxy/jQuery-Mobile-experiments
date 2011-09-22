<?php
	if ( autoryzacja() ) { 
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
	}
?>