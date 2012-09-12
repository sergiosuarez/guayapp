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
    
    
    session_start();
        /*
         * OBTENER LA INFORMACION UTIL
         */    
        if ($_GET["tipo"] == "cargar_informacion_util") {
            $data = new GUA_Informacion();
            echo $data->obtener_informacion();
        }else if($_GET["tipo"] == "cargar_informacion_utilXid") {
            $data = new GUA_Informacion();
            echo $data->obtener_informacionXid($_GET["id_registro"]);
        /*  OBTENER ATRACTIVOS */
	} else if ($_GET["tipo"] == "cargar_atractivos") {
            $data = new GUA_Atractivos();
            echo $data->obtener_atractivos();
        } else if ($_GET["tipo"] == "cargar_atractivosxdescripcion") {
            $data = new GUA_Atractivos();
            echo $data->obtener_atractivosxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_atractivosxtipo") {
            $data = new GUA_Atractivos();
            echo $data->obtener_atractivosxtipo($_GET["tipo"]);
        
        
        /*  OBTENER ALOJAMIENTOS */
	} else if ($_GET["tipo"] == "cargar_alojamientos") {
            $data = new GUA_Alojamientos();
            echo $data->obtener_alojamientos();
        } else if ($_GET["tipo"] == "cargar_alojamientosxdescripcion") {
            $data = new GUA_Alojamientos();
            echo $data->obtener_alojamientosxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_alojamientosxtipo") {
            $data = new GUA_Alojamientos();
            echo $data->obtener_alojamientosxtipo($_GET["tipo"]);
        
        
        /*  OBTENER COMIDA */
	} else if ($_GET["tipo"] == "cargar_comidas") {
            $data = new GUA_Comida();
            echo $data->obtener_comidas();
        } else if ($_GET["tipo"] == "cargar_comidasxdescripcion") {
            $data = new GUA_Comida();
            echo $data->obtener_comidasxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_comidasxtipo") {
            $data = new GUA_Comida();
            echo $data->obtener_comidasxtipo($_GET["tipo"]);
        
        /*  OBTENER DIVERSION */
	} else if ($_GET["tipo"] == "cargar_diversiones") {
            $data = new GUA_Diversion_Nocturna();
            echo $data->obtener_diversiones();
        } else if ($_GET["tipo"] == "cargar_diversionesxdescripcion") {
            $data = new GUA_Diversion_Nocturna();
            echo $data->obtener_diversionesxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_diversionesxtipo") {
            $data = new GUA_Diversion_Nocturna();
            echo $data->obtener_diversionesxtipo($_GET["tipo"]);
        
        /*  OBTENER TAXIS */
	} else if ($_GET["tipo"] == "cargar_taxis") {
            $data = new GUA_Taxis();
            echo $data->obtener_taxis();
        } else if ($_GET["tipo"] == "cargar_taxisxdescripcion") {
            $data = new GUA_Taxis();
            echo $data->obtener_taxisxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_taxisxtipo") {
            $data = new GUA_Taxis();
            echo $data->obtener_taxisxzona($_GET["zona"]);
        
        
         /*  OBTENER CENTROS COMERCIALES */
	} else if ($_GET["tipo"] == "cargar_centros") {
            $data = new GUA_Centro_Comerciales();
            echo $data->obtener_centro_comerciales();
        } else if ($_GET["tipo"] == "cargar_centrosxdescripcion") {
            $data = new GUA_Centro_Comerciales();
            echo $data->obtener_centrosxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_centrosxtipo") {
            $data = new GUA_Centro_Comerciales();
            echo $data->obtener_centrosxzona($_GET["zona"]);
       
        
        /*  OBTENER EVENTOS */
	} else if ($_GET["tipo"] == "cargar_eventos") {
            $data = new GUA_Eventos();
            echo $data->obtener_eventos();
        } else if ($_GET["tipo"] == "cargar_eventosxdescripcion") {
            $data = new GUA_Eventos();
            echo $data->obtener_eventosxdescripcion($_GET["descripcion"]);
        } else if ($_GET["tipo"] == "cargar_eventosxtipo") {
            $data = new GUA_Eventos();
            echo $data->obtener_eventosxtipo($_GET["tipo"]);
        }
        
?>