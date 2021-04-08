<?php
error_reporting(0);
require("userdata.php");
require("../connections/conexion.php");
$query_tareas2 = "SELECT s.id, e.nombre, e.direccion, e.telefono, s.problema, s.solucion FROM servicios s INNER JOIN empresas e ON s.id_cliente = e.id WHERE s.asignado = '$id_usuario' order by id DESC ";
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
		echo '<td style="text-align:justify;">'.$tarea2[0].'</td>';
		echo '</tr>';
		
	}
}

?>