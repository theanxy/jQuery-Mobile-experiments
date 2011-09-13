$(document).bind("mobileinit", function(){
	// Przejścia między stronami dzięki AJAX wyłączone, aby łatwiej ocenić warstwę PHP
	$.mobile.ajaxEnabled = false;
});

$(document).ready(function() {
	// Dane logowania w demo przekazywane przez PHP, aby uniknąć przechowywania danych w publicznym skrypcie
	$('aside .users li').not('.link-to-admin').css('cursor', 'pointer').click(function() {
		$('#login').val($(this).attr('data-user'));
		$('#haslo').val($(this).attr('data-password'));
	});
});