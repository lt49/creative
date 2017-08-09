app.controller("CGDeudaPagar", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce, $stateParams){

    if(!ajax.estadoCGDeudaPagar){
        $state.go("pagar-credito-grifo");        
    }else{

        //msjErrorB(e1_head, e13_body, 2000);
        $scope.urlfind = "app/controller/ajaxCredito.php";
        $scope.DeudasCred = [];
        //$scope.creditosIDs = [];
       /* $scope.importe_max = ajax.DataCliente[0].importe_max;*/
        $scope.idpersona = ajax.DataCliente[0].idpersona;
        $scope.total = 0;

        $scope.findCreditosDeudas = function(){
                                //(op, url, documento, docEstado, idpersona, fecha, importe, precio, idproducto)
            ajax.objlist.getList("findCreditosDeudas",$scope.urlfind,"",$scope.idpersona, "","","","")
            .then(function(data){
                //alert("Productos buscando");
                $log.log("ajax Se encontro deudas de credito");
                //$log.log(data.data.length);
                if(data.data.length == 0){
                   
                    $state.go("pagar-credito-grifo");
                    alert("No tiene Deuda!");
                }
                $scope.DeudasCred = data.data;

                $log.log($scope.DeudasCred.length);
                $scope.getTotal(data.data.cantidad, data.data.precio);
            })
            .catch(function(error){
                    alert(error);
            });
        }

        $scope.getTotal = function(cantidad, precio){
            for(var i=0;i<$scope.DeudasCred.length;i++){
                $scope.total += ($scope.DeudasCred[i].cantidad * $scope.DeudasCred[i].precio);
                ajax.creditosIDs.push({
                    idcredito: $scope.DeudasCred[i].idcred_iprosap
                });
            }
        }

        $scope.findCreditosDeudas();

        //Se encarga de pagar los creditos
        $scope.count = 0;
        $scope.pagarCreditos = function(){
            $scope.count++;
            if($scope.count ==1){
                ajax.frmlogin("pagarCreditos", 0,"findpagar");               
            }
        }

        
    }



















    // Codigo multiple Inserts Angular/Front end con timeout
    /*var x = 0;
    $scope.delayBucle = function(){
         $timeout(function() {
             $scope.updtCreditos($scope.creditosIDs[x].idcredito);
             alert("Insert "+(x+1));
             x++;

            if(x<5){
               $scope.delayBucle();
               }
        }, 2000);
     }

    $scope.updtCreditos = function(idcredito){
        alert(idcredito);
        ajax.objlist.getList("pagarCreditos",$scope.urlfind,"", "", "", "", 0, 0, 0, idcredito)
            .then(function(data){
                if(data.data.estado){
                    msjOk(ok1_head, ok6_body, 3000);
                    //$state.go("credito-grifo");
                }else{
                    alert("Holaaaaaa");
                    msjErrorB(e1_head, e2_body, 3000);
                }
            })
            .catch(function(error){
                    alert(error);
            });
    }*/




});
