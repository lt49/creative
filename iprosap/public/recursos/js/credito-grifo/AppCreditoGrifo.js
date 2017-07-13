app.controller("Credito-grifo", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce){
   
    $scope.docEstado = true;
    $scope.placaEstado = false;
    $scope.dniEstado = true;
    ajax.docfind = $scope.docfind;

    $scope.buscarCliente = function ($event) {
        var keyCode = $event.which || $event.keyCode;
        if (keyCode === 13) {
            $scope.buscar();

        }
    }

//***********************************************************************

    $scope.urlfind = "app/controller/ajaxCredito.php";

    $scope.buscar = function(){
        ajax.document = $scope.documento;
        $scope.documento = "";
        //busqueda y validacion de cliente
        //Clienbte EXISTE
        $scope.findCliente = function(){
            //$scope.docEstado = ajax.document.length===8?false:true;
            ajax.objlist.getList("findCliente",$scope.urlfind,ajax.document,$scope.docEstado, "", "", "", "", "", "", "")
            .then(function(data){
                if(data.data.estado_cd){
                    ajax.DataCliente = data.data;
                    //busqueda y validación de credito por dia del cliente                    
                    ajax.estadoCGCliente = true;
                    ajax.Verf_deudaCreditoGrifo("findCreditoGrifo");                    
                }else{
                    ajax.estadoCGHoy = false;
                    msjErrorB(e1_head, e12_body, 5000);
                    $state.go("credito-grifo");
                    //alert("No es miembro de IPROSAP");
                }
            })
            .catch(function(error){
                    alert(error);
            });
        }

        $scope.findCliente();




        //busqueda y validación de credito por dia del cliente
        /*$scope.findCreditoNow = function(){
            ajax.objlist.getList("findCreditoHoy",$scope.urlfind,$scope.docfind,$scope.docEstado)
            .then(function(data){
                $log.log("ajax credito diario");
                $log.log(data.data);

                if(data.data.estado_cd){
                    //alert("ya saco credito HOY!");
                    msjErrorB(e1_head, e11_body, 2500);
                    ajax.estadoCGHoy = true;
                    //----- /hoy - CTRL: CGHoy - PHP: cg-findCreditoHoy.php
                    $state.go("credito-grifo");
                }else{
                    ajax.estadoCGHoy = false;
                    alert("No tiene credito HOY!");
                    //busqueda de todos los creditos sin pagar del cliente
                    $scope.findCreditoGrifo();
                }
            })
            .catch(function(error){
                    alert(error);
            });
        }

*/




        /*busqueda de todos los creditos sin pagar del cliente*/
      /*  $scope.findCreditoGrifo = function(){
            ajax.objlist.getList("findCreditoGrifo",$scope.urlfind,$scope.docfind,$scope.docEstado)
            .then(function(data){
                $log.log("ajax deuda credito");
                $log.log(data.data);

                if(data.data.estado_cd){
                    //alert("Tiene deuda de Credito");
                    ajax.estadoCGDeuda = true;
                    //----- /deuda - CTRL: CGDeuda - PHP: cg-findCreditoDeuda.php
                    $state.go("credito-grifo.deuda");
                }else{
                    ajax.estadoCGDeuda = false;
                    alert("No hay deuda de Credito");
                    //busqueda del pago diario del cliente
                    $scope.findPagoHoy();
                }

            })
            .catch(function(error){
                    alert(error);
            });
        }

*/


/*

        $scope.findPagoHoy = function(){
            ajax.objlist.getList("findPagoHoy",$scope.urlfind,$scope.docfind,$scope.docEstado)
            .then(function(data){
                $log.log("ajax pago diario");
                $log.log(data.data);

                if(data.data.estado_cd){
                    alert("No tiene deuda diaria");
                    ajax.estadoCGPagoDiario = false;

                    //busqueda y validación de credito por dia del cliente
                    $scope.findCreditoHoy();
                }else{
                    alert("Debe Pagar su Diario");
                    ajax.estadoCGPagoDiario = true;
                    //----- /diario - CTRL: CGcliente, CGPagoDiario - PHP: cg-findCreditoDeuda.php - JS: AppCGDiario.js
                    //$state.go("credito-grifo.diario");
                    //$state.go("credito-grifo.diario", {parametros: $scope.clienteData});
                    $state.go("credito-grifo.diario");
                }

            })
            .catch(function(error){
                    alert(error);
            });
        }*/



        //busqueda y validación de credito por dia del cliente
       /* $scope.findCreditoHoy = function(){
            ajax.objlist.getList("findCreditoHoy",$scope.urlfind,$scope.docfind,$scope.docEstado)
            .then(function(data){
                $log.log("ajax credito diario");
                $log.log(data.data);

                if(data.data.estado_cd){
                    alert("ya saco credito!, debe cancelar su Credito y esperar hasta mañana, para ser atendido nuevamente.");
                }else{

                    alert("Tiene derecho a credito!");
                    //se va al frm para otorgarle el credito
                    //$state.go("credito-grifo.credito", {parametros: $scope.clienteData});
                    $state.go("credito-grifo.credito");
                }

            })
            .catch(function(error){
                    alert(error);
            });
        }*/


    }
});















