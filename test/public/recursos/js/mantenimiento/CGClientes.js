app.controller("CGClientes", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax, $sce,$stateParams){
  
  $scope.dataPersona = [];
  //$scope.data = {};

  $scope.lsPersonal = function(){
    ajax.objlist.getList("lstClientes", "app/controller/ajaxPersona.php")
    .then(function(res){
      $scope.dataPersona = res.data;
      $log.log("**** LOG ajaxPersona ****");
      $log.log(res);
    })
    .catch(function(error){
        $log.log("**** LOG ERROR ajaxPersona ****");
        $log.log(error);
    });
  }

  $scope.lsPersonal();
  
  //agregar*********
  $scope.frm = {};
  $scope.frm.galonesmx = 0;
  $scope.save = function(){
      ajax.objlist.getList("addClientes", "app/controller/ajaxPersona.php", "", "", "", "", "", "", "", "", $scope.frm)
        .then(function(res){
          $log.log("**** LOG ADD ajaxPersona ****");
          $log.log(res);
          $scope.lsPersonal();
          $scope.frm = {};
        })
        .catch(function(error){
            $log.log("**** LOG ERROR ADD ajaxPersona ****");
            $log.log(error);
        });
      
      
      /*$log.log("****** DATA FRM ******");
      $log.log("nombres: "+$scope.frm.nombres);
      $log.log("apaterno: "+$scope.frm.apaterno);
      $log.log("amaterno: "+$scope.frm.amaterno);
      $log.log("dni: "+$scope.frm.dni);
      $log.log("placa: "+$scope.frm.placa);
      $log.log("fechanac: "+$scope.frm.fechanac);
      $log.log("genero: "+$scope.frm.genero);
      $log.log("celular: "+$scope.frm.celular);
      $log.log("email: "+$scope.frm.email);
      $log.log("direccion: "+$scope.frm.direccion);
      $log.log("distrito: "+$scope.frm.distrito);
      $log.log("montomx: "+$scope.frm.montomx);
      $log.log("galonesmx: "+$scope.frm.galonesmx);*/
      
      
  }
  
  $scope.$watch('frm.nombres', function(val) {
    $scope.frm.nombres = $filter('uppercase')(val);       
  }, true);
  $scope.$watch('frm.apaterno', function(val) {
    $scope.frm.apaterno = $filter('uppercase')(val);       
  }, true);
  $scope.$watch('frm.amaterno', function(val) {
    $scope.frm.amaterno = $filter('uppercase')(val);       
  }, true);
  $scope.$watch('frm.placa', function(val) {
    $scope.frm.placa = $filter('uppercase')(val);       
  }, true);
  $scope.$watch('frm.genero', function(val) {
    $scope.frm.genero = $filter('uppercase')(val);       
  }, true);
  $scope.$watch('frm.direccion', function(val) {
    $scope.frm.direccion = $filter('uppercase')(val);       
  }, true);
  $scope.$watch('frm.distrito', function(val) {
    $scope.frm.nombres = $filter('uppercase')(val);       
  }, true);
    
    

    
    
});