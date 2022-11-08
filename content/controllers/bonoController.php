<?php

use content\component\componentViews as componentViews;
$components = new componentViews();
	
use content\models\cargo as Cargo;
$cargo = new Cargo();
$consultaCargos = $cargo -> consultarCargos();

use content\models\Avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

use content\models\bono as Bono;
$bonos = new Bono();

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Bonos";

$consultarBonos = $bonos -> consultar();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registrar':

		$nombre_bono = base64_decode($_POST['nombre_bono']); 
		$id_cargo = base64_decode($_POST['nombre_cargo']); 
		$valor = base64_decode($_POST['valor']); 
		$dias = base64_decode($_POST['dias']); 
		$moneda = base64_decode($_POST['moneda']); 
		$status = 1;

		$bonos->setNombre_bono($nombre_bono);
		$bonos->setNombre_cargo($id_cargo);
		$bonos->setValor($valor);
		$bonos->setDias($dias);
		$bonos->setMoneda($moneda);
		$bonos->setStatus($status);

		$estatus = $bonos->registrar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'modificar':
		$id = base64_decode($_POST['id_bono']);
		$nombre_bono = base64_decode($_POST['nombre_bono']);
		$id_cargo = base64_decode($_POST['nombre_cargo']);
		$valor = base64_decode($_POST['valor']);
		$dias = base64_decode($_POST['dias']);
		$moneda = base64_decode($_POST['moneda']);
		$bonos->setId($id);
		$bonos->setNombre_bono($nombre_bono);
		$bonos->setNombre_cargo($id_cargo);
		$bonos->setValor($valor);
		$bonos->setDias($dias);
		$bonos->setMoneda($moneda);

		$estatus = $bonos->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

		case 'eliminar':

		$id = base64_decode($_POST['id']);

		$resultado = $bonos -> eliminar($id);

		$estadoEliminado = $resultado;
		
		break;
		case 'validar':
			sleep(1);
			$dato = ($_POST['nombre_bono'] !== "") ? $_POST['nombre_bono'] : NULL;
		    $resultado = $bonos->existe($dato);
		   	$count = count($resultado);
		   	echo "%%".$count."%%";
		
		break;

	}

}

require_once $views;



?>