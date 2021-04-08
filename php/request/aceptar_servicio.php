<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");

$id_servicio_empresa = $_POST['id_servicio_empresa'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$tecnico = $_POST['tecnico'];

$id_cliente = "";


$sql_cliente = "SELECT id_cliente FROM servicios WHERE id = '".$id_servicio_empresa."'";
$res = mysqli_query($mysqli, $sql_cliente);
if($res)
{
	while($row = mysqli_fetch_row($res))
	{
		$id_client = $row[0];
	}
}
else
{
	echo mysqli_error($mysqli);
}
require("../obtain/userdata.php");


$sql2 = "UPDATE servicios SET aceptado = '1', fecha_servicio = '$fecha', hora_servicio = '$hora', asignado ='$tecnico' WHERE id = '$id_servicio_empresa'";

$resultado = mysqli_query($mysqli, $sql2);
if($resultado)
{

	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "USUARIO: ".$nombre." ACEPTO EL SERVICIO CON FOLIO: ".$id_servicio_empresa;
	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);

  	
	enviar_correo_servicio($id_cliente, $id_servicio_empresa);
	echo '<script>alert ("Aceptado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
  

}
else
{
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>