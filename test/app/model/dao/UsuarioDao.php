<?php
require_once __DIR__."/../util/Conecta.php";
class UsuarioDao {

    private $cn;

    public function UsuarioDao(){
        $this->cn = (new Conecta)->getInstance();
    }



    public function validarUser($obj){
        $this->cn = (new Conecta)->getInstance();
        settype($obj->usuario, "string");
        settype($obj->clave, "string");
        $sql = "select * from userdata where usuario = '$obj->usuario' and clave = aes_encrypt('$obj->clave','ticla4949') and tipo = 'P'";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error validarUser: ");
        $this->cn->close();
        return $result;
    }


    public function getFechaNow(){
        $result = date('Y-m-d');
        return $result;
    }

    public function getHoraNow(){
        $result = date('H:i:s');
        return $result;
    }

    /*public function getUsuarioList(){
        $sql = "select * from usuario";
        $result = $this->cn->query($sql) or die("Error getUsuarioList: ".$sql);
        $this->cn->close();
        return $result;
    }

    public function getFindUsuario($obj){
        settype($obj->idusuario, "Integer");
        $sql = "select * from usuario where idusuario = $obj->idusuario";
        $result = $this->cn->query($sql) or die("Error getFindUsuario: ".$sql);
        $this->cn->close();
        return $result;
    }


    public function addUsuario($obj){
        $flag = 0;
        settype($obj->idterminal, "Integer");
        settype($obj->usuario, "string");
        settype($obj->clave, "string");
        settype($obj->rol, "string");
        $sql = "insert into usuario(idterminal, usuario, clave, rol) values($obj->idterminal, '$obj->usuario','$obj->clave','$obj->rol')";
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error addUsuario: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }

    public function removeUsuario($obj){
        $flag = 0;
        settype($obj->idusuario, "Integer");
        $sql = "delete from usuario where idusuario=$obj->idusuario";
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error removeUsuario: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }

    public function updateUsuario($obj){
        $flag = 0;
        settype($obj->idusuario, "Integer");
        settype($obj->idterminal, "Integer");
        settype($obj->usuario, "string");
        settype($obj->clave, "string");
        settype($obj->rol, "string");
        $sql = "update usuario set idterminal = $obj->idterminal, usuario = '$obj->usuario', clave = '$obj->clave', rol = '$obj->rol' where idusuario=$obj->idusuario";
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error updateUsuario: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }*/



    public function validarUserLocal($user, $pass){
        $flag = false;
        if($user == "root" and $pass == "46091556y0l1x"){
            $flag = true;
        }
        return $flag;
    }


    /*public function conectar(){
        if($this->cn->connect_errno){
            print "Fallo la conexion en UsuarioDAO: ".$this->cn->connect_errno;
        }else{
            print "Conexion OK!";
        }
    }*/

}
