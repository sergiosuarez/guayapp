<?php
    require_once ("dominio/LTC_Contenido.php");
    require_once ("dominio/Util.php");

/**
 * Description of Administrar_Contenido
 *
 * @author Sergio Suarez
 */

class Administrar_Contenido {
    
    var $contenido;
    var $tipo_accion;
    
    function registrar_contenido($id_seccion, $contenido, $tipo,$texto,$caption ){
        $instruccion = "INSERT INTO ltc_contenido (co_id_contenido,co_contenido,co_tipo,co_texto,co_caption,ref_seccion,co_estado) VALUES (null,'".$contenido."','".$tipo."','".$texto."','".$caption."', ".$id_seccion.", 'A');";
        $this->procesar_peticion($instruccion);
    }
    
    function modificar_contenido($id_contenido, $contenido, $tipo,$texto,$caption  ){
        $instruccion = "UPDATE ltc_contenido SET co_contenido='". $contenido."',co_tipo='". $tipo."',co_texto='". $texto."',co_caption='". $caption."'   WHERE co_id_contenido=".$id_contenido.";";
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_contenido($id_contenido ){
        $instruccion = "UPDATE ltc_contenido SET co_estado='E' WHERE co_id_contenido=".$id_contenido.";";
        $this->procesar_peticion($instruccion);
    }
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
