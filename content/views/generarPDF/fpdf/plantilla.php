<?php

$libreria = 'fpdf/fpdf.php';

include ($libreria);

class PDF extends FPDF {

	function Header(){
	$this->setY(0);
		$this->setX(0);
		$this->SetFont('Helvetica','',12);//Tipo de letra, negrita, tamaño
		$this->setFillColor(51,51,51);
		$this->SetTextColor(1,1,1);

		$this->Image(constant('URL').'/public/img/logo_recibo.jpg', 37,11,147);

		$this->Ln(30);
		$this->Cell(0, 10,  'Sector Brisas del Obelisco, carrera 2 entre Av. Rotaria y calle 3, Nro. 63-73, Barquisimeto-Lara',0, 0,'C', 0);
		$this->Ln(5);
		$this->Cell(0, 10,  'Telf.: 04167501719 - jyachirinosinstalaciones@gmail.com',0, 0,'C', 0);
	}
}

?>
