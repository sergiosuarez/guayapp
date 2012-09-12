<?php
    require_once ("dominio/LTC_Seccion.php");
    require_once ("dominio/LTC_Articulo.php");
    require_once ("dominio/Util.php");

/**
 * Description of Administrar_Seccion
 *
 * @author Sergio Suarez
 */

class Administrar_Seccion {
    
    var $seccion;
    var $tipo_accion;
        
    function registrar_seccion($id_articulo, $nombre, $descripcion ){
        $instruccion = "INSERT INTO ltc_seccion (se_id_seccion,se_nombre,se_descripcion, ref_articulo, se_estado) VALUES (null,'".$nombre."','".$descripcion."',".$id_articulo.", 'A');";
        $this->procesar_peticion($instruccion);
        //update de la nueva seccion al orden
        $articulo=new LTC_Articulo();
        $seccion=new LTC_Seccion();
        $orden_anterior=$articulo->buscar_ordenxarticulo($id_articulo);
        $ultima_seccion=$seccion->obtener_ultima_seccion();
        
        $secciones = split(",", $orden_anterior);
                
        if($secciones[0]!=null){
            $orden_actual=$orden_anterior.",".$ultima_seccion;
            
        }else{
            $orden_actual=$ultima_seccion;
        }
        $instruccion_2 = 'UPDATE ltc_articulo SET ar_orden_secciones = "'.$orden_actual.'",ar_fecha_modificacion=now() WHERE ar_id_articulo="'.$id_articulo.'";';
        $this->procesar_peticion($instruccion_2);
    }
    
    function modificar_seccion($id_seccion, $nombre, $descripcion){
        $sedescripcion=  addslashes($descripcion);
        $instruccion = "UPDATE ltc_seccion SET se_nombre='". $nombre."', se_descripcion='". $sedescripcion."' WHERE se_id_seccion=".$id_seccion.";";
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_seccion($id_seccion ){
        $instruccion = "UPDATE ltc_seccion SET se_estado='E' WHERE se_id_seccion=".$id_seccion.";";
        $this->procesar_peticion($instruccion);
    }
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
