<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");


$fecha = mb_strtoupper($_POST['fecha'], 'UTF-8');
$hora = mb_strtoupper($_POST['hora'], 'UTF-8');
$problema = mb_strtoupper(nl2br($_POST['problema'], 'UTF-8'));
$observaciones = mb_strtoupper($_POST['observaciones'], 'UTF-8');
$cliente = mb_strtoupper($_POST['cliente'], 'UTF-8');

$nombre_cliente;
$telefono_cliente;

$obtener= "SELECT id FROM servicios ORDER BY id DESC LIMIT 1 ";
$resultado = mysqli_query($mysqli, $obtener) or die("<h2>Error de MySQL.</h2>". mysql_error());
$row=mysqli_fetch_assoc($resultado);
$id=$row["id"]+1;

$sql = "INSERT INTO servicios(id, id_cliente, fecha, hora, problema, observaciones) VALUES ('".$id."','".$cliente."','".$fecha."','".$hora."','".$problema."','".$observaciones."')";
$resultado = mysqli_query($mysqli, $sql);
if($resultado)
{

		$sql_datos = "SELECT * FROM empresas WHERE id = '$cliente'";
		$res_datos = mysqli_query($mysqli, $sql_datos);
		$dat = mysqli_fetch_assoc($res_datos);
		$mesg ='SE PROGRAMÓ ATENCION A: '.$dat['nombre'].' EL DIA: '.$fecha.', A LAS: '.$hora.' HORAS';	
		$token = "394056872:AAH8b6d5amWo31VrrS854DOnM90BYI1hv8Y";
		$user_id = -278229952; // grupo

		$request_params = [
			'chat_id' => $user_id,
			'text' => $mesg
		];
		$request_url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
		file_get_contents($request_url);

		session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE REGISTRO SERVICIO: ".$problema." A EMPRESA: ".$dat['nombre'];
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);



		echo '<script>alert ("Agregado")</script>';
		echo "<script>location.href='../interfaces/fichaserv.php?id=".$id."'</script>";
	
}
else
{
	echo '<script>alert ("Error")</script>';
	echo "error".mysqli_error($mysqli);
	//echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>
