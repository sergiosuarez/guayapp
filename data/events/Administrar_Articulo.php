<?php
    require_once ("dominio/LTC_Articulo.php");
    require_once ("dominio/Util.php");

/**
 * Description of Administrar_Articulo
 *
 * @author Sergio Suarez
 */

class Administrar_Articulo {
    
    var $articulo;
    var $tipo_accion;
    
    function registrar_visita($id_articulo, $visitas) {
        $this->articulo = new LTC_Articulo();
        $this->articulo->ar_id_articulo         = $id_articulo;
        $this->articulo->ar_fecha_modificacion  = "now()";
        $this->articulo->ar_visitas             = $visitas;
        $this->articulo->ar_orden_secciones     = $orden_secciones;
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $instruccion = 'UPDATE ltc_articulo SET ar_visitas = '.$this->articulo->ar_visitas.', ar_fecha_modificacion = '.$this->articulo->ar_fecha_modificacion.' WHERE ar_id_articulo = '.$this->articulo->ar_id_articulo.';';
        $db->execRequete( $instruccion );
    }
    
    function registrar_articulo($id_usuario, $id_materia, $titulo ){
        $instruccion = "INSERT INTO ltc_articulo (ar_id_articulo,ar_estado,ar_capitulo, ar_fecha_creacion, ar_fecha_modificacion,ref_materia,ref_usuario,ar_visitas)
            VALUES (null,'A','".$titulo."', now(),now(),".$id_materia.",".$id_usuario.", 0);";
        $this->procesar_peticion($instruccion);
    }
    
    function modificar_articulo($id_articulo, $titulo  ,$orden_secciones){
        $instruccion = 'UPDATE ltc_articulo SET ar_orden_secciones = "'.$orden_secciones.'", ar_capitulo="'. $titulo.'", ar_fecha_modificacion=now() WHERE ar_id_articulo="'.$id_articulo.'";';
        $this->procesar_peticion($instruccion);
    }
    
    function cambiar_secciones($id_articulo, $orden_secciones){
        $instruccion = 'UPDATE ltc_articulo SET ar_orden_secciones = "'.$orden_secciones.'",ar_fecha_modificacion=now() WHERE ar_id_articulo="'.$id_articulo.'";';
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_articulo($id_articulo ){
        $instruccion = "UPDATE ltc_articulo SET ar_estado='E' WHERE ar_id_articulo=".$id_articulo.";";
        $this->procesar_peticion($instruccion);
    }
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
