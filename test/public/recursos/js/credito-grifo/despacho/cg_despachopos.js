app.controller("cg_despachopos", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce,$stateParams, $interval){
    $scope.dataDespacho = [];
    $scope.listDespacho = function(){
        ajax.objlist.getList("lstCreditosSinDespachar","app/controller/ajaxCredito.php","","", "", "", "", "", "", "", "")
        .then(function(res){
            $scope.dataDespacho = res.data;
           /* $log.log("::: lstCreditosSinDespachar :::");
            $log.log($scope.dataDespacho);
            $log.log("::: FIN lstCreditosSinDespachar :::");*/
        })
        .catch(function(error){
            $log.log(error.data);
                alert(error.data);
        });
    }
    
    $scope.listDespacho();
    
    //AJAX actualiza credito - lo despacha
    
    $scope.despacharProducto = function(id){
        ajax.objlist.getList("updtCreditoSinDespachar","app/controller/ajaxCredito.php","","", "", "", "", "", "", "", id)
        .then(function(res){
            
            if(res.data.estado==1){
                $scope.listDespacho();
                msjOk(ok1_head, ok7_body, 2000);
            }else{
                msjError(e1_head, e16_body, 2000);
            }
        })
        .catch(function(error){
            $log.log("Error despachar -------");
            $log.log(error.data);
            alert(error.data);
        });
    }
    $scope.refresh = function(){
        $scope.listDespacho();
    }
    //$interval(function(){ $scope.listDespacho(); },1000);

});