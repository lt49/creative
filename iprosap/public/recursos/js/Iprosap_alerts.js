function txtSoloNumeros(e) {
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key);
            numeros = "0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
            especiales = "8-37-38-39-46-16";//array
            tecladoEspecial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecladoEspecial = true;
                }
            }

            if (numeros.indexOf(teclado) == -1 && !tecladoEspecial) {
                return false;
            }
}
//-------------------------------------------------------------------------------
var head_delete = "Eliminado!";
var head_p1 = "¿Esta seguro de realizar esta operación?";

var body_delete = "Si usted lo elimina, no podra recuperar este registro!";
var body_pagar = "Si usted acepta, la deuda sera pagada bajo su responsabilidad."

var cbtn_delete = "Si, eliminar!";
var cbtn_pagar = "Si, pagar";
var cbtn_cancelar = "No, Cancelar";

//Colores de Botones Sweetalert2 y mas
var btnOK = "btn btn-success";
var btnNO = "btn btn-danger";
var btnTipo = "warning";
var showCancelButton = true;
var confirmButtonColor = "#3085d6";
var cancelButtonColor = "#d33";
var buttonsStyling = true;
var HeadOKtext = "Pagado!";
var BodyOKtext = "Ustede acaba de pagar la deuda del cliente.";
var TypeOKtext = "success";
var HeadNOtext = "Cancelado!";
var BodyNOtext = "No ha pagado la deuda, debido a que usted cancelo la operación.";
var TypeNOtext = "error";

var e1_head = "Oops...";
var e2_head = "Operación cancelada!";
var e1_body = "Debe llenar todos los campos requeridos. (*)";
//para errores de CRUD
var e2_body = "Ocurrio un error al registrar!";
var e3_body = "Ocurrio un error al cargar los datos!";
var e4_body = "Ocurrio un error al eliminar!";
var e5_body = "Ocurrio un error al actualizar!";
var e6_body = "No puedes eliminar el usuario con la cual iniciaste sessión!.";
var e7_body = "El nombre de USUARIO que intentas crear no esta permitido!.";
var e8_body = "Ocurrio un error al intentar cambiar la clave.";
var e9_body = "'Nueva clave' y 'Repetir clave', no coinciden.";
var e10_body = "La 'Clave antigua' no es correcta.";
//para creditos
var e11_body = "El cliente ya saco su credito hoy.";
var e12_body = "No existe el cliente!. Necesita ser registrado, por el Administrador de IPROSAP, si desea gozar de los beneficio.";
var e13_body = "Tiene deuda, primero debe cancelar.";
var e14_body = "Error al pagar la deuda, comunicar esto al ¡Administrador!.";
var e15_body = "Se ha excedido el monto máximo en crédito para esta persona. El monto debe ser menor o igual al *Monto máximo de credito aprovado*.";

//Mensajes de Exito
//para formularios y CRUD
var ok1_head = "Felicidades!";
var ok1_body = "Se registro Correctamente.";
var ok2_body = "Se elimino Correctamente.";
var ok3_body = "Se actualizo Correctamente.";
var ok4_body = "Se cambio su clave Correctamente.";
//para creditos
var ok5_body = "El credito fue registrado correctamente.";
var ok6_body = "Se pagó correctamente.";

//funciones para los mensajes
var msjErrorA = function(head, body){
    sweetAlert(head, body, "error");
};
var msjErrorB = function(head, body, tiempo){
    swal({
        title: head,
        text: body,
        type: "error",
        timer: tiempo,
        showConfirmButton: false
     });
};
var msjOk = function(head, body, tiempo){
    //timer: 1200,
    swal({
        title: head,
        text: body,
        type: "success",
        timer: tiempo,
        showConfirmButton: false
     });
};
var msjOkConfirm = function(head, body, tiempo){
    swal({
        title: head,
        text: body,
        type: "success",
        timer: tiempo,
        showConfirmButton: true
     });
};
var msjNOConfirm = function(head, body, tiempo){
    swal({
        title: head,
        text: body,
        type: "error",
        timer: tiempo,
        showConfirmButton: true
     });
};
var msjConfirm = function(ahead, abody, cbtn, bhead, bbody, func){
    swal({
        title: ahead,
        text: abody,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: cbtn,
        closeOnConfirm: false
      },
      function(isConfirm){
          if (isConfirm) {
              func();
              swal(bhead, bbody, "success");
          }

      });
}
