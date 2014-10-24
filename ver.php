<?php
if(!empty($_GET['id']))
{
	include "conexion.php";
	$id=$_GET['id'];
	conectar();
	$bus=mysql_query("select *from operaciones where id_operacion='$id'") or die("error: ".mysql_error());
	desconectar();
	$contar=mysql_num_rows($bus);
	if($contar>0)
	{
		$con=mysql_fetch_array($bus);
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
					<h2>VER TODAS DEUDAS</h2>
					<p>NOMBRE:</p>
						<div><?php echo strtoupper($con['nombre']);?></div>
						<p>DEBE:</p>
						<div><?php echo "$ ". number_format($con['debe'],2, '.', ',');?></div>
						<?php
							$aux=$con['id_operacion'];
							conectar();
							$b=mysql_query("select *from adeudos where id_op='$aux' order by fecha_op DESC") or die("error busquyeda: ".mysql_error());
							desconectar();
							$conteo=mysql_num_rows($b);
							if($conteo>0)
							{
								echo "<table align='center' border=1>";
								echo "<tr class='titeles'>";
								echo "<td>MOVIMEINTO</td>";
								echo "<td>FECHA</td>";
								echo "<td>SALDO ANTERIOR</td>";
								echo "<td>CUANTO MOVIO</td>";
								echo "</tr>";
								while ($c=mysql_fetch_array($b))
								{
									echo "<tr>";
									$au=$c['estado'];
									if($au==1)
									{
										$new="ABONO";
									}
									else if ($au==2)
									{
										$new="ENDEUDARSE";
									}
									else
									{
										$new="no info";
									}
									echo "<td>".$new."</td>";
									$fecha=explode("-", $c['fecha_op']);
									$fecha1=$fecha[2]."/".$fecha[1]."/".$fecha[0];
									echo "<td>".$fecha1."</td>";
									echo "<td> $".number_format($c['saldo'],2,'.',',')."</td>";
									echo "<td> $".number_format($c['agrego'],2,'.',',')."</td>";
									echo "</tr>";
								}
								echo "</table>";
							}
							else
							{
								echo "<h4>No existen mas movimientos</h4>";
							}
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
	<?php
	}	
	else
	{
		header("location:deudoras.php?msj=NO EXISTEN DATOS PARA MOSTRAR");
		exit();
	}
}
else
{
	header("deudoras.php?msj=ALGO SALIO MAL, VUELVE A INTERNARLO");
	exit();
}
?>
