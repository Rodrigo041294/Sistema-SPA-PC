<?php
$servidor = "db681014895.db.1and1.com";
$usuario = "dbo681014895";
$psw = "Romero10.";
$basedatos = "db681014895";


$mysqli = new mysqli($servidor, $usuario, $psw, $basedatos);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");

date_default_timezone_set('America/Chihuahua');
?>
