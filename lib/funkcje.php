<?php
/*
Funkcje wykorzystywane w aplikacji.
*/


/**
* Wyświetlenie szablonu.
*
* @param array $strona Dane do wyświetlenia w szablonie
* @param string $layout "Layout" strony
* @global object $smarty Obiekt klasy Smarty
* @global object $sciezki Scieżki wykorzystywane w aplikacji
*/
function wyswietl_strone($strona, $layout = 'landing') {
	global $smarty;
	global $sciezki;

	if (!isset($strona['title'])) {
	 	$strona['title'] = 'Strona główna';
	}
	$smarty->assign($strona);
	
	$smarty->assign('layout', $layout);
	$smarty->display(
		$sciezki['szablony_katalog'].
		'index'.
		$sciezki['szablony_rozszerzenie']
		);
};

/**
* Przygotowanie zmiennych pochodzących z formularza do przetworzenia przez skrypt.
*
* @param array $formularz Tablica zawierająca dane pochodzące z formularza
* @param array $wzorzec Tablica zawierająca informacje jakie pola w formularzu mają zostać przetworzone
*
* @return array Tablica przetworzonych pól
*/
function pobierz_dane_z_formularza(&$formularz, $wzorzec) {

	$dane = array();

	foreach ($wzorzec as $pole) {
		if ( isset($formularz[$pole]) 
		&& $formularz[$pole] != '' ) {
			$dane[$pole] = trim($formularz[$pole]);
		}
		else {
			$dane[$pole] = '';
		}
	}

	return $dane;

};

/**
* Funkcja sprawdza czy zostały wypełnione wymagane pola formularza/
*
* @param array $formularz Tablica zawierająca pola formularza
* @param array $wzorzec Tablica zawierająca informacje jakie pola w formularzu są wymagane
* @param array $bledy_formularza Tablica przechowująca błędy danych dla formularza
*/
function wymagaj_danych($formularz, $wzorzec, &$bledy_formularza) {

	foreach ($wzorzec as $pole) {
		if ( !isset($formularz[$pole]) 
		|| $formularz[$pole] == '' ) {
			blad_formularza($bledy_formularza, $pole, 'Powyższe pole jest wymagane.');
		}   
	}

};

/**
 * Wstawienie do tablicy bledów formularza informacji o błędnie wypełnionym polu wraz z opisem.
 *
 * @param array $bledy_formularza Tablica zawierająca ewentualne błędy formularza
 * @param string $pole Nazwa błędnie wypełnionego pola
 * @param string $opis_bledu Opis błedu
 */
function blad_formularza(&$bledy_formularza, $pole, $opis_bledu='Nieprawidłowa wartość w powyższym polu') {
    $bledy_formularza = $bledy_formularza + array($pole => $opis_bledu);
};

?>