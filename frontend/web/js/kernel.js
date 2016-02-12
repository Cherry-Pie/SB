$(document).ready(function() {
	getAjaxResponce();
	$('.filter_submit').click(function(event) {
		event.preventDefault();
		getAjaxResponce();
	});

});

function getAjaxResponce(){
	$.ajax({
		url: '/report/ajaxresponse',
		type: 'POST',
		dataType: 'HTML',
		data: {params: $('#AjaxForm').serialize()},
		beforeSend: function(){
			$('.insider_section').addClass('load');
		},
		success: function(res){
			$('.insider_section').removeClass('load').html(res);
		}
	});
}

$('.modal_form').submit(function(event) {
	event.preventDefault();
	sendEmail($('.inp').val());
});

function sendEmail(email){
	$.ajax({
		url: 'report/sendmail',
		type: 'POST',
		dataType: 'JSON',
		data: {email: email, href: window.location.href},
		success: function(res){
			if( res ){
				$('.dfgdfgdfg').fadeOut(200);
			}
		}
	});
}

$( document ).on('click', '.pag_index', function(event) {
	event.preventDefault();
	$('tr.pag_page').removeClass('this-visible');
	$('.pag_li').removeClass('active');
	$(this).parent('li').addClass('active');
	$('.pag_page').hide();
	$('tr.pag_page[page="'+$(this).text()+'"').addClass('this-visible').show();
	showCurrentItemDiapason();

});

function showCurrentItemDiapason() {
	var totalShow 	= $('tr.pag_page.this-visible').length,
		currentPage = parseInt($(".pagination > li.active a").html());
	var endShow 	= currentPage * 10 - (10 - totalShow),
		startShow   = endShow - (totalShow - 1);
	
	$(".current-items_count").html(startShow+"-"+endShow);
}

$('#visites').change(function(event) {
	$('.index_search_input').val($(this).val());
});

$('.show_modal').click(function(event) {
	$('.dfgdfgdfg').fadeIn(200);
});


// see mode info table

$(document).on('click', '.custom-table--section .table-custom tr td.content-cell .btn', function(event) {
	event.preventDefault();
	var id = $(this).data('target'),
		tr = $(this).closest('tr');

	if($(""+id+".showed").length > 0) {
		$(""+id+".showed").slideDown(200);
		setTimeout(function(){
			$(""+id+".showed").remove();
		}, 210)
	}
	else {
		var tpl = tr.find(id).clone().addClass('showed');
		console.log(tpl)
		$(this).closest('tr').after(tpl);
		tpl.slideDown(200);
	}
});
$(document).on('click', '.show-more-info', function(event) {
	event.preventDefault();
	var idc = $(this).data('target');
	console.log(idc)
	if($(""+idc+"").hasClass('showed')) {
		$(""+idc+"").slideUp(200).removeClass('showed');
	}
	else {
		$(""+idc+"").slideDown(200).addClass('showed');
	}
});


