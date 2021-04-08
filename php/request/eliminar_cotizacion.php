<?php
require("../connections/conexion.php");
$consecutivo = $_GET['id'];
$eliminar ="DELETE FROM cotizaciones WHERE consecutivo = '".$consecutivo."'";
$res = mysqli_query($mysqli, $eliminar);
if($res)
{
	session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE ELIMINO COTIZACION: ".$consecutivo;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
	echo '<script>alert ("Eliminado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>