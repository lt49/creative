// ------ /diario   PHP: cg-findPagoDiario.php ----------------
app.controller("CGPagoDiario", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce,$stateParams){

    if(!ajax.estadoCGPagoDiario){
        $state.go("credito-grifo");

    }else{
        $scope.urlfind = "app/controller/ajaxCredito.php";

        //$scope.getDatePE();
            $scope.idpersona = ajax.DataCliente[0].idpersona;
            $scope.count = 0;
            $scope.pagarDiario = function(){
                $scope.count++;
                if($scope.count==1){
                    ajax.frmlogin("pagarDiario", $scope.idpersona);                    
                }


                //se otorga el credito
                /*ajax.objlist.getList("addPagoDiario",$scope.urlfind,"","",$scope.idpersona,"",0)
                .then(function(data){
                    //$log.log("ajax Pagando diario>>>>");
                    //$log.log(data.data);

                    if(data.data.estado){
                        //alert("Se guardo el pago.");
                        //msjConfirm(ok1_head, ok6_body, cbtn, bhead, bbody, func)
                        //ajax.confirmMessage();
                        msjOk(ok1_head, ok6_body, 2500);
                        ajax.estadoCGProducto = true;
                        $state.go("credito-grifo.credito");

                    }else{
                        alert("No se pudo guardar!");
                    }
                })
                .catch(function(error){
                        alert(error);
                });*/

            }

        }



});


