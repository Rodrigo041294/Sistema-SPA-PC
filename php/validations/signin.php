<?php
require("../connections/conexion.php");
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql="SELECT * FROM usuarios WHERE usuario = '$username' AND password = '$password'";
$resultado = mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($resultado,MYSQLI_ASSOC);

if(mysqli_num_rows($resultado) == 1)
{
	$_SESSION['usuario'] = $username;

	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "INICIO DE SESION";
	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo "<script>location.href='../../index.php?error=true'</script>";
}

?>