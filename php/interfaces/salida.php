<?php
require("../obtain/userdata.php");
if(empty($_SESSION['usuario']))
{
  header('Location: login.php');
}
$id_equipo = $_GET['id'];
require("../connections/conexion.php");

$fecha;
$equipo;
$marca;
$modelo;
$serie;
$problema;
$observaciones;
$id_cliente;
$estado;
$id_salida;
$diagnostico;
$notas;
$firma;

$sql = "SELECT * FROM equipos_revision WHERE id = '".$id_equipo."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	while($row = mysqli_fetch_row($res))
	{
		$fecha = $row[1];
		$equipo = $row[2];
		$marca = $row[3];
		$modelo = $row[4];
		$serie = $row[5];
		$problema = $row[6];
		$observaciones = $row[7];
		$id_cliente = $row[8];
		$estado = $row[9];
    $diagnostico = $row[10];
		$id_salida = $row[11];
    $notas = $row[12];
    $firma = $row[15];
	}
}
$nombre_cliente;
$telefono1;
$telefono2;
$sql_cliente = "SELECT nombre, telefono1, telefono2 FROM clientes WHERE id = '".$id_cliente."'";
$res_cliente = mysqli_query($mysqli, $sql_cliente);
if($res_cliente)
{
	while($row2 = mysqli_fetch_row($res_cliente))
	{
		$nombre_cliente = $row2[0];
    $telefono1 = $row2[1];
    $telefono2 = $row2[2];
	}
}

$entrega;
$recibe;
$costo;
$fechad;
$observaciones_sal;
$sql_salida = "SELECT  entrega, recibe, costo, fecha, observaciones FROM salidas WHERE id = '".$id_salida."'";
$res_salida = mysqli_query($mysqli, $sql_salida);
if($res_salida)
{
	while($row = mysqli_fetch_row($res_salida))
	{
		$entrega = $row[0];
		$recibe = $row[1];
    $costo = $row[2];
    $fechad = $row[3];
    $observaciones_sal = $row[4];
	}
}

require("../obtain/contadores.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Spa PC | 2019</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
  <link href="../../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="../../assets/css/demo.css" rel="stylesheet" />
  <script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="../../assets/ckeditor/ckeditor.js" type="text/javascript"></script>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
  </style>
</head>
<body>
<div class="col-md-12" style="margin-top: 3%;" id="ckeditor">
  <div class="row">
    <div class="tg-wrap" style="float: left; width: 25%;">
      <table class="tg">
        <tr>
          <th class="tg-yw4l">Orden de servicio:</th>
          <th class="tg-yw4l"><?php echo $id_equipo; ?></th>
        </tr>
        <tr>
          <th class="tg-yw4l">Fecha Entrega:</th>
          <th class="tg-yw4l"><?php echo $fechad; ?></th>
        </tr>
        </table>
    </div>
    <div style="width: 70%; float: right;">
      <img src="../../resources/cabecera.jpg" height="75px" style="width: 100%;">
    </div>
  </div>
  <br><br>  <br>
  <div class="row">
    <div class="tg-wrap" style="margin-left: 10%;">
    

        <table class="tg">
        <tr>
          <th class="tg-yw4l">Cliente:</th>
          <th class="tg-yw4l"><?php echo $nombre_cliente; ?></th>
          <th class="tg-yw4l">Telefono:</th>
          <th class="tg-yw4l"><?php echo $telefono1." - ".$telefono2; ?></th>
        </tr>
        <tr>
          <td class="tg-yw4l">Articulo:</td>
          <td class="tg-yw4l"><?php echo $equipo; ?></td>
          <td class="tg-yw4l">Modelo:</td>
          <td class="tg-yw4l"><?php echo $modelo; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Marca:</td>
          <td class="tg-yw4l"><?php echo $marca; ?></td>
          <td class="tg-yw4l">Serie:</td>
          <td class="tg-yw4l"><?php echo $serie; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Problema Reportado:</td>
		<td class="tg-yw4l" colspan="3"><?php echo $problema; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Diagnostico:</td>
	<td class="tg-yw4l" colspan="3"><?php echo $fechad." ".$diagnostico; ?></td>
        </tr>

        <tr>
          <td class="tg-yw4l">Soluci??n:</td>
    <td class="tg-yw4l" colspan="3"><?php echo $observaciones_sal; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Costo de reparaci??n:</td>
          <td class="tg-yw4l">$<?php echo $costo; ?> M.N.</td>
          <td class="tg-yw4l">Entrega:</td>
          <td class="tg-yw4l"><?php echo $entrega; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Recibe:</td>
          <td colspan="3" style="text-align: center;"> <img style="width: 350px; height: 150px;" src="../../assets/firmas/<?php echo $firma; ?>"><br><?php echo $recibe; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l" colspan="4"><p style="text-align: justify;">SPA PC AGRADECE SU PREFERENCIA</p></td>
        </tr>
        <tr id="notas_internas1">
            <th class="tg-yw4l" colspan="4">Notas Internas:</td>
          </tr>
          <tr id="notas_internas2">
            <td class="tg-yw41" colspan="4"><p style="text-align: justify; font-size: 10px;"><?php echo $notas; ?></td>
          </tr>
      </table>
    </div>
  </div>
</div>



</body>
</html>
<script type="text/javascript">
//window.onload = function () {
CKEDITOR.replace('ckeditor', { on: { 
'instanceReady': function (evt) { evt.editor.execCommand('maximize'); }
}}); 
//} 
</script>