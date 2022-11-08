<?php
    
use content\component\componentViews as componentViews;

$components = new componentViews();

use content\models\usuario as Usuario;
$usuario = new Usuario();

use content\models\seguridad as Seguridad;
$seguridad = new Seguridad();

// ******** PERMISOS
use content\models\avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";
// ******** PARA CADA MODULO 

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Configuración"; 


if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {
 
		case 'actualizarFoto':

			/*--------- FOTO DE PERFIL ---------*/
			$ruta = 'assets/img/users/'.$_SESSION['cedula'].'-'.$_FILES['foto_perfil']['name'];
			move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta);

			$ci = $_SESSION["cedula"];
			
			$usuario->setFoto($ruta);

			$resultado = $usuario->modificarFoto($ci);

			$_SESSION["foto"] = $ruta;

			if ($_SESSION["pSeguridad"] == false || empty($_SESSION["foto"]) || $_SESSION['passDefault'] == "true") {
                                       
                            header("Location: ?url=seguridad&alert=foto");
                   
                    }else {

                    		header("Location: ?url=homepage&alert=foto");
                    }

			break;

			case 'addQuestion':
				
				$idUsuario = $_SESSION["idUsuario"];
				$pregunta_one = $_POST['pregunta_one'];
				$respuesta_one = $_POST['respuesta_one'];
				
				$seguridad->setRespuesta($respuesta_one);
				$seguridad->setPregunta($pregunta_one);
			
				$seguridad->setIdusuario($idUsuario);

				$resultado = $seguridad->addQuest();

				$pregunta_one = $_POST['pregunta_two'];
				$respuesta_one = $_POST['respuesta_two'];
				$seguridad->setPregunta($pregunta_one);
				$seguridad->setRespuesta($respuesta_one);
				$seguridad->setIdusuario($idUsuario);

				$resultado = $seguridad->addQuest();

				$_SESSION['pSeguridad'] = true;

				if ($_SESSION["pSeguridad"] == false || empty($_SESSION["foto"]) || $_SESSION['passDefault'] == "true") {
                                       
                            header("Location: ?url=seguridad&alert=preguntas");
                   
                    }else {

                    		header("Location: ?url=homepage&alert=preguntas");
                    }

				break;

	 }

 }else {

 	require_once $views;

 }


?>