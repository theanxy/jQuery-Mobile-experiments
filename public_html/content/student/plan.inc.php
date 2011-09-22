<?php
	if ( autoryzacja() ) { 
		$strona['plan'] = pobierz_elementy($sql, 'SELECT poczatek, koniec, przedmiot, sala FROM plan_zajec');
		
		if ( !isset($_GET['generuj']) ) {
			$strona['title'] = "Plan zajęć";
			$layout = 'student/plan';
		} else {
			$layout = 'no_tpl';

$ical['begin'] = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN\n";

$ical['content'] = '';

foreach ($strona['plan'] as $plan_poz) {
$ical['content'] .= "BEGIN:VEVENT
UID:" . md5(uniqid(mt_rand(), true)) . "@uj.edu.pl
DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z
DTSTART:19970714T170000Z
DTEND:19970715T035959Z
SUMMARY:".$plan_poz['przedmiot']."
DESCRIPTION:Sala ".$plan_poz['sala']."
END:VEVENT\n";
}

$ical['end']= "END:VCALENDAR";

$filename = $_SESSION['uzytkownik']['imie'].'_'.$_SESSION['uzytkownik']['nazwisko'].'-'.date("mdy",time()).'.ics';

//set correct content-type-header
// header('Content-type: text/calendar; charset=utf-8');
// header('Content-Disposition: inline; filename='.$filename);
echo 'test';
echo $ical['begin'].$ical['content'].$ical['end'];
exit;
		}
	}
?>