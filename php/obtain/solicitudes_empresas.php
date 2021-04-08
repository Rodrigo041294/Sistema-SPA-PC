<?php
error_reporting(0);
require("userdata.php");
require("../connections/conexion.php");
$query_tareas2 = "SELECT s.id, e.nombre, e.direccion, e.telefono, s.fecha, s.problema, s.solucion FROM servicios s INNER JOIN empresas e ON s.id_cliente = e.id WHERE s.aceptado = '0' order by id DESC ";
$restareas2 = mysqli_query($mysqli, $query_tareas2);
if($restareas2)
{
	while($tarea2 = mysqli_fetch_row($restareas2))
	{
		echo '<tr>';
		echo '<td style="text-align:justify;">'.$tarea2[1].'</td>';
		echo '<td style="text-align:justify;">'.$tarea2[2].'</td>';
		echo '<td style="text-align:justify;">'.$tarea2[3].'</td>';
		echo '<td style="text-align:justify;">'.$tarea2[4].'</td>';
		echo '<td style="text-align:justify;">'.$tarea2[5].'</td>';
		echo '<td style="text-align:center;"><button data-toggle="modal" data-target="#modalaceptar" class="btn btn-simple btn-warning btn-icon edit" onclick="aceptar(\''.$tarea2[0].'\');"><i class="material-icons">info</i></button><a href="../request/eliminar_reportes_empresa.php?id='.$tarea2[0].'" class="btn btn-simple btn-danger btn-icon edit"><i class="material-icons">close</i></a></td>';
		echo '</tr>';
		
	}
}

?>