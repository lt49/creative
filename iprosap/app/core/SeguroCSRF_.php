<?php
class SeguroCSRF_{

    public function SeguroCSRF_(){

    }

    public function getToken(){
        if(isset($_SESSION["token"])){
            return $_SESSION["token"];
        }else{
            $token = hash("sha512", rand(149, 10049));
            $_SESSION["token"] = $token;
            return $token;
        }
    }

}
