<?php
require("../connections/conexion.php");
$id_equipo = $_POST['id_equipo'];
$diagnostico = mb_strtoupper($_POST['diagnostico'], 'UTF-8');

$sql = "UPDATE equipos_revision SET diagnostico = '".$diagnostico."' WHERE id = '".$id_equipo."'";
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