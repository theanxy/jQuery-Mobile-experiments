<?php
	if ( autoryzacja() ) { 
		$strona['title'] = "Plan zajęć";
		$layout = 'student/plan';
		
		$strona['plan'] = pobierz_elementy($sql, 'SELECT poczatek, koniec, przedmiot, sala FROM plan_zajec');
	}
?>