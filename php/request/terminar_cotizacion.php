<?php
require("../connections/conexion.php");
require("../request/enviar_correo.php");

$id_cliente = mb_strtoupper($_POST['cliente'], 'UTF-8');
$consecutivo = $_POST['consecutivo2']+1;
$id_cotizacion = $consecutivo-1;

$agregar_cliente = "UPDATE cotizaciones SET cliente = '$id_cliente' WHERE consecutivo = '$id_cotizacion'";
$res0 = mysqli_query($mysqli, $agregar_cliente);
if($res0)
{
	$sql = "INSERT INTO cotizaciones(consecutivo, cantidad, concepto, precio) VALUES ('".$consecutivo."','','','')";
	$res = mysqli_query($mysqli, $sql);
	if($res)
	{
		echo '<script>alert ("Añadido")</script>';
		enviar_correo_cotizacion($id_cotizacion);

	}
	else
	{
		echo '<script>alert ("error")</script>';
		echo "<script>location.href='../interfaces/cotizar.php'</script>";
	}
	$fecha = date("d/m/Y");
}
else {
	echo "error".mysqli_error($mysqli);
}

$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
$res_datos = mysqli_query($mysqli, $datos_cliente);
$cliente = mysqli_fetch_assoc($res_datos);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../sass/materialize.css">
	<link rel="stylesheet" type="text/css" href="../../css/material-icons.css">
  <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/bin/materialize.js"></script>
	<script type="text/javascript" src ="../../js/carousel.js"></script>
	<script type="text/javascript" src="../../js/slider.js"></script>
	<script type="text/javascript" src = "../../js/modal_init.js"></script>
  <script type="text/javascript" src = "../../js/select.js"></script>
  <script type="text/javascript" src = "../../js/ocultar_ficha4.js"></script>
</head>
<body>
<div class="navbar-fixed" id="esconder">
<nav>
	<div class="nav-wrapper">
	  <a href="#" class="brand-logo"><i class="material-icons">build</i>Servicios, Programas y Accesorios</a>
	  <ul id="nav-mobile" class="right hide-on-med-and-down">
		<li><a href="../../index.php">Inicio</a></li>
      <li class="active"><a href="../interfaces/dashboard.php">Dashboard</a></li>
      <li><a href="../../servicios/revisiones.php">Revisiones</a></li>
      <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
	  </ul>
	</div>
</nav>

</div>
    <div style="width: 100%; float: right;">
      <img src="../../resources/cabecera_coti.jpg" height="120px" style="width: 100%;">
    </div>
    <br><br>
      <strong style="float: left; margin-left: : 30px; margin-top: 30px;"><?php echo $cliente['nombre']; ?></strong>
      <strong style="float: right; margin-right: 30px; margin-top: 30px;"><?php echo $fecha; ?></strong>
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
          <?php require("../obtain/elementos_totales.php"); ?>

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
      <div class="row" style="margin-top: 5px; float: right;" id="esconder2">
  <a class="btn-floating blue"><i class="material-icons" onclick="ocultar(); window.print();">print</i></a>
</div>










</body>
</html>
