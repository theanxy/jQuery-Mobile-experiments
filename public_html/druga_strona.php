<?php
/*
  Punkt wejściowy aplikacji. Definiuje o zawieranej podstronie.
*/

session_start();
session_regenerate_id();

include '../lib/cms.h.php';

$strona = array();

$strona['title'] = "Druga strona";

if ( autoryzacja() ) { 
	$strona['test'] = "assdsfsdgd";
	wyswietl_strone($strona);
} else {
	$strona['komunikat'] = 'Bląd!';
	wyswietl_strone($strona);
};

?>