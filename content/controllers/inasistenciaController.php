<?php

use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\trabajador as Trabajador;
$trabajador = new Trabajador();
$consultarTrabajadores = $trabajador -> consultarTrabajadores();

use content\models\inasistencia as Inasistencia;
$inasistencia = new Inasistencia();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Permisos";

$consultarInasistencia = $inasistencia -> consultar();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registrar':

		$cedula = base64_decode($_POST['cedula_trabajador']);
		$descripcion = base64_decode($_POST['descripcion']);
		$desde = base64_decode($_POST['periodo_desde']);
		$hasta = base64_decode($_POST['periodo_hasta']);
		$status = 1;

		$inasistencia->setCedula($cedula);
		$inasistencia->setDescripcion($descripcion);
		$inasistencia->setDesde($desde);
		$inasistencia->setHasta($hasta);
		$inasistencia->setStatus($status);

		$estatus = $inasistencia->registrar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'modificar':
		$id = base64_decode($_POST['id_permiso']);
		$cedula = base64_decode($_POST['cedula_trabajador']);
		$descripcion = base64_decode($_POST['descripcion']);
		$desde = base64_decode($_POST['periodo_desde']);
		$hasta = base64_decode($_POST['periodo_hasta']);
		$inasistencia->setId($id);
		$inasistencia->setCedula($cedula);
		$inasistencia->setDescripcion($descripcion);
		$inasistencia->setDesde($desde);
		$inasistencia->setHasta($hasta);

		$estatus = $inasistencia->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $inasistencia -> eliminar($id);

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