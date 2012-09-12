<?php
    require_once ($_SERVER['DOCUMENT_ROOT']."/liberatucurso/data/dominio/LTC_Multimedia.php");
    require_once ($_SERVER['DOCUMENT_ROOT']."/liberatucurso/data/dominio/Util.php");

/**
 * Description of Administrar_Multimedia
 *
 * @author Sergio Suarez
 */

class Administrar_Multimedia {
    
    var $multimedia;
    var $tipo_accion;
    
    
    function subir_imagen(){
        $status = "";

               
            $nom_usuario=$_REQUEST["nom_usuario"];
            $nom_articulo=$_REQUEST["nom_artic"]; 
            $nom_seccion=$_REQUEST["id_sec"]; 
           
          //$tamano = $_FILES["archivo"]['size'];
          //$tipo = $_FILES["archivo"]['type'];
          $archivo = $_FILES["archivo"]['name'];
          
          //echo $archivo;
          $prefijo = substr(md5(uniqid(rand())),0,6);
        
            if ($archivo != "") {
                
                $destino=$_SERVER['DOCUMENT_ROOT'].'/ltc.server/'.$nom_usuario.'/';
                if (!is_dir($destino)) {
                    @mkdir($destino, 0777);
                    chmod("$destino/", 0777);
                }
                
                $destino=$_SERVER['DOCUMENT_ROOT'].'/ltc.server/'.$nom_usuario.'/'.$nom_articulo.'/';
                if(!is_dir($destino)){
                        @mkdir($destino, 0777);
                        chmod("$destino/", 0777);
                }
                
                $destino=$_SERVER['DOCUMENT_ROOT'].'/ltc.server/'.$nom_usuario.'/'.$nom_articulo.'/'.$nom_seccion.'/';
                if(!is_dir($destino)){
                            @mkdir($destino, 0777);
                            chmod("$destino/", 0777);
                }

           }
          
        
            $destino=$_SERVER['DOCUMENT_ROOT'].'/ltc.server/'.$nom_usuario.'/'.$nom_articulo.'/'.$nom_seccion.'/'.$prefijo."_".$archivo;
            if (copy($_FILES['archivo']['tmp_name'],$destino)) {
                    return $status = $destino;
                    
             } else {
                    return $status= 0;
             }
    }

    function registrar_multimedia($id_seccion, $ruta, $descripcion,$tag ){
        $instruccion = "INSERT INTO ltc_multimedia (mu_id_multimedia,mu_ruta,mu_descripcion,mu_tag,ref_seccion,mu_estado) VALUES (null,'".$ruta."','".$descripcion."','".$tag."','".$id_seccion."','A');";
        $this->procesar_peticion($instruccion);
    }
    
    function modificar_multimedia($id_multimedia, $ruta, $descripcion,$tag  ){
        $instruccion = "UPDATE ltc_multimedia SET mu_ruta='". $ruta."',mu_descripcion='". $descripcion."',mu_tag='". $tag."'   WHERE mu_id_multimedia=".$id_multimedia.";";
        $this->procesar_peticion($instruccion);
    }
    
    function eliminar_multimedia($id_multimedia ){
        $instruccion = "UPDATE ltc_multimedia SET mu_estado='E' WHERE mu_id_multimedia=".$id_multimedia.";";
        $this->procesar_peticion($instruccion);
    }
    
    function procesar_peticion($instruccion){
        $db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
        $db->execRequete( $instruccion );
    }
}
?>
