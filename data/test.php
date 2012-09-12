<?php
    require_once("dominio/GUA_Alojamientos.php");
    require_once("dominio/GUA_Atractivos.php");
    require_once("dominio/GUA_Centro_Comerciales.php");
    require_once("dominio/GUA_Comida.php");
    require_once("dominio/GUA_Detalles_Tipos.php");
    require_once("dominio/GUA_Detalles_Zonas.php");
    require_once("dominio/GUA_Diversion_Nocturna.php");
    require_once("dominio/GUA_Eventos.php");
    require_once("dominio/GUA_Informacion.php");
    require_once("dominio/GUA_Publicidad.php");
    require_once("dominio/GUA_Taxis.php");

    $data = new GUA_Atractivos();
    echo $data->obtener_atractivos();
    
    
?>