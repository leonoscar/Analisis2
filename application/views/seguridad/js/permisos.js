$(document).ready(function(){
	$("#codusuario").keypress(function(e){
		if(e.which == 13){
			$.ajax({
				url: "/seguridad/permiso/getuser",
				type: "POST",
				data: {codusuario:$("#codusuario").val()},
				beforeSend:function(){
					$("#msg_asignacionpefil").html('');
					showLoading();
				},
				success:function(data){
					hideLoading();
					var respuesta = JSON.parse(data);
					
					if(respuesta['response'] != false){
						$("#nombre_usuario").val(respuesta['datos']['correoe']);
						cargaPerfiles();
					}else{
						cleanInputsUsuario();
						showMessage('msg_asignacionpefil','danger','',respuesta['message']);
					}
				}
			});				
		}
	});

	$("#codusuario").click(function(){
		cleanInputsUsuario();
	});

	function cleanInputsUsuario(){
		$("#codusuario").val('');
		$("#nombre_usuario").val('');
		$("#msg_asignacionpefil").html('');
		$("#perfilesasig_body").empty();
	}

	function cargaPerfiles(){
		$.ajax({
			url: "/seguridad/permiso/loadperfiles",
			type: "POST",
			data: {codusuario:$("#codusuario").val()},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				$("#perfilesasig_body").empty().append(respuesta['asignacion_perfiles']);
			}
		});			
	}

	$("#perfilesasig_body").on('click','.asignar_noasignar',function(){
		$.ajax({
			url: "/seguridad/permiso/asignardesasignarperfil",
			type: "POST",
			data: {codusuario:$("#codusuario").val(),id_perfil:$(this).attr("id"),action:$(this).attr("name")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);

				if(respuesta['response'] ==  false){
					showMessage('msg_asignacionpefil','danger','',respuesta['message']);
				}else{
					showMessage('msg_asignacionpefil','success','',respuesta['message']);
					cargaPerfiles();
				}
			}
		});	

		
	});


});// Fin document ready