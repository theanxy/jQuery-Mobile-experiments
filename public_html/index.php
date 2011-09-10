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
	case 'aktualizuj':
		include('content/plan_aktualizuj.inc.php');
		break;
    case 'mapa':
		$strona['title'] = 'Mapa';
		$layout = 'mapa';
        break;
    case 'komunikaty':
		include('content/komunikaty.inc.php');
        break;
	case '':
		$strona['title'] = "Strona główna";
		$layout = 'landing';
		
		if( isset($_SESSION['uzytkownik'])  && count($_SESSION['uzytkownik']) ) {
			if($_SESSION['uzytkownik']['typ'] == "student") {
				$menu_visibility = 'student';
			} elseif($_SESSION['uzytkownik']['typ'] == "admin") {
				$menu_visibility = 'admin';
			}
		} else {
			$menu_visibility = 'public';			
		}
		
		$strona['menu'] = pobierz_elementy($sql, 'SELECT * FROM menu WHERE visibility_'.$menu_visibility.' = 1 ORDER BY id ASC');
		
		break;
    case 'edit_users':
		include('content/admin/edit_users.inc.php');
        break;
    case 'logowanie':
		include('content/logowanie.inc.php');
        break;
    case 'wyloguj':
		include('content/wyloguj.inc.php');
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