<?php
require("../connections/conexion.php");
$id_asignar = $_POST['id_asignar'];
$fecha = $_POST['fecha'];
$usuario = $_POST['usuario'];


$sql = "UPDATE equipos_revision SET asignado = '$usuario', salida_estimada = '$fecha' WHERE id = '$id_asignar'";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{
	session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE ASIGNO EQUIPO A: ".$usuario;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
	echo '<script>alert ("Agregado")</script>';
	echo "<script>location.href='../interfaces/lista_equipos.php'</script>";
}
else
{
	echo mysqli_error($mysqli);
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}

?>