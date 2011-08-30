<?php
/*
 Główny kontroler aplikacji.
*/

// zawieranie Smarty
include 'Smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = dirname(dirname(__FILE__)) . '/templates';
$smarty->compile_dir = dirname(dirname(__FILE__)) . '/templates_c';
$smarty->debugging = true;

// konfiguracja developerska
ini_set('error_reporting', E_ALL);
ini_set('display_errors','on');

// załączenie bibliotek
include 'config.php';
include 'funkcje.php';
include 'baza_danych.php';
include 'autoryzacja.php';
include 'sprawdzenie_danych.php';

?>
