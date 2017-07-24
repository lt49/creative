<?php
require_once __DIR__."/../util/Conecta.php";

class PersonaDao {

    private $cn = null;

    public function PersonaDao(){
    }
    
    public function lstClientes($obj){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $idsucursal = $_SESSION["idsucursal"];

        $sql = "SELECT * FROM integradb.persona where tipo = 'C' order by apellidopat";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error lstClientes: ");
        $this->cn->close();
        return $result;
    }
    
     public function addClientes($obj){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $galonesmx = $obj->galonesmx;
        if(!settype($obj->galonesmx, "Integer")){
            $galonesmx = 0;
        }
         
        $idsucursal = $_SESSION['idsucursal'];
        $sql = "INSERT INTO persona (`idsucursal`, `nombres`, `apellidopat`, `apellidomat`, `fecha_nac`, `genero`, `dni`, `placa`, `celular`, `email`, `distrito`, `importe_max`, `galones_max`, `tipo`, `estado`, `iduser`) ".
            "VALUES ($idsucursal, '$obj->nombres', '$obj->apaterno', '$obj->amaterno', '$obj->fechanac', '$obj->genero', '$obj->dni', '$obj->placa', '$obj->celular', '$obj->email', '$obj->distrito', $obj->montomx, $galonesmx, 'C', '1', 1);";
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error addCredito: '.$this->cn->query($sql);
        }else{            
            $flag = 1;               
        }

        $this->cn->close();
        return $flag;
    }
}