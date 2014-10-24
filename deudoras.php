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
			<table align="center" border="1" class="tabla">
				<thead>
					<tr>
						<th>NOMBRE</th>
						<th>DEBE</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
				<?php
					include "conexion.php";
					conectar();
					$bus=mysql_query("select *from operaciones order by nombre asc") or die("error consulta: ".mysql_error());
					desconectar();
					$contar=mysql_num_rows($bus);
					if($contar>0)
					{
						while ($con=mysql_fetch_array($bus))
						{
							echo "<tr>";
							echo "<td>".strtoupper($con['nombre'])."</td>";
							echo "<td> $ ".number_format($con['debe'],2,'.',',')."</td>";
							echo "<td><a href='ver.php?id=".$con['id_operacion']."'>";
							if($con['debe']>0)
							{
								echo "<div class='deberas'>STATUS</div></a></td>";
							}
							else
							{
								echo "<div class='libre'>STATUS</div></a></td>";
							}
							echo "</tr>";
						}
					}
					else
					{
						echo "<tr><td>NO HAY NADA</td></tr>";
					}
				?>
				</tbody>
			</table>
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
