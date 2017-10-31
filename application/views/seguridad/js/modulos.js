$(document).ready(function(){
	$("#guardar_modulo").click(function(){
		$.ajax({
			url: "/seguridad/modulo/savemodulo",
			type: "POST",
			data: $("#form_modulo").serialize(),
			beforeSend:function(){
				$(".loader").show();
			},
			success:function(){
				$('#myModal').modal('hide');
				cargarReporteModulos();
			}
		});
	});

	function cargarReporteModulos(){
		$.ajax({
			url: "/seguridad/modulo/listarmodulosajax",
			type: "POST",
			data: {},
			beforeSend:function(){
				//$(".loader").show();
			},
			success:function(response){
				$(".loader").fadeOut("slow");
				var respuesta = JSON.parse(response);

				$("#modulos_body").empty().append(respuesta['modulos']);
			}
		});		
	}
}); 