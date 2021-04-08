<?php
require("../connections/conexion.php");
$consecutivo = $_POST['consecutivo'];
$cantidad = $_POST['cantidad'];
$concepto = mb_strtoupper($_POST['concepto'], 'UTF-8');
$precio = $_POST['precio'];
$fecha = date("d/m/Y");

$sql = "INSERT INTO cotizaciones(consecutivo, cantidad, concepto, precio) VALUES ('".$consecutivo."','".$cantidad."','".$concepto."','".$precio."')";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	echo '<script>alert ("Añadido")</script>';
	echo "<script>location.href='../interfaces/cotizar.php'</script>";
}
else
{
	echo '<script>alert ("error")</script>';
	echo mysqli_error($mysqli);
	//echo "<script>location.href='../interfaces/cotizar.php'</script>";
}




?>