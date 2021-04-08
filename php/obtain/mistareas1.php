<?php
error_reporting(0);
require("userdata.php");
require("../connections/conexion.php");
$query_tareas = "SELECT * FROM equipos_revision WHERE asignado = '$id_usuario' AND estado = 'PENDIENTE' order by id DESC ";
$restareas = mysqli_query($mysqli, $query_tareas);
if($restareas)
{
	while($tarea1 = mysqli_fetch_row($restareas))
	{
		echo '<tr>';
		echo '<td style="text-align:justify;">'.$tarea1[2].'</td>';
		echo '<td style="text-align:justify;">'.$tarea1[6].'</td>';
		echo '<td style="text-align:justify;">'.$tarea1[1].'</td>';
		echo '<td style="text-align:justify;">'.$tarea1[14].'</td>';
		echo '<td style="text-align:center;"><button data-toggle="modal" data-target="#modaldiagnosticar" class="btn btn-simple btn-warning btn-icon edit" onclick="par(\''.$tarea1[0].'\');"><i class="material-icons">info</i></button></td>';
		echo '</tr>';
		
	}
}

?>