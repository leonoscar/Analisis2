function showLoading(){
    $.blockUI({ 
    	baseZ: 20000,
    	css: { 
	        border: 'none', 
	        padding: '15px', 
	        backgroundColor: '#000', 
	        '-webkit-border-radius': '10px', 
	        '-moz-border-radius': '10px', 
	        opacity: .5, 
	        color: '#fff'
    	},
        message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> <h3>Espere un momento por favor...</h3>'  
	}); 
}

function hideLoading(){
	setTimeout($.unblockUI); 
}

/*
Tipos de mensajes que se puede usar
danger
info
warning
success
*/
function showMessage(idContenedor,type,titulo,mensaje){
	var title = '';

	if(titulo != ''){
		title = '<h4>'+ titulo +'</h4>';
	}

	var message = '	<div class="callout callout-'+ type +'">' +
                   		title +
                    	'<p>'+ mensaje +'</p>' +
                  	'</div>';

	$("#"+idContenedor).html(message);
}