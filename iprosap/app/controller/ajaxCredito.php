<?php
require_once __DIR__."/../model/dao/CreditoDao.php";

$json = file_get_contents("php://input");
$obj = json_decode($json);
//var_dump($obj->obj->fechaIni);
//echo $obj->obj->fechaIni;

$operation = $obj->op;
$mensaje;
$result;
$datos = array();

switch($operation){

    case "findCliente":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findCliente($obj);
        $datos = iterar($result);
        break;

    case "findCreditoGrifo":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findCreditoGrifo($obj);
        $datos = iterar($result);
        break;

    /*case "findCliente":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findClienteCredito($obj);
        $datos = iterar($result);
        break;*/

    case "findPagoHoy":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findPagoHoy($obj);
        $datos = iterar($result);
        break;

    case "findCreditoHoy":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findCreditoHoy($obj);
        $datos = iterar($result);
        break;

    case "addPagoDiario":
        $datos = null;
        $dao = new CreditoDao();
        $datos = array("estado"=>$dao->addPagoDiario($obj));
        break;

    case "findProductoCredito":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findProductoCredito();
        $datos = iterar_all($result);
        break;

    case "addCredito":
        $datos = null;
        $dao = new CreditoDao();
        $datos = array("estado"=>$dao->addCredito($obj));
        break;

    case "findCreditosDeudas":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->findCreditosDeudas($obj);
        $datos = iterar_all($result);
        break;

    case "pagarCreditos":
        $objArray = json_decode($_REQUEST["id"]);
        //echo sizeof($objArray);
        //var_dump($objArray[1]->idcredito);
        $datos = null;
        $dao = new CreditoDao();
        $datos = array("estado"=>$dao->pagarCreditos($objArray));
        break;
        
    case "validarUserConfirm":
        $datos = null;
        $dao = new CreditoDao();
        $datos = array("estado"=>$dao->validarUserConfirm($obj));
        break;
        
    case "lstCreditosCrifo":
        $datos = null;
        $dao = new CreditoDao();
        $result = $dao->lstCreditosCrifo($obj);
        $datos = iterar_all($result);
        break;

}

function iterar($result){
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    $data["estado_cd"] = sizeof($data)==0?false:true;
    return $data;
}

function iterar_all($result){
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
}

echo json_encode($datos);
