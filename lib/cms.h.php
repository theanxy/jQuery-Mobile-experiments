<?php
/*
 Główny kontroler aplikacji.
*/

// zawieranie Smarty
include 'Smarty/Smarty.class.php';
$smarty = new Smarty;
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';
$smarty->debugging = true;

// konfiguracja developerska
ini_set('error_reporting', E_ALL);
ini_set('display_errors','on');

// załączenie bibliotek
include 'config.php';
include 'funkcje.php';
include 'sprawdzenie_danych.php';

?>
