<?php
/*
  Punkt wejściowy aplikacji. Definiuje o zawieranej podstronie.
*/

include '../lib/cms.h.php';

$strona['zawartosc'] = 'index';

if( isset($_GET['s']) && !empty($_GET['s']) ) {

	$zapytanie = addslashes($_GET['s']);
	$wyniki_zapytania = sprawdz_wyniki($sql, $zapytanie);

	$smarty->assign("Wyniki", $wyniki_zapytania);
	
}
wyswietl_strone($strona);

?>