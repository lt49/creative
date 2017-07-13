<?php
require_once "config.php";

class Conecta {
    private $cn;

    public function Conecta(){

    }

    function getInstance(){
        $cn = new mysqli(HOST, USER, PASS, DB);
        if($cn->connect_errno){
            die ("Error de Conexion: ".$cn->connect_errno);
        }else{
            return $cn;
        }
        $this->cn->set_charset("utf8");
    }
}
