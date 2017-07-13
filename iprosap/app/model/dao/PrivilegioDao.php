<?php
require_once __DIR__."/../util/Conecta.php";

class PrivilegioDao {

    private $cn;

    public function PrivilegioDao(){
        $this->cn = (new Conecta)->getInstance();
    }

    public function getModulo($idusuario, $idrol){
        settype($idusuario, "Integer");
        settype($idrol, "Integer");
        $sql = "SELECT distinct idmodulo, modulo, icono_mod FROM acceso where idusuario = $idusuario and idrol = $idrol order by modulo";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error getModulo: ");
        $this->cn->close();
        return $result;
    }

    public function getModuloDetalle($idusuario, $idrol, $idmodulo){
        $this->cn = (new Conecta)->getInstance();
        settype($idusuario, "Integer");
        settype($idrol, "Integer");
        settype($idmodulo, "Integer");
        $sql = "SELECT distinct modulo_detalle, icono_det, action FROM acceso where idusuario = $idusuario and idrol = $idrol and idmodulo = $idmodulo order by modulo_detalle";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error getModuloDetalle: ".$sql);
        $this->cn->close();
        return $result;
    }



}
