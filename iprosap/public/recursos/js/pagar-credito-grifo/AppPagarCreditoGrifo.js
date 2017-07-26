app.controller("PagarCredito-grifo", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce){
    //ajax.getDatePE();
    //alert("Hi LiveReload!");
    $scope.docEstado = true;
    $scope.placaEstado = false;
    $scope.dniEstado = true;
    ajax.docfind = $scope.docfind;
    //$scope.btnwarning = ajax.btnwarning;

    $scope.$watch("docEstado", function(){
        if($scope.docEstado){
            $scope.dniEstado = true;
            ajax.docEstado = true;
            $timeout(function() { $scope.placaEstado = false; }, 230);
        }else{
            $scope.placaEstado = true;
            ajax.docEstado = false;
            //$scope.dniEstado = false;
            $timeout(function() { $scope.dniEstado = false; }, 230);
        }
    });

    $scope.buscarCliente = function ($event) {
        var keyCode = $event.which || $event.keyCode;
        if (keyCode === 13) {
            $scope.buscar();

        }
    }

//***********************************************************************

    $scope.urlfind = "app/controller/ajaxCredito.php";
    //$scope.clienteData = [];


    $scope.buscar = function(){
        ajax.document = $scope.documento;
        $scope.documento = "";
        /*$scope.tiempoAjax = 40000;
        $timeout(function() { ajax.estadoCGHoy = false; }, $scope.tiempoAjax);
        $timeout(function() { ajax.estadoCGDeuda = false; }, $scope.tiempoAjax);*/

        //busqueda y validacion de cliente
        //Clienbte EXISTE
        $scope.findCliente = function(){
            $scope.docEstado = ajax.document.length===8?false:true;
            ajax.objlist.getList("findCliente",$scope.urlfind,ajax.document,$scope.docEstado, "", "", "", "", "", "", "")
            .then(function(data){
                if(data.data.estado_cd){
                    ajax.DataCliente = data.data;
                    ajax.estadoCGCliente = true;
                    ajax.estadoCGDeuda = true;
                    $log.log("DATA CLIENTE");
                    $log.log(data.data[0].idpersona);
                    $scope.findCreditosDeudas(data.data[0].idpersona);
                    
                    //$state.go("pagar-credito-grifo.deuda");
                }else{
                    ajax.estadoCGHoy = false;
                    msjErrorB(e1_head, e12_body, 2000);
                    $state.go("pagar-credito-grifo");
                }
            })
            .catch(function(error){
                    alert(error);
            });
        }

        $scope.findCliente();

        $scope.findCreditosDeudas = function(idpersona){
            ajax.objlist.getList("findCreditosDeudas","app/controller/ajaxCredito.php","", idpersona, "","","","","","","")
            .then(function(data){
                //alert("Productos buscando");
                $log.log("ajax Se encontro deudas de credito");
                //$log.log(data.data.length);
                if(data.data.length == 0){                   
                    alert("No tiene Deuda!");
                }else{
                    ajax.estadoCGDeudaPagar = true;
                    $state.go("pagar-credito-grifo.deuda");
                }                
            })
            .catch(function(error){
                    alert(error);
            });
        }




    }
});















