<?php
    
use content\component\componentViews as componentViews;
use content\models\usuario as Usuario;
use content\models\trabajador as Trabajador;
use content\models\rol as Rol;
 
$components = new componentViews();

use content\models\avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";

$views = _VIEWS_.$url."/".$url.".php";

$usuario = new Usuario();

$rol = new Rol();
 
$consultaUsuarios = $usuario -> consultaUsuarios(); 

$consultarRoles = $rol -> consultarRoles();

$trabajador = new Trabajador();
$consultarTrabajadores = $trabajador -> consultarTrabajadores();

$_SESSION['ventana'] = "Usuarios";

if (!empty($_GET['opcion'])) {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'registroUsuario':

		$contrasena = base64_decode($_POST['cedula_trabajador']);
		$cedula_trabajador = base64_decode($_POST['cedula_trabajador']);
		$id_rol = base64_decode($_POST['id_rol']);
		$status = 1;

		$usuario->setContrasena($contrasena);
		$usuario->setCedula_trabajador($cedula_trabajador);
		$usuario->setId_rol($id_rol);
		$usuario->setStatus($status);

		$estatus = $usuario->registerUsuario();
		$consultaUsuarios = $usuario -> consultaUsuarios();

		$estadoRegistro = $estatus['estatus'];
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break; 

		case 'modificarUsuario':
		$idUsuario = base64_decode($_POST['idUsuario']);
		$contrasena = base64_decode($_POST['contrasena']);
		$cedula_trabajador = base64_decode($_POST['cedula_trabajador']);
		$id_rol = base64_decode($_POST['id_rol']);

		$usuario->setContrasena($contrasena); 
		$usuario->setId_rol($id_rol);

		$resultado = $usuario->modificarUsuarioSinHash($idUsuario);
		$consultaUsuarios = $usuario -> consultaUsuarios();

		$estado = $resultado["estado"];
		$estadoRegistro = $estado;
		if ($estadoRegistro == true) {
			echo "%1%";
		}
		break;

		case 'eliminarUsuario':

		$id = base64_decode($_POST['id']);

		$resultado = $usuario -> eliminarUsuario($id);

		$estadoEliminado = $resultado;

		$consultaUsuarios = $usuario -> consultaUsuarios();
		
		break;

	}

}

require_once $views;


?> 