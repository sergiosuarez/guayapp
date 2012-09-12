<?php
    require_once ("dominio/LTC_Puntuacion.php");
    require_once ("dominio/Util.php");

/**
 * Description of Administrar_Contenido
 *
 * @author Sergio Suarez
 */

class Administrar_Puntuacion {
    
    var $contenido;
    var $tipo_accion;
    
    function registrar_puntuacion($id_autor,$id_evaluador, $id_articulo,$puntuacion){
        $instruccion = "INSERT INTO ltc_puntuacion (pu_id_puntuacion,pu_autor,pu_id_evaluador,pu_id_articulo,pu_puntuacion) VALUES (null,'".$id_autor."','".$id_evaluador."','".$id_articulo."','".$puntuacion."');";
        $this->procesar_peticion($instruccion);
    }
    
    /*
    function modificar_puntuacion($pu_id_puntuacion, $puntuacion  ){
        $instruccion = "UPDATE ltc_puntuacion SET pu_puntuacion='". $puntuacion."' WHERE pu_id_puntuacion=".$pu_id_puntuacion.";";
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_puntuacion($pu_id_puntuacion ){
        $instruccion = "DELETE FROM ltc_puntuacion WHERE pu_id_puntuacion=".$pu_id_puntuacion.";";
        $this->procesar_peticion($instruccion);
    }*/
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
