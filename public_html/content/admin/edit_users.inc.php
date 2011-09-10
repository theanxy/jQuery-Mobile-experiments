<?php
	if ( autoryzacja() ) { 
		$strona['title'] = "Edytuj użytkowników";
		$layout = 'admin/edit_users';
		
		$strona['uzytkownicy'] = pobierz_elementy($sql, 'SELECT * FROM uzytkownicy');
		
		if($_POST) {
			echo 'dodaj';
		}
	}
?>