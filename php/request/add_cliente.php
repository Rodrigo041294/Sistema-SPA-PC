<?php

require("../connections/conexion.php");
$nombre = mb_strtoupper($_POST['nombre'], 'UTF-8');
$direccion = mb_strtoupper($_POST['direccion'], 'UTF-8');
$telefono1 = mb_strtoupper($_POST['telefono1'], 'UTF-8');
$telefono2 = mb_strtoupper($_POST['telefono2'], 'UTF-8');
$email = mb_strtoupper($_POST['email'], 'UTF-8');

$sql = "INSERT INTO clientes(nombre, direccion, telefono1, telefono2, email) VALUES ('".$nombre."','".$direccion."','".$telefono1."','".$telefono2."','".$email."')";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{
	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "SE REGISTRO NUEVO CLIENTE: ".$nombre;
	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);
	echo '<script>alert ("Agregado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}


?>