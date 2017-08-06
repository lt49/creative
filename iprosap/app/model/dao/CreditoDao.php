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
        $sql = "SELECT * FROM vw_creditos where estado_cred = 1 and ".$documento." and fecha_fin <= '$fecha_hoy'";
        //$sql = "SELECT * FROM vw_credito_grifo where ".$documento." and fecha_cred_fin <= '$fecha_hoy' and estado_prorroga = 0";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findClienteCredito: ");
        $this->cn->close();
        return $result;
    }
    
    public function findCredSinDespachar($obj){
        $this->cn = (new Conecta)->getInstance();

        settype($obj->doc, "string");
        $fecha_hoy = date('Y-m-d');
        $documento = strlen($obj->doc)<8 ? "placa = '$obj->doc'" : "dni = '$obj->doc'";
        $sql = "SELECT * FROM vw_creditos where estado_cred = 2 and ".$documento." and fecha_fin <= '$fecha_hoy'";
        //$sql = "SELECT * FROM vw_credito_grifo where ".$documento." and fecha_cred_fin <= '$fecha_hoy' and estado_prorroga = 0";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findClienteCredito: ");
        $this->cn->close();
        
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        
        return sizeof($data)==0?false:true;
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
        $sql = "SELECT correlativo, num_credito FROM sucursal where estado = 1 and idsucursal = ".$_SESSION["idsucursal"];
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error findNumberMaxCredito: ");
        $this->cn->close();
        $row = mysqli_fetch_assoc($result);
        
        //return $row["num_credito"]+1;
        return $row;
    }

    public function CreateNumSerie(){    
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $num = $this->findNumberMaxCredito()["num_credito"];
        $correlativo = $this->findNumberMaxCredito()["correlativo"];
        $letras = array(
            'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AÑ','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ',
            'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BÑ','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ',
            'CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CÑ','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ',
            'DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DÑ','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ',
            'EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EÑ','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ',
            'FA','FB','FC','FD','FE','FF','FG','FH','FI','FJ','FK','FL','FM','FN','FÑ','FO','FP','FQ','FR','FS','FT','FU','FV','FW','FX','FY','FZ',
            'GA','GB','GC','GD','GE','GF','GG','GH','GI','GJ','GK','GL','GM','GN','GÑ','GO','GP','GQ','GR','GS','GT','GU','GV','GW','GX','GY','GZ',
            'HA','HB','HC','HD','HE','HF','HG','HH','HI','HJ','HK','HL','HM','HN','HÑ','HO','HP','HQ','HR','HS','HT','HU','HV','HW','HX','HY','HZ',
            'IA','IB','IC','ID','IE','IF','IG','IH','II','IJ','IK','IL','IM','IN','IÑ','IO','IP','IQ','IR','IS','IT','IU','IV','IW','IX','IY','IZ',
            'JA','JB','JC','JD','JE','JF','JG','JH','JI','JJ','JK','JL','JM','JN','JÑ','JO','JP','JQ','JR','JS','JT','JU','JV','JW','JX','JY','JZ',
            'KA','KB','KC','KD','KE','KF','KG','KH','KI','KJ','KK','KL','KM','KN','KÑ','KO','KP','KQ','KR','KS','KT','KU','KV','KW','KX','KY','KZ',
            'LA','LB','LC','LD','LE','LF','LG','LH','LI','LJ','LK','LL','LM','LN','LÑ','LO','LP','LQ','LR','LS','LT','LU','LV','LW','LX','LY','LZ',
            'MA','MB','MC','MD','ME','MF','MG','MH','MI','MJ','MK','ML','MM','MN','MÑ','MO','MP','MQ','MR','MS','MT','MU','MV','MW','MX','MY','MZ',
            'NA','NB','NC','ND','NE','NF','NG','NH','NI','NJ','NK','NL','NM','NN','NÑ','NO','NP','NQ','NR','NS','NT','NU','NV','NW','NX','NY','NZ',
            'ÑA','ÑB','ÑC','ÑD','ÑE','ÑF','ÑG','ÑH','ÑI','ÑJ','ÑK','ÑL','ÑM','ÑN','ÑÑ','ÑO','ÑP','ÑQ','ÑR','ÑS','ÑT','ÑU','ÑV','ÑW','ÑX','ÑY','ÑZ',
            'OA','OB','OC','OD','OE','OF','OG','OH','OI','OJ','OK','OL','OM','ON','OÑ','OO','OP','OQ','OR','OS','OT','OU','OV','OW','OX','OY','OZ',
            'PA','PB','PC','PD','PE','PF','PG','PH','PI','PJ','PK','PL','PM','PN','PÑ','PO','PP','PQ','PR','PS','PT','PU','PV','PW','PX','PY','PZ',
            'QA','QB','QC','QD','QE','QF','QG','QH','QI','QJ','QK','QL','QM','QN','QÑ','QO','QP','QQ','QR','QS','QT','QU','QV','QW','QX','QY','QZ',
            'RA','RB','RC','RD','RE','RF','RG','RH','RI','RJ','RK','RL','RM','RN','RÑ','RO','RP','RQ','RR','RS','RT','RU','RV','RW','RX','RY','RZ',
            'SA','SB','SC','SD','SE','SF','SG','SH','SI','SJ','SK','SL','SM','SN','SÑ','SO','SP','SQ','SR','SS','ST','SU','SV','SW','SX','SY','SZ',
            'TA','TB','TC','TD','TE','TF','TG','TH','TI','TJ','TK','TL','TM','TN','TÑ','TO','TP','TQ','TR','TS','TT','TU','TV','TW','TX','TY','TZ',
            'UA','UB','UC','UD','UE','UF','UG','UH','UI','UJ','UK','UL','UM','UN','UÑ','UO','UP','UQ','UR','US','UT','UU','UV','UW','UX','UY','UZ',
            'VA','VB','VC','VD','VE','VF','VG','VH','VI','VJ','VK','VL','VM','VN','VÑ','VO','VP','VQ','VR','VS','VT','VU','VV','VW','VX','VY','VZ',
            'WA','WB','WC','WD','WE','WF','WG','WH','WI','WJ','WK','WL','WM','WN','WÑ','WO','WP','WQ','WR','WS','WT','WU','WV','WW','WX','WY','WZ',
            'XA','XB','XC','XD','XE','XF','XG','XH','XI','XJ','XK','XL','XM','XN','XÑ','XO','XP','XQ','XR','XS','XT','XU','XV','XW','XX','XY','XZ',
            'YA','YB','YC','YD','YE','YF','YG','YH','YI','YJ','YK','YL','YM','YN','YÑ','YO','YP','YQ','YR','YS','YT','YU','YV','YW','YX','YY','YZ',
            'ZA','ZB','ZC','ZD','ZE','ZF','ZG','ZH','ZI','ZJ','ZK','ZL','ZM','ZN','ZÑ','ZO','ZP','ZQ','ZR','ZS','ZT','ZU','ZV','ZW','ZX','ZY','ZZ'
        );   
        
        $base = "";
        $logMaximo = 999999;
        if($num>=$logMaximo){
            try{
                //update al correlativo (actual+1)
                $this->updtCorrelativo(($correlativo+1));
                //update num_credito = 0, para empezar el num_credito es en 0.
                $this->resetNumCredito(1);            
                $base = (string)$letras[$correlativo+1]."0".$_SESSION["idsucursal"];            
                $num = 1;                
                
            }catch(Exception $e){
                print "Error al generar |Numero de Serie|: ".$e->getMessage();
            }
        }else{            
             try{
                $base = $letras[$correlativo];
                $this->resetNumCredito($num+1);    
                $num+=1;
              }catch(Exception $e){
                print "Error al generar |Numero de Serie|: ".$e->getMessage();
              }
        }
        
        $longNumero = strlen($num);
        $longEstandar = 6;
        $iterMax = $longEstandar - $longNumero;
        $cuerpo = "";
        for($i=0;$i<$iterMax;$i++){
            $cuerpo =$cuerpo."0";
        }
        $serie = $base."-".$cuerpo.$num; 
        return $serie;
    }
    
    public function updtCorrelativo($num){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sql = "update sucursal SET correlativo = $num where idsucursal= ".$_SESSION["idsucursal"];
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error updtCorrelativo: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        return $flag;
    }
    
    public function resetNumCredito($num){
        $this->cn = (new Conecta)->getInstance();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sql = "update sucursal SET num_credito = $num where idsucursal=".$_SESSION["idsucursal"];
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error resetNumCredito: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        return $flag;
    }

    public function addCredito($obj){
        //$num_credito = $this->findNumberMaxCredito();
        
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
        $fecha_ini = date('Y-m-d');
        $fecha_fin = date('Y-m-d', time() + (1 * 24 * 60 * 60));
        $hora = date("H:i:s");
        $serie = $this->CreateNumSerie();
        
        $sql = "insert into cred_iprosap(idpersona, idsucursal, cred_num, fecha_ini, fecha_fin, hora, estado, iduser) values($obj->idpersona,$idsucursal,'$serie','$fecha_ini','$fecha_fin', '$hora', 2, $iduser)";
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
                /*$sql = "update sucursal SET num_credito=($num_credito) where idsucursal=$idsucursal";
                //echo $sql;
                if(!$this->cn->query($sql)){
                    $flag = 0;
                    print 'Error UpdateNumCredito: '.$this->cn->query($sql);
                }else{*/
                    $flag = 1;
                //}
            }
        }

        $this->cn->close();
        return $flag;
    }
//Lista Todas las dudas del cliente con o sin prorroga, de la vista creditos_deudas
    public function findCreditosDeudas($obj){
        $this->cn = (new Conecta)->getInstance();
        settype($obj->idpersona, "Integer");

        $sql = "select * from creditos_deudas where estado_ipro != 2 and idpersona = $obj->idpersona";
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

        $sql = "select * from vw_creditos where idsucursal = $idsucursal and estado_cred != 2 and fecha_ini between '$fecha_ini' and '$fecha_fin' order by cred_num desc";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error lstCreditoCrifo: ");
        $this->cn->close();
        return $result;
    }
    
    public function lstCreditosSinDespachar(){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        /*settype($obj->obj->fechaIni, "string");
        $fecha_ini = $obj->obj->fechaIni;
        settype($obj->obj->fechaFin, "string");
        $fecha_fin = $obj->obj->fechaFin;*/
        $idsucursal = $_SESSION["idsucursal"];

        $sql = "select * from vw_creditos where idsucursal = $idsucursal and estado_cred = 2 order by cred_num desc";
        //echo $sql;
        $result = $this->cn->query($sql) or die("Error lstCreditosSinDespachar: ");
        $this->cn->close();
        return $result;
    }
    
    public function updtCreditoSinDespachar($obj){
        $this->cn = (new Conecta)->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sql = "UPDATE cred_iprosap SET estado=1 WHERE idcred_iprosap =$obj->obj";
        //echo $sql;
        if(!$this->cn->query($sql)){
            $flag = 0;
            print 'Error updtCorrelativo: '.$this->cn->query($sql);
        }else{
            $flag = 1;
        }
        return $flag;
    }

}
