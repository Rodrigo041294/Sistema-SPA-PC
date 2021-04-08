<?php
session_start();
require("../connections/conexion.php");
$usuario = $_SESSION['usuario'];

$usuario2;
$id_usuario;
$nombre_usuario;

$sql = "SELECT id, usuario, nivel, nombre FROM usuarios WHERE usuario = '".$usuario."'";
$datos = mysqli_query($mysqli, $sql);
if($datos)
{
	while($row = mysqli_fetch_row($datos))
	{
		$id_usuario = $row[0];
		$nivel = 2;
		$usuario2 = $row[1];
		$nombre_usuario = $row[3];
	}
}
else
{
	echo "Error userdata: ".mysqli_error($mysqli);
}
?>