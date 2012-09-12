<?php



/**
 * Descripcion of upload
 *
 * @author astro
 */
   
      $status = "";
      
      
      if ($_POST["action"] == "upload") {
   
          
          
          /*Nombre de la carpeta donde se alojan las imagenes subidas desde los 
          formularios*/
          $nom_carpeta_imagenes='repositorio_images'; 
          
          $tamano = $_FILES["archivo"]['size'];
          $tipo = $_FILES["archivo"]['type'];
          $archivo = $_FILES["archivo"]['name'];
          $prefijo = substr(md5(uniqid(rand())),0,6);
        
            if ($archivo != "") {
               // guardamos el archivo a la carpeta files
               //$destino =  "files/".$prefijo."_".$archivo;

      
      $de=$_SERVER['DOCUMENT_ROOT'].'/guay.server/'.$nom_carpeta_imagenes.'/';
                if (!is_dir($de)) {
                    @mkdir($de, 0777);
                    chmod("$de/", 0777);
                }
          
    $destino=$_SERVER['DOCUMENT_ROOT'].'/guay.server/'.$nom_carpeta_imagenes.'/'.$prefijo."_".$archivo;
  
              if (copy($_FILES['archivo']['tmp_name'],$destino)) {
  
                  $status = "Archivo subido: <b>".$archivo."</b>";
  
              } else {
  
                  $status = "Error al subir el archivo";
  
              }
  
          } else {
  
              $status = "Error al subir archivo";
  
          }
  
      }

?>
