<?php

use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\cargo as Cargo;
$cargo = new Cargo();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Cargos";

$consultaCargos = $cargo -> consultarCargos();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registrar':

		$nombre_cargo = base64_decode($_POST['nombre_cargo']);
		$sueldo_semanal = base64_decode($_POST['sueldo_semanal']);
		$prima_por_hogar = base64_decode($_POST['prima_hogar']);
		$status = 1;

		$cargo->setNombre_cargo($nombre_cargo);
		$cargo->setSueldo_semanal($sueldo_semanal);
		$cargo->setPrima_por_hogar($prima_por_hogar);
		$cargo->setStatus($status);

		$estatus = $cargo->registerCargo();
		$consultaCargos = $cargo -> consultarCargos();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'modificar':
		$id = base64_decode($_POST['id_cargo']);
		$nombre_cargo = base64_decode($_POST['nombre_cargo_modificar']);
		$sueldo_semanal = base64_decode($_POST['sueldo_semanal']);
		$prima_por_hogar = base64_decode($_POST['prima_hogar']);

		$cargo->setId($id);
		$cargo->setNombre_cargo($nombre_cargo);
		$cargo->setSueldo_semanal($sueldo_semanal);
		$cargo->setPrima_por_hogar($prima_por_hogar);


		$estatus = $cargo->modificarCargo();
		$consultaCargos = $cargo -> consultarCargos();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $cargo -> eliminar($id);

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