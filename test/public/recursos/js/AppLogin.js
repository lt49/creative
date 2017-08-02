var app = angular.module("appLogin", ['ngCookies', 'ngSanitize']);
app.controller("ctr-login", function ($scope, $http, $timeout, $log, $cookies) {

    //|||||||||||||||||| FORM LOGIN |||||||||||||||||||||||||||||||||||||||||||

    //Funciona para desaparecer el alert
    $scope.loginAlertMessage = true;
    $scope.msjLogin = function(){
        $timeout(function () {
            $scope.loginAlertMessage = true;
        }, 4000);
    }

    //********************************************


    $scope.enviarFrmA = function ($event) {
        var keyCode = $event.which || $event.keyCode;
        if (keyCode === 13) {
            $scope.data.comprobar();
        }
    }

    $scope.redireccionar = function (rol) {
        var form = document.getElementById("frmlogin");
        var state = "dashboard";
        switch(rol){
            case "ADMIN":
                state = "dashboard";
                break;
            case "PLAYA":
                state = "despachopos";
                break;
            case "CREDITO":
                state = "credito";
                break;
        }
        document.getElementById("frmlogin").action = state;
        form.submit();
        
    }
    
    $scope.makeSerie = function(){
            $scope.text = "";
            $scope.possible = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789";

            for( var i=0; i < 10; i++ )
                $scope.text += $scope.possible.charAt(Math.floor(Math.random() * $scope.possible.length));

            return $scope.text;
    }
    
    //alert("Angular");
    $scope.data = {};
    $scope.data.comprobar = function () {
       // alert("Comprobando");
        $scope.data.op = "login";
        $http.post("app/controller/ajaxLogin.php", $scope.data)
           /* .success(function (res) {
                    if (res.msj == "valido") {
                        alert("OK! Usuario Correcto");
                        $scope.redireccionar();
                    } else {
                        $log.log(res);
                        alert("NO: "+res.msj);
                        $scope.msj = "<h4>Usuario / Contraseña Incorrecto.</h4>";
                        $scope.loginAlertMessage = false;
                        $scope.msjLogin();
                    }
                });*/

        .then(function (res) {
            $log.log(res.data);
            //alert("Angular entro al Callback");
            if (res.data.msj == "valido") {
                //alert("OK! Usuario Correcto");
                $cookies.put('UsuarioSess', $scope.makeSerie());
                $scope.redireccionar(res.data.rol);
            } else {
                //$log.log(res);
                //alert("NO: "+res.data.msj);
                $scope.msj = "<h4>Usuario / Contraseña Incorrecto.</h4>";
                $scope.loginAlertMessage = false;
                $scope.msjLogin();
            }
        }, function(error){
            //$log.log(res);
            //alert("NO ERROR: "+res.data.msj);
            $scope.msj = "<h4>Usuario / Contraseña Incorrecto.</h4>";
            $scope.loginAlertMessage = false;
            $scope.msjLogin();
        });
    }


});
