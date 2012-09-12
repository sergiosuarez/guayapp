<? require_once("data/control_sesion.php"); ?>
<html>
<head>
<title>Administración - Sección Diversión Nocturna</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="../../stylesheet/images/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../../styles/mos-style.css"> <!--pemanggilan file css-->
<style type="text/css" title="currentStyle">
    @import "../../styles/demo_page.css";
    @import "../../styles/demo_table.css";
</style>



<script type="text/javascript" language="javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../../js/diversion_noct/f_diversion_noct.js"></script>

</head>

<body >
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
		<!--Hallo, Mas Administrator<br>-->
		<b><a href="../../ingreso.php">Menú</a> | <a href="../../data/logout.php">Salir</a></b>
		</div>
	<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<div id="leftBar">
	<ul>
		<li><a href="form_ingreso_diversion_noct.php"><b>Nuevo</b></a></li>
		<!--<li><a href="tabel.html">Tabel</a></li>
		<li><a href="form.html">Form</a></li>-->
	</ul>
	</div>
	<div id="rightContent">
	<h3>Sección Diversión Nocturna</h3>
                <table cellpadding='0' cellspacing='0' border='0' class='display' id ="tbl_registros_informacion">
			<thead>
                          <tr>
                            <th>No</th>
                            <th>Descripción</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                        </tbody>
		</table>

       
	</div>
<div class="clear"></div>
<!--<div id="footer">
	&copy; 2012 Guayapp | <a href="#">Nama Website Anda</a> | design <a href="http://arirusmanto.com" target="_blank">arirusmanto.com</a><br>
	redesign <a href="#">Tulis nama anda disini</a> | Silahkan baca <a href="lisensi.txt" target="_blank">Lisensi</a>
</div>-->
</div>
</body>
</html>