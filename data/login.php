<?php
    require_once ("dominio/GUA_Usuario.php");
    require_once ("dominio/Util.php");

    $usuario = $_GET["txt_usuario"];
    $clave = $_GET["txt_clave"];

    $myusername = stripslashes($usuario);
    $mypassword = stripslashes($clave);

    $objeto = new GUA_Usuario();
    $objeto = $objeto->comprobar_usuario_clave($myusername, $mypassword);
    
    $json = new Services_JSON;
    $datos=$json->decode($objeto);
     
    if ($datos != null) {
            
           session_start();
            $_SESSION['us_id_usuario'] = $datos->items[0]->us_id_usuario;
            $_SESSION['us_usuario'] = $datos->items[0]->us_usuario;
           // echo "usuario: ".$_SESSION['usuario'];
           
    }
    
        echo $objeto;
    
    
    
?>