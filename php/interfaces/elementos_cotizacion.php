<?php
require("../connections/conexion.php");
$contador = 0;
$sql_elementos = "SELECT * FROM cotizaciones WHERE consecutivo = '".$f1."'";
$res_elementos = mysqli_query($mysqli, $sql_elementos);
if($res_elementos)
{
	while($row = mysqli_fetch_row($res_elementos))
	{
		if($contador == "0")
		{

		}
		else
		{
		echo '<tr>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>$'.$row[4].'</td>';
		$precio_total = $row[2]*$row[4];
		echo '<td>$'.$precio_total.'</td>';
		echo '<td><a class="btn-floating red" title="eliminar" id ="centrar" href = "../request/eliminar_elemento.php?id='.$row[0].'"><i class="material-icons">delete</i></a></td>';
		echo '</tr>';
		}
		$contador++;
	}
}
$contador = 0;


?>