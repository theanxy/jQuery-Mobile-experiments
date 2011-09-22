/**
 * Skrypty wspomagające poruszanie się po stronie.
 *
 * @author Wojtek Zając
 * @version 0.3
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
	
	removeClasses : function() {		
		$form.find('.delete a').click(function() {
			EPI.confirmRemove($(this).attr('data-id'))
			return false;
		});
	},
	
	confirmRemove : function(e) {
		var $przedmiot = $form.find('.delete a[data-id='+e+']').parent().siblings('.przedmiot').text();
		
		$form.find('#zajecia').html($przedmiot);
		$form.find('.confirm').slideDown('slow');
	}
};

$(document).bind("mobileinit", function(){
	
	/**
	 * Przejścia między stronami dzięki AJAX wyłączone, aby łatwiej ocenić warstwę PHP
	 */

	$.mobile.ajaxEnabled = false;
});

$('body').live('pagecreate', EPI.onReady);