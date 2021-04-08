<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");
$id_cliente = $_POST['cliente'];
$suma = mb_strtoupper($_POST['suma'], 'UTF-8');
$concepto = mb_strtoupper($_POST['concepto'], 'UTF-8');
$notas = mb_strtoupper($_POST['notas'], 'UTF-8');

$domicilio_cliente;
$telefonos;
$nombre;


$fecha = date("d/m/Y");
$sql_cliente = "SELECT nombre, direccion, telefono1, telefono2 FROM clientes WHERE id = '".$id_cliente."'";
$res = mysqli_query($mysqli, $sql_cliente);
if($res)
{
	while($row = mysqli_fetch_row($res))
	{
		$domicilio_cliente = $row[1];
		$telefonos = $row[2]." ".$row[3];
		$nombre = $row[0];
	}
}
require("../obtain/userdata.php");


$sql2 = "INSERT INTO recibos(id_cliente, nombre, fecha, suma, concepto, recibio, notas) VALUES ('".$id_cliente."','".$nombre."','".$fecha."','".$suma."','".$concepto."','".$nombre_usuario."','".$notas."')";
$resultado = mysqli_query($mysqli, $sql2);
if($resultado)
{
	//echo '<script>alert ("Agregado")</script>';
	$obtener= "SELECT id FROM recibos ORDER BY id DESC LIMIT 1 ";
	$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>");
	$row=mysqli_fetch_assoc($resultado);
	$ultimo=$row["id"];

	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "SE GENERO RECIBO: ".$nombre." POR: $".$suma;
	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);

  echo "<script>location.href='../interfaces/recibo.php?id_recibo=".$ultimo."'</script>";
	enviar_correo_recibo($ultimo);
  

}
else
{
	echo '<script>alert ("Error")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>