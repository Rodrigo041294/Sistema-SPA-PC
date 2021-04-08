<?php
require("../../assets/plugins/Excel/PHPExcel.php");
require("../connections/conexion.php");

$f1 = $_POST['f1'];
$f2 = $_POST['f2'];
$tipo = $_POST['tipo'];


if($tipo == "Control de Servicios")
{
	$consulta = "SELECT e.nombre AS empresa, e.telefono AS telefono, e.correo as correo, e.direccion as direccion, s.problema as tipo_servicio, u.nombre as asignado, s.fecha as fecha_solicitud, s.hora as hora_solicitud, s.observaciones as interesado_notas FROM servicios s INNER JOIN empresas e ON s.id_cliente = e.id INNER JOIN usuarios u ON s.asignado = u.id WHERE s.fecha BETWEEN '$f1' AND '$f2'";


	$res = mysqli_query($mysqli, $consulta);
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()
		->setCreator("SPA PC")
		->setLastModifiedBy("SPA PC")
		->setTitle("Control de Servicios SPA PC")
		->setSubject("Control de Servicios")
		->setDescription("Control de Servicios")
		->setKeywords("SPA PC")
		->setCategory("SPA PC");

	//TERMINO == CLASIFICACION
	$tituloReporte = "COMERCIALIZACION";
	$titulosColumnas = array('EMPRESA', 'TELEFONO', 'CORREO', 'DIRECCION', 'TIPO DE SERVICIO', 'ASIGNADO', 'FECHA DE SOLICITUD', 'HORA DE SOLICITUD', 'NOTAS DE INTERES');

	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:I1');
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1',$tituloReporte) // Titulo del reporte
            ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas 13
            ->setCellValue('B3',  $titulosColumnas[1])
            ->setCellValue('C3',  $titulosColumnas[2])
            ->setCellValue('D3',  $titulosColumnas[3])
            ->setCellValue('E3',  $titulosColumnas[4])
            ->setCellValue('F3',  $titulosColumnas[5])
            ->setCellValue('G3',  $titulosColumnas[6])
            ->setCellValue('H3',  $titulosColumnas[7])
            ->setCellValue('I3',  $titulosColumnas[8]);


	$i = 4; //Numero de fila donde se va a comenzar a rellenar estados
	$j = 4; //Numero de fila donde se va a comenzar a rellenar estados

	while($datos_h = mysqli_fetch_row($res))
	{
		if($datos_h[5] == "1969/12/31")
		{
			$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue('A'.$i, $datos_h[0])
	        ->setCellValue('B'.$i, $datos_h[1])
	        ->setCellValue('C'.$i, $datos_h[2])
	        ->setCellValue('D'.$i, $datos_h[3])
	        ->setCellValue('E'.$i, $datos_h[4])
	        ->setCellValue('F'.$i, $datos_h[5])
	        ->setCellValue('G'.$i, $datos_h[6])
	        ->setCellValue('H'.$i, $datos_h[7])
	        ->setCellValue('I'.$i, $datos_h[8]);
		}
		else
		{
			$objPHPExcel->setActiveSheetIndex(0)
	        ->setCellValue('A'.$i, $datos_h[0])
	        ->setCellValue('B'.$i, $datos_h[1])
	        ->setCellValue('C'.$i, $datos_h[2])
	        ->setCellValue('D'.$i, $datos_h[3])
	        ->setCellValue('E'.$i, $datos_h[4])
	        ->setCellValue('F'.$i, $datos_h[5])
	        ->setCellValue('G'.$i, $datos_h[6])
	        ->setCellValue('H'.$i, $datos_h[7])
	        ->setCellValue('I'.$i, $datos_h[8]);
		}
		
	    $i++;
	}
	$estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Verdana',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size'      => 16,
                    'color'     => array(
                    'rgb'       => 'FFFFFF'
                    )
                ),
                'fill' => array(
                  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array(
                        'argb' => '084264')
              ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_NONE
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => TRUE
                )
            );


            $estiloTituloColumnas = array(
                'font' => array(
                    'name'  => 'Arial',
                    'bold'  => true,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_SOLID,
              'rotation'   => 90,
                    'startcolor' => array(
                        'rgb' => '0A599A'
                    )
                ),
                'borders' => array(
                    'top' => array(
                        'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                        'color' => array(
                            'rgb' => '143860'
                        )
                    ),
                    'bottom' => array(
                        'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                        'color' => array(
                            'rgb' => '143860'
                        )
                    )
                ),
                'alignment' =>  array(
                    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'      => TRUE
                )
            );

            $estiloInformacion = new PHPExcel_Style();
            $estiloInformacion->applyFromArray( array(
                'font' => array(
                    'name'  => 'Arial',
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:I".($i-1));

	for($i = 'A'; $i <= 'G'; $i++)
        {
            $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
        }

        $objPHPExcel->getActiveSheet()->setTitle('Control de Servicios SPA PC');
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Control de Servicios SPA PC.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');
}
else
{
    $consulta = "SELECT  c.id, e.nombre, e.telefono, e.correo, e.direccion, c.tipo_servicio, u.nombre, c.fsolicitud, c.fvisita, c.notas FROM comercializacion c INNER JOIN empresas e ON c.cliente = e.id INNER JOIN usuarios u ON c.asignado = u.id WHERE c.fsolicitud BETWEEN '$f1' AND '$f2'";
    
    $res = mysqli_query($mysqli, $consulta);
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()
		->setCreator("SPA PC")
		->setLastModifiedBy("SPA PC")
		->setTitle("Comercializacion SPA PC")
		->setSubject("Comercializacion")
		->setDescription("Comercializacion")
		->setKeywords("SPA PC")
		->setCategory("SPA PC");

	//TERMINO == CLASIFICACION
	$tituloReporte = "COMERCIALIZACION";
	$titulosColumnas = array('EMPRESA', 'TELEFONO', 'CORREO', 'DIRECCION', 'TIPO DE SERVICIO', 'ASIGNADO', 'FECHA DE SOLICITUD', 'FECHA DE VISITA', 'NOTAS DE INTERES');

    //TERMINO == CLASIFICACION
    $tituloReporte = "CONTROL DE SERVICIO";
    $titulosColumnas = array('EMPRESA', 'TELEFONO', 'CORREO', 'DIRECCION', 'TIPO DE SERVICIO', 'ASIGNADO', 'FECHA DE SOLICITUD', 'FECHA DE VISITA', 'NOTAS DE INTERES');

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:J1');
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1',$tituloReporte) // Titulo del reporte
            ->setCellValue('A3',  $titulosColumnas[0])
            ->setCellValue('B3',  $titulosColumnas[1])
            ->setCellValue('C3',  $titulosColumnas[2])
            ->setCellValue('D3',  $titulosColumnas[3])
            ->setCellValue('E3',  $titulosColumnas[4])
            ->setCellValue('F3',  $titulosColumnas[5])
            ->setCellValue('G3',  $titulosColumnas[6])
            ->setCellValue('H3',  $titulosColumnas[7])
            ->setCellValue('I3',  $titulosColumnas[8]);


    $i = 4; //Numero de fila donde se va a comenzar a rellenar estados
    $j = 4; //Numero de fila donde se va a comenzar a rellenar estados

    while($datos_h = mysqli_fetch_row($res))
    {
        if($datos_h[5] == "1969/12/31")
        {
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $datos_h[1])
            ->setCellValue('B'.$i, $datos_h[2])
            ->setCellValue('C'.$i, $datos_h[3])
            ->setCellValue('D'.$i, $datos_h[4])
            ->setCellValue('E'.$i, $datos_h[5])
            ->setCellValue('F'.$i, $datos_h[6])
            ->setCellValue('G'.$i, $datos_h[7])
            ->setCellValue('H'.$i, $datos_h[8])
            ->setCellValue('I'.$i, $datos_h[9]);
        }
        else
        {
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $datos_h[1])
            ->setCellValue('B'.$i, $datos_h[2])
            ->setCellValue('C'.$i, $datos_h[3])
            ->setCellValue('D'.$i, $datos_h[4])
            ->setCellValue('E'.$i, $datos_h[5])
            ->setCellValue('F'.$i, $datos_h[6])
            ->setCellValue('G'.$i, $datos_h[7])
            ->setCellValue('H'.$i, $datos_h[8])
            ->setCellValue('I'.$i, $datos_h[9]);
        }
        
        $i++;
    }
    $estiloTituloReporte = array(
                'font' => array(
                    'name'      => 'Verdana',
                    'bold'      => true,
                    'italic'    => false,
                    'strike'    => false,
                    'size'      => 16,
                    'color'     => array(
                    'rgb'       => 'FFFFFF'
                    )
                ),
                'fill' => array(
                  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                  'color' => array(
                        'argb' => '084264')
              ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_NONE
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => TRUE
                )
            );


            $estiloTituloColumnas = array(
                'font' => array(
                    'name'  => 'Arial',
                    'bold'  => true,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_SOLID,
              'rotation'   => 90,
                    'startcolor' => array(
                        'rgb' => '0A599A'
                    )
                ),
                'borders' => array(
                    'top' => array(
                        'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                        'color' => array(
                            'rgb' => '143860'
                        )
                    ),
                    'bottom' => array(
                        'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                        'color' => array(
                            'rgb' => '143860'
                        )
                    )
                ),
                'alignment' =>  array(
                    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'      => TRUE
                )
            );

            $estiloInformacion = new PHPExcel_Style();
            $estiloInformacion->applyFromArray( array(
                'font' => array(
                    'name'  => 'Arial',
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A3:J3')->applyFromArray($estiloTituloColumnas);
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:J".($i-1));

    for($i = 'A'; $i <= 'G'; $i++)
        {
            $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
        }

        $objPHPExcel->getActiveSheet()->setTitle('Comercializacion SPA PC');
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Comercializacion SPA PC.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');
}
?>