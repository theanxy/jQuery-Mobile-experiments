<?php
	if ( isset($_SESSION['uzytkownik']) ) {
		$strona['komunikat'] = "Użytkownik już zalogowany. Najpierw się wyloguj.";

		$layout = "empty";

		wyswietl_strone($strona, $layout);
	} else {
		$layout = 'logowanie';
		$strona['title'] = "Logowanie";
		
		if ( isset($_POST) && count($_POST)  ) {

			$wzorzec = array('login', 'haslo', 'typ');
			$strona['dane'] = pobierz_dane_z_formularza($_POST, $wzorzec);

			$strona['komunikat'] = array();

			sprawdz_formularz_logowania($strona['komunikat'], $strona['dane'], $wzorzec);

			if (!count($strona['komunikat'])) {

				unset($strona['komunikat']);

				$dane_uzytkownika = zaloguj_uzytkownika($sql, $strona['dane']);

				if(count($dane_uzytkownika)) {

					// autoryzacja powiodła się, a zatem rejestrujemy dane w sesji:
					$_SESSION['uzytkownik'] = $dane_uzytkownika;

					// i przekierowujemy użytkownika na przykładową treść dostępną wyłącznie dla zalogowanych użytkowników:
					header('Location: ./');
					exit;

				}
				else {
					$strona['komunikat'] = 'Nieprawidłowe dane autoryzacyjne.';
					$layout = 'empty';
				}
			}
		}
	}
?>