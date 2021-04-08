<?php  
require("../connections/conexion.php");

//$sql = "SELECT id_evento, titulo, inicio, fin, color FROM audiencias WHERE id_cliente = '$id_cliente'";
$sql = "SELECT e.id, c.inicio, c.fin, e.equipo, e.marca, e.modelo FROM equipos_revision e INNER JOIN calendario c ON e.id = c.id_equipo";
$req = mysqli_query($mysqli, $sql);
$events = mysqli_fetch_all($req, MYSQLI_ASSOC);

//$sql = "SELECT id_evento, titulo, inicio, fin, color FROM audiencias WHERE id_cliente = '$id_cliente'";
$sql2 = "SELECT id, fecha, replace(problema,'\n',' ') AS problema FROM servicios";
$req2 = mysqli_query($mysqli, $sql2);
$events2 = mysqli_fetch_all($req2, MYSQLI_ASSOC);

?>
