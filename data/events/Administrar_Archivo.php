<?php
    require_once ("dominio/MCR_Archivo.php");
    require_once ("dominio/MCR_Periodo.php");
    require_once ("dominio/Util.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrar_Proyecto
 *
 * @author GPizarro
 */
    
class Administrar_Archivo {
    
    var $archivo;
    var $tipo_accion;
    
    function Administrar_Archivo( $tipo_accion, $id_informe ,$ruta,$tipo) {
        $this->archivo                          = new MCR_Archivo();
        $this->archivo->ar_id                   = $id_informe;
        $this->archivo->ar_ruta                 = $ruta;
        $this->archivo->ar_tipo                 = $tipo;
        $this->tipo_accion = $tipo_accion;
    }
    
    function actualiza_coordenadas($ar_id,$latitud,$longitud){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
           $instruccion = 'UPDATE mcr_archivo SET ar_latitud = "'.$latitud.'",ar_longitud = "'.$longitud.'" WHERE ar_id = '.$ar_id.';';
           $db->execRequete( $instruccion );
           return "Archivo actualizado";
    }
    
    function subir_fotos( $fecha, $sector ,$archivos) {
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        //for($i=0;$i<count($archivos);$i++){
               $instruccion = 'INSERT INTO mcr_archivo (ar_id, ar_ruta, ar_tipo,ar_estado) '.
               'VALUES (null, "'.$archivos.'","FO","A");';                
               $db->execRequete( $instruccion );
               
               $dia=$this->buscar_id_fecha($fecha);
               $ult_idar=$this->obtener_ultimo_id();
               
               $instruccion2 = 'INSERT INTO mcr_asignar_archivo (as_archivo_id,ref_archivo,ref_periodo ,ref_sector,ref_subsector,ref_plano) VALUES (null, '.$ult_idar.','.$dia.','.$sector.', null,null);';
               $db->execRequete( $instruccion2 );
               return "Archivo subido";
        //}
    }

    function buscar_id_fecha($fecha){
        $que = "SELECT pe_id FROM mcr_periodo where pe_fecha_inicio='".$fecha."';";
        $daba = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $res = $daba->execRequete($que);
                
        if(($objeto = $daba->objetSuivant($res))!= null) {
            $ultimo=$objeto->pe_id;
        }
        return $ultimo;
        
    }
    
    function subir_informe_mensual($mes, $sector ,$archivos,$tipo) {
       $destination_path = "/var/www/ssambiental.server/";
       $result = 0;
       $target_path = $destination_path . basename( $_FILES['txt_archivo']['name']);
       if(@move_uploaded_file($_FILES['txt_archivo']['tmp_name'], $target_path)) {
          $result = 1;
       }
 
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        //for($i=0;$i<count($archivos);$i++){
               $instruccion = 'INSERT INTO mcr_archivo (ar_id, ar_ruta, ar_tipo,ar_estado) '.
               'VALUES (null, "'.$archivos.'",  "'.$tipo.'", "A");';                
               $db->execRequete( $instruccion );
               
               $ult_idar=$this->obtener_ultimo_id();
               $instruccion2 = 'INSERT INTO mcr_asignar_archivo (as_archivo_id,ref_archivo,ref_periodo ,ref_sector,ref_subsector,ref_plano) VALUES (null,'.$ult_idar.','.$mes.','.$sector.', null,null);';
               $db->execRequete( $instruccion2 );
        //}
    }
    
    function obtener_ultimo_id(){
        $que = "SELECT MAX(ar_id) as ar_id FROM mcr_archivo;";
        $daba = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $res = $daba->execRequete($que);
                
        if(($objeto = $daba->objetSuivant($res))!= null) {
            $ultimo=$objeto->ar_id;
        }
        return $ultimo;
    }
        
    function eliminar_monitoreo($mon_id){
        $instruccion = 'UPDATE mcr_archivo SET ar_estado = "E" WHERE ar_id = '.$mon_id.';';
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $resultado = $db->execRequete( $instruccion );
        $objeto->resultado = $resultado;
        return json_encode($objeto);  
    }
    
    function eliminar_bitacora($id){
        $instruccion = 'UPDATE mcr_archivo SET ar_estado = "E" where ar_id="'.$id.'" and ar_tipo="BI";';
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $resultado = $db->execRequete( $instruccion );
        $objeto->resultado = $resultado;
        return json_encode($objeto);  
    }
 
    function eliminar_hoja($id){
        $instruccion = 'UPDATE mcr_archivo SET ar_estado = "E" where ar_id="'.$id.'"and ar_tipo="HR";';
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $resultado = $db->execRequete( $instruccion );
        $objeto->resultado = $resultado;
        return json_encode($objeto);  
    }  

    function eliminar_inf_social($id){
        $instruccion = 'UPDATE mcr_archivo SET ar_estado = "E" where ar_id="'.$id.'"and ar_tipo="IS";';
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $resultado = $db->execRequete( $instruccion );
        $objeto->resultado = $resultado;
        return json_encode($objeto);  
    }  
    
    
    function procesar_peticion() {
       if ($this->tipo_accion == 'E') {
            $instruccion = 'UPDATE mcr_archivo SET ar_estado = "E" WHERE ar_id = '.$this->archivo->ar_id.';';
        }
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $resultado = $db->execRequete( $instruccion );
        $objeto->resultado = $resultado;
        return json_encode($objeto);
    }
    
    
    function activacion_plano($ar_id,$ar_estado){
        $instruccion = 'UPDATE mcr_archivo SET ar_estado = "'.$ar_estado.'" WHERE ar_id = '.$ar_id.';';
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $resultado = $db->execRequete( $instruccion );
        $objeto->resultado =  $resultado;
        return json_encode($objeto);
    }
}
?>
