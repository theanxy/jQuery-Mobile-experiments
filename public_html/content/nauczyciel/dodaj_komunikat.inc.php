<?php
	if ( autoryzacja() ) { 
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
	}
?>