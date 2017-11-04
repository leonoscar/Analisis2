<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Cotizaciones
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
			  	<h4>Datos de Requisicion</h4>
				<div class="row">
					<div class="col-md-2">
			  			<label for="TxtCodigoRequisicion">CodigoRequisicion</label>
			    		<input type="text" class="form-control" id="TxtCodigoRequisicion">	
					</div>
					<div class="col-md-3">
			  			<label for="TxtNombre">Nombre</label>
			    		<input type="text" class="form-control" id="TxtNombre">	
			  		</div>
			  		<div class="col-md-5">
			  			<label for="TxtDescripcion">Descripcion</label>
			    		<input type="text" class="form-control" id="TxtDescripcion">	
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
			  <div class="row">
			  	<div class="col-md-12">
			  		<h3>Genera Cotizacon</h3>
			  	</div>
			  </div>
			  	<div class="form-group">
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="DlPorveedores">Proveedor</label>
					  <select class="form-control" id="DlPorveedores">
					    <option selected="selected" value="0">Selecciones Proveedor</option>
					    <option value="1">Suministros S.A</option>
					    <option value="2">Multi Servicios.</option>
					    <option value="3">Aceros de Guatemala</option>
					  </select>	
					  </div>
			  		<div class="col-md-3">
			  			<label for="DlProductos">Producto</label>
					  <select class="form-control" id="DlProductos">
					    <option selected="selected" value="0">Slecciones Producto</option>
					    <option value="1">Producto 1</option>
					    <option value="2">Producto 2</option>
					    <option value="3">Producto 3</option>
					  </select>	
			  		</div>
			  		<div class="col-md-2">
			  			<label for="TxtPrecioUnidad">Precio Unidad</label>
			    		<input type="text" class="form-control" id="TxtPrecioUnidad">	
			  		</div>
			  		<div class="col-md-2">
			  			<label for="TxtCantidad">Cantidad</label>
			    		<input type="text" class="form-control" id="TxtCantidad">	
			  		</div>
			  		<div class="col-md-2">
			  			<label for="TxtCantidad" style="color: #ecf0f5;">.</label>
			  			<button type="button" class="btn btn-default form-control" id="btnAgregarCotizacion">
				    	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Agregar
				    	</button>
			  		</div>
			  	</div>
			  </div>
			  <div class="form-group">
			  	<div class="row">
			  		<div class="col-md-2">
			  			<label for="TxtCantidadBodega">Cantidad en bodega</label>
			    		<input type="text" class="form-control" id="TxtCantidadBodega">	
			  		</div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-md-12">
			  		<h3 class="text-center">Detalle Cotizacion</h3>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-md-12">
			  		<div id="divdetallereqiosicion">
			  			<table class="table table-striped table-bordered " cellspacing="0" id="tbDetalleCotizacion" style="width:100%;">
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
			  		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Guardar Caotizacion
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