<?php
/**
 * Konfiguracja bazy oraz ścieżek.
 *
 * @package config.php
 * @author Wojtek Zając
 * @version 1.2 23.09.2011
 */

$sql['user'] = 'root';
$sql['pass'] = 'root';
$sql['db'] = 'epi';
$sql['host'] = 'localhost';

// konfiguracja ścieżek
$sciezki['szablony_katalog'] = dirname(dirname(__FILE__)) . '/templates/';
$sciezki['szablony_rozszerzenie'] = '.tpl';

?>
