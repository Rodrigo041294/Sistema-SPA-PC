<?php
require("../connections/conexion.php");
$id_elemento = $_GET['id'];
$eliminar_elemento ="DELETE FROM cotizaciones WHERE id = '".$id_elemento."'";
$res00 = mysqli_query($mysqli, $eliminar_elemento);
if($res00)
{
	echo '<script>alert ("Eliminado")</script>';
	echo "<script>location.href='../interfaces/cotizar.php'</script>";
}

?>