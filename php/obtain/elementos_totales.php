<?php
require("../connections/conexion.php");
$fecha = date("d/m/Y");
$consecutivo_select = $consecutivo-1;
$contador = 0;
$subtotal = 0;
$iva = 0;
$total = 0;
$sql_select = "SELECT * FROM cotizaciones WHERE consecutivo = '".$consecutivo_select."'";
$res_select = mysqli_query($mysqli, $sql_select);
if($res_select)
{
	while($row = mysqli_fetch_row($res_select))
	{
		if($contador == "0")
		{

		}
		else
		{
		echo '<tr>';
		echo '<td style ="border-style:solid; border-width:1px; text-align: center;">'.$row[2].'</td>';
		echo '<td style ="border-style:solid; border-width:1px; text-align: center;">'.$row[3].'</td>';
		echo '<td style ="border-style:solid; border-width:1px; text-align: center;">$'.$row[4].'</td>';
		$total = $row[2]*$row[4];
		echo '<td style ="border-style:solid;border-width:1px; text-align: center;">$'.$total.'</td>';
		echo '</tr>';
		$subtotal = $subtotal + $total;
		}
		$contador++;
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
}
$contador = 0;



?>