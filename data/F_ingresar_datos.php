<?php
    require_once ("events/Administrar_Articulo.php");
    require_once ("events/Administrar_Contenido.php");
    require_once ("events/Administrar_Favoritos.php");
    require_once ("events/Administrar_Multimedia.php");
    require_once ("events/Administrar_Puntuacion.php");
    require_once ("events/Administrar_Seccion.php");
    require_once ("events/Administrar_Referencia.php");
    require_once ("dominio/LTC_Usuario.php");
    
    
    session_start();

     
    /*
         * OBTENER LA INFORMACION UTIL
         */
    if($_REQUEST["tipo"] == "reg_informacion_util"){
        $objeto = new Administrar_Articulo();
        $objeto->registrar_articulo($_SESSION["us_id_usuario"], $_GET["id_materia"], $_GET["titulo"]);
        $ultimo_ID=mysql_insert_id();
        $objeto2 = new Administrar_Referencia();
        $objeto2->registrar_referencia($ultimo_ID, "", "");
    }else if ($_REQUEST["tipo"] == "act_reg_informacion_util") {
        $objeto = new Administrar_Articulo();
        $objeto->modificar_articulo($_GET["id_articulo"], $_GET["titulo"]);
    }else if($_REQUEST["tipo"]  == "eli_articulo"){
        $objeto = new Administrar_Articulo();
        $objeto->eliminar_articulo($_GET["id_articulo"]);
    }else if($_REQUEST["tipo"]  == "cambiar_secciones"){
        $objeto = new Administrar_Articulo();
        $objeto->cambiar_secciones($_GET["id_articulo"],$_GET["orden_sec"]);
    }
    
    /*
     * ADMINISTRACION DE SECCION
     */
    if($_REQUEST["tipo"] == "reg_seccion"){
        $objeto = new Administrar_Seccion();
        $objeto->registrar_seccion($_GET["id_articulo"], $_GET["nombre"], $_GET["descripcion"]);
    }else if ($_REQUEST["tipo"] == "act_seccion") {
        $objeto = new Administrar_Seccion();
        $objeto->modificar_seccion($_GET["id_seccion"], $_GET["nombre"], $_GET["descripcion"]);
    }else if($_REQUEST["tipo"]  == "eli_seccion"){
        $objeto = new Administrar_Seccion();
        $objeto->eliminar_seccion($_GET["id_seccion"]);
    }
    
    /*
     * ADMINISTRACION DE REFERENCIAS
     */
    if($_REQUEST["tipo"] == "reg_referencia"){
        $objeto = new Administrar_Referencia();
        $objeto->registrar_referencia($_GET["id_articulo"], $_GET["referencia"], $_GET["abreviado"]);
    }else if ($_REQUEST["tipo"] == "act_referencia") {
        $objeto = new Administrar_Referencia();
        $objeto->modificar_referencia($_GET["id_referencia"], $_GET["referencia"], $_GET["abreviado"]);
    }else if($_REQUEST["tipo"]  == "eli_referencia"){
        $objeto = new Administrar_Referencia();
        $objeto->eliminar_referencia($_GET["id_referencia"]);
    }
    
     /*
     * ADMINISTRACION DE CONTENIDO
     */
    if($_REQUEST["tipo"] == "reg_contenido"){
        $objeto = new Administrar_Contenido();
        $objeto->registrar_contenido($_GET["id_seccion"], $_GET["contenido"], $_REQUEST["tipo"], $_GET["texto"], $_GET["caption"]);
    }else if ($_REQUEST["tipo"] == "act_contenido") {
        $objeto = new Administrar_Contenido();
        $objeto->modificar_contenido($_GET["id_contenido"], $_GET["contenido"], $_REQUEST["tipo"], $_GET["texto"], $_GET["caption"]);
    }else if($_REQUEST["tipo"]  == "eli_contenido"){
        $objeto = new Administrar_Contenido();
        $objeto->eliminar_contenido($_GET["id_contenido"]);
    }

     /*
     * ADMINISTRACION DE MULTIMEDIA
     */
/* 4@var $ruta type */
  
    if($_REQUEST["tipo"] == "reg_multimedia"){
        $objeto = new Administrar_Multimedia();
        if($_REQUEST['tipo_multimedia']=="imagen"){
           $ruta=$objeto->subir_imagen();
            $tag="<imagen>";
        }else if($_REQUEST['tipo_multimedia']=="video"){
            $ruta="embed"."/".$_REQUEST['codigo_video'];
            $tag="<video>";
        }
      
            $objeto->registrar_multimedia($_REQUEST["id_sec"], $ruta, $_REQUEST["descripcion"], $tag);
        
      }else if ($_REQUEST["tipo"] == "act_multimedia") {
        $objeto = new Administrar_Multimedia();
        $objeto->modificar_multimedia($_GET["id_multimedia"], $_GET["ruta"], $_GET["descripcion"], $_GET["tag"]);
    }else if($_REQUEST["tipo"]  == "eli_multimedia"){
        $objeto = new Administrar_Multimedia();
        $objeto->eliminar_multimedia($_GET["id_multimedia"]);
    }
    
     /*
     * ADMINISTRACION DE FAVORITOS
     */
    if($_REQUEST["tipo"] == "reg_favorito"){
        $objeto = new Administrar_Favoritos();
        $objeto->registrar_favorito($_GET["id_articulo"], $_GET["id_usuario"]);
    }else if($_REQUEST["tipo"]  == "eli_favorito"){
        $objeto = new Administrar_Favoritos();
        $objeto->eliminar_favorito($_GET["id_favorito"]);
    }
    
    /*
     * ADMINISTRACION DE PUNTUACION
     */
    if($_REQUEST["tipo"] == "reg_puntuacion"){
        $objeto = new Administrar_Puntuacion();
        $objeto->registrar_puntuacion($_GET["id_autor"], $_GET["id_evaluador"], $_GET["id_articulo"], $_GET["puntuacion"]);
    }
?>
