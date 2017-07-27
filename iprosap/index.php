<?php
if(empty($_GET["url"]) || $_GET["url"]=="inicio"){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once "app/core/SeguroCSRF_.php";
    $csrf = new SeguroCSRF_();
    $token = $csrf->getToken();
?>
<!DOCTYPE html>
<html lang="es" ng-app="appLogin">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IPROSAP | Log in</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="public/recursos/plugins/core/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/recursos/plugins/core/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/recursos/plugins/core/plugins/iCheck/square/blue.css">
  <!--Material icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
  <script type="text/javascript">
        function toggleFullScreen2(elem) {
    // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
</script> 
  <!--js-->
  <script charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js" type="application/javascript"></script>
  <script src="public/recursos/plugins/angularjs/angular-cookies.min.js"></script>
  <!--<script src="public/recursos/plugins/angularjs/angular.min.js"></script>-->
  <script charset="utf-8" src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.6.4/angular-sanitize.min.js" type="application/javascript"></script>

  <script charset="utf-8" src="public/recursos/js/AppLogin.js" type="application/javascript"></script>


</head>
<body id="full" class="hold-transition login-page" ng-controller="ctr-login">
<br>
<!--<button class="btn btn-info" onclick="viewPage()">Full Screen</button>
<input type="button" value="fullscreen2" onclick="toggleFullScreen2(document.body)">-->
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
<div class="login-box">
  <div class="login-logo">
    <a href="./inicio"><b>IPROSAP</b> - Tarapoto <i class="material-icons">android</i></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus credenciales para iniciar sesión</p>
    <form id="frmlogin" ng-keypress="enviarFrmA($event)" method="POST" action="credito">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" ng-model="data.usuario" required="" autofocus>
        <input type="hidden" class="form-control" value="<?=$token?>" name="token"/>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Clave" ng-model="data.clave" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="alert alert-danger animated bounce" role="alert" ng-hide="loginAlertMessage" ng-bind-html="msj">
            <!--mensaje error-->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button ng-click="data.comprobar()" type="button" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="public/recursos/plugins/core/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="public/recursos/plugins/core/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="public/recursos/plugins/core/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optionalsdasdasdsada
    });
  });
</script>

</body>
</html>
<?php
     }else{

        switch($_GET["url"]){
            case "cerrar":
            ?>
            <!DOCTYPE html>
            <html lang="en" ng-app="closeCookies">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <title>Document</title>
              <script charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js" type="application/javascript"></script>
              <script src="public/recursos/plugins/angularjs/angular-cookies.min.js"></script>
              <script>
              var app = angular.module("closeCookies", ['ngCookies']);
               app.controller("appCookies", function($scope, $cookies, $log) {
                 $log.log("Cerrando Varaible: "+$cookies.get('session'));
                 $cookies.remove("session");
                 $log.log("Varaible Cerrada: "+$cookies.get('session'));

                 alert("Cerrando!!!");
              });
              </script>
            </head>
            <body ng-controller="appCookies">

            </body>
            </html>

            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                session_unset();
                session_destroy();
                header("Location: inicio");
                break;
            case "dashboard":
                require_once "app/core/controllers.php";
                $token = isset($_REQUEST["token"])?$_REQUEST["token"]:"";
                $url = $_GET["url"];
                redirectController($url, $token);
                break;
            case "clientes":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "despachopos":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "despacho":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "roles":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "usuario":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "roles":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "rep_creditos":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "producto":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "credito":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "pagarcredito":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "pagarcredito/deuda":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "credito/vender":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "credito/deuda":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "credito/diario":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "credito/84":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "credito/90":
                require_once "app/core/UrlHelperAjax.php";
                break;
            case "fail":
                require_once "public/view/seguridad/accesoFail.php";
                break;
            default:
                //require_once "public/view/seguridad/404.php";
                require_once "app/core/controllers.php";
                    $token = isset($_REQUEST["token"])?$_REQUEST["token"]:"";
                    $url = $_GET["url"];
                    redirectController($url, $token);
                break;
        }


    }
?>
