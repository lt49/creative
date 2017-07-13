<?php
echo "Today is " . date("Y/m/d") . "<br>";

echo "Today is " . date("l")."<br>";

echo "The time is " . date("h:i:sa");

echo "<br><br><br><hr>";

require_once "/app/model/util/Conecta.php";


        $cn = (new Conecta)->getInstance();


        
        if($cn->connect_errno){
            echo "Error de conexion";
            die ("Error de Conexion: ".$cn->connect_errno);
        }else{
            //return $cn;
            echo "Conexion exitosa";
        }
        $cn->set_charset("utf8");
    



?>
