app.controller("CGcliente", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce,$stateParams){

    if(!ajax.estadoCGCliente){
        $state.go("credito-grifo");
    }else{
        $scope.foto = ajax.DataCliente[0].foto;
        $scope.nombres = ajax.DataCliente[0].nombres;
        $scope.apellidopat = ajax.DataCliente[0].apellidopat;
        $scope.apellidomat = ajax.DataCliente[0].apellidomat;
        $scope.dni = ajax.DataCliente[0].dni;
        $scope.placa = ajax.DataCliente[0].placa;
        $scope.semaforo = ajax.DataCliente[0].semaforo;
    }



});
