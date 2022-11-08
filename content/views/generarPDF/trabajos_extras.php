<?php
// include class
require('fpdf/fpdf.php');
//Datos
foreach ($consultar as $datos) { 

    $fecha_trabajo = $datos['fecha_trabajo'];
    $descripcion_trabajo = $datos['descripcion_trabajo'];
    $tipo_pago = $datos['tipo_pago'];
    $fecha_pago = $datos['fecha_pago'];
    $descripcion = $datos['descripcion'];
    $cantidad = $datos['cantidad'];
    $total_unidad = $datos['total_unidad'];
    $total_pagar = $datos['total_pagar'];
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $cedula = $datos['cedula_trabajador'];
    $cargo = $datos['nombre_cargo'];
  }

$total_unidad = $total_unidad * $valor_actual;
$total_pagar = $total_pagar * $valor_actual;
// create document
$pdf = new FPDF();
$pdf->AddPage();
// config document
$pdf->SetTitle('Trabajo Extra');
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
        $format_total_pagar = $total_pagar;
        $format_total_unidad = $total_unidad;
        $format_cedula = $cedula;
        $total_pagar = number_format($format_total_pagar, 2, ",", ".");
        $total_unidad = number_format($format_total_unidad, 2, ",", ".");
        $cedula = number_format($format_cedula, 0, ".", ".");
//otros
        $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
$pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
$pdf->Ln(10);//salto de linea
$pdf->SetFillColor(146,143,142);
// contenido

        $pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->Cell(120, 4,  'DESCRPCION DEL TRABAJO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre ,1, 0,'C', 0);//NOMBRE

        $pdf->Cell(120, 12,  $descripcion_trabajo,1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, $apellido , 1, 0,'C', 0); //APELLIDO


        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cedula ,1, 0,'C', 0); //CEDULA

     

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cargo ,1, 0,'C', 0); //CARGO
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4, 'FECHA DE TRABAJO',1, 0,'C', true);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(60, 4, $fecha_trabajo ,1, 0,'C', 0); 

         $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(180, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'FECHA',1, 0,'C', 0);
        $pdf->Cell(60, 4,  $fecha_pago  ,1, 0,'C', 0); //FECHA PAGO
        $pdf->Cell(60, 4,  $tipo_pago ,1, 0,'C', 0);  //PAGO

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'DESCRPCION',1, 0,'C', true);
        $pdf->Cell(30, 4,  'CANTIDAD',1, 0,'C', true);
        $pdf->Cell(40, 4,  'VALOR/UNIDAD',1, 0,'C', true);
        $pdf->Cell(50, 4,  'TOTAL',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  $descripcion ,1, 0,'C', 0);
        $pdf->Cell(30, 4,  $cantidad ,1, 0,'C', 0);   
        $pdf->Cell(40, 4,  $total_unidad ,1, 0,'C', 0);  
        $pdf->Cell(50, 4,  $total_pagar ,1, 0,'C', 0); 

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  "DEDUCCIONES" ,1, 0,'C', TRUE);
        $pdf->Cell(30, 4,  "" ,1, 0,'C', 0);  
        $pdf->Cell(40, 4,  "" ,1, 0,'C', 0); 
        $pdf->Cell(50, 4,  "-" ,1, 0,'C', 0); 

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  "" ,1, 0,'C', 0);
        $pdf->Cell(30, 4,  "" ,1, 0,'C', 0);  
        $pdf->Cell(40, 4,  "" ,1, 0,'C', 0); 
        $pdf->Cell(50, 4,  "-" ,1, 0,'C', 0); 

        $pdf->SetFont('Arial','B',9);
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