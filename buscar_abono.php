<?php
if(isset($_POST['enviar']))
{
	if($_POST['nombre']!=0)
	{
		include "conexion.php";
		$nombre=$_POST['nombre'];
		conectar();
		$bus=mysql_query("select *from operaciones where id_operacion='$nombre'") or die ("error: ".mysql_error());
		desconectar();
		$contar=mysql_num_rows($bus);
		if ($contar>0) 
		{
			$cons=mysql_fetch_array($bus);
			?>
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
						<h2>Abonos</h2>
						<p>NOMBRE:</p>
						<div><?php echo strtoupper($cons['nombre']);?></div>
						<p>DEBE:</p>
						<div><?php echo "$ ". number_format($cons['debe'],2, '.', ',');?></div>
						<form id="formulario" method="post" action="terminar_abono.php">
							<label for="abonar">Cantidad Abonar: </label> <input type="number" name="abonar" min="1" max="10000" placeholder="Introduce" />
							<input type="hidden" name="id_op" value="<?php echo $nombre;?>">
							<input type="submit" name="enviar" value="ABONAR">
						</form>
						<form id="formulario1" method="post" action="empezar_adeudo.php">
							<label for="adeudar">Cantidad Aumento: </label> <input type="number" name="adeudar" min="1" max="10000" placeholder="Introduce"/>
							<input type="hidden" name="id_op" value="<?php echo $nombre;?>">
							<input type="submit" name="enviar" value="MAS DEUDA">
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
			<?php
		}
		else
		{
			header("location:abono.php?msj=NO EXISTE");
			exit();
		}
	}
	else
	{
		header("location:abono.php?msj=DEBES SELECCIONAR DATOS");
		exit();
	}
}
else
{
	header("location:abono.php?msj=DEBE SELECCIONAR ALGO");
	exit();
}
?>
