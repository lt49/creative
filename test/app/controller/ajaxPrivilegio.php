<?php
require_once __DIR__."/../model/dao/PrivilegioDao.php";

$json = file_get_contents("php://input");
$obj = json_decode($json);
//var_dump($obj);
$operation = $obj->op;
$mensaje;
$result;
$datos = array();

switch($operation){
    case "lstModulo":
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $idusuario = isset($_SESSION["idusuario"])?$_SESSION["idusuario"]:"";
        $idrol = isset($_SESSION["idrol"])?$_SESSION["idrol"]:"";

        $datos = null;
        $dao = new PrivilegioDao();
        $result = $dao->getModulo($idusuario, $idrol);
        $result2;
        //$datos = iterar($result);


        $data = array();

        while($row = $result->fetch_assoc()){

            $value = array();
            $value["idmodulo"] = $row["idmodulo"];
            $value["modulo"] = $row["modulo"];
            $value["icono_mod"] = $row["icono_mod"];

            $idmodulo = $row["idmodulo"];
            $track_list = array();
            $result_track = $dao->getModuloDetalle($idusuario, $idrol, $idmodulo);

            while($row = $result_track->fetch_assoc()){
                $track_list_temp = array();
                $track_list_temp["modulo_detalle"] = $row["modulo_detalle"];
                $track_list_temp["icono_det"] = $row["icono_det"];
                $track_list_temp["action"] = $row["action"];
                array_push($track_list, $track_list_temp);
            }

            $value["detalle"] = $track_list;

            array_push($data, $value);
        }
        $datos = $data;

        break;

    case "lstMdetalle":
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $idusuario = isset($_SESSION["idusuario"])?$_SESSION["idusuario"]:"";
        $idrol = isset($_SESSION["idrol"])?$_SESSION["idrol"]:"";

        $datos = null;
        $dao = new PrivilegioDao();
        $result = $dao->getModulo($idusuario, $idrol);
        $datos = iterar($result);
        break;

}

function iterar($result){
    //$data = array();
    $value = array();
    $data;
    while($row = $result->fetch_assoc()){
        //$data[] = $row;
        /*$value = array(
            "idmodulo" => $row['idmodulo'],
            "modulo" => $row['modulo']
        );*/
        array_push($value,
            array("idmodulo" => $row['idmodulo'],
            "modulo" => $row['modulo'],
            "detalle" => array(
                    "idmodulo_detalle" => 1,
                    "modulo_detalle" => "Probando"
                )
            )
        );
    }
    return $value;
}

echo json_encode($datos);
