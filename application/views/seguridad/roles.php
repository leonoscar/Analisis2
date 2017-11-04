<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Roles
			<small>Listado de roles</small>
			</h1>
		</section>

		<!-- Main content -->
		<section class="content">
			<section class="row">
				<div class="col-lg-8 col-lg-offset-2" id="mensaje_roles"></div>
			</section>
			<section class="row">
				<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<section class="row">
								<div class="col-lg-11">
									<h3 class="box-title">Roles del sistema AS</h3>		
								</div>
								<div class="col-lg-1">
									<button type="button" class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" title="Agregar nuevo rol"></button>					
								</div>
							</section>
							
						</div><!-- /.box-header -->
						<div class="box-body no-padding">
							<table class="table table-condensed">	
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Nombre submenu</th>
										<th>Link submenu</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="roles_body">
									<?php print $roles; ?>
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
				<h4 class="modal-title">Agregar nuevo rol</h4>
			</div>
			<div class="modal-body">
				<section class="row" id="add_rol_msg"></section>
				<form method="POST" id="form_rol">
					<section class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" id="item_menu" name="check_item_menu" />
										Item de menu
									</label>
								</div>	
							</div>							
						</div>
					</section>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<input type="hidden" name="id_rol" id="id_rol" value="0" />
							<div class="form-group">
								<label for="nombre_rol">Nombre del rol</label>
								<input class="form-control" name="nombre_rol" type="text" placeholder="Escriba el nombre del rol" />
							</div>
							<div class="form-group">
								<label for="descripcion">Descripción del rol</label>
								<textarea class="form-control" name="descrip_rol" id="descrip_rol" placeholder="Escriba una descripción para el nuevo rol"></textarea>
							</div>
						</div>
					</div>
					<section class="row" id="form_submenu"></section>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="cancelar" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="guardar_rol">Guardar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="/application/views/seguridad/js/roles.js"></script>