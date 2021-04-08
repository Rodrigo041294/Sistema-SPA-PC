<?php
require("../connections/conexion.php");
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);
$nivel = "2";
$nombre = strtoupper($_POST['nombrecompleto']);

$insert_usuario ="INSERT INTO usuarios (usuario, password, nivel, nombre) VALUES ('".$usuario."','".$password."','".$nivel."','".$nombre."')";
$res_insert_usuario = mysqli_query($mysqli, $insert_usuario);
if($res_insert_usuario)
{
	session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE REGISTRO USUARIO NUEVO: ".$usuario;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);

	echo '<script>alert ("Agregado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo "error".mysqli_error($mysqli);
}
?>