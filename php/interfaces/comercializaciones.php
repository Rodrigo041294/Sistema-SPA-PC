<?php
require("../connections/conexion.php");
$query_comercio = "SELECT  c.id, e.nombre, c.tipo_servicio, c.fsolicitud, c.fvisita, c.interesado, c.razon, c.tr, c.dr, c.notas, u.nombre FROM comercializacion c INNER JOIN empresas e ON c.cliente = e.id INNER JOIN usuarios u ON c.asignado = u.id";
$res_comercio = mysqli_query($mysqli, $query_comercio);
if($res_comercio)
{
	while($row = mysqli_fetch_row($res_comercio))
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
		echo '<td>'.$row[9].'</td>';
		echo '<td>'.$row[10].'</td>';
		echo '<td class="text-right"><a target="_blank" class="btn btn-simple btn-success btn-icon edit" href="fichaservcom.php?id='.$row[0].'"><i class="material-icons">dvr</i></a>
		<button data-toggle="modal" data-target="#modalTerminarServicio" class="btn btn-simple btn-danger btn-icon edit" onclick="ParametrosTerminar(\''.$row[0].'\');"><i class="material-icons">edit</i></button>	
		</td></td>';
		echo '</tr>';
		
	}
}

?>