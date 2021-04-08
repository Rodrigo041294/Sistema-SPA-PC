<?php

function enviar_correo_entrada($id_cliente, $id_equipo)
{
	require("../connections/conexion.php");
	require_once ("phpmailer/class.phpmailer.php");
	require_once('phpmailer/class.smtp.php');

	$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
	$res_datos = mysqli_query($mysqli, $datos_cliente);
	$cliente = mysqli_fetch_assoc($res_datos);

	$correo_cliente = $cliente['email'];
	$tipo = "Orden de entrada";



	$fecha;
	$equipo;
	$marca;
	$modelo;
	$serie;
	$problema;
	$observaciones;
	$id_cliente;
	$estado;

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
			$estado = $row[9];
		}
	}

	$mensaje_html = '<img src="../../resources/cabecera.jpg" style="width: 85%; height: 100px; float: right;" >
<div style="width: 20%; float: left; margin-top: 2%;">
	<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Orden de servicio:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$id_equipo.'</th>
        </tr>
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Fecha:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$fecha.'</th>
        </tr>
        </table>
</div>
<div style="width: 100%;">
        <table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Cliente:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["nombre"].'</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Telefono:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["telefono1"].' - '.$cliente["telefono2"].'</th>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Articulo:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$equipo.'</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Modelo:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$modelo.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Marca:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$marca.'</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Serie:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$serie.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Problema Reportado:</td>
		<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">'.$problema.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Observaciones:</td>
		<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4">'.$observaciones.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4">Nombre y firma del cliente</td>
        </tr>
          <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4"></td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4"><p style="text-align: justify; font-size: 10px;">TODA REVISION O DIAGNOSTICO ES CAUSA DE HONORARIOS $100.00 M.N. PRECIO NO INCLUYE IVA <br> NOTA: SI EL CLIENTE NO SE PRESENTA POR EL EQUIPO DESPUES DE LOS 7 DIAS DE ENCONTRARSE NOTIFICADO, SE LE COBRARA UNA CUOTA DE $20.00 M.N. DIARIOS POR USO DE ESPACIO(RESGUARDO) <br>ASI MISMO A PARTIR DE LOS 30 DIAS CUMPLIDOS, LA EMPRESA SPA PC NO SE HACE RESPONSABLE DE DAÑOS O PERDIDA ALGUNA. <br> NOTA2: TODA TABLET O CELULAR QUE VENGA CON PROBLEMAS  DE SISTEMA O TARJETA LA EMPRESA NO SE HACE RESPONSABLE DE LA FUNCIONALIDAD DEL EQUIPO YA QUE PUEDE VENIR FUNCIONANDO PERO A LA HORA DE EJECUTAR PRUEBAS EL EQUIPO PUEDE DEJAR DE FUNCIONAR.</p></td>
        </tr>
      </table>
    </div>
    <h3>Promocion del día:</h3>
    <img src="../../resources/publicidad.jpg" style="width: 100%;" >';


	$mail = new PHPMailer();
	$mail->isSendMail();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tsl";
  	$mail->Host = "smtp.1and1.mx";
	$mail->Port = 587;
	$mail->Username = "ventas@spapc.mx";
	$mail->Password = "1234567";
	$mail->From = "ventas@spapc.mx";
	$mail->FromName = "Servicios, Programas y Accesorios PC";
	$mail->AddAddress($correo_cliente);
	$mail->IsHTML(true);
	$mail->SMTPDebug = 2;
	$mail->Subject = "SPA PC SERVICIOS";

	$mail->MsgHTML($mensaje_html);

	if(!$mail->Send())
	{

	echo 'ERROR'.$mail->ErrorInfo;
	}
	else
	{
		echo '<script>alert ("Mensaje enviado")</script>';
	}

}













function enviar_correo_salida($id_cliente, $id_equipo)
{
	require("../connections/conexion.php");
	require_once ("phpmailer/class.phpmailer.php");
	require_once('phpmailer/class.smtp.php');

	$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
	$res_datos = mysqli_query($mysqli, $datos_cliente);
	$cliente = mysqli_fetch_assoc($res_datos);

	$correo_cliente = $cliente['email'];
	$tipo = "Orden de Salida";



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
			$estado = $row[9];
			$diagnostico = $row[10];
			$id_salida = $row[11];
		}
	}

	$entrega;
	$recibe;
	$costo;
	$fechad;
	$observaciones_sal;
	$sql_salida = "SELECT  recibe, entrega, costo, fecha, observaciones FROM salidas WHERE id = '".$id_salida."'";
	$res_salida = mysqli_query($mysqli, $sql_salida);
	if($res_salida)
	{
		while($row = mysqli_fetch_row($res_salida))
		{
			$entrega = $row[1];
			$recibe = $row[0];
	    $costo = $row[2];
	    $fechad = $row[3];
	    $observaciones_sal = $row[4];
		}
	}

	$mensaje_html = '<img src="../../resources/cabecera.jpg" style="width: 85%; height: 100px; float: right;" >
<div style="width: 20%; float: left; margin-top: 2%;">
	<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Orden de servicio:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$id_equipo.'</th>
        </tr>
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Fecha:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$fecha.'</th>
        </tr>
        </table>
</div>
<div style="width: 100%;">
        <table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Cliente:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["nombre"].'</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Telefono:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["telefono1"].' - '.$cliente["telefono2"].'</th>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Articulo:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$equipo.'</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Modelo:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$modelo.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Marca:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$marca.'</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Serie:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$serie.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Problema Reportado:</td>
		<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">'.$problema.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4">Nombre y firma del cliente</td>
        </tr>
          <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4"></td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Diagnostico:</td>
	<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">'.$fechad.' '.$diagnostico.'</td>
        </tr>

        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Solución:</td>
    <td class="tg-yw4l" colspan="3">'.$observaciones_sal.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Costo de reparación:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">$'.$costo.' M.N.</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Entrega:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$entrega.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Recibe:</td>
		<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">'.$recibe.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4"><p style="text-align: justify;">SPA PC AGRADECE SU PREFERENCIA</p></td>
        </tr>

      </table>
    </div>
    <h3>Promocion del día:</h3>
    <img src="../../resources/publicidad.jpg" style="width: 100%;" >';


	$mail = new PHPMailer();
	$mail->isSendMail();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tsl";
  	$mail->Host = "smtp.1and1.mx";
	$mail->Port = 587;
	$mail->Username = "ventas@spapc.mx";
	$mail->Password = "1234567";
	$mail->From = "ventas@spapc.mx";
	$mail->FromName = "Servicios, Programas y Accesorios PC";
	$mail->AddAddress($correo_cliente);
	$mail->IsHTML(true);
	$mail->SMTPDebug = 2;
	$mail->Subject = "SPA PC SERVICIOS";

	$mail->MsgHTML($mensaje_html);

	if(!$mail->Send())
	{

	echo 'ERROR'.$mail->ErrorInfo;
	}
	else
	{
		echo '<script>alert ("Mensaje enviado")</script>';
	}

}





function enviar_correo_diagnostico($id_equipo)
{
	require("../connections/conexion.php");
	require_once ("phpmailer/class.phpmailer.php");
	require_once('phpmailer/class.smtp.php');


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
	$id_cliente;

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
			$estado = $row[9];
			$diagnostico = $row[10];
			$id_salida = $row[11];
			$id_cliente = $row[8];
		}
	}

	$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
	$res_datos = mysqli_query($mysqli, $datos_cliente);
	$cliente = mysqli_fetch_assoc($res_datos);

	$correo_cliente = $cliente['email'];
	$tipo = "Orden de Salida";





	$entrega;
	$recibe;
	$costo;
	$fechad;
	$observaciones_sal;
	$sql_salida = "SELECT  recibe, entrega, costo, fecha, observaciones FROM salidas WHERE id = '".$id_salida."'";
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

	$mensaje_html = '<img src="../../resources/cabecera.jpg" style="width: 85%; height: 100px; float: right;" >
<div style="width: 20%; float: left; margin-top: 2%;">
	<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Orden de servicio:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$id_equipo.'</th>
        </tr>
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Fecha:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$fecha.'</th>
        </tr>
        </table>
</div>
<div style="width: 100%;">
        <table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
        <tr>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Cliente:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["nombre"].'</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Telefono:</th>
          <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["telefono1"].' - '.$cliente["telefono2"].'</th>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Articulo:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$equipo.'</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Modelo:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$modelo.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Marca:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$marca.'</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Serie:</td>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$serie.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Problema Reportado:</td>
		<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">'.$problema.'</td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4">Nombre y firma del cliente</td>
        </tr>
          <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4"></td>
        </tr>
        <tr>
          <td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Diagnostico:</td>
	<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">'.$fechad.' '.$diagnostico.'</td>
        </tr>

      </table>
    </div>
    <h3>Promocion del día:</h3>
    <img src="../../resources/publicidad.jpg" style="width: 100%;" >';


	$mail = new PHPMailer();
	$mail->isSendMail();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tsl";
  	$mail->Host = "smtp.1and1.mx";
	$mail->Port = 587;
	$mail->Username = "ventas@spapc.mx";
	$mail->Password = "1234567";
	$mail->From = "ventas@spapc.mx";
	$mail->FromName = "Servicios, Programas y Accesorios PC";
	$mail->AddAddress($correo_cliente);
	$mail->IsHTML(true);
	$mail->SMTPDebug = 2;
	$mail->Subject = "SPA PC SERVICIOS";

	$mail->MsgHTML($mensaje_html);

	if(!$mail->Send())
	{

	echo 'ERROR'.$mail->ErrorInfo;
	}
	else
	{
		echo '<script>alert ("Mensaje enviado")</script>';
	}

}

//////////////////////




function enviar_correo_recibo($id_recibo)
{
require("../connections/conexion.php");
require_once ("phpmailer/class.phpmailer.php");
require_once('phpmailer/class.smtp.php');

$id_cliente;
$cliente;
$id_equipo;
$fecha;
$suma;
$concepto;
$recibio;


$sql = "SELECT * FROM recibos WHERE id = '".$id_recibo."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	while($row = mysqli_fetch_row($res))
	{
		$id_cliente = $row[1];
		$cliente = $row[2];
		$fecha = $row[3];
		$suma = $row[4];
		$concepto = $row[5];
		$recibio = $row[6];
	}
}

$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
$res_datos = mysqli_query($mysqli, $datos_cliente);
$cliente = mysqli_fetch_assoc($res_datos);

$correo_cliente = $cliente['email'];


$mensaje_html = '<img src="../../resources/cabecera.jpg" style="width: 85%; height: 100px; float: right;" >
<div style="width: 20%; float: left; margin-top: 2%;">
<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
			<tr>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Recibo:</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$id_recibo.'</th>
			</tr>
			<tr>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Fecha:</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$fecha.'</th>
			</tr>
			</table>
</div>
<div style="width: 100%;">
			<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
			<tr>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Cliente:</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["nombre"].'</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Telefono:</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente["telefono1"].' - '.$cliente["telefono2"].'</th>
			</tr>
			<tr>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Domicilio:</td>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$cliente["direccion"].'</td>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Suma:</td>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$suma.'</td>
			</tr>
			<tr>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Concepto:</td>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$concepto.'</td>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">Recibe:</td>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;">'.$recibio.'</td>
			</tr>
				<tr>
				<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="4"></td>
			</tr>
			<tr>
<td style = "font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#fff;" colspan="3">COMPROBANTE NO VÁLIDO COMO FACTURA</td>
			</tr>

		</table>
	</div>
	<h3>Promocion del día:</h3>
	<img src="../../resources/publicidad.jpg" style="width: 100%;" >';


$mail = new PHPMailer();
$mail->isSendMail();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tsl";
	$mail->Host = "smtp.1and1.mx";
$mail->Port = 587;
$mail->Username = "ventas@spapc.mx";
$mail->Password = "1234567";
$mail->From = "ventas@spapc.mx";
$mail->FromName = "Servicios, Programas y Accesorios PC";
$mail->AddAddress($correo_cliente);
$mail->IsHTML(true);
$mail->SMTPDebug = 2;
$mail->Subject = "SPA PC SERVICIOS";

$mail->MsgHTML($mensaje_html);

if(!$mail->Send())
{
echo 'ERROR'.$mail->ErrorInfo;
}
else
{
	echo '<script>alert ("Mensaje enviado")</script>';
}

}


//////////////////////




function enviar_correo_cotizacion($id_cotizacion)
{
require("../connections/conexion.php");
require_once ("phpmailer/class.phpmailer.php");
require_once('phpmailer/class.smtp.php');

$id_cliente;
$fecha = date("d/m/Y");


$sql = "SELECT cliente FROM cotizaciones WHERE consecutivo = '".$id_cotizacion."'";
$res = mysqli_query($mysqli, $sql);
if($res)
{
	while($row = mysqli_fetch_row($res))
	{
		$id_cliente = $row[0];

	}
}

$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
$res_datos = mysqli_query($mysqli, $datos_cliente);
$cliente = mysqli_fetch_assoc($res_datos);

$correo_cliente = $cliente['email'];



$contador = 0;
$subtotal = 0;
$iva = 0;
$total = 0;
$sql_select = "SELECT * FROM cotizaciones WHERE consecutivo = '".$id_cotizacion."'";
$res_select = mysqli_query($mysqli, $sql_select);
$mes_concact = "";
if($res_select)
{
	while($row = mysqli_fetch_row($res_select))
	{
		if($contador == "0")
		{

		}
		else
		{
		$mes_concact = $mes_concact.'<tr>'.'<td style ="border-style:solid; border-width:1px; text-align: center;">'.$row[2].'</td>'.'<td style ="border-style:solid; border-width:1px; text-align: center;">'.$row[3].'</td>'.'<td style ="border-style:solid; border-width:1px; text-align: center;">$'.$row[4].'</td>';
		$total = $row[2]*$row[4];
		$mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px; text-align: center;">$'.$total.'</td>';
		$mes_concact = $mes_concact.'</tr>';
		$subtotal = $subtotal + $total;
		}
		$contador++;
	}
  $mes_concact = $mes_concact.'<tr>';
  $mes_concact = $mes_concact.'<td colspan ="2"><p style="text-align: justify;">*Sujeto a cambios sin previo aviso</p> </td>';
  $mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px;"><strong>Subtotal:</strong></td>';
  $mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px; text-align: center;"><strong>$'.$subtotal.'</strong></td>';
  $mes_concact = $mes_concact.'</tr>';

	$iva = $subtotal*0.16;
	$mes_concact = $mes_concact.'<tr>';
	$mes_concact = $mes_concact.'<td colspan ="2"> <p style="text-align: justify;">*Este presupuesto no incluye ningun tipo de material, instalaciones, cableado, canaletas, contactos que no sean especificados.</p> </td>';
	$mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px;"><strong>IVA:</strong></td>';
	$mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px; text-align: center;"><strong>$'.$iva.'</strong></td>';
	$mes_concact = $mes_concact.'</tr>';

	$total = $subtotal + $iva;
	$mes_concact = $mes_concact.'<tr>';
	$mes_concact = $mes_concact.'<td colspan = "2"> <p style="text-align: justify;">*Los retrasos en Pagos Generan un INTERES moratorio del 0.5% por dia de atraso en el PAGO.</p> </td>';
	$mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px;"><strong>Total:</strong></td>';
	$mes_concact = $mes_concact.'<td style ="border-style:solid;border-width:1px; text-align: center;"><strong>$'.$total.'</strong></td>';
	$mes_concact = $mes_concact.'</tr>';
}
$contador = 0;



$mensaje_html = '<img src="../../resources/cabecera.jpg" style="width: 85%; height: 100px; float: right;" >
<div style="width: 20%; float: left; margin-top: 2%;">
<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
			<tr>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$cliente['nombre'].'</th>
			</tr>
			<tr>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Fecha:</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">'.$fecha.'</th>
			</tr>
			</table>
</div>
<div style="width: 100%;">
			<table style="width: 100%; border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;">
			<tr>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Cantidad</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Concepto de venta</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Precio Unitario</th>
				<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#000;color:#333;background-color:#f0f0f0;">Total en M.N.</th>
			</tr>'.$mes_concact.'
		</table>
	</div>
	<div style="width: 100%; float: left; line-height:11px;">
	<ul>
<p style="text-align: center;"><strong ><u>CONDICIONES COMERCIALES</u></strong></p>
<p style="text-align: justify;">*80% A la firma del contrato</p>
<p style="text-align: justify;">*20% A la entrega del contrato</p>

<br>
<p style="text-align: center; font-size: 13px;"><strong >Constituccion #713 La Paz BCS. | Cel.6121585201 |Tel.6121231514 |https:www.spapc.mx |Email:servicios@spapc.mx</strong></p>
</ul>

</div>
	<h3>Promocion del día:</h3>
	<img src="../../resources/publicidad.jpg" style="width: 100%;" >';


$mail = new PHPMailer();
$mail->isSendMail();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tsl";
	$mail->Host = "smtp.1and1.mx";
$mail->Port = 587;
$mail->Username = "ventas@spapc.mx";
$mail->Password = "1234567";
$mail->From = "ventas@spapc.mx";
$mail->FromName = "Servicios, Programas y Accesorios PC";
$mail->AddAddress($correo_cliente);
$mail->IsHTML(true);
$mail->SMTPDebug = 2;
$mail->Subject = "SPA PC SERVICIOS";

$mail->MsgHTML($mensaje_html);

if(!$mail->Send())
{
echo 'ERROR'.$mail->ErrorInfo;
}
else
{
	echo '<script>alert ("Mensaje enviado")</script>';
}

}







function enviar_correo_servicio($id_cliente, $id_equipo)
{
	require("../connections/conexion.php");
	require_once ("phpmailer/class.phpmailer.php");
	require_once('phpmailer/class.smtp.php');

	$datos_cliente = "SELECT * FROM clientes WHERE id = '$id_cliente'";
	$res_datos = mysqli_query($mysqli, $datos_cliente);
	$cliente = mysqli_fetch_assoc($res_datos);

	$correo_cliente = $cliente['email'];
	$tipo = "Orden de entrada";



	$fecha;
	$hora;
	$problema;
	

	$sql = "SELECT * FROM servicios WHERE id = '".$id_equipo."'";
	$res = mysqli_query($mysqli, $sql);
	if($res)
	{
		while($row = mysqli_fetch_row($res))
		{
			$fecha = $row[18];
			$hora = $row[19];
			$problema = $row[4];

		}
	}

	$mensaje_html = 'SE AUTORIZO SU SOLICITUD DE SERVICIO EL DIA: '.$fecha.' A LAS: '.$hora;


	$mail = new PHPMailer();
	$mail->isSendMail();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tsl";
  	$mail->Host = "smtp.1and1.mx";
	$mail->Port = 587;
	$mail->Username = "ventas@spapc.mx";
	$mail->Password = "1234567";
	$mail->From = "ventas@spapc.mx";
	$mail->FromName = "Servicios, Programas y Accesorios PC";
	$mail->AddAddress($correo_cliente);
	$mail->IsHTML(true);
	$mail->SMTPDebug = 2;
	$mail->Subject = "SPA PC SERVICIOS";

	$mail->MsgHTML($mensaje_html);

	if(!$mail->Send())
	{

	echo 'ERROR'.$mail->ErrorInfo;
	}
	else
	{
		echo '<script>alert ("Mensaje enviado")</script>';
	}

}



?>
