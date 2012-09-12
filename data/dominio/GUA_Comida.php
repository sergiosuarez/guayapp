<?php
/**
 * Description of GUA_Comida
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Comida {

    var $co_id;
    var $co_descripcion;
    var $co_lugar;
    var $co_longitud;
    var $co_latitud;
    var $ref_tipo;
    var $co_estado;
    

    function GUA_Comida() {
        
    }
    
   function obtener_comidas() {
        $query = "SELECT * FROM gua_comida where co_estado='A' ORDER BY co_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_comidasxtipo($tipo) {
        $query = "SELECT * FROM gua_comida WHERE ref_tipo='" . $tipo ."' AND co_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_comidasxdescripcion($descripcion) {
        $query="SELECT * FROM gua_comida where co_descripcion LIKE '%".$descripcion."%' AND co_estado='A' ORDER BY co_id DESC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    
    private function obtener_objetos($db,$result){
        $i = 0;
        $objetos = null;
        while (($objeto = $db->objetSuivant($result)) != null) {
            $objetos->items[$i]                         = new GUA_Comida();
            $objetos->items[$i]->co_id                  = $objeto->co_id;
            $objetos->items[$i]->co_descripcion         = $objeto->co_descripcion;
            $objetos->items[$i]->co_lugar               = $objeto->co_lugar;
            $objetos->items[$i]->co_longitud            = $objeto->co_longitud;
            $objetos->items[$i]->co_latitud             = $objeto->co_latitud;
            $objetos->items[$i]->ref_tipo               = $objeto->ref_tipo;
            $objetos->items[$i]->co_estado              = $objeto->co_estado;
            
            $i++;
        }
        $objetos->identifier = "co_id";
        $objetos->label = "co_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxtipo($tipo) {
        $query = "SELECT * FROM gua_comida WHERE ref_tipo='" . $tipo ."' AND co_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $co_id = $objeto->co_id;
        }
        $db->quitter();
        $resultado = $co_id;
        return $resultado;
    }
    
    
}
?>
