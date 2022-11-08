<?php
// include class
require('fpdf/fpdf.php');
//Datos
foreach ($consultar as $datos) { 

    $tipo_pago = $datos['tipo_pago'];
    $fecha_pago = $datos['fecha_pago'];
    $nombre_bono = $datos['nombre_bono'];

    $nombre_cargo = $datos['nombre_cargo'];
    $inasistencias = $datos['inasistencias'];
    $moneda = $datos['moneda'];

    $periodo_desde = $datos['periodo_desde'];
    $periodo_hasta = $datos['periodo_hasta'];

    $formato_valor = $datos['valor'];
    $dias = $datos['dias'];
    $format_total_dias_pagar = $datos['total_pagar'];
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $format_cedula = $datos['cedula_trabajador'];
    $cargo = $datos['nombre_cargo'];
  }
  $nombre_bono = strtoupper($nombre_bono);

    if ($moneda == 1) {
        $formato_valor = $formato_valor * $valor_actual;
    }
  $formato_valor_diario = $formato_valor / $dias;
  $formato_valor_inasistencia = $inasistencias * $formato_valor_diario;
  $formato_total_pagar = $formato_valor - $formato_valor_inasistencia;
// create document
$pdf = new FPDF();
$pdf->AddPage();
// config document
$pdf->SetTitle('Recibo de bonos');
$pdf->SetAuthor('J&A Chirinos');
$pdf->SetCreator('FPDF Maker');

// Encabezado
$pdf->SetFont('Arial', 'B', 24);
$pdf->Ln();

    $pdf->setY(0);
    $pdf->setX(0);
    $pdf->SetFont('Helvetica','',12);//Tipo de letra, negrita, tamaño
    $pdf->setFillColor(51,51,51);
    $pdf->SetTextColor(1,1,1);

    $pdf->Image(_THEME_.'/img/logo_recibo.jpg', 37,11,147);

    $pdf->Ln(30);
    $pdf->Cell(0, 10,  'Sector Brisas del Obelisco, carrera 2 entre Av. Rotaria y calle 3, Nro. 63-73, Barquisimeto-Lara',0, 0,'C', 0);
    $pdf->Ln(5);
    $pdf->Cell(0, 10,  'Telf.: 04167501719 - jyachirinosinstalaciones@gmail.com',0, 0,'C', 0);
 //formatos
        $cedula = number_format($format_cedula, 0, ".", ".");
        $dias_pagar = number_format($format_total_dias_pagar, 2, ",", ".");
        $valor_diario = number_format($formato_valor_diario, 2, ",", ".");
        $valor = number_format($formato_valor, 2, ",", ".");
        $valor_inasistencia = number_format($formato_valor_inasistencia, 2, ",", ".");
        $total_pagar = number_format($formato_total_pagar, 2, ",", ".");
        //$total = number_format($format_total, 2, ",", ".");
        //$total_inacistencias = number_format($format_total_inacistencias, 2, ",", ".");
//otros
    $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
    $pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
    $pdf->Ln(10);//salto de linea
    $pdf->SetFillColor(146,143,142);
// contenido

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->Cell(80, 4,  'RETROACTIVO BONO DE '. $nombre_bono ,1, 0,'C', true);
        $pdf->Cell(40, 4,  'PERIODO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre ,1, 0,'C', 0);//NOMBRE

        $pdf->Cell(52, 4,  'PAGO Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, $valor , 1, 0,'C', 0);//SUELDO



        $pdf->Cell(20, 4,  'DESDE',1, 0,'C', 0);
        $pdf->Cell(20, 4,  'HASTA',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, $apellido , 1, 0,'C', 0); //APELLIDO

        $pdf->Cell(52, 4,  'PAGO DIARIO Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, $valor_diario ,1, 0,'C', 0); //SUELDO DIARIO

        $pdf->Cell(20, 4, $periodo_desde ,1, 0,'C', 0); //PERIODO DESDE
        $pdf->Cell(20, 4, $periodo_hasta ,1, 0,'C', 0); //PERIODO HASTA

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cedula ,1, 0,'C', 0); //CEDULA

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(120, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre_cargo ,1, 0,'C', 0); //CARGO

        $pdf->Cell(30, 4,  'FECHA',1, 0,'C', 0);
        $pdf->Cell(40, 4,  $fecha_pago  ,1, 0,'C', 0); //FECHA PAGO
        $pdf->Cell(50, 4,  $tipo_pago ,1, 0,'C', 0);  //PAGO

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  'CANTIDAD DIAS',1, 0,'C', true);
        $pdf->Cell(40, 4,  'BS/UNIDAD',1, 0,'C', true);
        $pdf->Cell(50, 4,  'TOTAL',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias a pagar',1, 0,'C', 0);
        $pdf->Cell(30, 4,  $dias ,1, 0,'C', 0);  //DIAS LABORADOS
        $pdf->Cell(40, 4,  $valor_diario ,1, 0,'C', 0);  //SUELDO DIARIO
        $pdf->Cell(50, 4,  $valor ,1, 0,'C', 0); //TOTAL DE DIAS LABORADOS
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  '',1, 0,'C');
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '' ,1, 0,'C', 0);
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4, "" ,1, 0,'C', 0);   //total de deducciones

        $pdf->Ln(4);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60, 4,  'Inasistencias',1, 0,'C', 0);
        $pdf->Cell(30, 4,  $inasistencias,1, 0,'C', 0);
        $pdf->Cell(40, 4,  $valor_diario,1, 0,'C', 0);
        $pdf->Cell(50, 4,  $valor_inasistencia ,1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  '',0, 0,'C', 0);
        $pdf->Cell(30, 4,  '',0, 0,'C', 0);
        $pdf->Cell(40, 4,  'TOTAL A PAGAR',1, 0,'C', true);
        $pdf->Cell(50, 4,  $total_pagar ,1, 0,'C', 0);         //total a pagar
        $pdf->SetFont('Arial','',9);

   
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(30, 4,  'Nombre y Apellido: ',0, 0,'C', 0);
        $pdf->Ln(0);
        $pdf->Cell(130, 4,  '__________________________________________________________________________',0, 0,'C', 0);
        $pdf->Cell(17, 4,  'Huella',0, 0,'C', 0);

        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10, 4,  'C.I No: ',0, 0,'C', 0);
        $pdf->Ln(0);
        $pdf->Cell(60, 4,  '__________________________________',0, 0,'C', 0);

        $pdf->Cell(71, 4,  'Firma:__________________________________ ',0, 0,'C', 0);


        $pdf->Cell(40, 4,  'dactilar: ____________',0, 0,'C', 0);
// output file
$pdf->Output('', 'J&A');