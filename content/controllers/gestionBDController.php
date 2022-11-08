<?php
use content\component\componentViews as componentViews;
$components = new componentViews();

use content\models\gestionBD as GestionBD;
$gestionBD = new GestionBD();

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'respaldar':
		sleep(2);
		$resultado = $gestionBD -> respaldar();
		break;

		case 'restaurar':
		sleep(1);
		$restorePoint = $gestionBD -> restore($_POST['restorePoint']);
		break;
	}

}





?>