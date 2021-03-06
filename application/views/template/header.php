<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AS ERP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/assets/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/assets/adminlte/dist/css/skins/_all-skins.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery_blockUI.js"></script>
    <script type="text/javascript" src="/assets/js/jqueryHelper.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="/inicio" class="navbar-brand"><b>AS</b> ERP</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <?php print (isset($menu)) ? $menu : ""; ?>
              </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="/assets/adminlte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs"><?php print $nombre_usuario; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <p>
                          <?php print $nombre_usuario; ?> - Web Developer
                          <small>Member since Nov. 2012</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                        </div>
                        <div class="pull-right">
                          <a href="/login/logout" class="btn btn-default btn-flat">Cerrar sesión</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>