		
<!doctype html>
	<html lang="en">

	<head>
	
		<?php $components->headLogin(); ?>
		<link href="assets/css/styleLogin.css" rel="stylesheet">
		 <!-- <script src="assets/js/jquery-3.2.1.min" type="text/javascript"></script>  -->
		<!-- <script src="assets/js/catpcha.js" type="text/javascript"></script> -->
		<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lf5OoAhAAAAALial0Re7B3A1kdYQJUI7Ck1naJ0"></script> -->
		<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->


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
  				<nav> 

  					<a href="Manual.pdf" target="blank" title="Manual del sistema">Manual</a> 

  				</nav> 

  		</div> 

  	</header>

	<body>


		<div class="loader"></div>

		<div class="container">
			<div class="body d-md-flex align-items-center justify-content-between" style="background-color: #F9F8F8;">
				<div class="box-1 mt-md-0 mt-5">
					<img src="assets/img/recuperar.jpg"
					class="" style="height: 500px;">
				</div>

				<div class=" box-2 d-flex flex-column h-100" style="margin-top: 2%;">
					<div class="mt-5">
						<p class="mb-1 h-1">J&A CHIRINOS INSTALACIONES C.A</p>
						<p class="text-muted mb-2">¿Has olvidado la contraseña?, ¡recuperala ahora para ingresar a nuestra plataforma J&A!</p>
						<div class="d-flex flex-column ">
							<div id="formContent">


								<form action="?url=pasoLogin&opcion=consultarCi" id="recuperar" method="post">

									<input type="text" id="cedula" class="fadeIn second w-100" onkeypress="return check(event)" name="cedula" placeholder="Cédula" autocomplete="off">

								<center>
								<input type="submit" class="fadeIn fourth" value="SIGUIENTE" id="entrar">  
									<!-- <button type="submit" class="fadeIn fourth" id="entrar" name="entrar"> Entrar </button> -->
								</center>

								</form>

								<div id="formFooter">
									<a class="underlineHover" href="?url=login">¡Volver al login!</a>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</body>

	


	<?php $components->scripts(); 
		  $components->scriptsLogin();
		  // var_dump($data);

          if (isset($existe) && $existe == false) {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Éste usuario no se encuentra registrado dentro del sistema.',
            'error'
            )</script>
            ";

          } 	

          if (isset($preguntasExiste) && $preguntasExiste == "false") {
            echo " <script>Swal.fire(
            '¡Opps..!',
            'Lo lamentamos, éste usuario no posee preguntas de seguridad, por favor, contacte a su administrador.',
            'error'
            )</script>
            ";

          }

   ?>
	
	<script type="text/javascript">
		
		function check(e) {
		    tecla = (document.all) ? e.keyCode : e.which;

		    //Tecla de retroceso para borrar, siempre la permite
		    if (tecla == 8) {
		        return true;
		    }

		    // Patrón de entrada, en este caso solo acepta numeros y letras
		    patron = /[0-9]/;
		    tecla_final = String.fromCharCode(tecla);
		    return patron.test(tecla_final);
		}

	</script>

	
	</html>

