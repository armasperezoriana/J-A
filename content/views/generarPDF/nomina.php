<?php
// include class
require('fpdf/fpdf.php');
//Datos
foreach ($consultarDeducciones as $datos){
    $porcentaje_ivss = $datos['ivss'];
    $porcentaje_rpe = $datos['rpe'];
    $porcentaje_faov = $datos['faov'];
    $porcentaje_inces = $datos['inces'];
}
foreach ($consultar as $datos) { 
    $ivss = $datos['ivss'];
    $rpe = $datos['rpe'];
    $faov = $datos['faov'];
    $inces = $datos['inces'];
    $prima = $datos['prima_por_hogar'];
    $total_pagar = $datos['total_pagar_nomina'];
    $sueldo_semanal = $datos['sueldo_semanal'];

    $faltas = $datos['inasistencias'];
    $horas_extras = $datos['horas_extras'];

    $tipo_pago = $datos['tipo_pago'];
    $fecha_pago = $datos['fecha_pago'];

    $nombre_cargo = $datos['nombre_cargo'];
    $inasistencias = $datos['inasistencias'];

    $periodo_desde = $datos['periodo_desde'];
    $periodo_hasta = $datos['periodo_hasta'];

    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $cedula = $datos['cedula_trabajador'];
    $cargo = $datos['nombre_cargo'];
  }
    $sueldo_diario = $sueldo_semanal / 7;
    $sueldo_hora = $sueldo_diario / 8;
    $total_dias_descanso = $sueldo_diario * 2;
    $dias_laborados = 5 - $faltas;
    $total_dias_laborados = $dias_laborados * $sueldo_diario;
    $total_dias_perdidos = $faltas * $sueldo_diario;
    $valor_horas_extras = $sueldo_hora + (($sueldo_hora * 50) / 100);
    $total_horas_extras = $horas_extras * $valor_horas_extras;
    $total_asignaciones = $total_dias_laborados + $prima + $total_horas_extras + $total_dias_descanso;
    $inces = 0; #$inces = ($sueldo_semanal * no se sabe) /100 ;
    $total_deducciones = $ivss + $rpe + $faov + $inces;
    $total_pagar =  $total_asignaciones - $total_deducciones ;
    $cantidad_dias_pagar = 7 - $faltas;

        $format_sueldo_semanal = $sueldo_semanal;
        $format_sueldo_diario = $sueldo_diario;
        $format_cedula = $cedula;
        $format_prima_por_hogar = $prima;
        $format_total_horas_extras = $total_horas_extras;
        $format_valor_horas_extras = $valor_horas_extras;
        $format_total_dias_perdidos = $total_dias_perdidos;
        $format_total_asignaciones = $total_asignaciones;
        $format_ivss = $ivss;
        $format_rpe = $rpe;
        $format_faov = $faov;
        $format_inces = $inces;
        $format_total_deducciones = $total_deducciones;
        $format_total_pagar = $total_pagar;
        $format_total_dias_laborados = $total_dias_laborados;
        $format_total_dias_descanso = $total_dias_descanso;
// create document
$pdf = new FPDF();
$pdf->AddPage();
// config document
$pdf->SetTitle('Nomina');
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
        $sueldo_semanal = number_format($format_sueldo_semanal, 2, ",", ".");
        $sueldo_diario = number_format($format_sueldo_diario, 2, ",", ".");
        $cedula = number_format($format_cedula, 0, ".", ".");
        $prima_por_hogar = number_format($format_prima_por_hogar, 2, ",", ".");
        $total_horas_extras = number_format($format_total_horas_extras, 2, ",", ".");
        $total_dias_perdidos = number_format($format_total_dias_perdidos, 2, ",", ".");
        $total_asignaciones = number_format($format_total_asignaciones, 2, ",", ".");
        $ivss = number_format($format_ivss, 2, ",", ".");
        $rpe = number_format($format_rpe, 2, ",", ".");
        $faov = number_format($format_faov, 2, ",", ".");
        $inces = number_format($format_inces, 2, ",", ".");
        $total_deducciones = number_format($format_total_deducciones, 2, ",", ".");
        $total_pagar = number_format($format_total_pagar, 2, ",", ".");
        $total_dias_laborados = number_format($format_total_dias_laborados, 2, ",", ".");
        $valor_horas_extras = number_format($format_valor_horas_extras, 2, ",", ".");
        $total_dias_descanso = number_format($format_total_dias_descanso, 2, ",", ".");
//otros
        $pdf->SetLeftMargin($pdf->GetPageWidth() / 12 - 1);
$pdf->SetFont('Arial','B',9);//Tipo de letra, negrita, tamaño
$pdf->Ln(10);//salto de linea
$pdf->SetFillColor(146,143,142);
// contenido
$pdf->Cell(60, 4,  'IDENTIFICACION DEL TRABAJADOR',1, 0,'C', true);
        $pdf->Cell(64, 4,  'SALARIO BASE:',1, 0,'C', true);
        $pdf->Cell(56, 4,  'PERIODO:',1, 0,'C', true);

        $pdf->Ln(4);

        $pdf->SetFont('Arial','',9);//Tipo de letra, negrita, tamaño

        $pdf->Cell(30, 4,  'Nombre',1, 0,'C', 0);
        $pdf->Cell(30, 4, $nombre ,1, 0,'C', 0);//NOMBRE

        $pdf->Cell(36, 4,  'SALARIO SEMANAL Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, $sueldo_semanal , 1, 0,'C', 0);//SUELDO



        $pdf->Cell(28, 4,  'DESDE',1, 0,'C', 0);
        $pdf->Cell(28, 4,  'HASTA',1, 0,'C', 0);

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Apellido',1, 0,'C', 0);
        $pdf->Cell(30, 4, $apellido , 1, 0,'C', 0); //APELLIDO

        $pdf->Cell(36, 4,  'SALARIO DIARIO Bs',1, 0,'C', 0);
        $pdf->Cell(28, 4, $sueldo_diario ,1, 0,'C', 0); //SUELDO DIARIO

        $pdf->Cell(28, 4, $periodo_desde ,1, 0,'C', 0); //PERIODO DESDE
        $pdf->Cell(28, 4, $periodo_hasta ,1, 0,'C', 0); //PERIODO HASTA

        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'C.I No:',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cedula ,1, 0,'C', 0); //CEDULA

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(120, 4,  'FORMA DE PAGO',1, 0,'C', true);

        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(30, 4,  'Cargo',1, 0,'C', 0);
        $pdf->Cell(30, 4, $cargo ,1, 0,'C', 0); //CARGO

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
        $pdf->Cell(60, 4,  'Dias Laborados',1, 0,'C', 0);
        $pdf->Cell(30, 4,  $dias_laborados ,1, 0,'C', 0);  //DIAS LABORADOS
        $pdf->Cell(40, 4,  $sueldo_diario ,1, 0,'C', 0);  //SUELDO DIARIO
        $pdf->Cell(50, 4,  $total_dias_laborados ,1, 0,'C', 0); //TOTAL DE DIAS LABORADOS

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias de descanso (1 dia de permiso)',1, 0,'C', 0);
        $pdf->Cell(30, 4, "2" ,1, 0,'C', 0);  //DIAS DE DESCANSO
        $pdf->Cell(40, 4, $sueldo_diario ,1, 0,'C', 0);  //SUELDO DIARIO
        $pdf->Cell(50, 4, $total_dias_descanso ,1, 0,'C', 0); //TOTAL DE DIAS DE DESCANSO
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Prima por hogar',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  $prima_por_hogar,1, 0,'C', 0);
        $pdf->Cell(50, 4, $prima_por_hogar ,1, 0,'C', 0); //TOTAL PRIMA POR HOGAR

        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Horas extras',1, 0,'C', 0);
        $pdf->Cell(30, 4,  $horas_extras , 1, 0,'C', 0);  //CANTIDAD DE HORAS EXTRAS
        $pdf->Cell(40, 4,  $valor_horas_extras , 1, 0,'C', 0); //HORAS EXTRAS
        $pdf->Cell(50, 4,  $total_horas_extras , 1, 0,'C', 0); //TOTAL DE HORAS EXTRAS 
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Dias perdidos injustifacados',1, 0,'C', 0);
        $pdf->Cell(30, 4, $faltas , 1, 0,'C', 0);   //INASISTENCIA SEMANAL
        $pdf->Cell(40, 4,  '-'.$sueldo_diario , 1, 0,'C', 0); //SUELDO DIARIO
        $pdf->Cell(50, 4,  $total_dias_perdidos , 1, 0,'C', 0);  //TOTAL DE DIAS PERDIDOS

        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DE ASIGNACIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', true);
        $pdf->Cell(40, 4,  '',1, 0,'C', true);
        $pdf->Cell(50, 4, $total_asignaciones ,1 , 0,'C', true);  //TOTAL ASIGNACIONES
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  '',1, 0,'C', 0);
        $pdf->SetFont('Arial','',9);
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Retencion IVSS '. $porcentaje_ivss .'%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4, $ivss ,1, 0,'C', 0);    //IVSS
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Retencion RPE '. $porcentaje_rpe .'%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  $rpe,1, 0,'C', 0);  //RPE
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'Retencion FAOV '. $porcentaje_faov .'%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4,  $faov ,1, 0,'C', 0);     //FAOV
        $pdf->Ln(4);
        $pdf->Cell(60, 4,  'INCES '. $porcentaje_inces .'%',1, 0,'C', 0);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4, $inces ,1, 0,'C', 0);   //inces
        $pdf->Ln(4);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(60, 4,  'TOTAL DEDUCCIONES',1, 0,'C', true);
        $pdf->Cell(30, 4,  '',1, 0,'C', 0);
        $pdf->Cell(40, 4,  '',1, 0,'C', 0);
        $pdf->Cell(50, 4, $total_deducciones ,1, 0,'C', 0);   //total de deducciones

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