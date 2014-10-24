<?php
if(isset($_POST['enviar']))
{
	if(!empty($_POST['nombre']) && !empty($_POST['deuda']))
	{
		include "conexion.php";
		$nombre=$_POST['nombre'];
		$debe=$_POST['deuda'];
		conectar();
		$bus=mysql_query("select *from operaciones where nombre='$nombre'") or die("error: ".mysql_error());
		desconectar();
		$conta=mysql_num_rows($bus);
		if($conta>0)
		{
			header("location:index.php?msj=AMOR YA ESTA DEBIENDO ".$nombre);
			exit();
		}
		else
		{
			$fecha=date("Y-m-d");
			conectar();
			$op=mysql_query("INSERT INTO operaciones(id_operacion,nombre,debe,fecha)VALUE('','$nombre','$debe','$fecha')") or die ("error ingreso: ".mysql_error());
			desconectar();
			if($op)
			{
				header("location:index.php?msj=INGRESO CON EXITO");
				exit();
			}
			else
			{
				header("location:index.php?msj=OCURRIO ALGUN ERROR EN LO QUE GUARDABA, INTENTE DE NUEVO");
				exit();
			}
		}
	}
	else
	{
		header("location:index.php?msj=AMOR FALTA NOMBRE O CANTIDAD, NO SE GUARDA SI FALTA");
		exit();
	}
}
else
{
	header("location:index.php?msj=DEBE INGRESAR ALGO");
	exit();
}
?>
