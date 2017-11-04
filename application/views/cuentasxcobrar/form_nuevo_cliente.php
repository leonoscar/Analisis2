<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Probando
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
			<div class ="row">
				<div class="col-lg-8 col-lg-offset-2">
						<?php 
							if(validation_errors()){
								print '<div class ="callout callout-danger">' .
										validation_errors('<li>','</li>') .
										'</div>';
							}
						?>
				</div>
			</div>
			<form method="POST" action="/cuentasxcobrar/cliente/guardarcliente">
				<section class="row"> 
					<div class="col-lg-6 col-lg-offset-3"> 
						<div class="form-group">
							<label>Nombre cliente</label>
							<input class="form-control" name="nombre_cliente" value="<?php echo set_value('nombre_cliente'); ?>" type="text" placeholder="Escriba el nombre del cliente"/>
						</div>
					</div>
				</section>
				<section class="row"> 
					<div class="col-lg-6 col-lg-offset-3"> 
						<div class="form-group">
							<label>Apellido Cliente</label>
							<input class="form-control" name="apellido_cliente" value = "<?php echo set_value ('apellido_cliente');?>" type="text" placeholder="Escriba el apellido del cliente"/>
						</div>
					</div>
				</section>
				<section class="row">
						<div class = "col-lg-6 col-lg-offset-3">
							<div class="form-group">
								<label>Direccion de cliente</label>
								<input class="form-control" name="direccion_cliente" value = "<?php echo set_value ('direccion_cliente');?>" type="text" ="text" placeholder="Escriba la direccion del cliente" />
							</div>
						</div>
				</section>
				<section class="row">
					<div class = "col-lg-6 col-lg-offset-3">
						<div class="form-group">
							<label>Nit del cliente</label>
							<input class= "form-control" name = "nit_cliente" value = "<?php echo set_value ('nit_cliente');?>" type= "text" placeholder="Escriba el nit del cliente"/>
						</div>
					</div>
				</section>	
				<section class="row">
					<div class = "col-lg-6 col-lg-offset-3">
						<div class = "form-group">
							<label>Telefono de Cliente</label>
							<input class = "form-control" name="telefono_cliente" value = "<?php echo set_value ('telefono_cliente');?>" type="texto" placeholder="Escriba el numero de telefono de cliente">
						</div>
					</div>
				</section>	
				<section class="row">
				<div class = "col-lg-6 col-lg-offset-3">
					<div class = "form-group">
						<label>Correo Electronico de Cliente</label>
						<input class = "form-control" name= "correo_cliente" value = "<?php echo set_value ('correo_cliente');?>" type="email" placeholder="Escriba el correo electronico del cliente">
					</div>
				</div>
				</section>		
				<section class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<input class="btn btn-success" type="submit" value="Guardar" />
					</div>
				</section>
			</form>
		</section>
	</div>
</div>	