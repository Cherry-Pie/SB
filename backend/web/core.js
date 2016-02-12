$(document).on('click', '#addNewElement', function(event) {
	event.preventDefault();
	if(confirm("Really add an item?")) {
		var t = $("#newElementType").val();

		if(t == 'title') {
			type =		'<label class="control-label">Title</label>'+
						'<input type="hidden" class="form-control" name="NewElement[type][]" value="1" maxlength="255">'+
						'<input type="text" class="form-control" name="NewElement[value][]" maxlength="255">';
		}
		if(t == 'text') {
			type =		'<label class="control-label">Text</label>'+
						'<input type="hidden" class="form-control" name="NewElement[type][]" value="2" maxlength="255">'+
						'<textarea class="form-control" name="NewElement[value][]" cols="30" rows="10"></textarea>';
		}
		if(t == 'button') {
			type =		'<label class="control-label">Button</label>'+
						'<input type="hidden" class="form-control" name="NewElement[type][]" value="3" maxlength="255">'+
						'<input type="text" class="form-control" name="NewElement[value][]" maxlength="255">';
		}

		var tpl = 	'<div class="box-body">'+
					'	<div class="form-group field-banners-code required">'+
					type+
					'	</div>'+
					'</div>';
		$("#elements-container").append(tpl);
	}

});	