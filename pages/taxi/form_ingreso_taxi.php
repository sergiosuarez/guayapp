<html>
<head>
<title>Ingreso de Taxis</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="../../stylesheet/images/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../../styles/mos-style.css"> <!--pemanggilan file css-->
<link rel="stylesheet" href="../../styles/modal.css" type="text/css" />


<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/ajaxupload.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA4amrh5S8GeLT2ikfyNKPpBRK2odW68km8KcZRnyHWeU4uZ2ltxTOumbpgZj95pjMoxm5Ej3mjqGbKQ" type="text/javascript"></script>
<script type="text/javascript" src="../../js/taxi/f_taxi.js"></script>

</head>

<body>
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
		<!--Hallo, Mas Administrator<br>-->
		<b><? echo $_SESSION['usuario'];?>|<a href="../../ingreso.php">Menú</a>|<a href="../../data/logout.php">Salir</a></b>
		</div>
	<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<div id="leftBar">
	<ul>
		<li><a href="taxi.php"><b>Registros</b></a></li>
	</ul>
	</div>
	<div id="rightContent">
	<h3>Nuevo Taxi</h3>
		<table width="95%">
                       <form id="form_ingre_info" method="GET" action="" onsubmit="return false">
                            <tr>
                                <td><b>Descripción:</b></td>
                                <td><textarea id="txta_descripcion" ></textarea></td>
                            </tr>

                            <tr>
                                <td><b>Zona:</b></td>
                                <td>
                                    <select id="cmb_zona">
                                      
                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td><b>Teléfono:</b></td>
                                <td><input type="text" id="txta_lugar" /></td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <input id="submit" type="submit" class="button" value="Guardar">
                                    <input type="reset" class="button" value="Limpiar">
                                </td>
                            </tr>

                        </form>
		</table>
	</div>
<div class="clear"></div>
<!--<div id="footer">
	&copy; 2012 MOS css template | <a href="#">Nama Website Anda</a> | design <a href="http://arirusmanto.com" target="_blank">arirusmanto.com</a><br>
	redesign <a href="#">Tulis nama anda disini</a> | Silahkan baca <a href="lisensi.txt" target="_blank">Lisensi</a>
</div>-->
</div>

<!-- ////////////// Pop Up subir imagen///////////////////-->
    <div id='ventana_subir_archivo' class="windowUnload">

        <div>
                <div class='titulo_upload_img'> Subida de imagen</div>
                <!--<div class='centrar_campos'><label>Descripci&oacute;n:</label> <input class='input_txt' type='text' id='descripcion_img'  maxlength='50'/><span class="requerido">*</span></div>-->
                <div class="informacion" > <br />El archivo a subir debe tener formato .PNG .JPG.</div>
                  <div class='contenido_centrado'>
                    <a href='#' class='button' id="btn_enviar_img" name='archivo' ><b>Subir imagen</b></a>
                    <a href='#' class='button_upload cerrar' id='btn_cerrar_pop_up_subir_img'>X</a>
                </div>
                <div id='progressbar_img' class='mensaje_upload'><img src='../../images/loader.gif' alt ="loading"/></div>
                <div id='mensaje_img' class='mensaje_upload'></div>
        </div>
    </div>
  <!-- ////////////// Fin Pop Up subir imagen///////////////////-->

  <!-- ////////////// Pop up ubicar geograficamente ///////////////////-->
   <div id='ventana_ubicacion_geografica' class="windowUnload">
        
        <!--<div>-->
                <div class='titulo_upload_img'> Ubicación Geográfica</div>
                
                <div  id="map" class='mapa_geo'></div>
                <!--<div class="informacion" >Mover el punto del mapa al lugar de ubicación.</div>-->
                <!--<input class='input_txt' type='text' id='descripcion_img'  maxlength='50'/><span class="requerido">*</span>-->
                <input type="hidden" class='input_txt' id="mouse" name="mouse"/>
                <br /><br /><b>Posición del punto:  </b><input id="location" name="location" value="" required="false"  maxlength="50"/>
                <div class='contenido_centrado'>
                    <a href='#' class='button' id="btn_guardar_ubica_geo" ><b>Guardar</b></a>
                    <a href='#' class='button_upload cerrar' id="btn_cerrar_pop_up_cerrar_ubica_geo" >X</a>
                </div>
                <div id='mensaje_img' class='mensaje_upload'></div>
        
    </div>
    <!-- ////////////// Fin Pop up ubicar geograficamente ///////////////////-->

    <div id="sombra" class="sobmbraUnload"></div>
</body>
</html>


