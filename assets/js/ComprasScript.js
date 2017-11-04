  $(document).ready(function(){
    $("#Container").on("click","#btnpruebas",pruebasclick);
    $('#table_id').DataTable();
  });

  function pruebasclick(){
  	$.post("http://192.168.133.131/Analisis2/Compras/Dasboardcompras/pruebas",null,function(data){
  		$("#divComprasdetalle").html(data);
  	}).fail(function(){
  		alert('Se ha producido un error');
  	});
  }