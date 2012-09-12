<?php
/**
 * Description of GUA_Publicidad
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Publicidad {

    var $pu_id;
    var $pu_ruta_multimedia;
    var $pu_estado;
    

    function GUA_Publicidad() {
        
    }
    
    function obtener_publicidades() {
        $query = "SELECT * FROM gua_publicidad where pu_estado='A' ORDER BY pu_id ASC;";
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
            $objetos->items[$i]                         = new GUA_Publicidad();
            $objetos->items[$i]->pu_id       = $objeto->pu_id;
            $objetos->items[$i]->pu_ruta_multimedia          = $objeto->pu_ruta_multimedia;
            $objetos->items[$i]->pu_estado           = $objeto->pu_estado;
            $i++;
        }

        $objetos->identifier = "pu_id";
        $objetos->label = "pu_ruta_multimedia";
        return $objetos;
    }
    
    
    
}
?>
