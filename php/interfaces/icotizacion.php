<?php

require("../obtain/userdata.php");
if(empty($_SESSION['usuario']))
{
  header('Location: login.php');
}

require("../connections/conexion.php");
$id_cotizacion = $_GET['id'];

$query_cotizacion = "SELECT c.consecutivo, c.cantidad, c.concepto, c.precio, d.nombre FROM cotizaciones c INNER JOIN clientes d ON c.cliente = d.id WHERE c.consecutivo = '$id_cotizacion'";
$res_cotizacion = mysqli_query($mysqli, $query_cotizacion);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
<div  id="ckeditor">
    <div style="width: 100%; float: right;">
      <img src="../../resources/cabecera_coti.jpg" height="120px" style="width: 100%;">
    </div>
    <br><br>
      <strong style="float: left; margin-left: : 30px; margin-top: 30px;"><?php  ?></strong>
      <strong style="float: right; margin-right: 30px; margin-top: 30px;"><?php echo date("d/m/Y"); ?></strong>
    <table style="float: left; margin-left: : 30px; margin-top: 30px;">
        <thead>
          <tr>
              <th>Cantidad</th>
              <th>Concepto de Venta</th>
              <th>Precio Unitario</th>
              <th>Total en M.N.</th>
          </tr>
        </thead>
        <tbody style = "line-height: 16px;">
          <?php 
          $subtotal = 0;
          while($row = mysqli_fetch_row($res_cotizacion))
            {
              echo '<tr>';
              echo '<td style ="border-style:solid; border-width:1px; text-align: center;">'.$row[1].'</td>';
              echo '<td style ="border-style:solid; border-width:1px; text-align: center;">'.$row[2].'</td>';
              echo '<td style ="border-style:solid; border-width:1px; text-align: center;">$'.$row[3].'</td>';
              $total = $row[1]*$row[3];
              echo '<td style ="border-style:solid;border-width:1px; text-align: center;">$'.$total.'</td>';
              echo '</tr>';
              $subtotal = $subtotal + $total;
            }
            echo '</tbody><tr>';
  echo '<td colspan ="2"><p style="text-align: justify;">*Sujeto a cambios sin previo aviso</p> </td>';
  echo '<td style ="border-style:solid;border-width:1px;"><strong>Subtotal:</strong></td>';
  echo '<td style ="border-style:solid;border-width:1px; text-align: center;"><strong>$'.$subtotal.'</strong></td>';
  echo '</tr>';

  $iva = $subtotal*0.16;
  echo '<tr>';
  echo '<td colspan ="2"> <p style="text-align: justify;">*Este presupuesto no incluye ningun tipo de material, instalaciones, cableado, canaletas, contactos que no sean especificados.</p> </td>';
  echo '<td style ="border-style:solid;border-width:1px;"><strong>IVA:</strong></td>';
  echo '<td style ="border-style:solid;border-width:1px; text-align: center;"><strong>$'.$iva.'</strong></td>';
  echo '</tr>';

  $total = $subtotal + $iva;
  echo '<tr>';
  echo '<td colspan = "2"> <p style="text-align: justify;">*Los retrasos en Pagos Generan un INTERES moratorio del 0.5% por dia de atraso en el PAGO.</p> </td>';
  echo '<td style ="border-style:solid;border-width:1px;"><strong>Total:</strong></td>';
  echo '<td style ="border-style:solid;border-width:1px; text-align: center;"><strong>$'.$total.'</strong></td>';
  echo '</tr>';

          ?>

      </table>

        <div style="width: 100%; float: left; line-height:11px;">
        <ul>
      <p style="text-align: center;"><strong ><u>CONDICIONES COMERCIALES</u></strong></p>
      <p style="text-align: justify;">*80% A la firma del contrato</p>
      <p style="text-align: justify;">*20% A la entrega del contrato</p>

      <br>
      <p style="text-align: center; font-size: 13px;"><strong >Constituccion #713 La Paz BCS. | Cel.6121585201 |Tel.6121231514 |https:www.spapc.mx |Email:servicios@spapc.mx</strong></p>
      </ul>

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
