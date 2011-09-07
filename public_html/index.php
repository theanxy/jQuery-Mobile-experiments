<?php
/*
  Punkt wejściowy aplikacji. Definiuje o zawieranej podstronie.
*/

session_start();
session_regenerate_id();

include '../lib/cms.h.php';

$strona = array();

if (!isset($_GET['wyswietl'])) {
	$_GET['wyswietl'] = '';
};

switch ($_GET['wyswietl']) {
    case 'plan':
		include('content/plan.inc.php');
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
	case '':
	default:
		$strona['title'] = "Strona główna";
		$layout = 'landing';
		$strona['menu'] = pobierz_elementy($sql, 'SELECT nazwa, adres FROM menu_student');
}

wyswietl_strone($strona, $layout);

// if ( autoryzacja() ) { 
// 	$strona['wyniki'] = pobierz_elementy($sql, 'SELECT * FROM ksiazka_telefoniczna');
// 	
// 	wyswietl_strone($strona);
// } else {
// 	wyswietl_strone($strona);
// };

?>