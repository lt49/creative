<?php
require_once __DIR__."/../model/dao/PersonaDao.php";

$json = file_get_contents("php://input");
$obj = json_decode($json);
//var_dump($obj);

$operation = $obj->op;
$mensaje;
$result;
$datos = array();

switch($operation){

    case "lstClientes":
        $datos = null;
        $dao = new PersonaDao();
        $result = $dao->lstClientes($obj);
        $datos = iterar_all($result);
        break;
    case "addClientes":
        $datos = null;
        $dao = new PersonaDao();
        $datos = array("estado"=>$dao->addClientes($obj->obj));
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