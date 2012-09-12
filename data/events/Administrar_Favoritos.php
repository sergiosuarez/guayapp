<?php
    require_once ("dominio/LTC_Asignar_Favoritos.php");
    require_once ("dominio/Util.php");

/**
 * Description of Administrar_Contenido
 *
 * @author Sergio Suarez
 */

class Administrar_Favoritos {
    
    var $favoritos;
    var $tipo_accion;
    
    function registrar_favorito($id_articulo, $id_usuario ){
        $instruccion = "INSERT INTO ltc_asignar_favoritos (af_id_favoritos,ref_articulo,ref_usuario) VALUES (null,".$id_articulo.", ".$id_usuario.");";
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_favorito($id_favorito ){
        $instruccion = "DELETE FROM ltc_asignar_favoritos WHERE af_if_favoritos=".$id_favorito.";";
        $this->procesar_peticion($instruccion);
    }
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
