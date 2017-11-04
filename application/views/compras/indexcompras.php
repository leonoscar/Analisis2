<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Compras
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
			<div class="row" style="border-top:0.1em dotted #777; border-bottom: 0.1em dotted #777; margin: 2em 0em !important; padding: 1em 0em !important;">
				<div class="col-md-12">
					<h3>Filtros de busqueda</h3>
				</div>
				 <form class="form-inline" action="/action_page.php">
				    <!--div class="form-group">
				      <label for="email">Email:</label>
				      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				    </div-->
				    <!--div class="form-group">
				      <label for="pwd">Password:</label>
				      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
				    </div-->
				    <div class="form-group">	
					  <label for="sel1">Estado:</label>
					  <select class="form-control" id="sel1">
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
				    <div class="checkbox" style="margin: 0em 2em !important;">
				      <label><input type="checkbox" name="remember" checked="checked"> Activos</label>
				    </div>
				    <button type="button" class="btn btn-default" id="btnRequisicionSerch">
				    	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>Buscar
				    </button>
				    <!--button type="submit" class="btn btn-default">Submit</button-->
				  </form>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="divComprasdetalle">
						<table class="table table-striped table-bordered " cellspacing="0" id="table_id" style="width:100%;">
						    <thead class="thead-inverse">
						        <tr>
						            <th>Column 1</th>
						            <th>Column 2</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>Row 1 Data 1</td>
						            <td>Row 1 Data 2</td>
						        </tr>
						        <tr>
						            <td>Row 2 Data 1</td>
						            <td>Row 2 Data 2</td>
						        </tr>
						    </tbody>
						</table>
						<!--<table class="table table-hover">
							<thead>
								<tr>
									<th>no.</th>
									<th>Columna1</th>
									<th>Columna2</th>
									<th>Columna3</th>
									<th>Columna4</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>no.</td>
									<td>Columna1</td>
									<td>Columna2</td>
									<td>Columna3</td>
									<td>Columna4</td>
								</tr>
							</tbody>
						</table>
					</div> -->
					<!--
					<form>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputFile">File input</label>
					    <input type="file" id="exampleInputFile">
					    <p class="help-block">Example block-level help text here.</p>
					  </div>
					  <div class="checkbox">
					    <label>
					      <input type="checkbox"> Check me out
					    </label>
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
				-->
				</div>
			</div>
		</section>
	</div>
</div>