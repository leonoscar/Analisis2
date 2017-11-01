$(document).ready(function(){
	$("#guardar_modulo").click(function(){
		saveEditModule();
	});

	function saveEditModule(){
		$.ajax({
			url: "/seguridad/modulo/savemodulo",
			type: "POST",
			data: $("#form_modulo").serialize(),
			beforeSend:function(){
				showLoading();
			},
			success:function(response){
				var result = JSON.parse(response);

				if(result['response'] == false){
					hideLoading();
					showMessage('add_modulo_msg','danger','<b>¡Importante!</b> Revisar los siguientes errores.',result['message']);
				}else{
					hideLoading();

					if(result['result_db'] == false){
						showMessage('add_modulo_msg','danger','',result['message']);
					}else{
						$('#myModal').modal('hide');
						$('input[name=nombre_modulo]').val('');
						$('#descrip_modulo').val('');
						showMessage('mensaje_modulos','success','',result['message']);
						cargarReporteModulos();
					}
				}
			}
		});		
	}

	function cargarReporteModulos(){
		$.ajax({
			url: "/seguridad/modulo/listarmodulosajax",
			type: "POST",
			data: {},
			beforeSend:function(){},
			success:function(response){
				hideLoading();
				var respuesta = JSON.parse(response);

				$("#modulos_body").empty().append(respuesta['modulos']);
			}
		});		
	}

	$("#modulos_body").on('click', '.estado_modulo', function(){
		$.ajax({
			url: "/seguridad/modulo/changestatemodule",
			type: "POST",
			data: {id_modulo:$(this).attr("id"),accion:$(this).attr("name")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				showMessage('mensaje_modulos','success','',respuesta['message']);
				cargarReporteModulos();
			}
		});
	});

	$("#modulos_body").on('click','.edit_modulo',function(){
		$("#id_modulo").val($(this).attr("id"));

		$.ajax({
			url: "/seguridad/modulo/getmoduleinfo",
			type: "POST",
			data: {id_modulo:$(this).attr("id")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				$('input[name=nombre_modulo]').val(respuesta['nombre_modulo']);
				$('#descrip_modulo').val(respuesta['descrip_modulo']);
				$('#myModal').modal('show');
			}
		});
	});

	$("#cancelar").click(function(){
		$('input[name=nombre_modulo]').val('');
		$('#descrip_modulo').val('');
	});
});