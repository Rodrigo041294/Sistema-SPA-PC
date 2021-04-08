<?php
require("../connections/conexion.php");
$id_salida = $_GET['id'];
$id_equipo;
$sql_equipo = "SELECT id FROM equipos_revision WHERE id_salida = '".$id_salida."'";
$res = mysqli_query($mysqli, $sql_equipo);
if($res)
{
	while($row = mysqli_fetch_row($res))
	{
		$id_equipo = $row[0];
	}
}
$sql_update_equipo = "UPDATE equipos_revision SET estado = 'PENDIENTE' WHERE id = '".$id_equipo."'";
$res1 = mysqli_query($mysqli, $sql_update_equipo);
if($res1)
{
	$sql_eliminar_cliente ="DELETE FROM salidas WHERE id = '".$id_salida."'";
	$res2 = mysqli_query($mysqli, $sql_eliminar_cliente);
	if($res2)
	{
		session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE ELIMINO SALIDA: ".$id_salida;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
		echo '<script>alert ("Eliminado")</script>';
		echo "<script>location.href='../interfaces/dashboard.php'</script>";
	}
}


?>