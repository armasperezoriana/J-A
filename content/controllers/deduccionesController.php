<?php

use content\component\componentViews as componentViews;
$components = new componentViews();
	
use content\models\deducciones as Deducciones;
$deducciones = new Deducciones();

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Deducciones";

$consultarDeducciones = $deducciones -> consultar();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'modificar':
		$id = $_POST['id_deducciones'];
		$ivss = $_POST['ivss'];
		$rpe = $_POST['rpe'];
		$faov = $_POST['faov'];
		$inces = $_POST['inces'];
		$deducciones->setId($id);
		$deducciones->setIvss($ivss);
		$deducciones->setRpe($rpe);
		$deducciones->setFaov($faov);
		$deducciones->setInces($inces);

		$estatus = $deducciones->modificar();

		$estadoRegistro = $estatus['resp'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}

		break;

	}

}

require_once $views;



?>