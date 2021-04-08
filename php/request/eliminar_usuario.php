<?php
require("../connections/conexion.php");
$id_usuario = $_POST['id_usuario'];
$sql_eliminar_usuario ="DELETE FROM usuarios WHERE id = '".$id_usuario."'";
$res = mysqli_query($mysqli, $sql_eliminar_usuario);
if($res)
{
	echo '<script>alert ("Eliminado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo "error".mysqli_error($mysqli);
}
?>