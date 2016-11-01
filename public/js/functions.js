$('.activar').on('click', function(event) {
	event.preventDefault();
	var thiss = $(this);
	thiss.html('<i class="btn btn-blue" title="Cargando"><i class="fa fa-refresh fa-spin"></i></i>').attr('disabled', '');
	$.ajax({
		url: thiss.data('activar'),
		type: 'GET',
		dataType: 'json',
		data: {id: thiss.data('id')},
	})
	.done(function(resultado) {
		thiss.html(resultado);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
});