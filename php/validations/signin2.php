<?php
require("../connections/conexion.php");
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql="SELECT * FROM usuarios WHERE usuario = '$username' AND password = '$password'";
$resultado = mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($resultado,MYSQLI_ASSOC);

if(mysqli_num_rows($resultado) == 1)
{
	$_SESSION['usuario'] = $username;
	echo "<script>location.href='../interfaces/mensajes.php'</script>";
}
else
{
	echo '<script>alert ("error")</script>';
	echo "<script>location.href='../interfaces/login.php'</script>";
}

?>