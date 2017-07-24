<?php
require_once __DIR__."/../util/Conecta.php";

class CreditoDao {

    private $cn = null;

    public function CreditoDao(){
        //$this->cn = (new Conecta)->getInstance();
    }

    public function findCliente($obj){
        $this->cn = (new Conecta)->getInstance();

        settype($obj->doc, "string");
        $documento = strlen($obj->doc)<8 ? "placa = '$obj->doc'" : "dni = '$obj->doc'";

        $sql = "SELECT * FROM semaforo_cliente where tipo_persona = 'C' and ".$documento;
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findCliente: ");
        $this->cn->close();
        return $result;
    }
//busca creditos con duda, si tiene prorroga le permite tomar su credito
    public function findCreditoGrifo($obj){
        $this->cn = (new Conecta)->getInstance();

        settype($obj->doc, "string");
        $fecha_hoy = date('Y-m-d');
        $documento = strlen($obj->doc)<8 ? "placa = '$obj->doc'" : "dni = '$obj->doc'";

        $sql = "SELECT * FROM vw_credito_grifo where ".$documento." and fecha_cred_fin <= '$fecha_hoy' and estado_prorroga = 0";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findClienteCredito: ");
        $this->cn->close();
        return $result;
    }

    /*public function findClienteCredito($obj){
        $this->cn = (new Conecta)->getInstance();

        settype($obj->doc, "string");
        $documento = strlen($obj->doc)<8 ? "placa = '$obj->doc'" : "dni = '$obj->doc'";

        $sql = "SELECT * FROM persona where ".$documento;
        echo $sql;
        $result = $this->cn->query($sql) or die("Error findClienteCredito: ");
        $this->cn->close();
        return $result;
    }*/

    public function findPagoHoy($obj){
        $this->cn = (new Conecta)->getInstance();

        settype($obj->doc, "string");
        $documento = strlen($obj->doc)<8 ? "placa = '$obj->doc'" : "dni = '$obj->doc'";

        $sql = "SELECT * FROM vw_pagodiario where ".$documento;
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findPagoHoy: ");
        $this->cn->close();
        return $result;
    }

//Busca si el cliente ya saco su credito HOY (solo puede tomar 1 credito diario), de la vista vw_credito_grifo
    public function findCreditoHoy($obj){
        $this->cn = (new Conecta)->getInstance();

        settype($obj->doc, "string");
        $fecha_hoy = date('Y-m-d');
        $documento = strlen($obj->doc)<8 ? "placa = '$obj->doc'" : "dni = '$obj->doc'";

        $sql = "SELECT * FROM vw_creditos where ".$documento." and fecha_ini = '$fecha_hoy'";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findCreditoHoy: ");
        $this->cn->close();
        return $result;
    }


    public function addPagoDiario($obj){
        $this->cn = (new Conecta)->getInstance();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //var_dump($obj);
        $flag = 0;
        settype($obj->idpersona, "Integer");
        $idsucursal = $_SESSION["idsucursal"];
        settype($obj->fecha, "string");
        $iduser = $_SESSION["idusuario"];
        $fecha = date('Y-m-d');
        $sql = "insert into pago_dia(idpersona, idsucursal, fecha, importe, estado, iduser) values($obj->idpersona,$idsucursal,'$fecha',1,1,$iduser)";
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error addPagoDiario: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        $this->cn->close();
        return $flag;
    }

    public function findProductoCredito(){
        $this->cn = (new Conecta)->getInstance();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sql = "SELECT * FROM producto where estado = 1 and idsucursal = ".$_SESSION["idsucursal"];
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findProductoCredito: ");
        $this->cn->close();
        return $result;
    }

    public function findNumberMaxCredito(){
        $this->cn = (new Conecta)->getInstance();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sql = "SELECT num_credito FROM sucursal where estado = 1 and idsucursal = ".$_SESSION["idsucursal"];
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findNumberMaxCredito: ");
        $this->cn->close();
        $row = mysqli_fetch_assoc($result);
        return $row["num_credito"];
    }

    public function CreateNumSerie($num){
        $longNumero = strlen($num);
        $longEstandar = 6;
        $iterMax = $longEstandar - $longNumero;
        $serie = "";
        for($i=0;$i<$iterMax;$i++){
            $serie =$serie."0";
        }
        return $serie.$num;
    }

    public function addCredito($obj){
        $num_credito = $this->findNumberMaxCredito()+1;
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $serie = $this->CreateNumSerie($num_credito);
        //var_dump($obj);
        $flag = 0;
        settype($obj->idpersona, "Integer");
        $idsucursal = $_SESSION["idsucursal"];
        settype($obj->fecha, "string");
        $iduser = $_SESSION["idusuario"];
        $fecha_ini = date('Y-m-d');
        $fecha_fin = date('Y-m-d', time() + (1 * 24 * 60 * 60));
        $hora = date("H:i:s");

        $sql = "insert into cred_iprosap(idpersona, idsucursal, cred_num, fecha_ini, fecha_fin, hora, estado, iduser) values($obj->idpersona,$idsucursal,'00$idsucursal-$serie','$fecha_ini','$fecha_fin', '$hora', 1, $iduser)";
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error addCredito: '.$this->cn->query($sql);
        }else{
            $idcred_iprosap = $this->cn->insert_id;
            //inser del credito detalle
            $sql = "insert into cred_detalle(idcred_iprosap, idproducto, cantidad, precio, subtotal) values($idcred_iprosap,$obj->idproducto,($obj->importe/$obj->precio),$obj->precio,$obj->importe)";
            //echo $sql;
            if(!$this->cn->query($sql)){
                $flag = 0;
                print 'Error addCreditoDetalle: '.$this->cn->query($sql);
            }else{
                $sql = "update sucursal SET num_credito=($num_credito) where idsucursal=$idsucursal";
                //echo $sql;
                if(!$this->cn->query($sql)){
                    $flag = 0;
                    print 'Error UpdateNumCredito: '.$this->cn->query($sql);
                }else{
                    $flag = 1;
                }
            }
        }

        $this->cn->close();
        return $flag;
    }
//Lista Todas las dudas del cliente con o sin prorroga, de la vista creditos_deudas
    public function findCreditosDeudas($obj){
        $this->cn = (new Conecta)->getInstance();
        settype($obj->idpersona, "Integer");

        $sql = "select * from creditos_deudas where idpersona = $obj->idpersona";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findCreditosDeudas: ");
        $this->cn->close();
        return $result;
    }

    public function pagarCreditos($objArray){

        $this->cn = (new Conecta)->getInstance();
        $flag = 0;
        for($i=0;$i<sizeof($objArray);$i++){
            $sql = "update cred_iprosap set estado = 0 where idcred_iprosap = ".(string)$objArray[$i]->idcredito;
            //echo $sql;
            if(!$this->cn->query($sql)){
                $flag = 0;
                print 'Error pagarCreditos [$i]: '.$this->cn->query($sql);
            }else{
                $flag = 1;
            }
        }

        $this->cn->close();
        return $flag;
    }

    public function validarUserConfirm($obj){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $flag = 0;
        $datos = array();
        //settype($obj->usuario, "string");
        $user = $_SESSION['usuario'];
        settype($obj->clave, "string");
        $sql = "select * from userdata where usuario = '$user' and clave = aes_encrypt('$obj->clave','ticla4949') and tipo = 'P'";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error validarUserConfirm.");

        while($row = $result->fetch_assoc()){
            $datos[] = $row;
            $idusuario = $row["idusuario"];
        }
        $flag = sizeof($datos)==0?0:1;
        $this->cn->close();
        return $flag;
    }
    
    public function lstCreditosCrifo($obj){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        settype($obj->obj->fechaIni, "string");
        $fecha_ini = $obj->obj->fechaIni;
        settype($obj->obj->fechaFin, "string");
        $fecha_fin = $obj->obj->fechaFin;
        $idsucursal = $_SESSION["idsucursal"];

        $sql = "select * from vw_creditos where idsucursal = $idsucursal and fecha_ini between '$fecha_ini' and '$fecha_fin' order by cred_num desc";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error lstCreditoCrifo: ");
        $this->cn->close();
        return $result;
    }

}
