<?php
require("../connections/conexion.php");

$id_empresa = $_POST['cliente'];
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

   
$sql = "UPDATE empresas SET usuario = '".$usuario."', password = '".$password."' WHERE id = '".$id_empresa."'";
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