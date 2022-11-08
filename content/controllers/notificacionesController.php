<?php
    
use content\component\componentViews as componentViews;
use content\models\notificacion as Notificacion;
use content\models\usuario as Usuario;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

use content\models\seguridad as Seguridad;
$seguridad = new Seguridad();

$notificacion = new Notificacion();

$components = new componentViews();

$consultarBuzon = $notificacion -> consultarBuzon($_SESSION["idUsuario"]);

$usuario = new Usuario;
$consultarUsuarios = $usuario -> consultaUsuarios();


// ******** PERMISOS
use content\models\avanzada as Avanzada;
$avanzada = new Avanzada();
$operaciones = $avanzada -> consultarRolOperacion($_SESSION['rol']);
require_once "content/config/private/operaciones.php";
// ******** PARA CADA MODULO 

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Notificaciones";

if (!empty($_GET['opcion'])) {
	
$opcion = $_GET['opcion'];
	
	switch ($opcion) {
		
		case 'verMensajeBuzon': 

		$url = 'verMensaje';
		$views = _VIEWS_."notificaciones"."/".$url.".php";

		$idMensaje = $_GET["idMensaje"];

		$consultarMensaje = $notificacion -> consultarMensaje($idMensaje, $_SESSION["idUsuario"]);
		
		$leido = 1;
		$notificacion -> setleido($leido);
		$notificacion ->actualizarVisualizacion($idMensaje);

		foreach($consultarMensaje as $emisor) { $idEmisor = $emisor["idEmisor"]; } 

		$nickname = $usuario -> consultarPreguntas($idEmisor);

		$buscarDatos = $usuario -> buscarUsuarios($idEmisor);

		foreach ($buscarDatos as $datos) {
				
				$cedula = $datos["cedula_trabajador"];
				$id_rol = $datos["id_rol"];
		}
 
		foreach ($nickname as $firmaDigital) {
			
			if ($firmaDigital["pregunta"] == "Firma Digital") {
								
									$nickname = $firmaDigital["respuesta"];
									$nickname = openssl_encrypt($nickname,  AES, KEY);
				}			

		}

		foreach ($consultarMensaje as $msj) {
							
							if (empty($msj["mensaje"])) {
								
								$texto = $msj["cifrado"];
								$textoValidarLlavePrivada = $msj["cifrado"];
								$textoMsj = sha1($msj["cifrado"]);

							}else{

								$texto = $msj["mensaje"];
								$textoMsj = $msj["mensaje"];								
								$textoValidarLlavePrivada = $msj["cifrado"];
							}
						
		}

		$consultar = $seguridad->buscarPreguntas($idEmisor);

						for ($i=1; $i < 2 ; $i++) { 
						
							 $respuestaTWO = $consultar[$i]["respuesta"];
						
						}


		$consultarKeys = $usuario -> consultarKeys($idEmisor);

	    foreach ($consultarKeys as $keys) {
	                                    	
	                   $pubKey = $keys["keyPublica"];
	                   $privKey  = $keys["keyPrivada"];

	    }
 

		// ---------------------------- CIFRADO --------------------------

		//Llaves
		
		if (!empty($_POST["firmaIngresada"])) {
			 
			 $data = openssl_decrypt($_POST["firmaIngresada"],  AES, KEY);

			 $signature = file_get_contents("content/file/".$idEmisor.$cedula.".dat"); 

		      // especificar si la firma es correcta o no
			  $pubKey2 = openssl_decrypt($pubKey,  AES, KEY);
		   
		      $ok = openssl_verify($data, $signature, $pubKey2, OPENSSL_ALGO_SHA256);   

		      if ($ok == 1) {

					      foreach ($consultarKeys as $keys) {
						                                    	
						                   $privKey = $keys["keyPrivada"];

						    }

					$tipo = 6;

					// Comprobar por BD
					$privKey2 = openssl_decrypt($privKey,  AES, KEY);
					
					$Keyprivada = openssl_pkey_get_private($privKey2, $respuestaTWO);
					
					openssl_private_decrypt($textoValidarLlavePrivada, $textoDescifrado, $Keyprivada);

					// Comprobar por formulario
					$KeyprivadaDos = openssl_pkey_get_private($privKey2, $textoDescifrado);
					
					error_reporting(0);
					openssl_private_decrypt($textoValidarLlavePrivada, $textoDescifradoDos, $KeyprivadaDos);

					if (isset($textoDescifradoDos)) {
						
						$textoMsj = "<b>* FIRMA DIGITAL: </b>".$data;

						$textoMsj = $textoMsj.'<br><b>* LLAVE PRIVADA: </b><button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" href="#visualizar" role="button"><i class="icon-visibility prefix"></i></button> 

							<div class="modal fade" id="visualizar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
		                                            <div class="modal-dialog modal-dialog-centered">
		                                              <div class="modal-content">
		                                                <div class="modal-header">
		                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Llave privada</h5>
		                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		                                                </div>
		                                                <div class="modal-body">
		                                                 
		                                                     <label for="basic-url" class="form-label"> Por favor, copie la llave privada recibida del usuario bloqueado.</label>
		                      
		                                                    <div class="input-group" style="height: 400px">                                                        
		                                                        <span class="input-group-text">Llave privada</span>
		                                                         <textarea id="privadaConsulta" class="form-control" aria-label="With textarea">'.$privKey.'</textarea>
		                                                         <input id="privForm" type="button" class="copy" value="Copiar">
		                                                      
		                                                    </div>
		                                                    <br>

		                                                </div>
		                                                
		                                              </div>
		                                            </div>
		                                          </div> 
                                          ';

					 } else{

					 	$textoMsj = "<b>* FIRMA DIGITAL: </b>".$data;

					 	$textoMsj = $textoMsj."<br><b>* LLAVE PRIVADA:</b> incorrecta";

					 	$tipo = 1;
					 }
		         
		             $notificacion -> setmensaje($textoMsj);
		             $notificacion -> settipo($tipo);

		             $usuarioRoot = $usuario-> consultaUsuarios();

		             foreach ($usuarioRoot as $roots) {

		             	if($_SESSION["rol"] == '2' && $roots["id_rol"] == 1) { 

								 	 $idReceptor = $roots["idUsuario"];	
								 	 $leido = 0;

									 $notificacion -> setidReceptor($idReceptor);
									 $notificacion -> setleido($leido);

						             $res = $notificacion -> modificarNotificacion($idMensaje);
						             $notificacion -> modificarTipoMensaje($idMensaje);

						}

						if($_SESSION["rol"] == '1' && $roots["id_rol"] == 1) { 

									 $idReceptor = $roots["idUsuario"];	
								 	 $leido = 1;

								 	 $notificacion -> setidReceptor($idReceptor);
									 $notificacion -> setleido($leido);

								 	 $res = $notificacion -> modificarNotificacion($idMensaje);
						             $notificacion -> modificarTipoMensaje($idMensaje);

						}				

					 }

		             $consultarMensaje = $notificacion -> consultarMensaje($idMensaje, $_SESSION["idUsuario"]);

		             $mensajeD = 'mensajeD';

		             if ($_SESSION['rol'] == '2') {
             	
		             	header("Location: ?url=notificaciones&mensajeD=true");

		             }


		       } elseif ($ok == 0) {

		       			$mensajeD = 'mensajeND';


		       } 

				}

				// Verificar la llave privada del usuario bloqueado
				if (!empty($_POST["llaveIngresada"])) {

					foreach ($consultarKeys as $keys) {
			                                    	
						$pubKey = $keys["keyPublica"];
						$privKey  = $keys["keyPrivada"];

		 			}

					
					 $textoValidar = openssl_public_encrypt($respuestaTWO, $mensaje, openssl_decrypt($pubKey,  AES, KEY));
		 
					 $llaveIngresada = $_POST["llaveIngresada"];

					 $privKey2 = openssl_decrypt($llaveIngresada,  AES, KEY);

					 $Keyprivada = openssl_pkey_get_private($privKey2, $respuestaTWO);
   					 
   					 openssl_private_decrypt($mensaje, $textoComprobar, $Keyprivada);

					
					 if (isset($textoComprobar)) {
						 		
						 			 $luismiguel = 'firmaY';
			             $tipo = 1;

			             $notificacion -> settipo($tipo);

			             $notificacion -> modificarTipoMensaje($idMensaje);

			             $consultarMensaje = $notificacion -> consultarMensaje($idMensaje, $_SESSION["idUsuario"]);

			    		 $intento = 1; // Se desbloquea el usuario dentro del sistema
					 	 $seguridadNotificacion = 0;  // Vuelve a 0 la notificacion de solicitar desbloque del usuario

						 $contrasenaDefault = $cedula; 

						 // REINICIAR LA NOTIFICACION PARA SU AYUDA
						 $usuario -> setPasoSeguridad($seguridadNotificacion);
						 $paso = $usuario -> actualizarPaso($idEmisor);

						 // DESBLOQUEAR DEL SISTEMA
						 $usuario -> setStatus($intento);
						 $desbloqueoUser = $usuario -> intentoUsuario($idEmisor);

						 // ACTUALIZAR SU CONTRASEÑA CON SU CEDULA POR DEFAULT
						 $usuario -> setId_rol($id_rol);
						 $usuario -> setContrasena($contrasenaDefault);
						 $passDefault = $usuario -> modificarUsuario($idEmisor);

						 //NOTIFICAR POR CORREO AL USUARIO BLOQUEADO
						 	$user = new Usuario();

							$correoEmisor = $user -> buscarUsuarios($idEmisor);
							
							//Create an instance; passing `true` enables exceptions
							$mail = new PHPMailer(true);

							try {
							    //Server settings
							    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
							    $mail->isSMTP();                                            //Send using SMTP
							    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
							    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
							    $mail->Username   = 'empresachirinos2022@gmail.com';                     //SMTP username
							    $mail->Password   = 'gfntmjudoybazwto';                               //SMTP password
							    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
							    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
							    $mail->SMTPOptions = array(
							            'ssl' => array(
							            'verify_peer' => false,
							            'verify_peer_name' => false,
							            'allow_self_signed' => true
							            )
							            );

							    //Recipients
							    $mail->setFrom('empresachirinos2022@gmail.com', 'Empresa Chirinos');

							    foreach ($correoEmisor as $correoE) {
							  
							    	$mail->addCC($correoE["correo"]);				    
							    
							    //Content
							    $mail->isHTML(true);                                  //Set email format to HTML
							    $mail->Subject = 'Solicitud de desbloqueo';
							    $mail->Body    = '¡Buen día usuario '.$correoE["nombre"].' '.$correoE["apellido"].'!, su solicitud de desbloqueo dentro de la plataforma ha sido ¡aprobada!. Lo invitamos a que ingrese nuevamente a la plataforma para hacer su respectivo cambio de clave, su clave por default será su cédula. ¡Muchas gracias por su espera y esperamos que siga teniendo un maravilloso día!';
							    }

							    //DESCOMENTAR PARA ENVIAR CORREO 

							   // $mail->send();
								
							  }catch (Exception $e) {

							  }
			 
			 }else{

			 			 $luismiguel = 'firmaX';

			 }

		}



		// -----------------------------------------------------------------
   
		require_once $views;

		break;

		case 'verMensajeBuzonEnviados': 

		$url = 'verMensaje';
		$views = _VIEWS_."notificaciones"."/".$url.".php";

		$idMensaje = $_GET["idMensaje"];

		$consultarMensaje = $notificacion -> consultarMensajesEnviados($idMensaje, $_SESSION["idUsuario"]);
		
		$leido = 1;
		$notificacion -> setleido($leido);
		$notificacion ->actualizarVisualizacion($idMensaje);

		foreach($consultarMensaje as $emisor) { $idEmisor = $emisor["idEmisor"]; $textoMsj = $emisor["mensaje"]; }

		require_once $views;

		break;

		case 'enviarEmail':

				$llave = base64_decode($_GET["llave"]); 
				$idEmisor = base64_decode($_GET["idEmisor"]);
				$idMensaje = base64_decode($_GET["idMensaje"]);

				$user = new Usuario();

				$correoEmisor = $user -> buscarUsuarios($idEmisor);

				
				//Create an instance; passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
				    //Server settings
				    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				    $mail->isSMTP();                                            //Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				    $mail->Username   = 'empresachirinos2022@gmail.com';                     //SMTP username
				    $mail->Password   = 'gfntmjudoybazwto';                               //SMTP password
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
				    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
				    $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				            );

				    //Recipients
				    $mail->setFrom('empresachirinos2022@gmail.com', 'Empresa Chirinos');

				    foreach ($correoEmisor as $correoE) {
				  
				    	$mail->addCC($correoE["correo"]);				    
				    
				    //Content
				    $mail->isHTML(true);                                  //Set email format to HTML
				    $mail->Subject = 'Llave de ingreso';
				    $mail->Body    = '¡Buen día usuario '.$correoE["nombre"].' '.$correoE["apellido"].'!, su solicitud de la llave para el reingreso a sido aceptada, por favor copie y pegue su nueva llave en nuestra plataforma: <br> <b>'.$llave.'</b>';
				    }

				    //DESCOMENTAR PARA ENVIAR CORREO 

				    $mail->send();
					
				    //SE CAMBIA EL TIPO DEL MENSAJE, DE AYUDA A COMÚN
				    $tipo = 1;
				    $aprobacion = 1;

				    $notificacion -> settipo($tipo);
				    $notificacion -> setAprobacion($aprobacion);

				    $notificacion -> modificarTipoMensaje($idMensaje);

					$url = 'verMensaje';
					$views = _VIEWS_."notificaciones"."/".$url.".php";
					$envioEmail = true;

					$consultarMensaje = $notificacion -> consultarMensaje($idMensaje, $_SESSION["idUsuario"]);

					foreach($consultarMensaje as $emisor) { $idEmisor = $emisor["idEmisor"]; }
		
					$notificacion -> modificarAprobacion($idEmisor);
					$consultarAcesso = $notificacion -> consultarAcceso($idEmisor);	

					require_once $views;

				} catch (Exception $e) {
 
				    $envioEmail = false;

				    $url = 'verMensaje';
					$views = _VIEWS_."notificaciones"."/".$url.".php";

					$consultarMensaje = $notificacion -> consultarMensaje($idMensaje, $_SESSION["idUsuario"]);

					foreach($consultarMensaje as $emisor) { $idEmisor = $emisor["idEmisor"]; }
		
					$consultarAcesso = $notificacion -> consultarAcceso($idEmisor);

					require_once $views;

				}

			break;

			case 'declinarEmail':
					
				$idMensaje = base64_decode($_GET["idMensaje"]);
				$aprobacion = 2;

				    //SE CAMBIA EL TIPO DEL MENSAJE, DE AYUDA A COMÚN
				    $tipo = 1;
				    $notificacion -> settipo($tipo);
				
				    $notificacion -> modificarTipoMensaje($idMensaje);

					$url = 'verMensaje';
					$views = _VIEWS_."notificaciones"."/".$url.".php";
					$declinado = "usuarioDeclinado";

					$consultarMensaje = $notificacion -> consultarMensaje($idMensaje, $_SESSION["idUsuario"]);

					foreach($consultarMensaje as $emisor) { $idEmisor = $emisor["idEmisor"]; }
	
					foreach ($consultarMensaje as $msj) {
							
							if (empty($msj["mensaje"])) {
								
								$texto = $msj["cifrado"];
								$textoValidarLlavePrivada = $msj["cifrado"];
								$textoMsj = hash('sha256', $msj["cifrado"]);

							}else{

								$texto = $msj["mensaje"];
								$textoMsj = $msj["mensaje"];								
								$textoValidarLlavePrivada = $msj["cifrado"];
							}
						
					}

					$user = new Usuario();

					$correoEmisor = $user -> buscarUsuarios($idEmisor);
					
					//Create an instance; passing `true` enables exceptions
					$mail = new PHPMailer(true);

					try {
					    //Server settings
					    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
					    $mail->isSMTP();                                            //Send using SMTP
					    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					    $mail->Username   = 'empresachirinos2022@gmail.com';                     //SMTP username
					    $mail->Password   = 'gfntmjudoybazwto';                               //SMTP password
					    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
					    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
					    $mail->SMTPOptions = array(
					            'ssl' => array(
					            'verify_peer' => false,
					            'verify_peer_name' => false,
					            'allow_self_signed' => true
					            )
					            );

					    //Recipients
					    $mail->setFrom('empresachirinos2022@gmail.com', 'Empresa Chirinos');

					    foreach ($correoEmisor as $correoE) {
					  
					    	$mail->addCC($correoE["correo"]);				    
					    
					    //Content
					    $mail->isHTML(true);                                  //Set email format to HTML
					    $mail->Subject = 'Solicitud de desbloqueo';
					    $mail->Body    = '¡Buen día usuario '.$correoE["nombre"].' '.$correoE["apellido"].'!, su solicitud de desbloqueo dentro de la plataforma ha sido negada, puesto que sus datos enviados no coinciden con su perfil. Lo lamentamos, ¡y esperamos que siga teniendo un maravilloso día!';
					    }

					    //DESCOMENTAR PARA ENVIAR CORREO 

					    $mail->send();
						
					  }catch (Exception $e) {

					  }
					require_once $views;


				break;

			case 'enviarMensaje':
				
				$emisor = $_SESSION["idUsuario"];
				$receptor = $_POST["idReceptor"];
				$asunto = $_POST["asunto"];
				$mensaje = $_POST["msj"];
				$tipo = 1;
				$favorito = 0;
				$fecha = date("Y-m-d H:i:s"); 
				$leido = 0;

				$notificacion -> setIdEmisor($emisor);
				$notificacion -> setidReceptor($receptor);
				$notificacion -> setasunto($asunto);
				$notificacion -> setmensaje($mensaje);
				$notificacion -> settipo($tipo);
				$notificacion -> setfavorito($favorito);
				$notificacion -> setfecha($fecha);
				$notificacion -> setleido($leido);

				$notificacion -> registrarNotificacion();
				$ultimoRegistro = $notificacion -> ultimoMensaje();

				foreach ($ultimoRegistro as $idm):
					$idMsj = $idm['id'];

					$notificacion->setBuzon($idMsj);
					$notificacion->setIdEmisor($emisor);
					$notificacion->setidReceptor($receptor);

					$estadoRegistro = $notificacion->registrarMensaje(); 

					$estadoRegistro = $estadoRegistro['estatus'];
					
					if ($estadoRegistro == true) {
						echo "%1%";
					}

				endforeach;

				break;


			case 'eliminarMsj':

						$ruta = $_GET["ruta"];

						if (isset($_POST['id_delete'])) {
							
							$idMsj = $_POST['id_delete'];

						}

						if (!isset($idMsj)) {
							
							$eliminarFalso = 'false';

						}else{

								foreach ($idMsj as $idBorrar) {
									
									$revision = $notificacion -> chequeoMensaje($idBorrar);

									if (!empty($revision)) {
											
											$idReceptor = null;
											$notificacion -> setidReceptor($idReceptor);

											$notificacion -> eliminarMsj($idBorrar);

											$deleteMessaje = "true";

									}else {

										$notificacion -> eliminarRegistro($idBorrar);
										$deleteMessaje = "true";

									}

								}

						}

						if ($ruta == "favorito") {
								
								$consultarBuzon = $notificacion -> consultarBuzonFavoritos($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesFavoritos.php";
								require_once $views;
							
							}

							if ($ruta == "archivados") {
								
								$consultarBuzon = $notificacion -> consultarBuzonArchivados($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesArchivados.php";
								require_once $views;
							
							} 
							else{

								$consultarBuzon = $notificacion -> consultarBuzon($_SESSION["idUsuario"]);
							}
						
						require_once $views;

						
				break;

				case 'eliminarMsjEnviado':

						$ruta = $_GET["ruta"];

						if (isset($_POST['id_delete'])) {
							
							$idMsj = $_POST['id_delete'];

						}

						if (!isset($idMsj)) {
							
							$eliminarFalso = 'false';

						}else{

								foreach ($idMsj as $idBorrar) {
									
										$notificacion -> eliminarRegistroEmisor($idBorrar);
										$deleteMessaje = "true";				

								}

						}

						if ($ruta == "enviado") {

							$consultarBuzon = $notificacion -> consultarBuzonEnviados($_SESSION["idUsuario"]);
							
							$views = _VIEWS_.$url."/"."mensajesEnviados.php";

						}

						
						require_once $views;

						
				break;

				case 'llenarBuzon':

					$totalBuzon = 0;

					$mensajesxLeer = $notificacion -> consultarNotificacionesxLeer($_SESSION['idUsuario']);
					$mensajesxLeerMax = $notificacion -> consultarNotificacionesxLeerMax($_SESSION["idUsuario"]);

					if (!empty($mensajesxLeer)) {
						
						foreach ($mensajesxLeer as $n) {
							
							$totalBuzon = $totalBuzon + 1;
						}

						echo '<?php $totalBuzon = '.$totalBuzon.' ?>';

						foreach ($mensajesxLeerMax as $mensaje) {

							   if (strlen($mensaje["asunto"]) > 16 ) {

                                         $asunto = $mensaje["asunto"];
                                         $asunto= substr($asunto, 0, 14); 
                                         $asunto = $asunto."..";

                                }else {

                                	$asunto = $mensaje["asunto"];
                                } 

                                $direc = "?url=notificaciones&opcion=verMensajeBuzon&idMensaje=".$mensaje["idNotificacion"]."&direc=imbox&view=1";
							
								echo '<li>
                                        <a class="dropdown-item" href="'.$direc.'">
                                          <div class="d-flex border-bottom py-2">
              
              
                                            <div class="d-flex me-3">
                                              <h2 class="align-self-center mb-0"><img src="'.$mensaje['foto'].'" style="height: 35px!important;" class="img-fluid avatar rounded-circle mr-3"></h2>
                                            </div>
              
              
                                            <div class="align-selft-center">
                                              <h6 class="d-inline-block mb-0" style="color: black;">'.$mensaje['nombre']." ".$mensaje['apellido'].'</h6><span class="badge bg-danger ms-2">New</span>
                                              <small class="d-block text-muted">'.$asunto.'</small>
                                            </div>
              
                                          </div>
                                        </a>
                                      </li>';

                              }

                       if ($totalBuzon > 5 ) {
                       		
                       		 echo '<a href="?url=notificaciones" class="btn btn-primary w-100">Ver más</a href="?url=notificaciones">';
                       }
                        
					}else{

						echo '<font size="2"><center>No tiene mensajes por leer</center></font>';
					}

				break;

				case 'spanMensaje':

					$totalBuzon = 0;

					$mensajesxLeer = $notificacion -> consultarNotificacionesxLeer($_SESSION['idUsuario']);

					if (!empty($mensajesxLeer)) {
						
						foreach ($mensajesxLeer as $n) {
							
							$totalBuzon = $totalBuzon + 1;
						}

						echo '<span id="not " class="floating Blink position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                  '.$totalBuzon.'
                                </span>';
					
					}

				break;

				case 'actualizarArchivar':

							$ruta = $_GET["ruta"];
							$setTipo = "3";

							if (isset($_POST['id_delete'])) {
								
								$id = $_POST['id_delete'];
							}

							if (!isset($id)) {
								
								$archivarFalso = 'false';

							}else{

							$notificacion->settipo($setTipo);

							foreach ($id as $idArchivar) {

								$mensajesBuzon = $notificacion->actTipo($idArchivar);

							}

							$actArchivar = "true";
							}

							if ($ruta == "inicioBuzon.php") {

									$consultarBuzon = $notificacion -> consultarBuzon($_SESSION["idUsuario"]);
									require_once $views;
								
							}

							if ($ruta == "favorito") {
								
								$consultarBuzon = $notificacion -> consultarBuzonFavoritos($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesFavoritos.php";
								require_once $views;
							}

							if ($ruta == "archivados") {
								
								$consultarBuzon = $notificacion -> consultarBuzonArchivados($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesArchivados.php";
								require_once $views;
							}

							
							break;


							case 'actualizarFavorito':

							$ruta = $_GET["ruta"];
							$setFavorito = $_GET["setFav"];
							$id = $_GET["idMensaje"];

							$notificacion->setfavorito($setFavorito);

							$mensajesBuzon = $notificacion->setFav($id);

							if ($ruta == "inicioBuzon.php") {

								$consultarBuzon = $notificacion -> consultarBuzon($_SESSION["idUsuario"]);
								require_once $views;

							}

							if ($ruta == "favorito") {
								
								$consultarBuzon = $notificacion -> consultarBuzonFavoritos($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesFavoritos.php";
								require_once $views;
							}

							if ($ruta == "archivados") {
								
								$consultarBuzon = $notificacion -> consultarBuzonArchivados($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesArchivados.php";
								require_once $views;
							}

							break;

							case 'mensajesEnviados': 
								
								$consultarBuzon = $notificacion -> consultarBuzonEnviados($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesEnviados.php";
								require_once $views;

								break;

							case 'favoritos':
								
								$consultarBuzon = $notificacion -> consultarBuzonFavoritos($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesFavoritos.php";
								require_once $views;

								break;

							case 'archivados':
								
								$consultarBuzon = $notificacion -> consultarBuzonArchivados($_SESSION["idUsuario"]);

								$views = _VIEWS_.$url."/"."mensajesArchivados.php";
								require_once $views;

								break;


								case 'actualizarDesarchivar':

									$ruta = $_GET["ruta"];
									$setTipo = "1";

									if (isset($_POST['id_delete'])) {
										
										$id = $_POST['id_delete'];
									}

									if (!isset($id)) {
										
										$archivarFalso = 'false';

									}else{

									$notificacion->settipo($setTipo);

									foreach ($id as $idArchivar) {

										$mensajesBuzon = $notificacion->actTipo($idArchivar);

									}

									$actArchivar = "true";
									}

									if ($ruta == "inicioBuzon.php") {

											$consultarBuzon = $notificacion -> consultarBuzon($_SESSION["idUsuario"]);
											require_once $views;
										
									}

									if ($ruta == "favorito") {
										
										$consultarBuzon = $notificacion -> consultarBuzonFavoritos($_SESSION["idUsuario"]);

										$views = _VIEWS_.$url."/"."mensajesFavoritos.php";
										require_once $views;
									}

									if ($ruta == "archivados") {
										
										$consultarBuzon = $notificacion -> consultarBuzonArchivados($_SESSION["idUsuario"]);

										$views = _VIEWS_.$url."/"."mensajesArchivados.php";
										require_once $views;
									}

									
									break;
		

	}

}else {

	require_once $views;


}




?>