<?php
    
use content\component\componentViews as componentViews;

$components = new componentViews();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Trabajadores";

use content\models\trabajador as Trabajador;
$trabajador = new Trabajador();
$consultarTrabajadores = $trabajador -> consultarTrabajadores();

use content\models\cargo as Cargo;
$cargo = new Cargo();
$consultaCargos = $cargo -> consultarCargos();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];
switch ($opcion) {
case 'registroTrabajador':

		$cedula = base64_decode($_POST['cedula']);
		$nombre = base64_decode($_POST['nombre']);
		$apellido = base64_decode($_POST['apellido']);
		$cargo = base64_decode($_POST['cargo']);
		$fecha = base64_decode($_POST['fecha_ingreso']);
		$correo = base64_decode($_POST['correo']);
		$t_celular = base64_decode($_POST['t_celular']);
		$celular = base64_decode($_POST['celular']);
		$fecha_nacimiento = base64_decode($_POST['fecha_nacimiento']);
		$estado = 1;

		$trabajador->setCedula($cedula);
		$trabajador->setNombre($nombre);
		$trabajador->setApellido($apellido);
		$trabajador->setCargo($cargo);
		$trabajador->setFecha_ingreso($fecha);
		$trabajador->setCorreo($correo);
		$trabajador->setFecha_nacimiento($fecha_nacimiento);
		$trabajador->setCelular($celular);
		$trabajador->setT_celular($t_celular);
		$trabajador->setStatus($estado);

		$estatus = $trabajador->registerTrabajador();
		$consultarTrabajadores = $trabajador -> consultarTrabajadores();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'modificarTrabajador':
		$cedula = base64_decode($_POST['cedula']);
		$nombre = base64_decode($_POST['nombre']);
		$apellido = base64_decode($_POST['apellido']);
		$cargo = base64_decode($_POST['cargo']);
		$fecha = base64_decode($_POST['fecha_ingreso']);
		$correo = base64_decode($_POST['correo']);
		$t_celular = base64_decode($_POST['t_celular']);
		$celular =base64_decode( $_POST['celular']);
		$fecha_nacimiento = base64_decode($_POST['fecha_nacimiento']);
		$estado = 1;
		$trabajador->setCedula($cedula);
		$trabajador->setNombre($nombre);
		$trabajador->setApellido($apellido);
		$trabajador->setCargo($cargo);
		$trabajador->setFecha_ingreso($fecha);
		$trabajador->setCorreo($correo);
		$trabajador->setFecha_nacimiento($fecha_nacimiento);
		$trabajador->setCelular($celular);
		$trabajador->setT_celular($t_celular);

		$estatus = $trabajador->modificar();
		//$consultarTrabajadores = $trabajador -> consultarTrabajadores();

		$estadoModificar = $estatus['resp'];
		if ($estadoModificar == true) {
			echo "%1%";
		}
		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $trabajador -> eliminar($id);

		$estadoEliminado = $resultado;

		
		break;

		case 'validar':
			sleep(1);
			$dato = ($_POST['cedula'] !== "") ? $_POST['cedula'] : NULL;
		    $resultado = $trabajador->existe($dato);
		   	$count = count($resultado);
		   	echo "%%".$count."%%";
		
		break;

	}
}

require_once $views;


?>