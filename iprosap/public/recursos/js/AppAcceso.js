app.controller("Acceso", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $cookies){

    //$rootScope.btnwarning = "btn-warning";
    $log.log("Variable de Session: "+$cookies.get("UsuarioSess"));
    $scope.msj = "Menu Principal";
    $scope.getModulo = function(){
        ajax.objlist.getList("lstModulo", "app/controller/ajaxPrivilegio.php")
            .then(function(data){
                //$log.log(data.data);
                $scope.modulos = data.data;
            })
            .catch(function(error){
                alert(error);
            });
    }
    $scope.getModulo();

});


