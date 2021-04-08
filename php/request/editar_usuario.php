<?php
require("../connections/conexion.php");
$id_usuario = $_POST['id_usuario'];
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);
$nivel = $_POST['rol'];

$sql_update_usuario = "UPDATE usuarios SET usuario = '".$usuario."', password = '".$password."', nivel = '".$nivel."' WHERE id = '".$id_usuario."'";
$res_update_usuario = mysqli_query($mysqli, $sql_update_usuario);
if($res_update_usuario)
{
	echo '<script>alert ("Actualizado")</script>';
	echo "<script>location.href='../interfaces/dashboard.php'</script>";
}

?>