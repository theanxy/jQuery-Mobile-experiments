<?php
	if ( autoryzacja() ) { 
		$strona['plan'] = pobierz_elementy($sql, 'SELECT poczatek, koniec, przedmiot, sala FROM plan_zajec');
		
		if ( !isset($_GET['generuj']) ) {
			
			$strona['title'] = "Plan zajęć";
			$layout = 'student/plan';
			
		} elseif (count($strona['plan']) < 1) {
			
			$strona['komunikat'] = 'Brak zajęć do zapisania w kalendarzu.'
			$layout = "empty";
			
		} else {
			
			$layout = 'no_tpl';
			$kalendarz = generuj_kalendarz($strona['plan']);
			$filename = $_SESSION['uzytkownik']['imie'].'_'.$_SESSION['uzytkownik']['nazwisko'].'-'.date("mdy",time()).'.ics';
			
			header('Content-type: text/calendar; charset=utf-8');
			header('Content-Disposition: inline; filename='.$filename);
			
			echo $kalendarz;
			exit;
			
		}
	}
?>