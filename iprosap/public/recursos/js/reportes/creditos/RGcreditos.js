app.controller("RGcreditos", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax){
   //*********************************************************************  
 $scope.objlist = {};

//*********************** LISTA CREDITOS *******************************************************************
    $scope.objlist.getList = function (){
        $scope.op = "lstCreditosCrifo";
        return ajax.objlist.getList($scope.op, ajax.urlfind, "", "", "", "", "", "", "", "", $scope.objlist);
    }
 
    $scope.lst = [];
    
    $scope.clean = function(){
        $scope.lst = [];     
    }
    
    $scope.lstObj = function(){  
        $log.log("--- Entrando al listar -----");
        $scope.objlist.getList()
            .then(function(data){
               for(var i=0;i<data.data.length;i++){
                    $scope.lst.push(data.data[i]);
                }
                $log.log("--- nuevo arreglo2 -----");
                $log.log(data.data);
            $log.log("--- LST -----");
                $log.log($scope.lst.length);
            })
            .catch(function(err){
                msjError(e2_head, err);
            $log.log("--- ERROR -----");
            });
    }
    $scope.lstObj(); 
    $log.log("--- AAAAAAAAAAAAAAAAAAA -----");
//*********************** FIN LISTA CREDITOS *******************************************************************  

//.......................... Date-Picker Angular ........................
    $scope.today = function() {
      $scope.dtIni = new Date();
      $scope.dtFin = new Date();
      $scope.objlist.fechaIni = $filter("date")(new Date(), "yyyy-MM-dd");
      $scope.objlist.fechaFin = $filter("date")(new Date(), "yyyy-MM-dd");
    };
    $scope.today();

    $scope.inlineOptions = {
      customClass: getDayClass,
      minDate: new Date(),
      showWeeks: true
    };

    $scope.dateOptions = {
      dateDisabled: disabled,
      formatYear: 'yy',
      maxDate: new Date(2050, 5, 22),
      minDate: new Date(),
      startingDay: 1
    };
    
    function disabled(data) {
      var date = data.date,
        mode = data.mode;
      return mode === 'day' && (date.getDay() === 0 || date.getDay() === 6);              
    }

    $scope.toggleMin = function() {
      $scope.inlineOptions.minDate = $scope.inlineOptions.minDate ? null : new Date();
      $scope.dateOptions.minDate = $scope.inlineOptions.minDate;
    };

    $scope.toggleMin();

    $scope.open = function() {
      $scope.popup.opened = true;

    };
    $scope.open2 = function() {
      $scope.popup.opened2 = true;

    };

    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];
    $scope.altInputFormats = ['M!/d!/yyyy'];

    $scope.popup = {
      opened: false,
      opened2:false
    };

    function getDayClass(data) {
      var date = data.date,
        mode = data.mode;
      if (mode === 'day') {
        var dayToCheck = new Date(date).setHours(0,0,0,0);

        for (var i = 0; i < $scope.events.length; i++) {
          var currentDay = new Date($scope.events[i].date).setHours(0,0,0,0);

          if (dayToCheck === currentDay) {
            return $scope.events[i].status;
          }
        }
      }

      return '';
    }

    $scope.chgFecha = function(){
        $scope.objlist.fechaIni = $filter("date")($scope.dtIni, "yyyy-MM-dd"); 
        $scope.objlist.fechaFin = $filter("date")($scope.dtFin, "yyyy-MM-dd");
        console.log("Inicio: "+$scope.dtIni);
        console.log("Fin: "+$scope.dtFin);
        $scope.clean();
        $scope.lstObj();
        $scope.todosFiltrado = $scope.lst;
    }
 //.......................... FIN Date-Picker Angular ........................    
    
    
//BUSQUEDA Y FILTRADO DE DATOS ****************************************************
    $scope.todosFiltrado = $scope.lst;
    $scope.bigTotalItems = $scope.lst.length;
    $log.log("logitud Arreglo:"+$scope.lst.length);
    
    $scope.bigCurrentPage = 1;
    $scope.maxSize = function(){
      var maximo = Math.ceil($scope.lst.length / $scope.numPerPage);
      var maxvisible = 5;
      if(maximo>maxvisible){
          maximo = maxvisible;
      }
      return maximo;
    }
    $scope.paginas = 0;
    $scope.$watch('bigCurrentPage + numPerPage + txtbuscar', function(){
      $scope.formarTabla();
      $log.log("---$scope.lst----");
      $log.log($scope.lst);
    });

    $scope.formarTabla = function(){
      var inicio = (($scope.bigCurrentPage-1)*$scope.numPerPage), fin = inicio + ($scope.numPerPage*1);
        $scope.paginas = inicio;
        $scope.lst = $filter("filter")($scope.todosFiltrado, $scope.txtbuscar);
        $log.log("logitud Arreglo B:"+$scope.lst.length);
        $log.log("***** Arreglo *****");
        //$log.log($scope.filteredTodos);
        //$scope.clean();
    }  
    
 $scope.$watch('txtbuscar', function(val) {
        $scope.txtbuscar = $filter('uppercase')(val);
  }, true);   
 //************** FIN BUSQUEDA Y FILTRADO DE DATOS ****************************************************   
    
    
});
