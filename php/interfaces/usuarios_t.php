<?php
require("../connections/conexion.php");
$query_equipos = "SELECT * FROM usuarios order by id DESC";
$res_equipos = mysqli_query($mysqli, $query_equipos);
if($res_equipos)
{
	while($row = mysqli_fetch_row($res_equipos))
	{
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '</tr>';
		
	}
}

?>