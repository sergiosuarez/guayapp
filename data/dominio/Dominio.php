<?php
    require_once("Util.php");
    
    class Dominio {

		function obtener_objetos( $instruccion ) {
                     
			$db = new BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
//                        echo $instruccion;
                        $db->execRequete( $instruccion );                  
                        $size=mysql_num_rows($db);
                        for ($i = 0; $i < $size ; $i++)
				$objetos[] = $db->objetSuivant($i);
			$db->quitter();
			return $objetos;

		}


		function obtener_objeto( $query ) {
			$db = new  BD(NAME_MyS, PASS_MyS, BASE_MyS, SERVER_MyS);
                        $db->execRequete( $query );
			for ($i = 0; $i < $db->getSize(); $i++)
				$objeto = $db->objetSuivant($i);
			$db->quitter();
			return $objeto;
		}
    }
?>


