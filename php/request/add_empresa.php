<?php

require("../connections/conexion.php");
$nombre = mb_strtoupper($_POST['nombre'], 'UTF-8');
$direccion = mb_strtoupper($_POST['direccion'], 'UTF-8');
$telefono = mb_strtoupper($_POST['telefono'], 'UTF-8');
$rfc = mb_strtoupper($_POST['rfc'], 'UTF-8');
$email = mb_strtoupper($_POST['email'], 'UTF-8');
$nombre_contacto = mb_strtoupper($_POST['nombre_contacto'], 'UTF-8');

$sql = "INSERT INTO empresas(nombre, direccion, telefono, correo, rfc, nombre_contacto) VALUES ('".$nombre."','".$direccion."','".$telefono."','".$email."','".$rfc."','".$nombre_contacto."')";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{
	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "SE REGISTRO NUEVA EMPRESA: ".$nombre;
	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);

	echo '<script>alert ("Agregado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
	//echo mysqli_error($mysqli);
}
?>