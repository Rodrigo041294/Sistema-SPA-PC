<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");
$equipo = mb_strtoupper($_POST['equipo'], 'UTF-8');
$marca = mb_strtoupper($_POST['marca'], 'UTF-8');
$modelo = mb_strtoupper($_POST['modelo'], 'UTF-8');
$serie = mb_strtoupper($_POST['serie'], 'UTF-8');
$problema = mb_strtoupper($_POST['problema'], 'UTF-8');
$observaciones = mb_strtoupper($_POST['observaciones'], 'UTF-8');
$notas = mb_strtoupper($_POST['notas'], 'UTF-8');
$id_cliente = mb_strtoupper($_POST['cliente'], 'UTF-8');
$fecha = date("d/m/Y");
$nombre_cliente;
	$telefono_cliente;
$obtener= "SELECT id FROM equipos_revision ORDER BY id DESC LIMIT 1 ";

$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>". mysql_error());
$row=mysqli_fetch_assoc($resultado);
$id=$row["id"]+1;

$inicio = date("Y-m-d")." 00:00:00";


$sql = "INSERT INTO equipos_revision(id,equipo, marca, modelo, serie, problema, observaciones, id_cliente, fecha, notas) VALUES ('".$id."','".$equipo."','".$marca."','".$modelo."','".$serie."','".$problema."','".$observaciones."','".$id_cliente."','".$fecha."','".$notas."')";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{
	$calendario = "INSERT INTO calendario(id_equipo, inicio, fin) VALUES('$id', '$inicio', '$inicio')";
	$res_calendario = mysqli_query($mysqli, $calendario);
	if($res_calendario)
	{
		$sql_datos = "SELECT * FROM clientes WHERE id = '$id_cliente'";
		$res_datos = mysqli_query($mysqli, $sql_datos);
		$dat = mysqli_fetch_assoc($res_datos);
		$mesg = $fecha.' '.$equipo.' '.$marca.' '.$modelo.' INGRESADO A REVISION, CON PROBLEMA DE: '.$problema.' NUMERO DE ORDEN: '.$id.', CLIENTE: '.$dat['nombre'].' TELEFONO: '.$dat['telefono1'].' - '.$dat['telefono2'];	
		$token = "394056872:AAH8b6d5amWo31VrrS854DOnM90BYI1hv8Y";
		$user_id = -278229952;// grupo

		$request_params = [
			'chat_id' => $user_id,
			'text' => $mesg
		];
		$request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
		file_get_contents($request_url);


		/////////////// enviar correo
		enviar_correo_entrada($id_cliente, $id);
		////////////// terminar correo

		session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE REGISTRO EQUIPO PARA REVISION: ".$equipo;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);

		echo '<script>alert ("Agregado")</script>';
		//echo "<script>location.href='../interfaces/ficha.php?id=".$id."'</script>";
		echo "<script>location.href='../interfaces/firma2.php?id=".$id."'</script>";
	}
	else
	{
		echo mysqli_error($mysqli);
	}
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "error".mysqli_error($mysqli);
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>
