<?php
/**
 * Description of GUA_Diversion_Nocturna
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Diversion_Nocturna {

    var $dn_id;
    var $dn_descripcion;
    var $dn_longitud;
    var $dn_latitud;
    var $dn_paginaweb;
    var $ref_tipo;
    var $dn_estado;    

    function GUA_Diversion_Nocturna() {
        
    }
    
   function obtener_diversiones() {
        $query = "SELECT * FROM gua_diversion_nocturna where dn_estado='A' ORDER BY dn_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_diversionesxtipo($tipo) {
        $query = "SELECT * FROM gua_diversion_nocturna WHERE ref_tipo='" . $tipo ."' AND dn_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_diversionesxdescripcion($descripcion) {
        $query="SELECT * FROM gua_diversion_nocturna where dn_descripcion LIKE '%".$descripcion."%' AND dn_estado='A' ORDER BY dn_id DESC;";
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
            $objetos->items[$i]                         = new GUA_Diversion_Nocturna();
            $objetos->items[$i]->dn_id                  = $objeto->dn_id;
            $objetos->items[$i]->dn_descripcion         = $objeto->dn_descripcion;
            $objetos->items[$i]->dn_latitud             = $objeto->dn_latitud;
            $objetos->items[$i]->dn_longitud            = $objeto->dn_longitud;            
            $objetos->items[$i]->dn_paginaweb           = $objeto->dn_paginaweb;
            $objetos->items[$i]->ref_tipo               = $objeto->ref_tipo;
            $objetos->items[$i]->dn_estado              = $objeto->dn_estado;
            
            $i++;
        }
        $objetos->identifier = "dn_id";
        $objetos->label = "dn_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxtipo($tipo) {
        $query = "SELECT * FROM gua_diversion_nocturna WHERE ref_tipo='" . $tipo ."' AND dn_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $dn_id = $objeto->dn_id;
        }
        $db->quitter();
        $resultado = $dn_id;
        return $resultado;
    }
    
    
}
?>
