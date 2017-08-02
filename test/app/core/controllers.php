<?php

function redirectController($url, $token_){
    $file = __DIR__."/../../public/$url.php";
    /*echo "<br>";
    echo $file;
    echo "<br>";*/
    if(file_exists($file)){
        $token = $token_;
        require $file;
    }else{
        //echo "archivo: ".$file;
        header("HTTP/1.0 404 Not Found");
        require __DIR__."/../../public/view/seguridad/404.php";
    }
}

define("FOTO_PATH", "public/recursos/img/");
