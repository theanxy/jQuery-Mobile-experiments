<?php
/*
  Punkt wejściowy aplikacji. Definiuje o zawieranej podstronie.
*/

include '../lib/cms.h.php';


$wyniki = pobierz_elementy($sql, 'SELECT * FROM ksiazka_telefoniczna');

$smarty->assign("Wyniki", $wyniki);

$strona['zawartosc'] = 'index';


//$smarty->assign("Wyniki", $wyniki_zapytania);
	
wyswietl_strone($strona);

?>