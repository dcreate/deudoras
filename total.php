<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Para Cobrar Dra" />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1 /">
	<title>DEUDORAS AMOR</title>
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC|Istok+Web|Esteban|Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="estilo.css" />
	<script src="prefixfree.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<img src="image/logo.jpg" />
		</figure>
		<h1>Control de deudoras</h1>
		<figure id="avatar">
			<img src="image/pie.jpg" />
		</figure>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">INGRESAR</a></li>
			<li><a href="abono.php">ABONAR</a></li>
			<li><a href="deudoras.php">VER DEUDORAS</a></li>
		</ul>
	</nav>
	<?php
	if(!empty($_GET['msj']))
	{
	?>
		<aside>
			<?php echo "<h4>".$_GET['msj']."</h4>";?>
		</aside>
	<?php
	}
	?>
	<section id="contenido">
		<article class="item">
			<h2>TOTAL</h2> 
			<?php
			include "conexion.php";
			conectar();
			$bus=mysql_query("SELECT SUM(debe) totales FROM operaciones") or die ("error: ".mysql_error());
			desconectar();
			$con=mysql_fetch_array($bus);
			echo "<div class='tutol'>$ ". number_format($con['totales'],'2','.',',')."</div>";
			?>
		</article>
	</section>
	<footer>
		<p>
			<strong>Control de deudoras bolsas</strong>
		</p>
		<p>
			Creado por @dcreate
		</p>
	</footer>
</body>
</html>
