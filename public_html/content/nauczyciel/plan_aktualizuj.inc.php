<?php
	if ( autoryzacja() ) { 
		$strona['title'] = "Plan zajęć";
		$layout = 'nauczyciel/plan_aktualizuj';
		
		$strona['plan'] = pobierz_elementy($sql, 'SELECT id, poczatek, koniec, przedmiot, sala FROM plan_zajec');
		
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
	}
?>