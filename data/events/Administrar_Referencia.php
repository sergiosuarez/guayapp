<?php
    require_once ("dominio/LTC_Referencia.php");
    require_once ("dominio/Util.php");

/**
 * Description of Administrar_Seccion
 *
 * @author Sergio Suarez
 */

class Administrar_Referencia {
    
    var $referencia;
    var $tipo_accion;
        
    function registrar_referencia($id_articulo, $referencia, $abreviado ){
        $referencia=  addslashes($referencia);
        $instruccion = "INSERT INTO ltc_referencia (re_id_referencia,re_referencia,ref_articulo,re_abreviado, re_estado) VALUES (null,'".$referencia."',".$id_articulo.",'".$abreviado."', 'A');";
        $this->procesar_peticion($instruccion);
    }
    
    function modificar_referencia($id_referencia, $referencia, $abreviado ){
        $instruccion = "UPDATE ltc_referencia SET re_referencia='". $referencia."', re_abreviado='". $abreviado."' WHERE re_id_referencia=".$id_referencia.";";
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_referencia($id_referencia ){
        $instruccion = "UPDATE ltc_referencia SET re_estado='E' WHERE re_id_referencia=".$id_referencia.";";
        $this->procesar_peticion($instruccion);
    }
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
