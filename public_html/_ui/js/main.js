/**
 * Skrypty wspomagające poruszanie się po stronie.
 *
 * @author Wojtek Zając
 * @version 0.3
 */

$(document).bind("mobileinit", function(){
	
	/**
	 * Przejścia między stronami dzięki AJAX wyłączone, aby łatwiej ocenić warstwę PHP
	 */

	$.mobile.ajaxEnabled = false;
});

var EPI = {
	
	onReady : function() {
		
		/**
		 * Dane logowania w demo przekazywane przez PHP, aby uniknąć przechowywania danych w publicznym skrypcie
		 */
		
		$('aside .users li').not('.link-to-admin').css('cursor', 'pointer').click(EPI.setupDemo);
	},
	
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
		
	}	
};

$(document).ready(EPI.onReady);