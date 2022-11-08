<?php

use content\component\componentViews as componentViews;
$components = new componentViews();
	
use content\models\avanzada as Avanzada;
$avanzada = new Avanzada();

use content\models\usuario as Usuario;
$usuario = new Usuario;

$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Seguridad Avanzada";

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {
		case 'bitacora':
		$consultarBitacora = $avanzada -> consultarBitacora();
		$views = _VIEWS_."avanzada/bitacora.php";
		break;

		case 'rol':

			$roles = $avanzada -> consultarAvanzada();

			$views = _VIEWS_.$url."/"."rolinicio.php";


		break;

		case 'inicioPermisos':
			
			$idRol = $_GET['id_rol'];

			$datos = $avanzada -> consultarRol($idRol);
			$rolOperacion = $avanzada -> consultarRolOperacion($idRol);
			$modulos = $avanzada -> consultarModulos();
			$operaciones = $avanzada -> consultarOperaciones();

			$views = _VIEWS_.$url."/"."inicioPermisos.php";

			break;

		case 'actualizarOperaciones':

			$idRol = $_POST['idRol'];
			$idOperacion = $_POST['idOperacion'];

			$consultarExistencia = $avanzada -> consultarRolOperacion($idRol);

			if (!empty($consultarExistencia)) {

				foreach ($consultarExistencia as $delete) {

					$avanzada->eliminarAntiguosPermisos($delete['id_rol']);
					$delete = 'true';

				}

				if ($delete == 'true') {

					foreach ($idOperacion as $operacion) {

						$avanzada -> setRol($idRol);
						$avanzada -> setidOperacion($operacion);
						$avanzada -> actualizarOperaciones();

					}
					
					header("Location:?url=avanzada&opcion=inicioPermisos&id_rol=$idRol&actO=true");

				}

			}else{

				foreach ($idOperacion as $operacion) {

					    $avanzada -> setRol($idRol);
						$avanzada -> setidOperacion($operacion);
						$avanzada -> actualizarOperaciones();
					
				}

				header("Location:?url=avanzada&opcion=inicioPermisos&id_rol=$idRol&actO=true");
			}

		break;

		case 'registrarRol':

			$nombreRol = base64_decode($_POST["rol"]);
			$estatus = base64_decode($_POST["estado"]);

			$avanzada -> setNombreRol($nombreRol);
			$avanzada -> setEstado($estatus);

			$estadoRegistro = $avanzada -> registrarRol();

			$estadoRegistro = $estadoRegistro["estatus"];

			if ($estadoRegistro == true) {
				
				echo "%1%";
			}

		break;

		case 'modificarRol';

			$nombreRol = base64_decode($_POST["rol"]);
			$estatus = base64_decode($_POST["estado"]);
			$idRol = base64_decode($_POST["idRol"]);

			$avanzada -> setNombreRol($nombreRol);
			$avanzada -> setEstado($estatus);

			$estadoRegistro = $avanzada -> modificarRol($idRol);

			$estadoRegistro = $estadoRegistro["estatus"];

			if ($estadoRegistro == true) {
				
				echo "%1%";
			}

		break;

		case 'eliminarRol':

			$estatus = NULL;
			$id = base64_decode($_POST["id"]);
			
			$avanzada -> setEstado($estatus);

			$resultado = $avanzada -> eliminarRol($id);

			$estadoEliminado = $resultado;

		break;

		case 'accesos':

			$consultaUsuarios = $usuario -> consultaUsuariosAccesos(); 

			$views = _VIEWS_.$url."/"."consultarAccesos.php";

		break;

		case 'eliminarPreguntasSeguridad':
			
			$idUsuario = $_POST["id"];

			$resultado = $avanzada -> eliminarPreguntas($idUsuario);

			$estadoEliminado = $resultado;

		break;

		case 'restaurarContrasena':
			
			$idUsuario = $_POST["id"];

			$datos = $usuario -> buscarUsuarios($idUsuario);

			foreach ($datos as $use) {
				
				$contrasena = $use["cedula_trabajador"];
				$rol = $use["id_rol"];

				$usuario -> setContrasena($contrasena);
				$usuario -> setId_rol($rol);

				$resultado = $usuario -> modificarUsuario($idUsuario);

				$estadoEliminado = $resultado;

			}

			break;

		case 'actualizarDesingreso':
			
			$idUsuario = $_POST["id"];

			$status = 4;

			$usuario -> setStatus($status);

			$resultado = $usuario -> intentoUsuario($idUsuario);

			$estadoEliminado = $resultado;

		break;

		case 'actualizarIngreso':
			
			$idUsuario = $_POST["id"];

			$status = 1;

			$usuario -> setStatus($status);

			$resultado = $usuario -> intentoUsuario($idUsuario);

			$estadoEliminado = $resultado;

		break;

		case 'validar':
			sleep(1);
			$dato = ($_POST['rol'] !== "") ? $_POST['rol'] : NULL;
		    $resultado = $avanzada->existe($dato);
		   	$count = count($resultado);
		   	echo "%%".$count."%%";
		break;






	}

}

require_once $views;



?>