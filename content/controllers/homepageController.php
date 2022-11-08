<?php
// ******** PERMISOS
use content\models\avanzada as Avanzada;
$avanzada = new Avanzada(); 
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";
// ******** PARA CADA MODULO 

    
use content\component\componentViews as componentViews;

use content\models\dolar as Dolar;
$dolar = new Dolar();
use content\models\inasistencia as Inasistencia;
$inasistencia = new Inasistencia();

use content\models\trabajador as Trabajador;
$trabajador = new Trabajador();

use content\models\nomina as Nomina; 
$nomina = new Nomina();

$components = new componentViews(); 

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Inicio";

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'validarUsuario':

		if (isset($_GET["alert"])) {
			
			$alert = $_GET["alert"];
		}

					if ($_SESSION["pSeguridad"] == false || empty($_SESSION["foto"]) || $_SESSION['passDefault'] == "true") {
                             

                            header("Location: ?url=seguridad&alert=$alert");
                   
                    }else {

                    		header("Location: ?url=homepage&alert=$alert");
                    }

		break;

		case 'modificar':
		$id = 1;
		date_default_timezone_set('America/Caracas');

		$valor_actual = $_POST['valor_actual'];
		$fecha_actualizacion = date('Y-m-d');  

		$dolar->setId($id);
		$dolar->setValor_actual($valor_actual);
		$dolar->setFecha_actualizacion($fecha_actualizacion);

		$estatus = $dolar->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;


	 }

 }else {
 	function color_rand(){
 	echo sprintf('#%06X', mt_rand(0, 0xFFFFFF));
 	}
 	
 	date_default_timezone_set('America/Caracas');
 	$mes = date('M');
 	$consultarTrabajadores = $trabajador -> consultarTrabajadores();
 	$trabajadores_inasistencias = [];
 	$trabajadores_nomina_pendiente = [];
 	foreach ($consultarTrabajadores as $datos) { 
 			$actual = date('Y-m-d');
			$cedula = $datos['cedula'];
			$trabajador =  $datos['nombre'] . ' '.  $datos['apellido'];
			$consultarInasistencia = $inasistencia -> consultarInasistencia($cedula);
			$cantidad_dias = 0;
			foreach ($consultarInasistencia as $datos_ina){
				$desde = $datos_ina['desde'];
				$hasta = $datos_ina['hasta'];
				$datetime1 = date_create($desde);
				$datetime2 = date_create($hasta);
				
				$actual_limites=strtotime($actual);
				$limite = $actual_limites - 2592000;

				$resp = date("Y-m-d", $limite);
				if (($desde >= $resp) && ($desde <= $actual)) {
					$contador = date_diff($datetime1, $datetime2);
					$differenceFormat = '%a';
					$cantidad_dias = $cantidad_dias + $contador->format($differenceFormat);
				 }
			}
		$trabajadores_inasistencias += [$trabajador => $cantidad_dias];

		$consultarNomina = $nomina -> consultarNomina($cedula);

		foreach ($consultarNomina as $dato_no){
			$trabajador = $dato_no['cedula'] .'-'.$dato_no['nombre'] .' '.$dato_no['apellido'] ;
			$periodo_hasta = $dato_no['periodo_hasta'];
			$date1 = new DateTime($periodo_hasta);
			$date2 = new DateTime($actual);
			$diff = $date1->diff($date2);
			$diferencia_dias = $diff->days;
			if ($diferencia_dias >= 7) {
				$trabajadores_nomina_pendiente += [$trabajador => $periodo_hasta];
			}
		}
	}

	$consultarInasistencia = $inasistencia -> consultar();

 	$consultaDolar = $dolar -> consultar();
 	foreach ($consultaDolar as $datos) { 
			$valor_actual = $datos['valor_actual'];
			$fecha_actualizacion = $datos['fecha_actualizacion'];
		}
 	require_once $views;
 }

?>