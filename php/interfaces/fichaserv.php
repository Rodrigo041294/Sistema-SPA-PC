<?php

require("../obtain/userdata.php");
if(empty($_SESSION['usuario']))
{
  header('Location: login.php');
}

require("../connections/conexion.php");
$id_equipo = $_GET['id'];


$sql =  "SELECT  e.nombre, e.telefono, e.correo, s.fecha, s.hora, s.problema, s.solucion, s.observaciones, s.estatus, s.firma_fin, s.autoriza FROM servicios s INNER JOIN empresas e ON s.id_cliente = e.id WHERE s.id =  '$id_equipo'";
echo $sql;
$res = mysqli_query($mysqli, $sql);
if($res)
{
	$dato = mysqli_fetch_row($res);
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
          <th class="tg-yw4l">Orden de servicio Empresa:</th>
          <th class="tg-yw4l"><?php echo $id_equipo;  ?></th>

        </tr>
        <tr>
          <th class="tg-yw4l">Fecha:</th>
          <th class="tg-yw4l"><?php echo $dato[3]; ?></th>
        </tr>
        </table>
    </div>
    <div style="width: 70%; float: right;">
      <img src="../../resources/cabecera.jpg" height="75px" style="width: 100%;">
    </div>
	</div>
  <div class="row">
    <div class="tg-wrap">
    

        <table class="tg">
        <tr>
          <th class="tg-yw4l">Cliente:</th>
          <th class="tg-yw4l"><?php echo $dato[0]; ?></th>
          <th class="tg-yw4l">Telefono:</th>
          <th class="tg-yw4l"><?php echo $dato[1]; ?></th>
        </tr>
        <tr>
          <td class="tg-yw4l">Problema Reportado:</td>
		<td class="tg-yw4l" colspan="3"><?php echo $dato[5]; ?></td>
        </tr>
        <tr>
          <td class="tg-yw4l">Observaciones:</td>
		<td class="tg-yw4l" colspan="4"><?php echo $dato[0]; ?></td>9
        </tr>
        <tr>
          <td colspan="3" style="text-align: center;"> <img style="width: 350px; height: 150px;" src="../../assets/firmas/<?php echo $dato[9]; ?>"><br><?php echo $dato[10]; ?></td>
        </tr>
          <tr>
          <td class="tg-yw4l" colspan="4"></td>
        </tr>
        <tr>
          <td class="tg-yw41" colspan="4"><p style="text-align: justify; font-size: 10px;">TODA REVISION O DIAGNOSTICO ES CAUSA DE HONORARIOS $100.00 M.N. PRECIO NO INCLUYE IVA <br> NOTA: SI EL CLIENTE NO SE PRESENTA POR EL EQUIPO DESPUES DE LOS 7 DIAS DE ENCONTRARSE NOTIFICADO, SE LE COBRARA UNA CUOTA DE $20.00 M.N. DIARIOS POR USO DE ESPACIO(RESGUARDO) <br>ASI MISMO A PARTIR DE LOS 30 DIAS CUMPLIDOS, LA EMPRESA SPA PC NO SE HACE RESPONSABLE DE DAÑOS O PERDIDA ALGUNA. <br> NOTA2: TODA TABLET O CELULAR QUE VENGA CON PROBLEMAS  DE SISTEMA O TARJETA LA EMPRESA NO SE HACE RESPONSABLE DE LA FUNCIONALIDAD DEL EQUIPO YA QUE PUEDE VENIR FUNCIONANDO PERO A LA HORA DE EJECUTAR PRUEBAS EL EQUIPO PUEDE DEJAR DE FUNCIONAR.</p></td>
        </tr>
          <!--<tr id="notas_internas1">
            <th class="tg-yw4l" colspan="4">Notas Internas:</td>
          </tr>
          <tr id="notas_internas2">
            <td class="tg-yw41" colspan="4"><p style="text-align: justify; font-size: 10px;"><?php //echo $notas; ?></td>
          </tr>-->
        </div>
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