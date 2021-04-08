<?php
error_reporting(0);
require("../connections/conexion.php");
$id = $_GET['id'];
$query_tareas2 = "DELETE FROM servicios WHERE id='$id'";

$restareas2 = mysqli_query($mysqli, $query_tareas2);
if($restareas2)
{
	header("Location: ../interfaces/solicitud_reportes?eliminado=true");
}
else
{
	echo mysqli_error($mysqli);
}
echo $query_tareas2;
?>