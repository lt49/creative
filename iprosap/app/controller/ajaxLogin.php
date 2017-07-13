<?php
require_once __DIR__."/../model/dao/UsuarioDao.php";
require_once __DIR__."/../model/dao/SucursalDao.php";

/*if ( isset($_GET['differentiate page']) ) {
    if ( empty($_SERVER['HTTP_X_REQUESTED_WITH']) ) {
        echo 'this is a ajax request';
    }
    else {
        echo 'this is not a ajax request';
    }
}
else {
    echo 'this is not a ajax request';
}*/

$json = file_get_contents("php://input");
$obj = json_decode($json);
$user = $obj->usuario;
$clave = $obj->clave;
$idusuario;
$sucursal;
$idusuario;
$usuario;
$idpersona;
$nombres;
$apellidopat;
$apellidomat;
$idrol;
$rol;
$foto;
$mensaje;

$dao = new UsuarioDao();
$datos = array();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if($dao->validarUserLocal($user, $clave)){
    $_SESSION["usuario"] = $user;
    $_SESSION["rol"] = "root";
    $mensaje = array("msj"=>"valido", "usuario"=>$user);
    echo json_encode($mensaje);

}else{
    $result = $dao->validarUser($obj);

    while($row = $result->fetch_assoc()){
        $datos[] = $row;
        $idsucursal = $row["idsucursal"];
        $sucursal = $row["sucursal"];
        $idusuario = $row["idusuario"];
        $usuario = $row["usuario"];
        $idpersona = $row["idpersona"];
        $nombres = $row["nombres"];
        $apellidopat = $row["apellidopat"];
        $apellidomat = $row["apellidomat"];
        $idrol = $row["idrol"];
        $rol = $row["rol"];
        $foto = $row["foto"];
    }
    if(sizeof($datos)==0){
        $mensaje = array("msj"=>"invalido");
        echo json_encode($mensaje);
    }else{
        /*$dao = new TerminalDao();*/


        /*$t = new test();
        $t->setIdterminal($idterminal);


        $result = $dao->getFindTerminal($t);*/

       /* while($fila = $result->fetch_assoc()){
            $serie = $fila["serie"];
            $terminal = $fila["terminal"];
        }  */

        $_SESSION["idsucursal"] = $idsucursal;
        $_SESSION["sucursal"] = $sucursal;
        $_SESSION["idusuario"] = $idusuario;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["idpersona"] = $idpersona;
        $_SESSION["nombres"] = $nombres;
        $_SESSION["apellidopat"] = $apellidopat;
        $_SESSION["apellidomat"] = $apellidomat;
        $_SESSION["idrol"] = $idrol;
        $_SESSION["rol"] = $rol;
        $_SESSION["foto"] = $foto;
        $_SESSION["name_comercial"] = "IPROSAP";



        $mensaje = array("msj"=>"valido", "usuario"=>$user);
        echo json_encode($mensaje);
    }
}


/*class test{
    public $idterminal;
    public function test(){

    }

    public function setIdterminal($id){
        $this->idterminal = $id;
    }
}*/
