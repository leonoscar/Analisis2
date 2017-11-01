<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Perfiles
			<small>Listado de perfiles</small>
			</h1>
		</section>

		<!-- Main content -->
		<section class="content">
			<section class="row">
				<div class="col-lg-8 col-lg-offset-2" id="mensaje_perfiles"></div>
			</section>
			<section class="row">
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<section class="row">
								<div class="col-lg-11">
									<h3 class="box-title">Perfiles del sistema AS</h3>		
								</div>
								<div class="col-lg-1">
									<button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" title="Agregar nuevo perfil"></button>					
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
								<tbody id="perfiles_body">
									<?php print $perfiles; ?>
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
				<h4 class="modal-title">Agregar nuevo perfil</h4>
			</div>
			<div class="modal-body">
				<section class="row" id="add_perfil_msg"></section>
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<form method="POST" id="form_perfil">
							<input type="hidden" name="id_perfil" id="id_perfil" value="0" />
							<div class="form-group">
								<label for="nombre_perfil">Nombre del perfil</label>
								<input class="form-control" name="nombre_perfil" type="text" placeholder="Escriba el nombre del perfil" />
							</div>
							<div class="form-group">
								<label for="descripcion">Descripción del perfil</label>
								<textarea class="form-control" name="descrip_perfil" id="descrip_perfil" placeholder="Escriba una descripción para el nuevo perfil">
								</textarea>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="cancelar" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="guardar_perfil">Guardar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="/application/views/seguridad/js/perfiles.js"></script>