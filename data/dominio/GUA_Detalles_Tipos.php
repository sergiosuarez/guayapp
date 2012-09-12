<?php
/**
 * Description of GUA_Detalles_Tipos
 *
 * @author Sergio Suarez
 */
require_once("Util.php");


class GUA_Detalles_Tipos{

    var $de_id;
    var $de_descripcion;
    var $de_estado;

    function obtener_detalles_tipos() {
        $query = "SELECT * FROM gua_detalle_tipos where de_estado='A' ORDER BY de_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_tipoxid($id_tipo) {
        $query = "SELECT * FROM gua_detalle_tipos where de_id='" . $id_tipo ."' AND de_estado='A';";
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
            $objetos->items[$i]                         = new GUA_Detalles_Tipos();
            $objetos->items[$i]->de_id                  = $objeto->de_id;
            $objetos->items[$i]->de_descripcion         = $objeto->de_descripcion;
            $objetos->items[$i]->de_estado              = $objeto->de_estado;
            $i++;
        }
        $objetos->identifier = "de_id";
        $objetos->label = "de_descripcion";
        return $objetos;
    }
    
    
    
}
?>
