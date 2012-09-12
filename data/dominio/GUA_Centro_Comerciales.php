<?php
/**
 * Description of GUA_Centro_Comerciales
 *
 * @author Sergio Suarez
 */
require_once("Util.php");


class GUA_Centro_Comerciales {

    var $cc_id;
    var $cc_descripcion;
    var $cc_longitud;
    var $cc_latitud;
    var $cc_estado;
    var $ref_zona;    

    function obtener_centro_comerciales() {
        $query = "SELECT * FROM gua_centro_comerciales where cc_estado='A' ORDER BY cc_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_centrosxzona($zona) {
        $query = "SELECT * FROM gua_centro_comerciales WHERE ref_zona='" . $zona ."' AND cc_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_centrosxdescripcion($descripcion) {
        $query="SELECT * FROM gua_centro_comerciales where cc_descripcion LIKE '%".$descripcion."%' AND ar_estado='A' ORDER BY cc_id DESC;";
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
            $objetos->items[$i]                         = new GUA_Centro_Comerciales();
            $objetos->items[$i]->cc_id                  = $objeto->cc_id;
            $objetos->items[$i]->cc_descripcion         = $objeto->cc_descripcion;
            $objetos->items[$i]->cc_longitud            = $objeto->cc_longitud;
            $objetos->items[$i]->cc_latitud             = $objeto->cc_latitud;
            $objetos->items[$i]->cc_estado              = $objeto->cc_estado;
            $objetos->items[$i]->ref_zona               = $objeto->ref_zona;
            $i++;
        }
        $objetos->identifier = "cc_id";
        $objetos->label = "cc_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxzona($zona) {
        $query = "SELECT * FROM gua_centro_comerciales WHERE ref_zona='" . $zona ."' AND cc_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $cc_id = $objeto->cc_id;
        }
        $db->quitter();
        $resultado = $cc_id;
        return $resultado;
    }
    
    
}
?>
