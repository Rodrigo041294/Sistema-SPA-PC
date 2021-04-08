<?php
require("../connections/conexion.php");
$id_salida = $_POST['id_salida'];
$recibe = mb_strtoupper($_POST['recibe'], 'UTF-8');
$entrega = mb_strtoupper($_POST['entrega'], 'UTF-8');
$costo = $_POST['costo'];
$observaciones = mb_strtoupper($_POST['observaciones'], 'UTF-8');
$sql_update = "UPDATE salidas SET recibe = '".$recibe."', entrega = '".$entrega."', costo = '".$costo."', observaciones = '".$observaciones."' WHERE id = '".$id_salida."'";
	$res = mysqli_query($mysqli, $sql_update);
	if($res)
	{
		session_start();
		$usersistem = $_SESSION['usuario'];
		$dia = date("Y-m-d");
		$hora = date("H:i");
		$mensaje = "SE EDITO SALIDA: ".$id_salida;
		$query_log = "INSERT INTO logs(fecha, hora, usuario, accion) VALUES ('$dia', '$hora', '$usersistem', '$mensaje')";
		$res_log = mysqli_query($mysqli, $query_log);
		echo '<script>alert ("Editado")</script>';
		echo "<script>location.href='../interfaces/dashboard.php'</script>";
	}
	else
		{
			echo '<script>alert ("Error 2")</script>';
			echo "error".mysqli_error($mysqli);
			echo "<script>location.href='../interfaces/dashboard.php'</script>";
		}


?>