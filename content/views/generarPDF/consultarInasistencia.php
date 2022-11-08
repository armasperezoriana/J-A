<?php
// include class
require('fpdf/fpdf.php');
//Datos

// create document
$pdf = new FPDF();
$pdf->AddPage();
// config document
$pdf->SetTitle('Consulta PDF');
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
        //$sueldo_semanal = number_format($format_sueldo_semanal, 2, ",", ".");
//otros
        $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
$pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
$pdf->Ln(10);//salto de linea
$pdf->SetFillColor(146,143,142);
// contenido
    //MODELOS
        $pdf->Cell(160, 10,  'Inasistencias',2, 0,'C', 0);
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',12);//Tipo de letra, negrita, tamaño

        $pdf->Cell(45, 10, 'Nombre',1, 0,'C', 0);
        $pdf->Cell(20, 10, 'Cedula',1, 0,'C', 0);
        $pdf->Cell(20, 10, 'Cargo',1, 0,'C', 0);
        $pdf->Cell(25, 10, 'Desde',1, 0,'C', 0);
        $pdf->Cell(25, 10, 'Hasta',1, 0,'C', 0);
        $pdf->Cell(27, 10, 'Descripcion',1, 0,'C', 0);


 
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',10);//Tipo de letra, negrita, tamaño
        foreach ($consultar as $datos) {

            $pdf->Cell(45,10, $datos['nombre'] . ' ' .  $datos['apellido'], 1, 0,'C', 0);
            $cedula = number_format($datos['cedula'], 0, ".", ".");
            $pdf->Cell(20,10, $cedula, 1, 0,'C', 0);
            $pdf->Cell(20,10, $datos['nombre_cargo'], 1, 0,'C', 0);
            $pdf->Cell(25,10, $datos['desde'], 1, 0,'C', 0);
            $pdf->Cell(25,10, $datos['hasta'], 1, 0,'C', 0);
            $pdf->Cell(27,10, $datos['descripcion'], 1, 0,'C', 0);
            $pdf->Ln(10);//salto de linea

        }
// output file
$pdf->Output('', 'J&A');