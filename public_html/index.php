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
		$strona['title'] = "Strona główna";
		$layout = 'landing';
		
		if( isset($_SESSION['uzytkownik'])  && count($_SESSION['uzytkownik']) ) {
			if($_SESSION['uzytkownik']['typ'] != "student" && $_SESSION['uzytkownik']['typ'] != "nauczyciel"){
				$_SESSION['uzytkownik']['typ'] = "student";
			}

			$strona['menu'] = pobierz_elementy($sql, 'SELECT nazwa, adres FROM menu_'.$_SESSION['uzytkownik']['typ']);
		}
		break;
	default:
		$layout = 'empty';
		$strona['title'] = 'Błąd 404';
		$strona['komunikat'] = "Nie ma takiej strony!";
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