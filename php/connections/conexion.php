<?php
$servidor = "localhost";
$usuario = "root";
$psw = "root";
$basedatos = "db681014895";


$mysqli = new mysqli($servidor, $usuario, $psw, $basedatos);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");

date_default_timezone_set('America/Chihuahua');
?>
