$(function(){
	$('.updateUser').click(function(event) {
	var id = $(this).val();
	if ($('#passwordNew'+id).val() != $('#password-confirmNew'+id).val()) {
		alert('Los password no coiciden !');
	}else{
		$.ajax({
			url: 'registerUserAjax',
			type: 'POST',
			dataType: 'json',
			data: {_token: $('#token').val(),name: $('#nameNew'+id).val(), rol: $('#rolNew'+id).val(), period_id: $('#period_id'+id).val(), password: $('#passwordNew'+id).val(),'password-confirm': $('#password-confirmNew'+id).val(), id: id},
		})
		.done(function(data) {
			alert(data);
		})
		.fail(function(erro) {
			console.log(erro);
			if (erro.responseJSON != 'undefined') {
				alert('Debe Digerenciar todos los campos !!');
			}
		});
	}
	});
});