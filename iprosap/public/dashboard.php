<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
?>
<meta http-equiv="refresh" content="0; url=inicio" />
<?php
    exit();
}
//$user = $_SESSION["usuario"];

if($_SESSION["usuario"]!="rootlt49"){
    if($_SESSION["usuario"]!="vendedor"){
        require_once "public/view/main/home.php";
    }else{
        echo "vendedor";
    }
}else{
    echo "root";
}



/*switch($_SESSION["rol"]){
    case "admin":
        $terminal = $_SESSION["terminal"];
        $usuario = $_SESSION["usuario"];
        $serie = $_SESSION["serie"];

        require_once "public/view/dashboardUser/dashadmin.php";
        break;
    case "recepcion":
        $terminal = $_SESSION["terminal"];
        $usuario = $_SESSION["usuario"];
        $serie = $_SESSION["serie"];

        require_once "public/view/dashboardUser/dashrecepcion.php";
        break;
    case "root":
        $usuario = $_SESSION["usuario"];
        require_once "public/view/dashboardUser/dashroot.php";
        //require_once "public/view/dashboardUser/dashboard.php";
        break;
    default:
        header("Location: inicio");
        break;
}*/


?>
