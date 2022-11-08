<?php
use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\trabajador as Trabajador;
$trabajador = new Trabajador();
$consultarTrabajadores = $trabajador -> consultarTrabajadores();

use content\models\trabajos_extras as Trabajos_extras;
$trabajos_extras = new Trabajos_extras();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Trabajos extras";

$consultarTrabajos_extras = $trabajos_extras -> consultar();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registrar':

		$cedula_trabajador = base64_decode($_POST['cedula_trabajador']);
		$descripcion_trabajo = base64_decode($_POST['descripcion_trabajo']);
		$fecha_trabajo = base64_decode($_POST['fecha_trabajo']);
		$descripcion = base64_decode($_POST['descripcion']);
		$cantidad = base64_decode($_POST['cantidad']);
		$total_unidad = base64_decode($_POST['total_unidad']);
		$fecha_pago = base64_decode($_POST['fecha_pago']);
		$tipo_pago = base64_decode($_POST['tipo_pago']);
		$status = 1;
		$total_pagar = ($cantidad * $total_unidad);

		$trabajos_extras->setCedula($cedula_trabajador);
		$trabajos_extras->setDescripcion_trabajo($descripcion_trabajo);
		$trabajos_extras->setFecha_trabajo($fecha_trabajo);
		$trabajos_extras->setDescripcion($descripcion);
		$trabajos_extras->setCantidad($cantidad);
		$trabajos_extras->setTotal_unidad($total_unidad);
		$trabajos_extras->setFecha_pago($fecha_pago);
		$trabajos_extras->setTipo_pago($tipo_pago);
		$trabajos_extras->setTotal_pagar($total_pagar);
		$trabajos_extras->setStatus($status);

		$estatus = $trabajos_extras->registrar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'modificar':
		$id = base64_decode($_POST['id_trabajosExtras']);
		$cedula_trabajador = base64_decode($_POST['cedula_trabajador']);
		$descripcion_trabajo = base64_decode($_POST['descripcion_trabajo']);
		$fecha_trabajo = base64_decode($_POST['fecha_trabajo']);
		$descripcion = base64_decode($_POST['descripcion']);
		$cantidad = base64_decode($_POST['cantidad']);
		$total_unidad = base64_decode($_POST['total_unidad']);
		$fecha_pago = base64_decode($_POST['fecha_pago']);
		$tipo_pago = base64_decode($_POST['tipo_pago']);
		$total_pagar = ($cantidad * $total_unidad);
		$trabajos_extras->setId($id);
		$trabajos_extras->setCedula($cedula_trabajador);
		$trabajos_extras->setDescripcion_trabajo($descripcion_trabajo);
		$trabajos_extras->setFecha_trabajo($fecha_trabajo);
		$trabajos_extras->setDescripcion($descripcion);
		$trabajos_extras->setCantidad($cantidad);
		$trabajos_extras->setTotal_unidad($total_unidad);
		$trabajos_extras->setFecha_pago($fecha_pago);
		$trabajos_extras->setTipo_pago($tipo_pago);
		$trabajos_extras->setTotal_pagar($total_pagar);

		$estatus = $trabajos_extras->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $trabajos_extras -> eliminar($id);

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