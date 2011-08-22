<?php
/*
  Punkt wejściowy aplikacji. Definiuje o zawieranej podstronie.
*/

include '../lib/cms.h.php';

var_dump(sprawdz_wyniki($sql, "SELECT * FROM `ksiazka_telefoniczna` WHERE `imie` LIKE '%jan%' OR `nazwisko` LIKE '%kow%'"));

$strona['zawartosc'] = 'index';

wyswietl_strone($strona);

?>