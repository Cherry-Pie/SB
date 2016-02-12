
jQuery(function($) {

	//Initiat WOW JS
	new WOW().init();

});



$(document).ready(function() {
	$(".carousel").swiperight(function() {
		$(this).carousel('prev');
	});
	
	$(".carousel").swipeleft(function() {  
		$(this).carousel('next');
	});
}); /* END document ready */



