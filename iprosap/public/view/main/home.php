<!DOCTYPE html>
<html ng-app="app-iprosap">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="/iprosap/">
  <title>IPROSAP | Tarapoto</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.2/sweetalert2.min.css"  rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.2/sweetalert2.js" type="application/javascript"></script> -->

  <link href="public/recursos/plugins/sweetalert_bootstrap/sweetalert.css"  rel="stylesheet">
  <script type="application/javascript" src="public/recursos/plugins/sweetalert_bootstrap/sweetalert.js"></script>
  <!-- <link href="public/recursos/plugins/sweetalert/sweetalert.css"  rel="stylesheet">
  <script src="public/recursos/plugins/sweetalert/sweetalert-dev.js" type="application/javascript"></script> -->

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="public/recursos/plugins/core/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/recursos/plugins/core/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="public/recursos/plugins/core/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="public/recursos/plugins/AngularBootstrapToggle/angular-bootstrap-toggle.min.css">

  <link rel="stylesheet" href="public/recursos/css/iprosap.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-bootstrap-colorpicker/3.0.25/css/colorpicker.min.css">
  <link rel="stylesheet" href="public/recursos/plugins/AngularBootstrapCalendar/css/angular-bootstrap-calendar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

  <!-- material design -->
  <!-- <link rel="stylesheet" href="public/recursos/plugins/MaterialDesign/css/bootstrap-material-design.css">
  <link rel="stylesheet" href="public/recursos/plugins/MaterialDesign/css/ripples.css"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="public/recursos/plugins/angularjs/angular-cookies.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.6.4/angular-sanitize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.4.0/angular-ui-router.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/i18n/angular-locale_es-pe.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular-animate.min.js"></script>
  <script src="public/recursos/plugins/AngularBootstrapCalendar/bootstrap-colorpicker-module.min.js"></script>
  <script src="public/recursos/plugins/AngularBootstrapCalendar/angular-bootstrap-calendar-tpls.min.js" type="application/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.4.0/ui-bootstrap-tpls.min.js"></script>

  <script src="public/recursos/plugins/AngularBootstrapToggle/angular-bootstrap-toggle.min.js" type="application/javascript"></script>
  <script src="public/recursos/plugins/AngularMask/ngMask.js" type="application/javascript"></script>


  



  <script src="public/recursos/js/Iprosap_alerts.js" type="text/javascript" charset="utf-8" async defer></script>
  <script charset="utf-8" src="public/recursos/js/AppAngular.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/AppFactory.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/AppAcceso.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/AppDashboard.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/mantenimiento/CGClientes.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/mantenimiento/usuario/MGusuario.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/mantenimiento/roles/MGroles.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/mantenimiento/producto/MGproducto.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/AppCreditoGrifo.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/pago-diario/AppCGPagoDiario.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/AppCGcliente.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/despachar-producto/AppCGProducto.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/despachar-producto/AppCGVender.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/pago-deuda/AppCGDeuda.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/despacho/cg_despachopos.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/credito-grifo/despacho/cg_despacho.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/reportes/creditos/RGcreditos.js" type="application/javascript"></script>

  <script charset="utf-8" src="public/recursos/js/pagar-credito-grifo/AppPagarCreditoGrifo.js" type="application/javascript"></script>
  <script charset="utf-8" src="public/recursos/js/pagar-credito-grifo/AppCGDeudaPagar.js" type="application/javascript"></script>

</head>
<body class="hold-transition skin-black-light sidebar-mini sidebar-collapse">
    <div class="wrapper">
      <!--header app-->

      <?php include_once "homeHeader.php"; ?>
      <!-- Menu LEFT app ****************** -->
      <aside class="main-sidebar" ng-controller="Acceso">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU DE NAVEGACIÓN</li>

            <li class="active">
              <a ui-sref="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview" ng-repeat="mod in modulos">
              <a href="">
                <i class="{{mod.icono_mod}}"></i>
                <span>{{mod.modulo}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">
                <li ng-repeat="det in mod.detalle">
                    <a ui-sref="{{det.action}}"><i class="{{det.icono_det}}"></i> {{det.modulo_detalle}}</a>
                </li>
              </ul>
            </li>

            <!--<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Mantenimiento</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                    <a ui-sref="usuario"><i class="fa fa-user-circle-o"></i> Primero</a>
                </li><li>
                    <a ui-sref="usuario"><i class="fa fa-user-circle-o"></i> Segundo</a>
                </li><li>
                    <a ui-sref="usuario"><i class="fa fa-user-circle-o"></i> Tercero</a>
                </li>
              </ul>
            </li>-->


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<!-- Menu Left Fin  *************  -->

      <!-- Content Wrapper. Contains page content -->
      <div ui-view>

      </div>




      <!-- /.content-wrapper -->

      <?php include_once "homeFooter.php"; ?>


      <!-- Control Sidebar -->
      <?php include_once "homeSidebar.php"; ?>


      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="public/recursos/plugins/core/plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 3.3.6 -->
<script src="public/recursos/plugins/core/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="public/recursos/plugins/core/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="public/recursos/plugins/core/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="public/recursos/plugins/core/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="public/recursos/plugins/core/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="public/recursos/plugins/core/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="public/recursos/plugins/core/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="public/recursos/plugins/core/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="public/recursos/plugins/core/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="public/recursos/plugins/core/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="public/recursos/plugins/core/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/recursos/plugins/core/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="public/recursos/plugins/core/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="public/recursos/plugins/core/dist/js/demo.js"></script>

<script type="text/javascript">
    
    function viewPage() {
        var el = document.body;
        toggleFullScreen(el);
    }
    
    function toggleFullScreen(el){
        if(document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement){
           if(document.exitFullscreen){
              document.exitFullscreen();
            }else if(document.mozCancelFullScreen){
                document.mozCancelFullScreen();
            }else if(document.webkitExitFullscreen){
                document.webkitExitFullscreen();
            }else if(document.msExitFullscreen){
                document.msExitFullscreen();
            }
        }else{
           if(document.documentElement.requestFullscreen){
              el.requestFullscreen();
            }else if(document.documentElement.mozRequestFullScreen){
              el.mozRequestFullScreen();
            }else if(document.documentElement.webkitRequestFullscreen){
              el.webkitRequestFullscreen();
            }else if(document.documentElement.msRequestFullscreen){
              el.msRequestFullscreen();
            }
        }
    }
</script>
<!-- material design
<script src="public/recursos/plugins/MaterialDesign/js/material.js" type="application/javascript"></script>
<script src="public/recursos/plugins/MaterialDesign/js/ripples.js" type="application/javascript"></script>
<script>
     $.material.init();
</script>-->
</body>
</html>
