<?php
/**
 * Description of GUA_Eventos
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Eventos {

    var $ev_id;
    var $ev_descripcion;
    var $ev_fecha_hora;
    var $ev_lugar;
    var $ev_costo;
    var $ref_tipo;
    var $ev_estado;
    

    function GUA_Eventos() {
        
    }
    
   function obtener_eventos() {
        $query = "SELECT * FROM gua_eventos where al_estado='A' ORDER BY al_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    function obtener_eventosxtipo($tipo) {
        $query = "SELECT * FROM gua_eventos WHERE ref_tipo='" . $tipo ."' AND ev_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }
    
    public static function obtener_eventosxdescripcion($descripcion) {
        $query="SELECT * FROM gua_eventos where ev_descripcion LIKE '%".$descripcion."%' AND ev_estado='A' ORDER BY ev_id DESC;";
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
            $objetos->items[$i]                         = new GUA_Eventos();
            $objetos->items[$i]->ev_id                  = $objeto->ev_id;
            $objetos->items[$i]->ev_descripcion         = $objeto->ev_descripcion;
            $objetos->items[$i]->ev_fecha_hora          = $objeto->ev_fecha_hora;
            $objetos->items[$i]->ev_lugar               = $objeto->ev_lugar;
            $objetos->items[$i]->ev_costo               = $objeto->ev_costo;
            $objetos->items[$i]->ref_tipo               = $objeto->ref_tipo;
            $objetos->items[$i]->ev_estado              = $objeto->ev_estado;            
            $i++;
        }
        $objetos->identifier = "ev_id";
        $objetos->label = "ev_descripcion";
        return $objetos;
    }
    
    
    function buscar_idxtipo($tipo) {
        $query = "SELECT * FROM gua_eventos WHERE ref_tipo='" . $tipo ."' AND ev_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $ev_id = $objeto->ev_id;
        }
        $db->quitter();
        $resultado = $ev_id;
        return $resultado;
    }
    
    
}
?>
