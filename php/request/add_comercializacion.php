<?php
require("../connections/conexion.php");

$empresa = $_POST['empresa'];
$tipo_servicio = $_POST['tipo_servicio'];
$asignado = $_POST['asignado'];
$fsolicitud = $_POST['fsolicitud'];
$fvisita = $_POST['fvisita'];
$interesado = $_POST['interesado'];
$razon = $_POST['razon'];
$tr = $_POST['tr'];
$dr = $_POST['dr'];
$notas = $_POST['notas'];

$query = "INSERT INTO comercializacion(cliente, tipo_servicio, asignado, fsolicitud, fvisita, interesado, razon, tr, dr, notas) VALUES('$empresa', '$tipo_servicio', '$asignado', '$fsolicitud', '$fvisita', '$interesado', '$razon', '$tr', '$dr', '$notas')";
$res_query = mysqli_query($mysqli, $query);

if($res_query)
{
	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "SE REGISTRO COMERCIALIZACION: ".$empresa;
	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);

	echo '<script>alert ("Agregado")</script>';
	echo "<script>location.href='../interfaces/comercializacion.php'</script>";
}
else
{
	echo '<script>alert ("Error")</script>';
}


?>