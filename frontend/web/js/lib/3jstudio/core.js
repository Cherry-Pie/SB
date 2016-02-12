$(function() {
	var currentTop = $(window).scrollTop(),
		resolution = $(window).height(),
		maxtoplen  = currentTop + resolution,
		bodyheight = $("html").height();

	if((bodyheight - currentTop) <= (resolution + (resolution/2))) {
		$("#see-more").fadeOut();
	}
	else {
		$("#see-more").fadeIn();
	}
	if($(".section-scroll").length > 0) {
		initSeeMore();
		if($('body').data('trial') == "Y") {
			$("#mod-success").modal('show');
		}
	}
});
// see-more button event
$(document).on('click', '#see-more', function(event) {
	event.preventDefault();
	var currentTop = $(window).scrollTop(),
		resolution = $(window).height(),
		maxtoplen  = currentTop + resolution;
	var current;
	$(".section-scroll").removeClass('active');
	$(".section-scroll").each(function(index, el) {
		var st = $(this).offset().top;
		if(st >= currentTop && st < maxtoplen) {
			var element = $(this).next(".section-scroll");
			if(element.offset() === undefined) {
				var element = $(this).parent().next(".section-scroll");
			}
			if(element.offset() === undefined) {
				return false;
			}
			element.addClass('active');
			$('html, body').animate({
		        scrollTop: element.offset().top
		    }, 1000);
			return false;
		}
	});
});	

$(window).scroll(function(event){
	event.preventDefault();
	var currentTop = $(window).scrollTop(),
		resolution = $(window).height(),
		maxtoplen  = currentTop + resolution,
		bodyheight = $("html").height();
	var current;
	$(".section-scroll").removeClass('active');
	$(".section-scroll").each(function(index, el) {
		var st = $(this).offset().top;
		if(st >= currentTop && st < maxtoplen) {
			var element = $(this).next(".section-scroll");
			if(element.offset() === undefined) {
				var element = $(this).parent().next(".section-scroll");
			}
			if(element.offset() === undefined) {
				return false;
			}
			element.addClass('active');
		}
	});
	if((bodyheight - currentTop) <= (resolution + (resolution/2))) {
		$("#see-more").fadeOut();
	}
	else {
		$("#see-more").fadeIn();
	}
});
function initSeeMore () {
    var seeMore = $('<span>', { id: 'see-more', href: '#top' });
    var icon = $('<i>', { class: 'fa fa-chevron-up' });

    seeMore.appendTo ('body');
    seeMore.html("Scroll Down To See More <br><i class='fa fa-chevron-down'></i>");
    if($('.sticky--banner').length == 0) {
		seeMore.css('bottom', '25px');
	}

    // seeMore.hide();

    $(window).scroll(function () {

    })

    seeMore.click (function (e) {
        e.preventDefault ();
    });
}

// validate domain name and submit form
$(document).on('keypress', '#domain-search-imput', function(event) {
	if(event.which == 13) {
        $(".index_search_button").click();
    }
});

$(document).on("click", '.index_search_button', function(event) {
	var val = $.trim($('.index_search_input').val());
	console.log(val.length)
	if(val.length == 0) {
		return false;
	}
	var VRegExp = new RegExp(/^(https?:\/\/)/g);
    var VResult = val.replace(VRegExp, "").replace(/[/]/g, ""); 
	if (DomainValidate(VResult)) {
		window.location = 'report/charts/'+VResult;
	}
	else {
		alert("Alert!", "Domain name is incorrect");
	}
});

$(document).on('change', '#visites', function(event) {
	if($(this).val()) {
		$('#domain-search-imput').val($(this).val());
		$(".index_search_button").click();
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
	$("#alertSection .box").append(tpl);
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

// show datepicker 

$('#datetimepicker01, #datetimepicker02').datetimepicker({
    format: 'DD.MM.YYYY',
    // showTodayButton: true,
    // keepOpen: true,
    // allowInputToggle: true,
    useCurrent: true,
  locale: 'en'
});

$("#datetimepicker01").on("dp.change", function (e) {
  $('#datetimepicker02').data("DateTimePicker").minDate(e.date);
});
$("#datetimepicker02").on("dp.change", function (e) {
    $('#datetimepicker01').data("DateTimePicker").maxDate(e.date);
});

$('#getReportStickyBtn').on('click', function(e) {
  // e.preventDefault();
  console.log('click');
  $.growl('<i class="ion ion-checkmark" style="font-size: 1.6em; margin-right: 7px;"></i> Your report was successfully sent via e-mail',
    {
      type: 'success',
      position: {
        from: "bottom",
        align: "center"
      },
      offset: 70,
      delay: 5000,
      template: {
        container: '<div class="col-xs-10 col-sm-10 col-md-4 alert text-center">'
      }
    }
  );
});

// multiple search 

$(document).on('click', '#collapseSearch_additional .addnew', function(event) {
	event.preventDefault();
	var current = $("#collapseSearch_additional .panel-body").last();
	var tpl = current.clone();

	current.find('.addnew').removeClass('addnew btn-primary').addClass('removeit btn-danger').html('-');
	tpl.find('input').val("");

	current.closest('#collapseSearch_additional').append(tpl);
	checkMaxSearchForm();


});
$(document).on('click', '#collapseSearch_additional .removeit', function(event) {
	event.preventDefault();
	$(this).closest('.panel-body').remove();
	checkMaxSearchForm();
});

function checkMaxSearchForm() {
	if($("#collapseSearch_additional .panel-body").length > 4) {
		$('#collapseSearch_additional .addnew').hide();
	}
	else {
		$('#collapseSearch_additional .addnew').show();
	}
}

// ajax fom acions 

$(document).on('click', '#mod-send-report button[type="submit"],.subscrible-sticky button[type="submit"],.subscrible-gw button[type="submit"]',function(event) {
	event.preventDefault();
	var form 	= $(this).closest("form"),
		method 	= form.attr('method'),
		action 	= form.attr('action'),
		dataArr = form.serialize();

	$.ajax({
		url: action,
		type: method,
		dataType: 'json',
		data: dataArr,
		success: function(data) {
			if(data.status == 'exsits') {
				$(".modal-header .close").click();
				$(".show-ext-not").click();
			}
			if(data.status == 'send') {
				$(".modal-header .close").click();
				$(".show-send-not").click();
				setTimeout(function(){
					window.location.reload();
				}, 5000)
			}
		}
	});
});	


