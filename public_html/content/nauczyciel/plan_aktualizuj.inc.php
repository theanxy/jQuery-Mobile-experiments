<?php
	if ( autoryzacja() && $_SESSION['uzytkownik']['typ'] == 'nauczyciel') { 
		$strona['title'] = "Plan zajęć";
		$layout = 'nauczyciel/plan_aktualizuj';
		
		$strona['plan'] = pobierz_elementy($sql, 'SELECT id, poczatek, koniec, przedmiot, sala FROM plan_zajec');
		
		if(isset($_GET['usun']) && is_numeric($_GET['usun'])) {
			
			$zajecia_usuniete = usun_zajecia($sql, $_GET['usun']);
			
			if ($zajecia_usuniete) {
				$strona['komunikat'] = 'Sukces! Usunięto zajęcia.';
				$layout = 'empty';
			} else {
				$strona['komunikat'] = 'Coś nie tak.';
				$layout = 'empty';
			}
		}
		
		if(isset($_POST['dodaj-submit'])) {
			$wzorzec = array('start', 'koniec', 'przedmiot', 'sala');
			$strona['nowe_zajecia'] = pobierz_dane_z_formularza($_POST, $wzorzec);

			$strona['komunikat'] = array();

			sprawdz_dodawanie_zajec($strona['komunikat'], $strona['nowe_zajecia'], $wzorzec);

			if (!count($strona['komunikat'])) {

				unset($strona['komunikat']);

				$nowe_zajecia = dodaj_zajecia($sql, $strona['nowe_zajecia']);
				
				if($nowe_zajecia) {
					$strona['komunikat'] = 'Sukces! Dodano zajęcia do planu.';
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