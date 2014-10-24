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
			<li><a href="total.php">TOTAL</a></li>
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
			<h2>AGREGAR</h2>
			<form id="formulario" method="post" action="adeudarse.php">
				<label for="nombre">Nombre: </label> <input type="text" name="nombre" placeholder="Introduzca su nombre completo" required />
				<label for="deuda">Debe: </label> <input type="number" name="deuda" min="1" max="10000" placeholder="Introduce " required />
				<br>
				<input type="submit" name="enviar" value="INGRESAR DEUDORA">
			</form>
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
