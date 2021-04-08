<?php
require("../connections/conexion.php");
$query_equipos = "SELECT DISTINCT(c.consecutivo), c.concepto, d.nombre FROM cotizaciones c INNER JOIN clientes d ON c.cliente = d.id GROUP BY c.consecutivo";
$res_equipos = mysqli_query($mysqli, $query_equipos);
if($res_equipos)
{
	while($row = mysqli_fetch_row($res_equipos))
	{
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		
		echo '<td class="text-right"><a target="_blank" class="btn btn-simple btn-success btn-icon edit" href="icotizacion.php?id='.$row[0].'"><i class="material-icons">dvr</i></a></td>';

		echo '</tr>';
		
	}
}

?>