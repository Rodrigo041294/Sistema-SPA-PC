<?php
require("../connections/conexion.php");
$contador_mensajes;
$sql = "SELECT * FROM mensajes WHERE estatus = '0'";
$res_cont = mysqli_query($mysqli, $sql);
$contar = mysqli_num_rows($res_cont);
if($res_cont)
{
	if($contar > 0)
	{
		$contador_mensajes = '<span class="new badge red" data-badge-caption="Nuevos">'.$contar."</span>";
		$contar = "(".$contar.")";
	}
	else
	{
		$contador_mensajes = "";
	}
	
}

?>