<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");
$id_equipo = $_POST['id_equipo'];
$fecha_salida = $_POST['fecha_salida']." 00:00:00";


$diagnostico = mb_strtoupper($_POST['diagnostico'], 'UTF-8');
$sql = "UPDATE equipos_revision SET diagnostico = '".$diagnostico."' WHERE id = '".$id_equipo."'";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{
	$update_calendario = "UPDATE calendario set fin = '$fecha_salida' WHERE id_equipo = '$id_equipo'";
	$res_calen = mysqli_query($mysqli, $update_calendario);
	if($res_calen)
	{
		session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE DIAGNOSTICO EQUIPO CON O.S.: ".$id_equipo;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
		echo '<script>alert ("Agregado")</script>';
		echo "<script>location.href='../interfaces/dashboard.php'</script>";
		enviar_correo_diagnostico($id_equipo);
	}
	else
	{
		echo mysqli_error($mysqli);
	}
	
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>