<?php

use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\dolar as Dolar;
$dolar = new Dolar();

use content\models\generarPDF as GenerarPDF;
$generarPDF = new GenerarPDF();

use content\models\bono as Bono;
$bonos = new Bono();

use content\models\nomina as Nomina;
$nomina = new Nomina();

use content\models\inasistencia as Inasistencia;
$inasistencia = new Inasistencia();

use content\models\trabajos_extras as Trabajos_extras;
$trabajos_extras = new Trabajos_extras();

use content\models\recibo_bono as Recibo_bono;
$recibo_bono = new Recibo_bono();

use content\models\deducciones as Deducciones;
$deducciones = new Deducciones();


$respuesta = explode("$", $_GET['opcion']);


$_SESSION['ventana'] = "generarPDF";

if (!empty($respuesta[0])) {
	
	$opcion = $respuesta[0];

	switch ($opcion) {

		case 'trabajos_extras':
		//id del recibo;
		$consultaDolar = $dolar -> consultar();
		foreach ($consultaDolar as $datos) { 
			$valor_actual = $datos['valor_actual'];
		}
		$consultar = $generarPDF -> consultarTrabajosExtras($respuesta[1]);
		$views = _VIEWS_.$url."/trabajos_extras.php";
		require_once $views;
		break;

		case 'bono':
		//id del recibo;
		$consultaDolar = $dolar -> consultar();
		foreach ($consultaDolar as $datos) { 
			$valor_actual = $datos['valor_actual'];
		}
		$consultar = $generarPDF -> consultarRecibo_bono($respuesta[1]);
		$views = _VIEWS_.$url."/recibo_bono.php";
		require_once $views;

		break;

		case 'nomina':
		//id del recibo;
		$consultar = $generarPDF -> consultarNomina($respuesta[1]); 
		$consultarDeducciones = $deducciones -> consultar();
		$views = _VIEWS_.$url."/nomina.php";
		require_once $views;

		break;

		case 'consultarNominas':
		$consultar = $nomina -> consultar();
		$views = _VIEWS_.$url."/consultarNomina.php";
		require_once $views;

		break;

		case 'consultarBonos':
		$consultar = $recibo_bono -> consultar();
		$views = _VIEWS_.$url."/consultarRecibo_bono.php";
		require_once $views;
		break;

		case 'consultarTrabajos_extras':
		$consultar = $trabajos_extras -> consultar();
		$views = _VIEWS_.$url."/consultarTrabajos_extras.php";
		require_once $views;
		break;

		case 'consultarInasistencias':
		$consultar = $inasistencia -> consultar();
		$views = _VIEWS_.$url."/consultarInasistencia.php";
		require_once $views;
		break;
	}

}





?>