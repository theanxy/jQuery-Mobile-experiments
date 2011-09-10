<?php
	$strona['title'] = "Komunikaty";
	$layout = 'komunikaty';
	
	$strona['komunikaty'] = pobierz_elementy($sql, 'SELECT * FROM news ORDER BY id DESC');
?>