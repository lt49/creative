app.controller("CGDeuda", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce, $stateParams){

    if(!ajax.estadoCGDeuda){
        $state.go("credito-grifo"); 
    }else{
            /*swal({
              title: "An input!",
              text: "Write something interesting:",
              type: "password",
              showCancelButton: true,
              closeOnConfirm: false,
              inputPlaceholder: "Write something"
            }, function (inputValue) {
              if (inputValue === false) return false;
              if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
              }
              swal("Nice!", "You wrote: " + inputValue, "success");
            });*/

        msjErrorB(e1_head, e13_body, 2000);
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
                $log.log(data.data);
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
        $scope.pagarCreditos = function(){
            ajax.frmlogin("pagarCreditos", 0, "deudapagar");
            /*ajax.confirmMessage(head_p1, body_pagar, btnTipo, showCancelButton, confirmButtonColor, cancelButtonColor, cbtn_pagar, cbtn_cancelar, btnOK, btnNO, buttonsStyling, HeadOKtext, BodyOKtext, TypeOKtext, HeadNOtext, BodyNOtext, TypeNOtext, $scope.Update);*/
        }

        /*$scope.Update = function(){
            ajax.frmlogin();
            $http({
              method: 'POST',
              url: $scope.urlfind,
              data: {
                  op: "pagarCreditos"
              },
              params: {
                id: JSON.stringify($scope.creditosIDs) // ids is [1, 2, 3, 4]
              }
            }).then(function successCallback(response) {
                //return response.data.estado;
                if(response.data.estado){
                    msjOkConfirm(ok1_head, ok6_body, 3500);
                    //cerifica si ya se otorgo el credito
                    ajax.Verf_creditoDadoHoy();
                }else{
                    msjNOConfirm(e1_head, e14_body+" MENSAJE: "+response.data, 10000);
                }
              }, function errorCallback(response) {
                alert("Algo anda mal");
              });
        }*/
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
