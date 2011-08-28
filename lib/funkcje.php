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
	
	$smarty->assign('layout', $layout);
	$smarty->assign($strona);
	$smarty->display(
		$sciezki['szablony_katalog'].
		'default'.
		$sciezki['szablony_rozszerzenie']
	);
};

?>
