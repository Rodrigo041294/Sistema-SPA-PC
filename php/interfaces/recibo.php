<?php
require("../connections/conexion.php");

$id_recibo = $_GET['id_recibo'];


$query_recibo = "SELECT r.fecha, c.nombre, c.telefono1, c.telefono2, c.direccion, r.suma, r.concepto, r.recibio FROM recibos r INNER JOIN clientes c ON r.id_cliente = c.id WHERE r.id='$id_recibo'";
$res_recibo = mysqli_query($mysqli, $query_recibo);
$datos = mysqli_fetch_row($res_recibo);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recibo</title>
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
<div class="navbar-fixed" id="esconder">
<nav>
	<div class="nav-wrapper">
	  <a href="#" class="brand-logo"><i class="material-icons">build</i>Servicios, Programas y Accesorios</a>
	  <ul id="nav-mobile" class="right hide-on-med-and-down">
<li><a href="../../index.php">Inicio</a></li>
      <li class="active"><a href="dashboard.php">Dashboard</a></li>
      <li><a href="../../servicios/revisiones.php">Revisiones</a></li>
      <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
	  </ul>
	</div>
</nav>
</div>

<div class="col s12" style="margin-top: 3%;" id="ckeditor">
	<div class="row">
    <div class="tg-wrap" style="float: left; width: 25%;">
      <table class="tg">
        <tr>
          <th class="tg-yw4l">Fecha:</th>
          <th class="tg-yw4l"><?php echo $datos[0]; ?></th>
        </tr>
        </table>
    </div>
    <div style="width: 70%; float: right;">
      <img src="../../resources/cabecera.jpg" height="75px" style="width: 100%;">
    </div>
	</div>
  <div class="row">
    <div class="tg-wrap">
        <table class="tg" style="width:100%">
        <tr>
          <th class="tg-yw4l">Cliente:</th>
          <th class="tg-yw4l"><?php echo $datos[1]; ?></th>
          <th class="tg-yw4l">Telefonos:</th>
          <th class="tg-yw4l"><?php echo $datos[2]." - ".$datos[3]; ?></th>
        </tr>
        <tr>
          <td class="tg-yw4l">Domicilio:</td>
          <td class="tg-yw4l" colspan="3"><?php echo $datos[4]; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Suma:</td>
          <td class="tg-yw4l" colspan="3"><?php echo $datos[5]; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Concepto:</td>
          <td class="tg-yw4l" colspan="3"><?php echo $datos[6]; ?></td>
        </tr>

        <tr>
          <td class="tg-yw4l" colspan="4"></td>
        </tr>
          <tr>
          <td class="tg-yw4l" colspan="4"></td>
        </tr>
        <tr>
          <td class="tg-yw4l" colspan="2"><p style="text-align: justify;">COMPROBANTE NO VÁLIDO COMO FACTURA</p></td>
          <td class="tg-yw4l" colspan="2"><p style="text-align: justify;">RECIBI: <?php echo $datos[7]; ?></p></td>
        </tr>
      <!--  <tr id="notas_internas1">
            <th class="tg-yw4l" colspan="4">Notas Internas:</td>
          </tr>
          <tr id="notas_internas2">
            <td class="tg-yw41" colspan="4"><p style="text-align: justify; font-size: 10px;"><?php //echo $notas; ?></td>
          </tr>-->
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
//window.onload = function () {
CKEDITOR.replace('ckeditor', { on: { 
'instanceReady': function (evt) { evt.editor.execCommand('maximize'); }
}}); 
//} 
</script>

</body>
</html>
