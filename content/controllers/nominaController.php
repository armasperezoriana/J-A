<?php

use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\deducciones as Deducciones;
$deducciones = new Deducciones();

use content\models\inasistencia as Inasistencia;
$inasistencia = new Inasistencia();

use content\models\trabajador as Trabajador;
$trabajador = new Trabajador();
$consultarTrabajadores = $trabajador -> consultarTrabajadores();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

use content\models\nomina as Nomina; 
$nomina = new Nomina();

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Nomina";

$consultarNomina = $nomina -> consultar();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registrar':
		//datos
		
		$cedula = base64_decode($_POST['cedula_trabajador']);
		$periodo_desde = base64_decode($_POST['periodo_desde']);
		$periodo_hasta = base64_decode($_POST['periodo_hasta']);
		$horas_extras = base64_decode($_POST['horas_extras']);
		$tipo_pago = base64_decode($_POST['tipo_pago']);
		$fecha_pago = base64_decode($_POST['fecha_pago']);

		$status = 1;
		$inasistencias = 0;
		//formato de las fechas para poder hacer la busqueda
		$desde=strtotime($periodo_desde);
      $hasta=strtotime($periodo_hasta);
		//obtencion de las inasistencia
		$consultarInasistencia = $inasistencia -> consultarInasistencia($cedula);
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
		//obtencion de los porcentajes de deduccion
		$consultaDeducciones = $deducciones -> consultar();
		foreach ($consultaDeducciones as $datos) { 
		    $porcentajeIvss = $datos['ivss'];
		    $porcentajeRpe = $datos['rpe'];
		    $porcentajeFaov = $datos['faov'];
		    $porcentajeInces = $datos['inces'];
		  }
		  //para obtener los datos del cargo
		 $consultaTrabajador = $trabajador -> consultarTrabajador($cedula);
		  foreach ($consultaTrabajador as $datos) { 
		    $prima = $datos['prima_por_hogar'];
		    $sueldo_semanal = $datos['sueldo_semanal'];
		  }
		 //Deducciones:
		    $ivss = ($sueldo_semanal * $porcentajeIvss) /100 ;
			$rpe = ($sueldo_semanal * $porcentajeRpe) /100 ;
			$faov = ($sueldo_semanal * $porcentajeFaov) /100 ;
			$inces = ($sueldo_semanal * $porcentajeInces) /100 ;
			$total_deducciones = $ivss + $rpe + $faov + $inces;
		//Asignaciones:
			$sueldo_diario = $sueldo_semanal / 7;
	    	$sueldo_hora = $sueldo_diario / 8;
	    	$total_dias_descanso = $sueldo_diario * 2;
    		$dias_laborados = 5 - $inasistencias;
    		$total_dias_laborados = $dias_laborados * $sueldo_diario;
    		$total_dias_perdidos = $inasistencias * $sueldo_diario;
    		$valor_horas_extras = $sueldo_hora + (($sueldo_hora * 50) / 100);
		    $total_horas_extras = $horas_extras * $valor_horas_extras;
		    $total_asignaciones = $total_dias_laborados + $prima + $total_horas_extras + $total_dias_descanso;
		//total a pagar:
		    $total_pagar =  $total_asignaciones - $total_deducciones;
		//enviar datos
			$nomina->setCedula($cedula);
			$nomina->setPeriodo_desde($periodo_desde);
			$nomina->setPeriodo_hasta($periodo_hasta);
			$nomina->setHoras_extras($horas_extras);
			$nomina->setTipo_pago($tipo_pago);
			$nomina->setFecha_pago($fecha_pago);
			$nomina->setStatus($status);
			$nomina->setIvss($ivss);
			$nomina->setRpe($rpe);
			$nomina->setFaov($faov);
			$nomina->setInces($inces);
			$nomina->setTotal_nomina_pagar($total_pagar);
			$nomina->setInasistencia($inasistencias);

			$estatus = $nomina->registrar();
		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		
		break;

		case 'modificar':
		$id = base64_decode($_POST['id_nomina']);
		$cedula = base64_decode($_POST['cedula_trabajador']);
		$periodo_desde = base64_decode($_POST['periodo_desde']);
		$periodo_hasta = base64_decode($_POST['periodo_hasta']);
		$horas_extras = base64_decode($_POST['horas_extras']);
		$tipo_pago = base64_decode($_POST['tipo_pago']);
		$fecha_pago = base64_decode($_POST['fecha_pago']);
		$status = 1;
		$inasistencias = 0;
		//formato de las fechas para poder hacer la busqueda
		$desde=strtotime($periodo_desde);
      	$hasta=strtotime($periodo_hasta);
		//obtencion de las inasistencia
		$consultarInasistencia = $inasistencia -> consultarInasistencia($cedula);
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
		//obtencion de los porcentajes de deduccion
		$consultaDeducciones = $deducciones -> consultar();
		foreach ($consultaDeducciones as $datos) { 
		    $porcentajeIvss = $datos['ivss'];
		    $porcentajeRpe = $datos['rpe'];
		    $porcentajeFaov = $datos['faov'];
		    $porcentajeInces = $datos['inces'];
		  }
		  //para obtener los datos del cargo
		 $consultaTrabajador = $trabajador -> consultarTrabajador($cedula);
		  foreach ($consultaTrabajador as $datos) { 
		    $prima = $datos['prima_por_hogar'];
		    $sueldo_semanal = $datos['sueldo_semanal'];
		  }
		 //Deducciones:
		    $ivss = ($sueldo_semanal * $porcentajeIvss) /100 ;
			$rpe = ($sueldo_semanal * $porcentajeRpe) /100 ;
			$faov = ($sueldo_semanal * $porcentajeFaov) /100 ;
			$inces = ($sueldo_semanal * $porcentajeInces) /100 ;
			$total_deducciones = $ivss + $rpe + $faov + $inces;
		//Asignaciones:
			$sueldo_diario = $sueldo_semanal / 7;
	    	$sueldo_hora = $sueldo_diario / 8;
	    	$total_dias_descanso = $sueldo_diario * 2;
    		$dias_laborados = 5 - $inasistencias;
    		$total_dias_laborados = $dias_laborados * $sueldo_diario;
    		$total_dias_perdidos = $inasistencias * $sueldo_diario;
    		$valor_horas_extras = $sueldo_hora + (($sueldo_hora * 50) / 100);
		    $total_horas_extras = $horas_extras * $valor_horas_extras;
		    $total_asignaciones = $total_dias_laborados + $prima + $total_horas_extras + $total_dias_descanso;
		//total a pagar:
		    $total_pagar =  $total_asignaciones - $total_deducciones;
		//enviar datos

		$nomina->setId($id);
		$nomina->setCedula($cedula);
		$nomina->setPeriodo_desde($periodo_desde);
		$nomina->setPeriodo_hasta($periodo_hasta);
		$nomina->setHoras_extras($horas_extras);
		$nomina->setTipo_pago($tipo_pago);
		$nomina->setFecha_pago($fecha_pago);
		$nomina->setStatus($status);
		$nomina->setIvss($ivss);
		$nomina->setRpe($rpe);
		$nomina->setFaov($faov);
		$nomina->setInces($inces);
		$nomina->setTotal_nomina_pagar($total_pagar);
		$nomina->setInasistencia($inasistencias);

		$estatus = $nomina->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $nomina -> eliminar($id);

		$estadoEliminado = $resultado;
		
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