<?php
/**
 * Description of GUA_Taxis
 *
 * @author Sergio Suarez
 */
require_once("Util.php");


class GUA_Taxis{

    var $ta_id;
    var $ta_descripcion;
    var $ta_telefonos;
    var $ta_estado;
    var $ref_zona;    

    function obtener_taxis() {
        $query = "SELECT * FROM gua_taxis where ta_estado='A' ORDER BY ta_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_taxisxzona($zona) {
        $query = "SELECT * FROM gua_taxis WHERE ref_zona='" . $zona ."' AND ta_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_taxisxdescripcion($descripcion) {
        $query="SELECT * FROM gua_taxis where ta_descripcion LIKE '%".$descripcion."%' AND ta_estado='A' ORDER BY ta_id DESC;";
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
            $objetos->items[$i]                         = new GUA_Taxis();
            $objetos->items[$i]->ta_id                  = $objeto->ta_id;
            $objetos->items[$i]->ta_descripcion         = $objeto->ta_descripcion;
            $objetos->items[$i]->ta_telefonos           = $objeto->ta_telefonos;
            $objetos->items[$i]->ta_estado              = $objeto->ta_estado;
            $objetos->items[$i]->ref_zona               = $objeto->ref_zona;
            $i++;
        }
        $objetos->identifier = "ta_id";
        $objetos->label = "ta_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxzona($zona) {
        $query = "SELECT * FROM gua_taxis WHERE ref_zona='" . $zona ."' AND ta_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $ta_id = $objeto->ta_id;
        }
        $db->quitter();
        $resultado = $ta_id;
        return $resultado;
    }
    
    
}
?>
