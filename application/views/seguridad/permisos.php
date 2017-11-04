<div class="content-wrapper">
	<div class="container">
	<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Gestión de permisos
			<small>Permisos globales para el sistema</small>
			</h1>

		</section>

		<!-- Main content -->
		<section class="content">
			<section class="row">
				<div class="col-lg-8 col-lg-offset-2" id="msg_asignacionpefil"></div>
			</section>
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">Perfiles</a></li>
					<li><a href="#tab_2" data-toggle="tab">Modulos</a></li>
					<li><a href="#tab_3" data-toggle="tab">Roles</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">
						<section class="row">
							<div class="col-lg-8 col-lg-offset-2">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="codigo_usuario">Codigo usuario</label>
										<input class="form-control" name="codusuario" id="codusuario" type="text" placeholder="Código" />
									</div>
								</div>
								<div class="col-lg-8">
									<div class="form-group">
										<label for="nombre_usuario">Nombre usuario</label>
										<input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre del usuario" disabled="" />
									</div>
								</div>
							</div>
						</section>
						<section class="row">
							<div class="col-lg-8 col-lg-offset-2">
								<div class="box">
									<div class="box-header">
										<section class="row">
											<div class="col-lg-11">
												<h3 class="box-title">Perfiles para asinar o asignados</h3>		
											</div>
										</section>
										
									</div><!-- /.box-header -->
									<div class="box-body no-padding">
										<table class="table table-condensed">	
											<thead>
												<tr>
													<th>Nombre del perfil</th>
													<th>Estado asignación</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody id="perfilesasig_body">
											</tbody>
										</table>
									</div>
								</div>									
							</div>							
						</section>
					</div><!-- /.tab-pane -->
					<div class="tab-pane" id="tab_2">
						<b>Contenido tab 2:</b>

					</div><!-- /.tab-pane -->
					<div class="tab-pane" id="tab_3">
						<b>Contenido tab 3:</b>

					</div><!-- /.tab-pane -->
				</div><!-- /.tab-content -->
			</div><!-- nav-tabs-custom -->
		</section>
	</div>
</div>	
<script type="text/javascript" src="/application/views/seguridad/js/permisos.js"></script>