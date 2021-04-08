<?php
require("../connections/conexion.php");
$id_equipo = $_POST['id_equipo'];
$equipo = mb_strtoupper($_POST['equipo'], 'UTF-8');
$marca = mb_strtoupper($_POST['marca'], 'UTF-8');
$modelo = mb_strtoupper($_POST['modelo'], 'UTF-8');
$serie = mb_strtoupper($_POST['serie'], 'UTF-8');
$problema = mb_strtoupper($_POST['problema'], 'UTF-8');
$observaciones = mb_strtoupper($_POST['observaciones'], 'UTF-8');
$id_cliente = mb_strtoupper($_POST['cliente'], 'UTF-8');
$notas = mb_strtoupper($_POST['notas'], 'UTF-8');

$sql = "UPDATE equipos_revision SET equipo = '".$equipo."', marca = '".$marca."', modelo = '".$modelo."', serie = '".$serie."', problema = '".$problema."', observaciones = '".$observaciones."', id_cliente = '".$id_cliente."', notas = '".$notas."' WHERE id = '".$id_equipo."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	echo '<script>alert ("Actualizado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo '<script>alert ("error")</script>';
	echo mysqli_error($mysqli);
	//echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>