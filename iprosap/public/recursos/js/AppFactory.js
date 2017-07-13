app.factory("ajax", function($http, $q, $log, $state){
    var ajax = {};

    //ajax para listar y buscar
    ajax.objlist = {};
    ajax.objlist.getList = function (op, url, documento, idpersona, fecha, importe, precio, idproducto, idcredito, clave, obj){
        var defered = $q.defer();
        var promise = defered.promise;

        ajax.objlist.op = op;
        ajax.objlist.doc = documento;
        //ajax.objlist.estadoDoc = docEstado;
        ajax.objlist.idpersona = idpersona;
        ajax.objlist.fecha = fecha;
        ajax.objlist.importe = importe;
        ajax.objlist.precio = precio;
        ajax.objlist.idproducto = idproducto;
        ajax.objlist.idcredito = idcredito;
        ajax.objlist.clave = clave;
        ajax.objlist.obj = obj;
        $http.post(url, ajax.objlist)
        .then(function (data){
            defered.resolve(data);
        }, function(error){
            defered.reject(error);
        });
        return promise;
    }

    //----------------------------------
    ajax.DataCliente = [];


    ajax.estadoCredito = false;
    ajax.estadoCGCliente = false;
    ajax.estadoCGProducto = false;
    ajax.estadoCGDeuda = false;
    ajax.estadoCGPagoDiario = false;


    //ajax.docEstado = false;
    ajax.document = "";
    ajax.urlfind = "app/controller/ajaxCredito.php";
    //head_p1, body_pagar, btnTipo, showCancelButton, confirmButtonColor, cancelButtonColor, cbtn_pagar, cbtn_cancelar, btnOK, btnNO, buttonsStyling
    ajax.confirmMessage = function(head, body, tipo, btnCancelShow, btnOKcolor, btnNOcolor, btnOkText, btnNOText, btnOKcss, btnNOcss, btnStyle, OKheadText, OKbodyText, OKtype, NOheadText, NObodyText, NOtype, funcion){
        swal({
          title: head,
          text: body,
          type: tipo,
          showCancelButton: btnCancelShow,
          confirmButtonColor: btnOKcolor,
          cancelButtonColor: btnNOcolor,
          confirmButtonText: btnOkText,
          cancelButtonText: btnNOText,
          confirmButtonClass: btnOKcss,
          cancelButtonClass: btnNOcss,
          buttonsStyling: btnStyle
        }).then(function () {
            funcion();

        }, function (dismiss) {
          // dismiss can be 'cancel', 'overlay',
          // 'close', and 'timer'
          if (dismiss === 'cancel') {
            swal(
              NOheadText,
              NObodyText,
              NOtype
            )
          }
        });
    }

    ajax.creditosIDs = [];

    ajax.pagar = function(op, id, tipo){
        switch(op){
            case "pagarCreditos":
                $http({
                  method: 'POST',
                  url: ajax.urlfind,
                  data: {
                      op: "pagarCreditos"
                  },
                  params: {
                    id: JSON.stringify(ajax.creditosIDs) // ids is [1, 2, 3, 4]
                  }
                }).then(function successCallback(response) {
                    if(response.data.estado){
                        msjOkConfirm(ok1_head, ok6_body, 3500);                        
                        switch(tipo){
                            case "findpagar":
                                $state.go("pagar-credito-grifo");
                                break;
                            case "deudapagar":
                                ajax.Verf_creditoDadoHoy();
                                break;
                        }
                    }else{
                        msjNOConfirm(e1_head, e14_body+" MENSAJE: "+response.data, 10000);
                    }
                  }, function errorCallback(response) {
                    alert("Algo anda mal");
                  });
                break;
            case "pagarDiario":     //(op, url, documento, idpersona, fecha, importe, precio, idproducto, idcredito, clave, obj)
                ajax.objlist.getList("addPagoDiario",ajax.urlfind,"",id,"",0,"","","","","")
                .then(function(data){
                    if(data.data.estado){
                        msjOk(ok1_head, ok6_body, 2500);
                        ajax.estadoCGProducto = true;
                        $state.go("credito-grifo.credito");
                        
                    }else{
                        alert("No se pudo guardar!");
                    }
                })
                .catch(function(error){
                        alert(error);
                });
                break;
        }
        }

    ajax.validaConfirm = function(clave, op, id, tipo){
        ajax.objlist.getList("validarUserConfirm", ajax.urlfind, "", "", "", "", "", "", "",clave,"")
        .then(function(data){
            $log.log(data.data.estado);
            if(data.data.estado){
                //swal("Correcto!", "Tu clave es: " + clave, "success");
                ajax.pagar(op, id, tipo);
            }else{
                swal("Incorrecto!", "Clave errada", "error");
                return false;
            }
        })
        .catch(function(error){
                alert(error);
        });
    }

    ajax.frmlogin = function(op, id, tipo){
        swal({
          title: "Validar credenciales",
          text: "Debe ingresar su clave para completar la operación:",
          type: "password",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar",
          inputPlaceholder: "Ingrese clave"
        }, function (inputValue) {
          if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("Necesitas ingresar tu clave.");
            return false;
          }else{
              ajax.validaConfirm(inputValue, op, id, tipo);

          }
          /*if (inputValue === "luis4949") {
            swal("Correcto!", "Tu clave es: " + inputValue, "success");
          }else{
              swal("Incorrecto!", "Clave errada", "error");
              return false;
          }*/

        });
    }

    //°°°°°°°°°°°°°°°°°° CREDITOS °°°°°°°°°°°°°°°°°°°°°°°°°°°
    //BUSCA DEUDA DE CREDITOS
    ajax.Verf_deudaCreditoGrifo = function(op){
            ajax.objlist.getList(op, ajax.urlfind, ajax.document, "", "", "", "", "", "", "","")
            .then(function(data){
                /*$log.log("ajax deuda credito");
                $log.log(data.data);
                $log.log(ajax.document);*/
                if(data.data.estado_cd){
                    ajax.estadoCGDeuda = true;
                    $state.go("credito-grifo.deuda");
                }else{
                    ajax.estadoCGDeuda = false;
                    //alert("No hay deuda de Credito");
                    //busqueda del pago diario del cliente
                    ajax.Verf_creditoDadoHoy();
                }

            })
            .catch(function(error){
                    alert(error);
            });
        }
    //BUSCA SI YA SE OTORGO CREDITO
    ajax.Verf_creditoDadoHoy = function(){
            ajax.objlist.getList("findCreditoHoy", ajax.urlfind, ajax.document, "", "", "", "", "", "", "","")
            .then(function(data){
                /*$log.log("ajax credito diario");
                $log.log(data.data);*/

                if(data.data.estado_cd){
                    msjErrorB(e1_head, e11_body, 2500);
                    //ajax.estadoCGHoy = true;
                }else{
                    //ajax.estadoCGHoy = false;
                    //alert("No tiene credito HOY!");
                    ajax.Verf_pagoDiario();
                }
            })
            .catch(function(error){
                    alert(error);
            });
        }
    //BUSCA SI DEBE SU PAGO DIARIO
    ajax.Verf_pagoDiario = function(){
            ajax.objlist.getList("findPagoHoy", ajax.urlfind, ajax.document, "", "", "", "", "", "", "","")
            .then(function(data){
                /*$log.log("ajax pago diario");
                $log.log(data.data);*/

                if(data.data.estado_cd){
                    //alert("No tiene deuda diaria");
                    ajax.estadoCGPagoDiario = false;
                    ajax.estadoCGProducto = true;
                    $state.go("credito-grifo.credito");
                }else{
                    //alert("Debe Pagar su Diario");
                    ajax.estadoCGPagoDiario = true;
                    //----- /diario - CTRL: CGcliente, CGPagoDiario - PHP: cg-findCreditoDeuda.php - JS: AppCGDiario.js
                    //$state.go("credito-grifo.diario");
                    //$state.go("credito-grifo.diario", {parametros: $scope.clienteData});
                    $state.go("credito-grifo.diario");
                }

            })
            .catch(function(error){
                    alert(error);
            });
        }
    // LISTAR TODOS LOS CREDITOS
    ajax.LstCreditosGrifo = function(){
            ajax.objlist.getList("lstCreditoGrifo", ajax.urlfind, "", "", "", "", "", "", "", "", "")
            .then(function(data){
                /*$log.log("ajax deuda credito");
                $log.log(data.data);
                $log.log(ajax.document);*/
                if(data.data.estado_cd){
                    ajax.estadoCGDeuda = true;
                    $state.go("credito-grifo.deuda");
                }else{
                    ajax.estadoCGDeuda = false;
                    //alert("No hay deuda de Credito");
                    //busqueda del pago diario del cliente
                    ajax.Verf_creditoDadoHoy();
                }

            })
            .catch(function(error){
                    alert(error);
            });
        }
    
    
// ******************************** FIN CREDITOS *************************************************
    
    
    //ajax.btnwarning = "btn-warning";

    return ajax;

});
