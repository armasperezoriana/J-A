		
<!doctype html>
	<html lang="en">

	<head>

		<?php $components->headLogin(); ?>
		<link href="assets/css/styleLogin.css" rel="stylesheet">

	</head>

	<header> 

		<div class="wrapper"> 

			<div>
				<img class="img-logo" src="assets/img/logo.png">
			</div> 

			<div style="margin-left: 30px;">
				<div class="logo"  id="fuente">Chirinos Instalaciones C.A</div> 
				<hr class="linea-logo"> 

				<div class="detalles" id="fuente">Montajes electricos, mecanicos y civiles</div>
				<div class="rif" id="fuente">Rif J-407400282</div> 

			</div>
 
		</div> 

	</header> 

	<body>
 
		<div class="loader"></div>

		<div class="container">
			<div class="card text-center">
				<div class="card-header">
					Seguridad
				</div>
				<div class="card-body">
					<h5 class="card-title">Por favor, complete su perfil para proseguir.</h5>
				</div>
				<div class="card" style="width: 100%;">
					<ul class="list-group list-group-flush">

						<li class="list-group-item">
							
							<?php $cont=0; if($_SESSION["foto"] != null){ echo "<i class='icon-check'></i>"; } else{ echo "<i class='icon-close'></i>"; }  ?> Foto de perfil

							<?php if($_SESSION["foto"] == null){ $cont++; ?>

							<a href="#pass"data-position="bottom" style="position: relative; margin-left: 28%;"data-bs-toggle="modal"  data-bs-target="#foto" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-mode_edit prefix"></i></a>

							<?php  } ?>

						</li>

						<li class="list-group-item">
							
							<?php if($_SESSION["pSeguridad"] == true){ echo "<i class='icon-check'></i>"; } else{ echo "<i class='icon-close'></i>"; }  ?> Preguntas de seguridad

							<?php if($_SESSION["pSeguridad"] == false){ $cont++; ?>
 
							<a href="#pass"data-position="bottom" style="position: relative; margin-left: 20%;"data-bs-toggle="modal"  data-bs-target="#preguntas" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-mode_edit prefix"></i></a>

							<?php  } ?>

						</li>

						<li class="list-group-item"> 

							<?php if($_SESSION["passDefault"] == "false"){ echo "<i class='icon-check'></i>"; } else{ echo "<i class='icon-close'></i>"; }  ?> Cambio de contraseña

							<?php if($_SESSION["passDefault"] != "false"){ $cont++; ?>

							<a href="#pass"data-position="bottom" style="position: relative; margin-left: 20%;"data-bs-toggle="modal"  data-bs-target="#pass" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-mode_edit prefix"></i></a>
 
							<?php  } ?>

						</li>
					</ul>
				</div>
				<div class="card-footer text-muted">
					<?php echo $cont; ?> datos por actualizar
				</div>
			</div>
		</div>
	</body>

	<!-- Modal modificar foto -->
	<div class="modal fade" id="foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
	<?php require 'content/views/seguridad/modificarFoto.php'; ?>
	</div>

	<!-- Modal modificar preguntas -->
	<div class="modal fade" id="preguntas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
	<?php require 'content/views/seguridad/modificarPreguntas.php'; ?>
	
	</div>

	<!-- Modal modificar contraseña -->
	<div class="modal fade" id="pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
	<?php require 'content/views/seguridad/modificarPass.php'; ?>

	</div>


	<?php $components->scripts(); 
	$components->scriptsLogin();

   if (isset($_GET['alert']) && $_GET['alert'] == 'preguntas') {
       
            echo " <script>Swal.fire(
            '¡Registro Éxitoso!',
            'Sus preguntas de seguridad han sido actualizadas correctamente.',
            'success'
            )</script>
            ";

          }

     if (isset($_GET['alert']) && $_GET['alert'] == 'foto') {
       
            echo " <script>Swal.fire(
            '¡Registro Éxitoso!',
            'Su foto a sido actualizada.',
            'success'
            )</script>
            ";

          }

       if (isset($_GET['alert']) && $_GET['alert'] == 'pass') {
       
            echo " <script>Swal.fire(
            '¡Registro Éxitoso!',
            'Su contraseña ha sido actualizada.',
            'success'
            )</script>
            ";

          }


        if (isset($_GET['alert']) && $_GET['alert'] == 'errorVerificarPass') {
       
            echo " <script>Swal.fire(
            '¡Opps..!',
            'La contraseña actual introducida, es incorrecta.',
            'error'
            )</script>
            ";

          }

          if (isset($_GET['alert']) && $_GET['alert'] == 'errorNoIgualPass') {
       
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Su nueva contraseña, no coinciden.',
            'error'
            )</script>
            ";

          }

          if (isset($_GET['alert']) && $_GET['alert'] == 'errorIgualCedula') {
       
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Por su seguridad, su nueva contraseña no puede ser su misma cédula.',
            'error'
            )</script>
            ";

          }


    ?>

    <script type="text/javascript">

    	function checkEspacio(e) {
                        tecla = (document.all) ? e.keyCode : e.which;

                        //Tecla de retroceso para borrar, siempre la permite
                        if (tecla == 8) {
                            return true;
                        }

                        // Patrón de entrada, en este caso solo acepta numeros y letras
                        patron = /^\S/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                    } 
    	
    	 function checkQuest(e) {
                        tecla = (document.all) ? e.keyCode : e.which;

                        //Tecla de retroceso para borrar, siempre la permite
                        if (tecla == 8) {
                            return true;
                        }

                        // Patrón de entrada, en este caso solo acepta numeros y letras
                        patron = /[a-z]/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                    } 


    	$(document).on('change','input[type="file"]',function(){
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 3000000){
		
		Swal.fire(
            '¡Opps..!',
            'El archivo no debe superar los 3MB.',
            'error'
            );

		this.value = '';
		this.files[0].name = '';
	}else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();
		
		// Convertimos en minúscula porque 
		// la extensión del archivo puede estar en mayúscula
		ext = ext.toLowerCase();
    
		// console.log(ext);
		switch (ext) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'pdf': break;
			default:

				Swal.fire(
	            '¡Opps..!',
	            'El archivo no tiene la extensión adecuada.',
	            'error'
	            );

				this.value = ''; // reset del valor
				this.files[0].name = '';

		}
	}
});

    </script>

    <script src="<?php echo _THEME_?>/js/AJAX/security.js"></script>


</html>

