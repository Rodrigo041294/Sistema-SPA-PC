<?php
require("../connections/conexion.php");
$id_recibo = $_POST['id_recibo'];
$id_cliente = $_POST['cliente'];
$suma = mb_strtoupper($_POST['suma'],'UTF-8');
$concepto = mb_strtoupper($_POST['concepto'],'UTF-8');
$notas = mb_strtoupper($_POST['notas'],'UTF-8');
$nombre_cliente;
$sql_cliente = "SELECT nombre FROM clientes WHERE id = '".$id_cliente."'";
$res0 = mysqli_query($mysqli, $sql_cliente);
if($res0)
{
	while($row = mysqli_fetch_row($res0))
	{
		$nombre_cliente = $row[0];
	}
}

$sql = "UPDATE recibos SET id_cliente = '".$id_cliente."', nombre = '".$nombre_cliente."', suma = '".$suma."', concepto = '".$concepto."', notas = '".$notas."' WHERE id = '".$id_recibo."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	echo '<script>alert ("Actualizado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
else
{
	echo '<script>alert ("error")</script>';
	echo mysqli_error($mysqli);
	//echo "<script>location.href='../interfaces/dashboard.php'</script>";
}
?>