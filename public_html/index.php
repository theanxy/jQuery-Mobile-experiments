<?php
/*
  Punkt wejściowy aplikacji. Definiuje o zawieranej podstronie.
*/

session_start();
session_regenerate_id();

include '../lib/cms.h.php';

$wyniki = pobierz_elementy($sql, 'SELECT * FROM ksiazka_telefoniczna');
$smarty->assign("Wyniki", $wyniki);

$strona = array();

if ( autoryzacja() ) { 
	echo 'Zalogowany!';
} else {
	echo 'Niezalogowany...';
};

//$smarty->assign("Wyniki", $wyniki_zapytania);
	
wyswietl_strone($strona);

?>