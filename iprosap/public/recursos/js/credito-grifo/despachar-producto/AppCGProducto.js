app.controller("CGProducto", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce, $stateParams){
    if(!ajax.estadoCGProducto){
        $state.go("credito-grifo");
    }else{
        $scope.urlfind = "app/controller/ajaxCredito.php";
        $scope.cliente = [];
        $scope.productosCred = [];
        $scope.importe_max = ajax.DataCliente[0].importe_max;
        $scope.idpersona = ajax.DataCliente[0].idpersona;

        $scope.findProductoCredito = function(){
            ajax.objlist.getList("findProductoCredito",$scope.urlfind,$scope.documento)
            .then(function(data){
                //alert("Productos buscando");
                $log.log("ajax Se encontro productos de credito");
                $log.log(data.data);
                $scope.productosCred = data.data;
            })
            .catch(function(error){
                    alert(error);
            });
        }

        $scope.findProductoCredito();



        $scope.addParam = function(prod, color, monto, idproducto, precio){
            $scope.cliente.push({
                idpersona: ajax.DataCliente[0].idpersona,
                foto: ajax.DataCliente[0].foto,
                nombres: ajax.DataCliente[0].nombres,
                apellidopat: ajax.DataCliente[0].apellidopat,
                apellidomat: ajax.DataCliente[0].apellidomat,
                dni: ajax.DataCliente[0].dni,
                placa: ajax.DataCliente[0].placa,
                semaforo: ajax.DataCliente[0].semaforo,
                producto: prod,
                color: color,
                monto: monto,
                importe_max: $scope.importe_max,
                idproducto: idproducto,
                precio: precio
            });
            ajax.DataCliente = $scope.cliente;
        }



        $scope.cg_CreditoMove = function(idproducto, precio, producto, color){
            //$state.go("credito-grifo.90", {parametros: $scope.cliente});
            if($scope.cg_montoProd>0){
                if($scope.cg_montoProd>$scope.importe_max){
                    msjNOConfirm(e1_head, e15_body, 5000);
                    //alert("Se ha excedido el monto máximo en crédito para esta persona. El monto debe ser menor o igual al *Monto máximo de credito aprovado*.");
                }else{
                    $scope.addParam(producto, color, $scope.cg_montoProd, idproducto, precio);
                    ajax.estadoCredito = true;
                    $state.go("credito-grifo.vender");
                }

            }else{
                alert("El monto debe ser mayor a 0.");
            }
        }
    }


});
