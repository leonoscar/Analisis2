<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Top Navigation
			<small>Example 2.0</small>
			</h1>

			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Layout</a></li>
				<li class="active">Top Navigation</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<section class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<a class="btn btn-success fa fa-user-plus" href="/cuentasxcobrar/cliente/nuevocliente" >
					</a>
				</div>
			</section>
			<br>
			<section class = "row">
				<div class = "col-lg-10	col-lg-offset-1">
					<div class="box">
						<div class="box-header">
							<section class="row">
								<div class="col-lg-11">
									<h3 class="box-title">Modulos del sistema AS</h3>		
								</div>
								<div class="col-lg-1">
										
								</div>
							</section>
							
						</div><!-- /.box-header -->
						<div class="box-body no-padding">
							<table class="table table-condensed">	
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Nit</th>
										<th>Telefono</th>
										<th>Correo electronico</th>
									</tr>
								</thead>
								<tbody id="modulos_body">
									<?php print $clientes; ?>
								</tbody>
							</table>
						</div>
					</div>				
				</div>
			</section>
		</section>
	</div>
</div>	