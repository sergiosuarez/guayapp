<? require_once("data/control_sesion.php"); ?>
<html>
<head>
<title>Ingreso de Información</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="../../stylesheet/images/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../../styles/mos-style.css"> <!--pemanggilan file css-->

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/informacion/f_informacion.js"></script>
</head>

<body>
    <input type="hidden" id="id_registro" name="" value="<?= $_GET['id_registro'] ?>" />
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
		<!--Hallo, Mas Administrator<br>-->
		<b><? echo $_SESSION['usuario'];?>|<a href="../../ingreso.php">Menú </a> | <a href="../../data/logout.php">Salir</a></b>
		</div>
	<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<div id="leftBar">
	<ul>
		<li><a id="btn_registros"><b>Registros</b></a></li>
	</ul>
	</div>
	<div id="rightContent">
	<h3>Nueva Información</h3>
		<table width="95%">
                       <form id="form_ingre_info" method="GET" action="" onsubmit="return false">
                            <tr>
                                <td><b>Descripción:</b></td>
                                <td><textarea id="txta_descripcion"></textarea></td>
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
</body>
</html>


