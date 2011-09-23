<?php
/**
 * Podstrona komunikatów.
 *
 * @package komunikaty.inc.php
 * @author Wojtek Zając
 * @version 1.2 23.09.2011
 */
	$strona['title'] = "Komunikaty";
	$layout = 'komunikaty';
	
	$strona['komunikaty'] = pobierz_elementy($sql, 'SELECT * FROM news ORDER BY id DESC');
?>