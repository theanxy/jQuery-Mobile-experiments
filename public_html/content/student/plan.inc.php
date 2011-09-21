<?php
	if ( autoryzacja() ) { 
		$strona['plan'] = pobierz_elementy($sql, 'SELECT poczatek, koniec, przedmiot, sala FROM plan_zajec');
		
		if ( !isset($_GET['generuj']) ) {
			$strona['title'] = "Plan zajęć";
			$layout = 'student/plan';
		} else {
			$layout = 'no_tpl';
			
			echo 'ics';
		}
	}
?>