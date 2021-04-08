<?php
require("../connections/conexion.php");
$query_equipos = "SELECT s.id, e.nombre, s.fecha, s.hora, s.problema, s.solucion, s.observaciones, u.nombre, s.estatus FROM servicios s INNER JOIN usuarios u ON s.asignado = u.id INNER JOIN empresas e ON s.id_cliente = e.id ORDER BY s.id DESC";
$res_equipos = mysqli_query($mysqli, $query_equipos);
if($res_equipos)
{
	while($row = mysqli_fetch_row($res_equipos))
	{
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>'.$row[5].'</td>';
		echo '<td>'.$row[6].'</td>';
		echo '<td>'.$row[7].'</td>';
		echo '<td>'.$row[8].'</td>';
		echo '<td class="text-right"><a target="_blank" class="btn btn-simple btn-success btn-icon edit" href="fichaserv.php?id='.$row[0].'"><i class="material-icons">dvr</i></a>
		<button data-toggle="modal" data-target="#modalAsignarservicio" class="btn btn-simple btn-primary btn-icon edit" onclick="ParametrosAsignarserv(\''.$row[0].'\');"><i class="material-icons">swap_horiz</i></button>
		<button data-toggle="modal" data-target="#modalTerminarServicio" class="btn btn-simple btn-danger btn-icon edit" onclick="ParametrosTerminarServ(\''.$row[0].'\');"><i class="material-icons">send</i></button>	
		</td></td>';

		echo '</tr>';
		
	}
}

?>