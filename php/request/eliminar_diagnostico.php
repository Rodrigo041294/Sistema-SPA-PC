<?php
require("../connections/conexion.php");
$id_equipo = $_GET['id'];
$diagnostico = "";

$sql = "UPDATE equipos_revision SET diagnostico = '".$diagnostico."' WHERE id = '".$id_equipo."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	echo '<script>alert ("Diagnostico Eliminado")</script>';
	echo "<script>location.href='../interfaces/eliminar_diagnostico.php'</script>";
}
else
{
	echo '<script>alert ("error")</script>';
	echo mysqli_error($mysqli);
	//echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>