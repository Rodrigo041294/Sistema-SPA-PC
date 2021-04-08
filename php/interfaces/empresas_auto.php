<?php
require("../connections/conexion.php");
$query_remitentes = "SELECT * FROM empresas order by id DESC";
$res_remitentes = mysqli_query($mysqli, $query_remitentes);
if($res_remitentes)
{
	while($nombre = mysqli_fetch_assoc($res_remitentes))
	{
		echo '"'.$nombre['nombre'].'",';
	}
}

?>