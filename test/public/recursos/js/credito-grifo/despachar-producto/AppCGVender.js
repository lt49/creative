app.controller("CGVender", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce, $stateParams){
    if(!ajax.estadoCredito){
        $state.go("credito-grifo");
    }else{
        $scope.urlfind = "app/controller/ajaxCredito.php";
        $scope.idpersona = ajax.DataCliente[0].idpersona;
        $scope.monto = ajax.DataCliente[0].monto;
        $scope.idproducto = ajax.DataCliente[0].idproducto;
        $scope.precio = ajax.DataCliente[0].precio;
        //$log.log("IDPERSONA AJAX: "+ajax.DataCliente[0].idpersona);


        $scope.addCredito = function() {
            ajax.objlist.getList("addCredito",$scope.urlfind,"", $scope.idpersona, "", $scope.monto, $scope.precio, $scope.idproducto)
                .then(function(data){
                //alert("intentando agregar!");
                    //$log.log("ajax Agregando Credito -->>>>");
                    $log.log(data.data);

                    if(data.data.estado){
                        //alert("Se guardo el credito :)");
                        msjOk(ok1_head, ok5_body, 2000);
                        //reseteamos las rutas para no mostrarlas
                        ajax.estadoCredito = false;
                        ajax.estadoCGCliente = false;
                        ajax.estadoCGProducto = false;
                        ajax.estadoCGDeuda = false;
                        ajax.estadoCGPagoDiario = false;

                        $state.go("credito-grifo");

                    }else{
                        //alert("No se pudo guardar el credito :(");
                        msjError(e1_head, e2_body, 2000);
                    }
                })
                .catch(function(error){
                        alert(error);
                });

        }


        if(!ajax.estadoCredito){

         }else{
            //$state.go("credito-grifo");
        }

        $scope.producto = ajax.DataCliente[0].producto;
        $scope.color = ajax.DataCliente[0].color;
        $scope.monto = ajax.DataCliente[0].monto;
        $scope.importe_max = ajax.DataCliente[0].importe_max;

    }



});
