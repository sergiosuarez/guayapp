<?php
/**
 * Description of GUA_Atractivos
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Atractivos {

    var $at_id;
    var $at_descripcion;
    var $at_imagen;
    var $at_longitud;
    var $at_latitud;
    var $ref_tipo;
    var $at_estado;

    function GUA_Atractivos() {
        
    }
    
   function obtener_atractivos() {
        $query = "SELECT * FROM gua_atractivos where at_estado='A' ORDER BY at_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_atractivosxtipo($tipo) {
        $query = "SELECT * FROM gua_atractivos WHERE ref_tipo='" . $tipo ."' AND at_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_atractivosxdescripcion($descripcion) {
        $query="SELECT * FROM gua_atractivos where at_descripcion LIKE '%".$descripcion."%' AND at_estado='A' ORDER BY at_id DESC;";
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
            $objetos->items[$i]                         = new GUA_Atractivos();
            $objetos->items[$i]->at_id                  = $objeto->at_id;
            $objetos->items[$i]->at_descripcion         = $objeto->at_descripcion;
            $objetos->items[$i]->at_imagen              = $objeto->at_costo;
            $objetos->items[$i]->at_longitud            = $objeto->at_longitud;
            $objetos->items[$i]->at_latitud             = $objeto->at_latitud;
            $objetos->items[$i]->ref_tipo               = $objeto->ref_tipo;
            $objetos->items[$i]->at_estado              = $objeto->at_estado;
            
            $i++;
        }
        $objetos->identifier = "at_id";
        $objetos->label = "at_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxtipo($tipo) {
        $query = "SELECT * FROM gua_atractivos WHERE ref_tipo='" . $tipo ."' AND at_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $at_id = $objeto->at_id;
        }
        $db->quitter();
        $resultado = $at_id;
        return $resultado;
    }
    
    
}
?>
