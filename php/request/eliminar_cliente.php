<?php
require("../connections/conexion.php");
$id_cliente = $_POST['id_cliente'];
$sql_eliminar_cliente ="DELETE FROM clientes WHERE id = '".$id_cliente."'";
$res = mysqli_query($mysqli, $sql_eliminar_cliente);
if($res)
{
	session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE ELIMINO CLIENTE ".$id_cliente;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
	echo '<script>alert ("Eliminado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>