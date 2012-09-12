<? require_once("data/control_sesion.php"); ?>
<html>
<head>
<title>Panel de Administración Guayapp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">

<link rel="shortcut icon" href="stylesheet/images/devil-icon.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="styles/mos-style.css"> <!--pemanggilan file css-->

<script type="text/javascript" src="js/jquery.js"></script>


</head>

<body>
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
		<b><? echo $_SESSION['us_usuario'];?>|<a href="data/logout.php">Salir</a></b>
		</div>
	<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<!--<div id="leftBar">
	<ul>
		<li><a href="index.html">Dashboard</a></li>
		<li><a href="tabel.html">Tabel</a></li>
		<li><a href="form.html">Form</a></li>
	</ul>
	</div>-->
	<div id="rightContent">
	<h3>Administrador de contenido</h3>
	<!--<div class="quoteOfDay">
	<b>Quote of the day :</b><br>
	<i style="color: #5b5b5b;">"If you think you can, you really can"</i>
	</div>-->
		<div class="shortcutHome">
		<a href="pages/informacion/informacion.php"> <img src="images/info_icon.png" alt="info_icon" ><br>INFORMACIÓN ÚTIL</a>
		</div>
		<div class="shortcutHome">
		<a href="pages/atractivos_turist/atractivos_turist.php"><img src="images/atrac_turist_icon.png" alt="atrac_turist_icon" ><br>ATRACTIVOS TURÍSTICOS</a>
		</div>
		<div class="shortcutHome">
		<a href="pages/alojamiento/alojamiento.php"><img src="images/aloj_icon.png" alt="aloj_icon" ><br>ALOJAMIENTO </a>
		</div>
		<div class="shortcutHome">
		<a href="pages/gastronomia/gastronomia.php"><img src="images/comidas_icon.png" alt="comidas_icon"><br>COMIDA </a>
		</div>
		<div class="shortcutHome">
		<a href="pages/diversion_noct/diversion_noct.php"><img src="images/diver_noc_icon.png" alt="diver_noc_icon"><br>DIVERSIÓN NOCTURNA </a>
		</div>
		<div class="shortcutHome">
		<a href="pages/taxi/taxi.php"><img src="images/taxis_icon.png" alt="taxis_icon" ><br>TAXIS </a>
		</div>
                <div class="shortcutHome">
		<a href="pages/centros_comerc/centros_comerc.php"><img src="images/cent_comerc_icon.png" alt="cent_comerc_icon" ><br>CENTROS COMERCIALES</a>
		</div>
                <div class="shortcutHome">
		<a href="pages/evento/evento.php"><img src="images/event_icon.png" alt="event_icon" ><br>EVENTOS</a>
		</div>
               <div class="shortcutHome">
		<a href="pages/publicidad/publicidad.php"><img src="images/publicidad_icon.png" alt="publicidad_icon" ><br>PUBLICIDAD</a>
		</div>

		<div class="clear"></div>

		<!--<div id="smallRight"><h3>Informasi web anda</h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Jumlah posting</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah kategori</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah komentar diterbitkan</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah komentar belum diterbitkan</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah foto dalam galeri</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Jumlah data buku tamu</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
		</table>
		</div>-->
		<!--<div id="smallRight"><h3>Statistik pengunjung web</h3>

		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;">Pengunjung online</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Pengunjung hari ini</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Total pengunjung</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Hit hari ini</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
			<tr><td style="border: none;padding: 4px;">Total hit</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
		</table>
		</div>-->
	</div>
<div class="clear"></div>
<!--<div id="footer">
	&copy; 2012 MOS css template | <a href="#">Nama Website Anda</a> | design <a href="http://arirusmanto.com" target="_blank">arirusmanto.com</a><br>
	redesign <a href="#">Tulis nama anda disini</a> | Silahkan baca <a href="lisensi.txt" target="_blank">Lisensi</a>
</div>-->
</div>
</body>
</html>
