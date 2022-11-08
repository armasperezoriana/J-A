<?php
use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\bono as Bono;
$bonos = new Bono();

use content\models\inasistencia as Inasistencia;
$inasistencia = new Inasistencia();

use content\models\dolar as Dolar;
$dolar = new Dolar();

use content\models\trabajador as Trabajador;
$trabajador = new Trabajador();
$consultarTrabajadores = $trabajador -> consultarTrabajadores();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$consultarBonos = $bonos -> consultar();

use content\models\recibo_bono as Recibo_bono;
$recibo_bono = new Recibo_bono();

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Recibo de bonos";

$consultarRecibo_bono = $recibo_bono -> consultar();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registrar':

		$cedula_trabajador = base64_decode($_POST['cedula_trabajador']);
		$id_bono = base64_decode($_POST['id_bono']);
		$periodo_desde = base64_decode($_POST['periodo_desde']);
		$periodo_hasta = base64_decode($_POST['periodo_hasta']);
		$tipo_pago = base64_decode($_POST['tipo_pago']);
		$fecha_pago = base64_decode($_POST['fecha_pago']);
		$status = 1;
		$inasistencias = 0;
		
		//formato de las fechas para poder hacer la busqueda
		$desde=strtotime($periodo_desde);
      	$hasta=strtotime($periodo_hasta);
		//obtencion de las inasistencia
		$consultarInasistencia = $inasistencia -> consultarInasistencia($cedula_trabajador);
		foreach ($consultarInasistencia as $datos) { 
			$inico=strtotime($datos['desde']);
        	$fin=strtotime($datos['hasta']);
		   	for($i=$desde; $i<=$hasta; $i+=86400){
            for($j=$inico; $j<=$fin; $j+=86400){
            if ($i == $j) {
               $inasistencias++;
             }
            }

          }
		 }
		$consultaDolar = $dolar -> consultar();
		foreach ($consultaDolar as $datos) { 
			$valor_actual = $datos['valor_actual'];
		}
		$consultarBono = $bonos -> consultarBono($id_bono);
		 foreach ($consultarBono as $datos) { 
		    $valor = $datos['valor'];
		    $moneda = $datos['moneda'];
		    $dias = $datos['dias'];
		 }
		 //si el bono se paga en dolares, entonces se multiplica el dolar por el valor del bono para saber cuanto es en bs
		 if ($moneda == 1) {
		 	$valor = $valor * $valor_actual;
		 }
		 //pago
		$bono_diario = $valor / $dias;
		$dias_laborados = $dias - $inasistencias;
		$total_pagar = $bono_diario * $dias_laborados;

		//Guardar datos
		$recibo_bono->setCedula($cedula_trabajador);
		$recibo_bono->setId_bono($id_bono);
		$recibo_bono->setPeriodo_desde($periodo_desde);
		$recibo_bono->setPeriodo_hasta($periodo_hasta);
		$recibo_bono->setTipo_pago($tipo_pago);
		$recibo_bono->setFecha_pago($fecha_pago);
		$recibo_bono->setInasistencia($inasistencias);
		$recibo_bono->setValor_actual($valor_actual);
		$recibo_bono->setTotal_pagar($total_pagar);

		$recibo_bono->setStatus($status);

		$estatus = $recibo_bono->registrar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'modificar':
		$id = base64_decode($_POST['id_recibo_bono']);
		$cedula_trabajador = base64_decode($_POST['cedula_trabajador']);
		$id_bono = base64_decode($_POST['id_bono']);
		$periodo_desde = base64_decode($_POST['periodo_desde']);
		$periodo_hasta = base64_decode($_POST['periodo_hasta']);
		$tipo_pago = base64_decode($_POST['tipo_pago']);
		$fecha_pago = base64_decode($_POST['fecha_pago']);
		$inasistencias = 0;
		
		//formato de las fechas para poder hacer la busqueda
		$desde=strtotime($periodo_desde);
      	$hasta=strtotime($periodo_hasta);
		//obtencion de las inasistencia
		$consultarInasistencia = $inasistencia -> consultarInasistencia($cedula_trabajador);
		foreach ($consultarInasistencia as $datos) { 
			$inico=strtotime($datos['desde']);
        	$fin=strtotime($datos['hasta']);
		   	for($i=$desde; $i<=$hasta; $i+=86400){
            for($j=$inico; $j<=$fin; $j+=86400){
            if ($i == $j) {
               $inasistencias++;
             }
            }

          }
		 }
		$consultaDolar = $dolar -> consultar();
		foreach ($consultaDolar as $datos) { 
			$valor_actual = $datos['valor_actual'];
		}
		$consultarBono = $bonos -> consultarBono($id_bono);
		 foreach ($consultarBono as $datos) { 
		    $valor = $datos['valor'];
		    $moneda = $datos['moneda'];
		    $dias = $datos['dias'];
		 }
		 //si el bono se paga en dolares, entonces se multiplica el dolar por el valor del bono para saber cuanto es en bs
		 if ($moneda == 1) {
		 	$valor = $valor * $valor_actual;
		 }

		//pago
		$bono_diario = $valor / $dias;
		$dias_laborados = $dias - $inasistencias;
		$total_pagar = $bono_diario * $dias_laborados;

		//Guardar datos
		$recibo_bono->setId($id);
		$recibo_bono->setCedula($cedula_trabajador);
		$recibo_bono->setId_bono($id_bono);
		$recibo_bono->setPeriodo_desde($periodo_desde);
		$recibo_bono->setPeriodo_hasta($periodo_hasta);
		$recibo_bono->setTipo_pago($tipo_pago);
		$recibo_bono->setFecha_pago($fecha_pago);
		$recibo_bono->setInasistencia($inasistencias);
		$recibo_bono->setValor_actual($valor_actual);
		$recibo_bono->setTotal_pagar($total_pagar);
		$estatus = $recibo_bono->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $recibo_bono->eliminar($id);

		$estadoEliminado = $resultado;
		
		break;
		case 'generar':
			$views_new = _VIEWS_.$url."/generar.php";
			require_once $views_new;	
		break;
		case 'validar':
			sleep(1);
			$dato = ($_POST['nombre_cargo'] !== "") ? $_POST['nombre_cargo'] : NULL;
		    $resultado = $cargo->existe($dato);
		   	$count = count($resultado);
		   	echo "%%".$count."%%";
		
		break;

	}

}

require_once $views;



?>