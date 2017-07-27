<header class="main-header">
    <!-- Logo -->
    <a href="dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?=$_SESSION["name_comercial"]?></b> - Tarapoto</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!--<li>
              <button class="btn btn-default btn-sm" onclick="viewPage()">
                  <i class="fa fa-arrows-alt" aria-hidden="true"></i>
              </button>      
          </li>-->




          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= FOTO_PATH.$_SESSION["foto"] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= ucfirst(strtolower($_SESSION["nombres"])) ?> <?= ucfirst(strtolower($_SESSION["apellidopat"])) ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=FOTO_PATH.$_SESSION["foto"]?>" class="img-circle" alt="User Image">

                <p>
                  <?= ucfirst(strtolower($_SESSION["nombres"])) ?> <?= ucfirst(strtolower($_SESSION["apellidopat"])) ?> - <?= $_SESSION["rol"] ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Seguidores</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Ventas</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Amigos</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <form action="cerrar" method="get" >
                    <button type="submit" class="btn btn-default btn-flat">Salir
                    </button>
                  </form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
