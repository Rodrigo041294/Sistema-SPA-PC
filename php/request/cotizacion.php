<?php

require("../connections/conexion.php");
require("../request/enviar_correo.php");

$id_cliente = $_POST['cliente'];
$data = json_decode($_POST['array']);


$obtener= "SELECT consecutivo FROM cotizaciones ORDER BY id DESC LIMIT 1 ";
$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>". mysql_error());
$row=mysqli_fetch_assoc($resultado);
$consecutivo=$row["consecutivo"]+1;



for($i=0; $i< sizeof($data); $i++)
{
	$precio = $data[$i]->precio;
	$cantidad = $data[$i]->cantidad;
	$concepto = $data[$i]->concepto;
	$total = $data[$i]->total;
	$contador_errores = 0;

	$query_cotizacion = "INSERT INTO cotizaciones(consecutivo, cantidad, concepto, precio, cliente) VALUES ('$consecutivo', '$cantidad', '$concepto', '$precio', '$id_cliente')";
	$res = mysqli_query($mysqli, $query_cotizacion);
	if($res)
	{
		

	}
	else
	{
		$contador_errores++;
	}
	
}

if($contador_errores > 0)
{
	echo "errores";
}
else
{
	echo $consecutivo;
}


?>