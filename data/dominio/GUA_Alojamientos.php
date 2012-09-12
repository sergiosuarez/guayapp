<?php
/**
 * Description of GUA_Alojamientos
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Alojamientos {

    var $al_id;
    var $al_descripcion;
    var $al_costo;
    var $al_longitud;
    var $al_latitud;
    var $al_telefonos;
    var $al_paginaweb;
    var $ref_tipo;
    var $al_estado;
    

    function GUA_Alojamientos() {
        
    }
    
   function obtener_alojamientos() {
        $query = "SELECT * FROM gua_alojamientos where al_estado='A' ORDER BY al_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_alojamientosxtipo($tipo) {
        $query = "SELECT * FROM gua_alojamientos WHERE ref_tipo='" . $tipo ."' AND al_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_alojamientosxdescripcion($descripcion) {
        $query="SELECT * FROM gua_alojamientos where al_descripcion LIKE '%".$descripcion."%' AND al_estado='A' ORDER BY al_id DESC;";
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
            $objetos->items[$i]                         = new GUA_Alojamientos();
            $objetos->items[$i]->al_id                  = $objeto->al_id;
            $objetos->items[$i]->al_descripcion         = $objeto->al_descripcion;
            $objetos->items[$i]->al_costo               = $objeto->al_costo;
            $objetos->items[$i]->al_longitud            = $objeto->al_longitud;
            $objetos->items[$i]->al_latitud             = $objeto->al_latitud;
            $objetos->items[$i]->al_telefonos           = $objeto->al_telefonos;
            $objetos->items[$i]->al_paginaweb           = $objeto->al_paginaweb;
            $objetos->items[$i]->ref_tipo               = $objeto->ref_tipo;
            $objetos->items[$i]->al_estado              = $objeto->al_estado;
            
            $i++;
        }
        $objetos->identifier = "al_id";
        $objetos->label = "al_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxzona($tipo) {
        $query = "SELECT * FROM gua_alojamientos WHERE ref_tipo='" . $tipo ."' AND al_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $al_id = $objeto->al_id;
        }
        $db->quitter();
        $resultado = $al_id;
        return $resultado;
    }
    
    
}
?>
