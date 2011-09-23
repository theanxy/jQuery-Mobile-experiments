/**
 * Skrypty wspomagające poruszanie się po stronie.
 *
 * @package main.js
 * @author Wojtek Zając
 * @version 1.2 23.09.2011
 */

var EPI = {
	
	onReady : function() {
		
		$form = $('#removeClasses');
		
		EPI.removeClasses();
		
		$('aside .users li')
			.not('.link-to-admin')
			.css('cursor', 'pointer')
			.click(EPI.setupDemo);
	},
	
	// Funkcja pozwalająca na łatwe "przeklikanie się" przez aplikację (demo)
	setupDemo : function(e) {
		var $this = $(this); // lepsza wydajnosc dzieki catche na $(this)

		/**
		 * Propagacja demonstracyjnych danych do formularza
		 */
		
		$('#login').val($this.attr('data-user'));
		$('#haslo').val($this.attr('data-password'));

		/**
		 * Zmiana aktywnie wybranego typu użytkownika
		 */
		
		var typ = $this.attr('data-type');
		if (typ == 'nauczyciel' || typ == 'student') {
			$('.user-type label').removeClass('ui-btn-active');

			$('#'+typ).attr('checked', 'checked');

			$('label[for='+typ+']').addClass('ui-btn-active');
		}
		
	},
	
	// Wywoływanie usuwania zajęć
	removeClasses : function() {		
		$form.find('.delete a').click(function() {
			// Wywołujemy funkcję pokazującą potwierdzenie usuwania zajęć
			EPI.confirmRemove($(this).attr('data-id'))
			return false;
		});
	},
	
	// Potwierdzenie usuwania zajęć
	confirmRemove : function(e) {
		var $przedmiot = $form.find('.delete a[data-id='+e+']').parent().siblings('.przedmiot').text();
		
		$form.find('#zajecia').html($przedmiot);
		$('#delete-yes').attr('href', '?wyswietl=aktualizuj&usun='+e);
		
		$form.find('.confirm').attr('data-id', e).slideDown('slow');

		$('#delete-no').click(function() {
			$('.confirm').slideUp('slow');
			
			return false;
		});
	}
};

$(document).bind("mobileinit", function(){
	
	//Świadome pozbycie się efektów bazujących na AJAX celem łatwiejszej oceny warstwy PHP.
	$.mobile.ajaxEnabled = false;
});

$('body').live('pagecreate', EPI.onReady);