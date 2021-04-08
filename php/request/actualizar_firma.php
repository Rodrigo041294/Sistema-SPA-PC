<?php
require("../connections/conexion.php");

$id_equipo = $_POST['id_equipo'];
$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = '../../assets/firmas/salida_equipo_'.$id_equipo.'.png';
   
if (file_put_contents($file, $data)) {
	$update_firma = "UPDATE equipos_revision SET firma_salida = '$file' WHERE id='$id_equipo'";
	$res_firma = mysqli_query($mysqli, $update_firma);
  	echo "<script>location.href='../interfaces/salida.php?id=".$id_equipo."'</script>";
} else {
   echo "<p>The canvas could not be saved.</p>";
}   

?>