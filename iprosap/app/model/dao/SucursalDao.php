<?php
require_once __DIR__."/../util/Conecta.php";
class SucursalDao {

    private $cn;

    public function SucursalDao(){
        $this->cn = Conexion::getInstance();
    }

    public function getSucursalList(){
        $sql = "select * from terminal";
        $result = $this->cn->query($sql) or die("Error getTerminalList: ".$sql);
        $this->cn->close();
        return $result;
    }

    public function getFindSucursal($obj){
        settype($obj->idterminal, "Integer");
        $sql = "select * from terminal where idterminal = $obj->idterminal";
        $result = $this->cn->query($sql) or die("Error getFindTerminal: ".$sql);
        $this->cn->close();
        return $result;
    }


    public function addSucursal($obj){
        $flag = 0;
        settype($obj->terminal, "string");
        settype($obj->serie, "string");
        $sql = "insert into terminal(terminal, serie) values('$obj->terminal','$obj->serie')";
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error addTerminal: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }

    public function removeSucursal($obj){
        $flag = 0;
        settype($obj->idterminal, "Integer");
        $sql = "delete from terminal where idterminal=$obj->idterminal";
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error removeTransaccion: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }

    public function updateSucursal($obj){
        $flag = 0;
        settype($obj->idterminal, "Integer");
        settype($obj->terminal, "string");
        settype($obj->serie, "string");
        $sql = "update terminal set terminal = '$obj->terminal', serie = '$obj->serie' where idterminal=$obj->idterminal";
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error updateTerminal: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }

}
