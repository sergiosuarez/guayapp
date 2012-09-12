<?php
/**
 * Description of GUA_Informacion
 *
 * @author Sergio Suarez
 */
require_once("Util.php");

class GUA_Informacion {

    var $in_id;
    var $in_descripcion;
    var $in_estado;
    

    function GUA_Informacion() {
        
    }
    
    function obtener_informacion() {
        $query = "SELECT * FROM gua_informacion where in_estado='A' ORDER BY in_id ASC;";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete( $query );
        $objetos=$this->obtener_objetos($db,$result);
        
        $db->quitter();
        $json = new Services_JSON;
        return $json->encode($objetos);
    }



    function obtener_informacionXid($id) {
        $query = "SELECT * FROM gua_informacion where in_estado='A' and in_id='".$id."' ORDER BY in_id ASC;";
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
            $objetos->items[$i]                         = new GUA_Informacion();
            $objetos->items[$i]->in_id                  = $objeto->in_id;
            $objetos->items[$i]->in_descripcion         = $objeto->in_descripcion;
            $objetos->items[$i]->in_estado              = $objeto->in_estado;
            $i++;
        }

        $objetos->identifier = "in_id";
        $objetos->label = "in_descripcion";
        return $objetos;
    }
       
    
}
?>
