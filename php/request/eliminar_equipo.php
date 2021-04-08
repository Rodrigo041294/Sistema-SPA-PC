<?php
require("../connections/conexion.php");
$id_equipo = $_GET['id'];
$sql_eliminar ="DELETE FROM equipos_revision WHERE id = '".$id_equipo."'";
$res = mysqli_query($mysqli, $sql_eliminar);
if($res)
{
	echo '<script>alert ("Eliminado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>