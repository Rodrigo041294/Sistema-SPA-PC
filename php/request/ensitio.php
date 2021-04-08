<?php
require("../connections/conexion.php");

$id_servicio = $_POST['id_servicio'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$observacionesprevias = $_POST['observacionesprevias'];
$fecha_hora = date("Y-m-d H:i");

$query = "UPDATE servicios SET latitud = '$latitud', longitud = '$longitud', observacionesprevias = '$observacionesprevias', fecha_hora_sitio= '$fecha_hora'  WHERE id = '$id_servicio'";
$res_query = mysqli_query($mysqli, $query);
if($res_query)
{
	session_start();
	$usersistem = $_SESSION['usuario'];
	$dia = date("Y-m-d");
	$hora = date("H:i");
	$mensaje = "EMPRESO SERVICIO EN SITIO: ".$usersistem." UBICACION: https://www.google.com.mx/maps/@".$latitud.",".$longitud.",19.75z O.S.: ".$id_servicio;

	
		$token = "394056872:AAH8b6d5amWo31VrrS854DOnM90BYI1hv8Y";
		$user_id = -278229952; // grupo

		$request_params = [
			'chat_id' => $user_id,
			'text' => $mensaje
		];
		$request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
		file_get_contents($request_url);

	$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
	$res_log = mysqli_query($mysqli, $query_log);

	echo '<script>alert ("Registrado en Sitio")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo mysqli_error($mysqli);
}
?>