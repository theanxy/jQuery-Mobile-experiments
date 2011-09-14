$(document).bind("mobileinit", function(){
	// Przejścia między stronami dzięki AJAX wyłączone, aby łatwiej ocenić warstwę PHP
	$.mobile.ajaxEnabled = false;
});

$(document).ready(function() {
	
	// Dane logowania w demo przekazywane przez PHP, aby uniknąć przechowywania danych w publicznym skrypcie
	$('aside .users li').not('.link-to-admin').css('cursor', 'pointer').click(function() {
		var $this = $(this); // lepsza wydajnosc dzieki catche na $(this)
		
		// propagacja demonstracyjnych danych do formularza
		$('#login').val($this.attr('data-user'));
		$('#haslo').val($this.attr('data-password'));
		
		// zmiana aktywnie wybranego typu użytkownika
		var typ = $this.attr('data-type');
		if (typ == 'nauczyciel' || typ == 'student') {
			$('.user-type label').removeClass('ui-btn-active');
			
			$('#'+typ).attr('checked', 'checked');
			
			$('label[for='+typ+']').addClass('ui-btn-active');
		}
		
	});
	
});