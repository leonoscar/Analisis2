$(document).ready(function(){
	$("#guardar_rol").click(function(){
		saveEditRol();
	});

	function saveEditRol(){
		$.ajax({
			url: "/seguridad/rol/saverol",
			type: "POST",
			data: $("#form_rol").serialize(),
			beforeSend:function(){
				showLoading();
			},
			success:function(response){
				var result = JSON.parse(response);

				if(result['response'] == false){
					hideLoading();
					showMessage('add_rol_msg','danger','<b>¡Importante!</b> Revisar los siguientes errores.',result['message']);
				}else{
					hideLoading();

					if(result['result_db'] == false){
						showMessage('add_rol_msg','danger','',result['message']);
					}else{
						$('#myModal').modal('hide');
						$('input[name=nombre_rol]').val('');
						$('#descrip_rol').val('');
						$("#form_submenu").empty();
						$('#add_rol_msg').html('');
						$("#item_menu").prop('checked', false);
						showMessage('mensaje_roles','success','',result['message']);
						cargarReporteRoles();
					}
				}
			}
		});		
	}

	function cargarReporteRoles(){
		$.ajax({
			url: "/seguridad/rol/listarrolesajax",
			type: "POST",
			data: {},
			beforeSend:function(){},
			success:function(response){
				hideLoading();
				var respuesta = JSON.parse(response);

				$("#roles_body").empty().append(respuesta['roles']);
			}
		});		
	}

	$("#roles_body").on('click', '.estado_rol', function(){
		$.ajax({
			url: "/seguridad/rol/changestaterol",
			type: "POST",
			data: {id_rol:$(this).attr("id"),accion:$(this).attr("name")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				showMessage('mensaje_roles','success','',respuesta['message']);
				cargarReporteRoles();
			}
		});
	});

	$("#roles_body").on('click','.edit_rol',function(){
		$("#id_rol").val($(this).attr("id"));

		$.ajax({
			url: "/seguridad/rol/getrolinfo",
			type: "POST",
			data: {id_rol:$(this).attr("id")},
			beforeSend:function(){
				showLoading();
			},
			success:function(data){
				hideLoading();
				var respuesta = JSON.parse(data);
				$('input[name=nombre_rol]').val(respuesta['nombre_rol']);
				$('#descrip_rol').val(respuesta['descrip_rol']);

				if(respuesta['id_submenu'] != null){
					$("#item_menu").prop('checked', true);
					showFormMenu();
					$('input[name=nombre_item').val(respuesta['nombre']);
					$('input[name=link_submenu').val(respuesta['link_menu']);
				}

				$('#myModal').modal('show');
			}
		});
	});

	$("#cancelar").click(function(){
		$('input[name=nombre_rol]').val('');
		$('#descrip_rol').val('');
		$("#form_submenu").empty();
		$('#add_rol_msg').html('');
		$("#item_menu").prop('checked', false);
		$("#form_submenu").empty();
	});

	$("#item_menu").click(function(){
		showFormMenu();
	});

	function showFormMenu(){
		var nuevo_form = '<div class="col-lg-10 col-lg-offset-1">' +
							'<div class="form-group">' +
								'<label for="nombre_item">Nombre del item</label>' +
								'<input class="form-control" type="text" name="nombre_item" placeholder="Escriba el nombre del item para menu" />' +
							'</div>' +
							'<div class="form-group">' +
								'<label for="link_submenu">Link del item</label>' +
								'<input class="form-control" type="text" name="link_submenu" placeholder="Escriba el link para este item. Ej. seguridad/perfil/listarperfiles" />' +		
							'</div>' +
						'</div>';
		
		if($("#item_menu").is(':checked')){
			$("#form_submenu").empty().append(nuevo_form);
		}else{
			$("#form_submenu").empty();
		}		
	}
});