<?php
    
use content\component\componentViews as componentViews;

$components = new componentViews();

use content\models\usuario as Usuario;
$usuario = new Usuario();

use content\models\seguridad as Seguridad;
$seguridad = new Seguridad();

$views = _VIEWS_.$url."/".$url.".php";

$_SESSION['ventana'] = "Seguridad "; 
 

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

                    		if (isset($_GET['redirec'])) {

                    			header("Location: ?url=configuracion&alert=foto");
                    			
                    		}else {

                    			header("Location: ?url=homepage&alert=foto");
                    		}
                    		
                    }

			break;

			case 'addQuestion':
				
				$idUsuario = $_SESSION["idUsuario"];
				$cedula = $_SESSION["cedula"];

				$pregunta_one = $_POST['pregunta_one'];
				$respuesta_one = $_POST['respuesta_one'];
				
				$seguridad->setRespuesta($respuesta_one);
				$seguridad->setPregunta($pregunta_one);
			
				$seguridad->setIdusuario($idUsuario);

				$resultado = $seguridad->addQuest();

				$pregunta_one = $_POST['pregunta_two'];
				$respuesta_one = $_POST['respuesta_two'];
				$respuesta_llave_privada = $_POST['respuesta_two'];
				
				$seguridad->setPregunta($pregunta_one);
				$seguridad->setRespuesta($respuesta_one);
				$seguridad->setIdusuario($idUsuario);

				$resultado = $seguridad->addQuest();

				$pregunta_one = $_POST['pregunta_tre'];
				$respuesta_one = $_POST['respuesta_tre'];
				
				$seguridad->setPregunta($pregunta_one);
				$seguridad->setRespuesta($respuesta_one);
				$seguridad->setIdusuario($idUsuario);

				$resultado = $seguridad->addQuest();

				// datos que se quieren firmar
				$datos = $_POST["nickname"];

				$seguridad->setPregunta('Firma Digital');
				$seguridad->setRespuesta($datos);
				$seguridad->setIdusuario($idUsuario);

				$resultado = $seguridad->addQuest();

				$estadoRegistro = $resultado['estatus'];

				if ($estadoRegistro == true) {
						echo "%1%";
					}
					
				// crear unas claves pública y privada nuevas
				$new_key_pair = openssl_pkey_new(array(
				    "private_key_bits" => 512,
				    "private_key_type" => OPENSSL_KEYTYPE_RSA,
				));

				openssl_pkey_export($new_key_pair, $private_key_pem, $respuesta_llave_privada);

				if ($res === false) die("<script>

			    							Swal.fire(
									            '¡Opps..!',
									            'Hubo un error al intentar generar sus llaves')

									     </script>"); 


				$details = openssl_pkey_get_details($new_key_pair);
				$public_key_pem = $details['key'];

				// crear la firma
				openssl_sign($datos, $firma, openssl_pkey_get_private($private_key_pem, $respuesta_llave_privada),  "sha256WithRSAEncryption");

				// Guardar las llaves 
				//file_put_contents('content/file/private_key.pem', $private_key_pem);
				//file_put_contents('content/file/public_key.pem', $public_key_pem);
				file_put_contents('content/file/'.$idUsuario.$cedula.'.dat', $firma);

			    // Registrar llaves encriptadas 

				$public_key_pem = openssl_encrypt($public_key_pem,  AES, KEY);
				$private_key_pem = openssl_encrypt($private_key_pem,  AES, KEY);

			    $seguridad -> setKeyPublica($public_key_pem);
			    $seguridad -> setKeyPrivada($private_key_pem);
			    
			    $resultado_llaves = $seguridad -> registrarKeys();

			   $_SESSION['pSeguridad'] = true;

				if ($_SESSION["pSeguridad"] == false || empty($_SESSION["foto"]) || $_SESSION['passDefault'] == "true") {
                                       
                           header("Location: ?url=seguridad&alert=preguntas");
                   
                    }else {

                    	   header("Location: ?url=homepage&alert=preguntas");
                    }

				break;

			case 'modificarPass':
				
				$cedula = $_SESSION["cedula"];
				$passActual = $_POST['passActual'];
				$passOne = $_POST['passOne'];
				$passTwo = $_POST['passTwo'];

				$data = $usuario->SearchPass($cedula);

				foreach ($data as $validarPass) {
					
					$contrasenaActual = $validarPass["contrasena"];
					$validarCedula = $validarPass["cedula_trabajador"];
				}

				if (password_verify($passActual, $contrasenaActual)) {

					if ($passOne != $passTwo) {
						
						if (isset($_GET['redirec'])) {

                    			header("Location: ?url=configuracion&alert=errorNoIgualPass");
                    			
			            }else {

			                    header("Location: ?url=seguridad&alert=errorNoIgualPass");
			             }

						
					
					}else{

						if ($passOne == $validarCedula) {

						header("Location: ?url=seguridad&alert=errorIgualCedula");

						} else {

							 $usuario->setId_rol($_SESSION['rol']);
					 		 $usuario->setContrasena($passOne);

			  			 	 $usuario->modificarUsuario($_SESSION['idUsuario']);

			  			 	 $_SESSION['passDefault'] = 'false';

			  			 	 if ($_SESSION["pSeguridad"] == false || empty($_SESSION["foto"]) || $_SESSION['passDefault'] == "true") {
                                       
                            header("Location: ?url=seguridad&alert=pass");
                   
			                    }else {

			                    		if (isset($_GET['redirec'])) {

                    							header("Location: ?url=configuracion&alert=pass");
                    			
			                    		}else {

			                    			header("Location: ?url=homepage&alert=pass");
			                    		}
			                    }


						}
					}


				}else {

					if (isset($_GET['redirec'])) {

                    					header("Location: ?url=configuracion&alert=errorVerificarPass");
                    			
			                    		}else {

			                    			header("Location: ?url=seguridad&alert=errorVerificarPass");
			                    		}
				}

				break;

				
	 }

 }else {

 	require_once $views;

 }


?>