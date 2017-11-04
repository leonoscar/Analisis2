<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Autorizacion Requisisiones
			<small>Modulo de Compras</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Layout</a></li>
				<li class="active">Top Navigation</li>
			</ol>
		</section>
		<!-- Main content -->	
		<section class="content" id="Container">
			<form>
			  <div class="form-group">
				<div class="row">
					<div class="col-md-3">
			  			<label for="TxtCodigoRequisicion">CodigoRequisicion</label>
			    		<input type="text" class="form-control" id="TxtCodigoRequisicion">	
					</div>
					<div class="col-md-3">
			  			<label for="TxtNombre">Nombre</label>
			    		<input type="text" class="form-control" id="TxtNombre">	
			  		</div>
			  		<div class="col-md-6">
			  			<label for="TxtDescripcion">Descripcion</label>
			    		<input type="text" class="form-control" id="TxtDescripcion">	
			  		</div>
				</div>
			  </div>
			  <div class="form-group">
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="DlEstados">Estado:</label>
					  <select class="form-control" id="DlEstados">
					    <option selected="selected" value="0">Todos los estados</option>
					    <option value="1">Requisicion</option>
					    <option value="2">Aprovacion Requisision</option>
					    <option value="3">Rechazo Requisision</option>
					    <option value="4">Cotizacion</option>
					    <option value="5">Cotizacion Enviada</option>
					    <option value="6">Cotizacion Aprobada</option>
					    <option value="7">Orden de Compra</option>
					  </select>	
			  		</div>
			  		<div class="col-md-2">
			  			<label for="lblTotal">Total</label>
			    		<input type="text" class="form-control" id="lblTotal">	
			  		</div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-md-12">
			  		<h3 class="text-center">Detalle Requisicion</h3>
			  	</div>
			  </div>
			  <div class="form-group">
			  	<div class="row">
			  		<div class="col-md-4">
			  			<label for="Txtdescripciondetalle">Descripcion</label>
			    		<input type="text" class="form-control" id="Txtdescripciondetalle">		
			  		</div>
			  		<div class="col-md-2">
			  			<label for="TxtCantidad">Cantidad</label>
			    		<input type="text" class="form-control" id="TxtCantidad">		
			  		</div>
			  		<div class="col-md-2">
			  			<label for="TxtCantidad" style="color: #ecf0f5;">.</label>
			  			<button type="button" class="btn btn-default form-control" id="btnRequisicionSerch">
				    	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar
				    </button>
			  		</div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-md-12">
			  		<div id="divdetallereqiosicion">
			  			<table class="table table-striped table-bordered " cellspacing="0" id="tbDetalleRequisicion" style="width:100%;">
						    <thead class="thead-inverse">
						        <tr>
						            <th>No.</th>
						            <th>Descripcion</th>
						            <th>Cantidad</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>1</td>
						            <td>Galones de Gas Propano</td>
						            <td>3</td>
						        </tr>
						        <tr>
						            <td>2</td>
						            <td>Vehiculos de carga</td>
						            <td>1</td>
						        </tr>
						    </tbody>
						</table>
			  		</div>
			  	</div>
			  </div>
			  <br/>
			  <br/>
			  <div class="row">
			  	<div class="col-md-3">
			  		<button type="submit" class="btn btn-primary form-control">
			  		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Guardar Rquisicion
			  	</button>		
			  	</div>
			  	<div class="col-md-3">
			  		<button type="button" class="btn btn-danger form-control">
			  		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancelar
			  	</button>		
			  	</div>
			  </div>
			</form>
		</section>
	</div>
</div>