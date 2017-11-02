$(document).ready(function(){
	$("#guardar_perfil").click(function(){
		saveEditPerfil();
	});

	function saveEditPerfil(){
		$.ajax({
			url: "/seguridad/perfil/saveperfil",
			type: "POST",
			data: $("#form_perfil").serialize(),
			beforeSend:function(){
				showLoading();
			},
			success:function(response){
				var result = JSON.parse(response);

				if(result['response'] == false){
					hideLoading();
					showMessage('add_perfil_msg','danger','<b>¡Importante!</b> Revisar los siguientes errores.',result['message']);
				}else{
					hideLoading();

					if(result['result_db'] == false){
						showMessage('add_perfil_msg','danger','',result['message']);
					}else{
						$('#myModal').modal('hide');
						$('input[name=nombre_perfil]').val('');
						$('#descrip_perfil').val('');
						$('#add_perfil_msg').html('');
						showMessage('mensaje_perfiles','success','',result['message']);
						cargarReportePerfiles();
					}
				}
			}
		});		
	}

	function cargarReportePerfiles(){
		$.ajax({
			url: "/seguridad/perfil/listarperfilesajax",
			type: "POST",
			data: {},
			beforeSend:function(){},
			success:function(response){
				hideLoading();
				var respuesta = JSON.parse(response);

				$("#perfiles_body").empty().append(respuesta['perfiles']);
			}
		});		
	}

	$("#perfiles_body").on('click', '.estado_perfil', function(){
		$.ajax({
			url: "/seguridad/perfil/changestateperfil",
			type: "POST",
			data: {id_perfil:$(this).attr("id"),accion:$(this).attr("name")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				showMessage('mensaje_perfiles','success','',respuesta['message']);
				cargarReportePerfiles();
			}
		});
	});

	$("#perfiles_body").on('click','.edit_perfil',function(){
		$("#id_perfil").val($(this).attr("id"));

		$.ajax({
			url: "/seguridad/perfil/getperfilinfo",
			type: "POST",
			data: {id_perfil:$(this).attr("id")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				$('input[name=nombre_perfil]').val(respuesta['nombre_perfil']);
				$('#descrip_perfil').val(respuesta['descrip_perfil']);
				$('#myModal').modal('show');
			}
		});
	});

	$("#cancelar").click(function(){
		$('input[name=nombre_perfil]').val('');
		$('#descrip_perfil').val('');
		$('#add_perfil_msg').html('');
	});
});