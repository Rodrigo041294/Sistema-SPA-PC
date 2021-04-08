<?php
require("../connections/conexion.php");
$id_asignar = $_POST['id_asignacion'];
$usuario = $_POST['usuario'];
$fecha = $_POST['fecha'];


$sql = "UPDATE servicios SET asignado = '$usuario', fecha_termino_aprox = '$fecha' WHERE id = '$id_asignar'";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{
	session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE ASIGNO SERVICIO A: ".$usuario;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
	echo '<script>alert ("Agregado")</script>';
	echo "<script>location.href='../interfaces/lista_equipos.php'</script>";
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}

?>