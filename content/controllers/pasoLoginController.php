<?php
    
use content\component\componentViews as componentViews;
$components = new componentViews();
 
use content\models\usuario as Usuario;
$usuario = new Usuario();

use content\models\seguridad as Seguridad;
$seguridad = new Seguridad();

use content\models\notificacion as Notificacion;
$notificacion = new Notificacion();

$views = _VIEWS_."login"."/".$url.".php";

$_SESSION['ventana'] = "Recuperar contraseña";


if (!empty($_GET['opcion']) && $_GET['opcion'] != "consultarPreguntas") {
	
	$opcion = $_GET['opcion'];

	switch ($opcion) {

		case 'consultarCi':
 
			
			$cedula = $_POST["cedula"];

			$usuarioExistente = $usuario -> consultarCiUsuarios($cedula);

			if(!empty($usuarioExistente)){

					foreach ($usuarioExistente as $datos) {
				
							$idUsuario = $datos['idUsuario'];
						}

						if (!empty($usuarioExistente)) {

							$questAndRespuest = $seguridad->buscarPreguntas($idUsuario);

							if (!empty($questAndRespuest)) {
								
								$existe = true;

								$datos = $idUsuario;
								

								//indique si la fecha a continuacion es su fecha de nacimiento
								// introduzca uno de sus numeros de telefono registrado en el sistema UPTAEB-CAS
								

								// PARA HACER PREGUNTAS RANDOM
								$preguntadas = array(); // declaramos una variable que usaremos de contenedor para las preguntas ya realizadas
								$array=array('1986-08-18', '1994-06-01', '1984-06-23', '1978-02-12', '1972-09-14', '1970-08-15');

								$preguntasNum = array();
								$arrayNum=array('***6651', '***3357', '***4487', '***3288', '***9964', '***7762');
								
								

								foreach ($usuarioExistente as $datosUsuario) {

								$resultado = substr($datosUsuario['celular'], -4);
								
								$array[].= $datosUsuario['fecha_nacimiento'];
								$arrayNum[].= "***".$resultado;

								$items=count($array)-1;

								}


								require_once("content/views/login/formularioPass.php");
							
							}else{

								$preguntasExiste = "false";
								require_once $views; 

							}
			 
							
							
						}else{


							$existe = false;
							require_once $views; 
						}

				 }else {
        				
        				$data = $usuario ->searchExiste($cedula);

						if (empty($data)) {
							
							header("Location: ?url=login&usuarioBloqueado=noexiste");
						
						}else{

							header("Location: ?url=login&usuarioBloqueado=true");
						}
				 	
				 }		
			
		
		break;

		case 'consultarDatos':
	
			$fecha = $_POST["fechaSelec"];
			$numCelular = $_POST["numSeleccionado"];
			$idUsuario = $_POST["idUsuario"];
			$respuestas = $_POST["respuesta"];
 
			$groupFecha = $_POST["fechaGroup"];
			$groupCelular = $_POST["celularGroup"];
			$preguntas = $_POST["preguntas"];

			$paso = 4;

			// numero de celular purgado 
			$celularS = substr($numCelular, -4);

			$us= new Usuario();

			$respuestaOne = $seguridad->buscar_questUS($idUsuario, $preguntas[0]);

			foreach ($respuestaOne as $respuesta) {
				
				$respuestaONE = $respuesta['respuesta'];
			}

			$respuestaTwo = $seguridad->buscar_questUS($idUsuario, $preguntas[1]);

			foreach ($respuestaTwo as $respuesta) {
				
				$respuestaTWO = $respuesta['respuesta'];
			}
			
			$datosUs = $us->buscarUsuarios($idUsuario);
 
			foreach ($datosUs as $validarUs) {

			$ci = $validarUs['cedula'];
			$nombre = $validarUs['nombre'];

			//purgar celular original
			$numCelularUs = substr($validarUs['celular'], -4);
				
				if ($groupFecha == "si") {
					
					if ($fecha == $validarUs["fecha_nacimiento"]) {
						
						$paso = $paso;

					}else{

						$paso= $paso-1;
					}

				}

				if ($groupCelular == "si") {
					
					if ($numCelular == $numCelularUs) {
						
						$paso = $paso;

					}else{

						$paso= $paso-1;
					}

				}

				if ($respuestas[0] == $respuestaONE) {
						
						$paso = $paso;

				}else{

					$paso= $paso-1;

				}

				if ($respuestas[1] == $respuestaTWO) {
						
						$paso = $paso;

				}else{

					$paso= $paso-1;

				}

			}

			if ($paso < 4) {

				foreach ($datosUs as $validarUs) {

					$cedula = $validarUs['cedula'];

				}

				$usuario = new Usuario();

				$datos = $usuario ->SearchPassBloqueo($cedula); 

					if (!empty($datos)) {

							foreach ($datos as $user) {

								$intento = $user['status'] + 1;

								$idUsuario = $user['idUsuario'];
							}

							$us->setStatus($intento);
							$us->intentoUsuario($idUsuario); 

							header("Location: ?url=login&errorComprobar=true");
						
					}else {

						header("Location: ?url=login&usuarioBloqueado=true");
					}
										
			
			}else{ 

				$existe = true;
				foreach ($datosUs as $us) {
					
					$cedula = $us['cedula'];
				}

				$usuarioExistente = $usuario ->consultarCiUsuarios($cedula); 

				require_once("content/views/login/cambioPassword.php");

			}

		break;

		case 'cambiarPass':
			 
			 $passOne = $_POST["password"];
			 $passTwo = $_POST["passwordos"];
			 $idUsuario = $_POST["id"];
			 $rol = $_POST['rol'];
	
			 $datosUs = $usuario->buscarUsuarios($idUsuario);

			 foreach ($datosUs as $cedulaUs) {
			 	
			 	$cedula = $cedulaUs['cedula'];
			 }

			 if ($passOne != $passTwo) {
			 	 		 	 
			 	 $noigual = true;
					foreach ($datosUs as $us) {
						
						$cedula = $us['cedula'];
					}

					$usuarioExistente = $usuario ->consultarCiUsuarios($cedula); 

					require_once("content/views/login/cambioPassword.php");

			 } else {

			 	if ($passOne == $cedula){ 
			 	 		 	 
			 	 $cedulaIgual = true;
  				 $usuarioExistente = $usuario ->consultarCiUsuarios($cedula); 

				 require_once("content/views/login/cambioPassword.php");
				}
				else {

					 $usuario->setId_rol($rol);
			 		 $usuario->setContrasena($passOne);

	  			 	 $usuario->modificarUsuario($idUsuario);
			 		
			 		 header("Location: ?url=login&cedulaPass=true");	
			 }

			 } 

			break; 

			case 'consultar_usuario_bloqueado':

				$dato = ($_POST['id_product'] !== "") ? $_POST['id_product'] : NULL;

			    $resultado = $usuario->SearchUsuarioBloqueado($dato);

			    if (!empty($resultado)) {
			    	
			    	$resultado += [ "active" => '1' ];
			    
			    }else{

			    	$resultado += [ "active" => '0' ];
			    }
			    

			    if (is_array($resultado)) {

			    	 echo json_encode($resultado);
			    }

			   	
			break;

			case 'solicitarDesbloqueo':

					$countRespuestas = $_POST["respuesta"];
					$num = 0;

					for ($i=0; $i < 4 ; $i++) { 
						
						if (!empty($countRespuestas[$i])) {
							$num++;
						}
					}

					if ($num == 4) {
											
							$cedula = $_POST["cedula"];

							$buscar = $usuario -> SearchUsuarioBloqueado($cedula);

							if(!empty($buscar)){

								foreach ($buscar as $idU) {
									
									$idUsuario = $idU["idUsuario"];
								}

								$preguntas = $_POST["preguntas"];
								$respuestas = $_POST["respuesta"];

								$respuestaOne = $seguridad->buscar_questUS($idUsuario, $preguntas[0]);

								foreach ($respuestaOne as $respuesta) {
									
									$respuestaONE = $respuesta['respuesta'];
								}

								$respuestaTwo = $seguridad->buscar_questUS($idUsuario, $preguntas[1]);

								foreach ($respuestaTwo as $respuesta) {
									
									$respuestaTWO = $respuesta['respuesta'];
								}

								$respuestaTre = $seguridad->buscar_questUS($idUsuario, $preguntas[2]);

								foreach ($respuestaTre as $respuesta) {
									
									$respuestaTRE = $respuesta['respuesta'];
								}


								if (isset($respuestaONE) && isset($respuestaTWO) && isset($respuestaTRE)) {
									
									$cookie = $usuario ->notificarBloqueo($cedula); 

									foreach ($cookie as $cook) {
													 
										 $idU = $cook["idUsuario"];
										 $cedula = $cook["cedula_trabajador"];
										 $pasoS = $cook["pasoSeguridad"];
										 $rolBloqueado = $cook["id_rol"];
													
									}

									$seguridad = $pasoS;

									if ($seguridad == 0) {

										$id = $idU;

										$respuestasPreguntas = $usuario -> consultarPreguntas($id);

										for($i = 0, $size = count($respuestasPreguntas); $i < $size; ++$i) {
											
											$respuesta2 = $respuestasPreguntas[0]["respuesta"];
										}

										$seguridad = 1;

										$usuario -> setPasoSeguridad($seguridad);
										$usuario -> actualizarPaso($id);

										// HACER LLEGAAR LA NOTIFICACION DE AYUDA AL USUARIO ROOT

											$usuarioRoot = $usuario-> consultaUsuarios();

											foreach ($usuarioRoot as $roots) {

				                                    $consultarKeys = $usuario -> consultarKeys($id);

				                                    foreach ($consultarKeys as $keys) {
				                                    	
				                                    	// Obtener la clave pública del usuario bloqueado para cifrar el mensaje
				                                    	$pubKey = $keys["keyPublica"];

				                                    }
				                                $pubKey = openssl_decrypt($pubKey,  AES, KEY);
				                                $pubKey = openssl_pkey_get_public($pubKey);

												if($rolBloqueado == 2 && $roots["id_rol"] == 1) { 

													$asunto = "Desbloqueo de mi acceso - FIRMA DIGITAL: ".openssl_encrypt($respuestas[3],  AES, KEY);
													$mensajeUno = $respuestas[1];
													
													$tipo = 4; //tipo 1: mensaje normal, tipo 2: notificaciones del sistema, tipo 3: archivados y tipo 4: ayuda al usuario por bloqueo, tipo 6: para aceptar o declinar una vez decifrado.
													
													$favorito = 0;
													$hoy = date("Y-m-d H:i:s");  
													$fecha = $hoy;
													$leido = 0;											

				                                    
				                                    // Encriptar el mensaje con la llave pública del usuario bloqueado
				                                    openssl_public_encrypt($mensajeUno, $mensaje, $pubKey);
		 
													$notificacion -> setIdEmisor($id);					      			    
												    $notificacion -> setidReceptor($roots["idUsuario"]);
												    $notificacion -> setasunto($asunto);						         
												    $notificacion -> setcifrado($mensaje);		      	    
												    $notificacion -> settipo($tipo);						      
												    $notificacion -> setfavorito($favorito);						      			    
												    $notificacion -> setfecha($fecha);						       
												    $notificacion -> setleido($leido);	
				  
												    $notificacion -> registrarNotificacionCifrado();			

												}

												if($rolBloqueado != 2 && $roots["id_rol"] == 2) { 

													$asunto = "Desbloqueo de mi acceso - FIRMA DIGITAL: ".openssl_encrypt($respuestas[3],  AES, KEY);

													$mensajeUno = $respuestas[1];
													
													$tipo = 4; //tipo 1: mensaje normal, tipo 2: notificaciones del sistema, tipo 3: archivados y tipo 4: ayuda al usuario por bloqueo, tipo 6: para aceptar o declinar una vez decifrado.
													
													$favorito = 0;
													$hoy = date("Y-m-d H:i:s");  
													$fecha = $hoy;
													$leido = 0;											

				                                    // Encriptar el mensaje con la llave pública del usuario bloqueado
				                                    openssl_public_encrypt($mensajeUno, $mensaje, $pubKey);
		 
													$notificacion -> setIdEmisor($id);					      			    
												    $notificacion -> setidReceptor($roots["idUsuario"]);
												    $notificacion -> setasunto($asunto);						         
												    $notificacion -> setcifrado($mensaje);		      	    
												    $notificacion -> settipo($tipo);						      
												    $notificacion -> setfavorito($favorito);						      			    
												    $notificacion -> setfecha($fecha);						       
												    $notificacion -> setleido($leido);	
				  
												    $notificacion -> registrarNotificacionCifrado();
																				
												}
											}

											// fin de registrar la notificacion	
											$notificarExito = true;									          		
									}else{

										$notificarExito = false;
									}

								 }

								}

							$views = _VIEWS_."login"."/"."login.php";
							require_once $views;

					}else{

						$respuestasVacías = 'true';
						$views = _VIEWS_."login"."/"."login.php";
						require_once $views;

					}					

					break;
	}

}else {
	require_once $views;

}

?>