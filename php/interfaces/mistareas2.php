<?php
error_reporting(0);
require("userdata.php");
require("../connections/conexion.php");
$query_tareas2 = "SELECT s.id, e.nombre, e.direccion, e.telefono, s.observaciones, s.problema, s.solucion, s.latitud, s.estatus FROM servicios s INNER JOIN empresas e ON s.id_cliente = e.id WHERE s.asignado = '$id_usuario' AND estatus = '0' order by id DESC";
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
		if($tarea2[7] == "")
		{
			echo '<td style="text-align:center;"><button data-toggle="modal" data-target="#modalensitio" class="btn btn-simple btn-danger btn-icon edit" onclick="Onsite(\''.$tarea2[0].'\');"><i class="material-icons">place</i></button></td>';
		}
		else
		{
			echo '<td style="text-align:center;"><button data-toggle="modal" data-target="#modalTerminarServicio" class="btn btn-simple btn-success btn-icon edit" onclick="ParametrosTerminarServ(\''.$tarea2[0].'\');"><i class="material-icons">check_circle</i></button>	
		</td>';
		}
		
		echo '</tr>';
		
	}
}

?>