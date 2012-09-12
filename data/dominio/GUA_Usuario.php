<?php
/**
 * Description of GUA_Usuario
 *
 * @author Gabriel Romero
 */
require_once("Util.php");


class GUA_Usuario {

    var $us_id_usuario;
    var $us_usuario;
    var $us_clave;
    var $us_estado;
    

    function GUA_Usuario() {
        
    }
    
    function obtener_usuarios() {
        $query = "SELECT * FROM gua_usuarios where us_estado='A' ORDER BY us_id_usuario ASC;";
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
            $objetos->items[$i]                      = new GUA_Usuario();
            $objetos->items[$i]->us_id_usuario          = $objeto->us_id_usuario;
            $objetos->items[$i]->us_usuario             = $objeto->us_usuario;
            $objetos->items[$i]->us_clave               = $objeto->us_clave;
            $objetos->items[$i]->us_estado              = $objeto->us_estado;
            $i++;
        }
        $objetos->identifier = "us_id_usuario";
        $objetos->label = "us_usuario";
        
        return $objetos;
    }
    
    /*function buscar_idxemail($us_email) {
        $query = "SELECT * FROM gua_usuarios WHERE us_email='" . $us_email ."' AND us_estado = 'A';";
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $result = $db->execRequete($query);
        if (($objeto = $db->objetSuivant($result)) != null) {
            $us_id_usuario = $objeto->us_id_usuario;
        }
        $db->quitter();
        $resultado = $us_id_usuario;
        return $resultado;
    }*/
    
    function comprobar_usuario_clave( $usuario, $clave ) {
       
        // Connect to the database
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $query = "SELECT * FROM gua_usuarios WHERE us_estado = 'A' AND us_usuario = '".$usuario."' AND us_clave = '".$clave."'";
        $result = $db->execRequete($query);
        $objetos=$this->obtener_objetos($db,$result);
        $db->quitter();
        
        $json = new Services_JSON;
        return $json->encode($objetos);
       
    }
    
    /*function registrar_usuario($nom_apell, $email, $password){
       $string=explode(" ",$nom_apell);
       $nombre=ucfirst($string[1]); 
       $apellido=ucfirst($string[2]);
       $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
       $instruccion = 'INSERT INTO ltc_usuario (us_id_usuario, us_nombre, us_apellido, us_email, us_clave, us_estado) '.
       'VALUES (null, "'.$nombre.'",  "'.$apellido.'","'.$email.'" ,"'.$password.'","A");';                
       $db->execRequete( $instruccion ); 
       
    }*/
 
    
    
    
}
?>