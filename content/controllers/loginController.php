<?php

use content\component\componentViews as componentViews;
$components = new componentViews();
 
use content\models\usuario as Usuario;
$user = new Usuario();

use content\models\notificacion as Notificacion;
$notificacion = new Notificacion();

if (empty($_POST["cedula"])) {
	
	$views = _VIEWS_.$url."/".$url.".php";

	require_once $views;

}else{ 

	$cedula = $_POST["cedula"];

	$data = $user ->searchExiste($cedula);

	if (empty($data)) {
		
		$data += ['msj' => "noexiste"];
	
	}else{

		$cedula = $_POST["cedula"];
	$password = $_POST["password"];

	$data = $user->SearchPass($cedula);

	if(!empty($data)){

				foreach ($data as $consulta) {
				
				$hash = $consulta['contrasena'];
				$idU = $consulta['idUsuario'];

			}

			if (password_verify($password, $hash)) {

				$datos = $user ->SearchDates(); 

				foreach ($datos as $datosUsuario) {
					
					if ($datosUsuario["cedula"] == $cedula) {
						
						$_SESSION["idUsuario"] = $idU;	
						$_SESSION["nombre"] = $datosUsuario["nombre"];
						$_SESSION["apellido"] = $datosUsuario["apellido"];
						$_SESSION["foto"] = $datosUsuario["foto"];
						$_SESSION["cedula"] = $datosUsuario["cedula"];
						$_SESSION["rol"] = $datosUsuario["id_rol"]; 

						$_SESSION["date"] = $date = date("Y").'-'.date("m").'-'.date("d");
						
						$_SESSION["dateA"] = $dateA = date("Y");

						if (password_verify($cedula, $hash)) { 
								
								$_SESSION["passDefault"] = "true";
						
						}else{

								$_SESSION["passDefault"] = "false";
						}  

						$intento = 1;

						$user->setStatus($intento);
						$user->intentoUsuario($datosUsuario['idUsuario']);

						$preguntaSeguridad = $user ->consultarPreguntas($_SESSION["idUsuario"]);	

						$n = 0;
						
						foreach ($preguntaSeguridad as $key) {
							
							$existeU = $key['idUsuario']; 
							$n++;
						}

					    if (isset($existeU) && isset($n) && $n == 4) {
									
						    	$_SESSION["pSeguridad"] = true;
								
						}else {

								$_SESSION["pSeguridad"] = false;

						}
						
					}
					
				}

				 

				$data += ['msj' => "good"];

			}else {

				$datos = $user ->SearchPassBloqueo($cedula); 

				if (!empty($datos)) {

						foreach ($datos as $usuario) {

							$intento = $usuario['status'] + 1;

							$user->setStatus($intento);
							$user->intentoUsuario($usuario['idUsuario']); 
						}

						$data += ['msj' => "bad"];
					
				}else {

								$data += ['msj' => "bloq"];
							}
					
				

			}

			
			
			}else{

				$data += ['msj' => "bloq"];				

			}

	}

	echo json_encode($data);

}


?>