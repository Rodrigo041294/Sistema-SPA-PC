<?php
require("../connections/conexion.php");
$id = $_GET['id'];

$sql = "UPDATE mensajes SET estatus = '1' WHERE id = '".$id."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	echo '<script>alert ("Leido")</script>';
	echo "<script>location.href='../interfaces/mensajes.php'</script>";
}
else
{
	echo '<script>alert ("error")</script>';
	echo mysqli_error($mysqli);
	echo "<script>location.href='../interfaces/mensajes.php'</script>";
}
?>