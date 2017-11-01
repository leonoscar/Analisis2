<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Modulos
			<small>Listado de modulos</small>
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
				<div class="col-lg-8 col-lg-offset-2" id="mensaje_modulos"></div>
			</section>
			<section class="row">
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<section class="row">
								<div class="col-lg-11">
									<h3 class="box-title">Modulos del sistema AS</h3>		
								</div>
								<div class="col-lg-1">
									<button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" title="Agregar nuevo modulo"></button>					
								</div>
							</section>
							
						</div><!-- /.box-header -->
						<div class="box-body no-padding">
							<table class="table table-condensed">	
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="modulos_body">
									<?php print $modulos; ?>
								</tbody>
							</table>
						</div>
					</div>				
				</div>
			</section>
		</section>
	</div>
</div>	
       
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Agregar nuevo modulo</h4>
			</div>
			<div class="modal-body">
				<section class="row" id="add_modulo_msg"></section>
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<form method="POST" id="form_modulo">
							<input type="hidden" name="id_modulo" id="id_modulo" value="0" />
							<div class="form-group">
								<label for="nombre_modulo">Nombre del modulo</label>
								<input class="form-control" name="nombre_modulo" type="text" placeholder="Escriba el nombre del modulo" />
							</div>
							<div class="form-group">
								<label for="descripcion">Descripción del modulo</label>
								<textarea class="form-control" name="descrip_modulo" id="descrip_modulo" placeholder="Escriba una descripción para el nuevo modulo">
								</textarea>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="cancelar" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="guardar_modulo">Guardar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="/application/views/seguridad/js/modulos.js"></script>