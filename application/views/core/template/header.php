<!DOCTYPE html>
<html>
<head>
	<title>Sistema ...</title>

	<meta charset="utf-8">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/estilo_personalizado.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistema ... </a>
			</div>	
			<div class="container collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a class="active" href="/prueba/metodoPrueba">Item 1</a></li>
					<li><a href="#">Item 2</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" style="margin-right: 5px;">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Bienvenido, <?php #echo $nombre_usuario; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/loginhandler/logout">Cerrar sesión</a></li>
						</ul>
					</li>						
				</ul>
			</div>					
		</nav>
	</header>