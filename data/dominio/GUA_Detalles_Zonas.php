<?php
/**
 * Description of GUA_Detalles_Zonas
 *
 * @author Sergio Suarez
 */
require_once("Util.php");


class GUA_Detalles_Zonas{

    var $dz_id;
    var $dz_descripcion;
    var $dz_estado;

    function obtener_detalles_zonas() {
        $query = "SELECT * FROM gua_detalle_zonas where dz_estado='A' ORDER BY dz_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_zonaxid($id_zona) {
        $query = "SELECT * FROM gua_detalle_zonas where dz_id='" . $id_zona ."' AND dz_estado='A';";
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
            $objetos->items[$i]                         = new GUA_Detalles_Zonas();
            $objetos->items[$i]->dz_id                  = $objeto->dz_id;
            $objetos->items[$i]->dz_descripcion         = $objeto->dz_descripcion;
            $objetos->items[$i]->dz_estado              = $objeto->dz_estado;
            $i++;
        }
        $objetos->identifier = "dz_id";
        $objetos->label = "dz_descripcion";
        return $objetos;
    }
    
    
    
}
?>
