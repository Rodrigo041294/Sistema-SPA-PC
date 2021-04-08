<?php
require("../connections/conexion.php");
$id_recibo = $_GET['id'];
$eliminar_recibo ="DELETE FROM recibos WHERE id = '".$id_recibo."'";
$res = mysqli_query($mysqli, $eliminar_recibo);
if($res)
{
	echo '<script>alert ("Eliminado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>