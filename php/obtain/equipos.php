<?php
require("../connections/conexion.php");
$query_equipos = "SELECT * FROM equipos_revision order by id DESC";
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
		echo '<td>'.$row[10].'</td>';
		echo '<td>'.$row[9].'</td>';
		echo '<td class="text-right"><a target="_blank" class="btn btn-simple btn-success btn-icon edit" href="ficha.php?id='.$row[0].'"><i class="material-icons">dvr</i></a>
		<button data-toggle="modal" data-target="#modalasignar" class="btn btn-simple btn-primary btn-icon edit" onclick="ParametrosAsignar(\''.$row[0].'\');"><i class="material-icons">swap_horiz</i></button>
		<button data-toggle="modal" data-target="#modaldiagnosticar" class="btn btn-simple btn-warning btn-icon edit" onclick="ParametrosDiagnosticar(\''.$row[0].'\');"><i class="material-icons">info</i></button>
		<button data-toggle="modal" data-target="#modalsalir" class="btn btn-simple btn-danger btn-icon edit" onclick="ParametrosSalir(\''.$row[0].'\');"><i class="material-icons">send</i></button>	
		</td></td>';

		echo '</tr>';
		
	}
}

?>