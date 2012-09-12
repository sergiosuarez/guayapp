<?php

session_start();
if(!isset($_SESSION['us_usuario']) || $_SESSION['us_usuario']==null){
            header("Location: index.php");
}
?>
