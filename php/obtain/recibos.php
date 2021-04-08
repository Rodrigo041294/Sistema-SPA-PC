<?php
require("../connections/conexion.php");
$query_equipos = "SELECT * FROM recibos order by id DESC";
$res_equipos = mysqli_query($mysqli, $query_equipos);
if($res_equipos)
{
	while($row = mysqli_fetch_row($res_equipos))
	{
		echo '<tr>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>'.$row[5].'</td>';
		echo '<td>'.$row[6].'</td>';
		echo '<td>'.$row[7].'</td>';
		echo '<td class="text-right"><a target="_blank" class="btn btn-simple btn-success btn-icon edit" href="recibo.php?id_recibo='.$row[0].'"><i class="material-icons">dvr</i></a></td>';
		echo '</tr>';
		
	}
}

?>