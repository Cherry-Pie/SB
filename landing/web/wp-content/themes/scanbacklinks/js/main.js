
jQuery(function($) {

	//Initiat WOW JS
	new WOW().init();

});

// $(document).on('click', '.main-section-one-input-group button', function(event) {
// 	event.preventDefault();
// 	window.location.href = 'http://mvp.evne.org/report/charts/'+$(".main-section-one-input-group input").val();
// });



$(document).ready(function() {
	$(".carousel").swiperight(function() {
		$(this).carousel('prev');
	});
	
	$(".carousel").swipeleft(function() {  
		$(this).carousel('next');
	});
}); /* END document ready */


$(document).on('keypress', '.main-section-one-input-group input', function(event) {
	if(event.which == 13) {
        $(".main-section-one-input-group button").click();
    }
});

$(document).on("click", '.main-section-one-input-group button', function(event) {
	event.preventDefault();
	var val = $.trim($('.main-section-one-input-group input').val());
	console.log(val.length)
	if(val.length == 0) {
		return false;
	}
	var VRegExp = new RegExp(/^(https?:\/\/)/g);
    var VResult = val.replace(VRegExp, "").replace(/[/]/g, ""); 
	if (DomainValidate(VResult)) {
		
		window.location.href = 'http://cp.scanbacklinks.com/report/charts/'+VResult;
	}
	else {
		alert("Alert!", "Domain name is incorrect");
	}
});
// validate domains 
function DomainValidate(AInputText) { 
	var VRegExp = new RegExp(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/);
	var VResult = VRegExp.test(AInputText); 
	return VResult; 
}


function alert(title, text) {
	var selector = "alert_" + $.now();
	var tpl = 	'<div style="display:none" class="alert alert-danger '+selector+'">'+
					'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
					'<h4 align="center">'+title+'</h4>'+
					'<p class="text-center">'+text+'</p>'+
				'</div>';
	$("body").append(tpl);
	setTimeout(function(){
		$("."+selector).slideDown(400);
	}, 500);
	setTimeout(function(){
		$("."+selector).slideUp(400);
		setTimeout(function(){
			$("."+selector).remove();
		},500);
	},5000);
}
