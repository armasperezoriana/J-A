		
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
			<nav> 

				<a href="Manual.pdf" target="blank" title="Manual del sistema">Manual</a> 

			</nav> 

		</div> 

	</header>

	<body>


		<div class="loader"></div>

		<div class="container" >
			<div class="body d-md-flex align-items-center justify-content-between" style="background-color: #F9F8F8;">
				<div class="box-1 mt-md-0 mt-5">
					<img src="assets/img/ciber.jpg"
					class="" style="height: auto!important;">
				</div>

				<?php foreach ($usuarioExistente as $usuario) { ?>

					<div class=" box-2 d-flex flex-column h-100" style="margin-top: 2%;">
						<div class="mt-5">
							<h5> <?php echo $usuario["nombre"]." ".$usuario["apellido"]; ?> </h5>
							<p class="mb-1 h-1">CAMBIO DE CLAVE</p>
							<hr>

							<div class="d-flex flex-column ">
								<div id="formContent">

									<form action="?url=pasoLogin&opcion=cambiarPass" id="recuperar" method="post">
										
										<input type="hidden" name="id" id="id" value="<?php echo $usuario['idUsuario']; ?>">

										<input type="hidden" name="rol" id="rol" value="<?php echo $usuario['id_rol']; ?>">

										<p class="text-muted mb-2">1- Ingrese su nueva contraseña</p>

										<div class="col-xs-3">
											<input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" autocomplete="off">
											<a href="javascript:void(0);" style="color: black;" id="imgContrasena" data-activo=false><i id="h1" class="icon-visibility"></i></a>
										</div>

										<p class="text-muted mb-2">2- Por favor, repita su nueva contraseña</p>
 
										<div class="col-xs-3">
											<input type="password" id="passwordos" class="form-control" name="passwordos" placeholder="Confirmar contraseña" autocomplete="off">
											<a href="javascript:void(0);" style="color: black;" id="imgContrasena2" data-activo=false><i id="h2" class="icon-visibility"></i></a>
										</div>

										<br>

										<center>
											<input type="button" onclick="confirmarModificar();" class="fadeIn fourth" value="ACTUALIZAR" id="entrar">   
										</center>

									</form>


								<?php } ?>
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

	foreach ($usuarioExistente as $usuario) {

		$nombre = $usuario["nombre"];
	}

	if (isset($noigual) && $noigual == true) {
		echo " <script>Swal.fire(
		'¡Lo lamento ".$nombre."!',
		'Sus contraseñas no coinciden.',
		'error'
		)</script>
		";

	} 	

	if (isset($existe) && $existe == true) {
		echo " <script>Swal.fire(
		'¡Bienvenido de vuelta ".$nombre."!',
		'Por favor, complete este formulario para finalizar.',
		'success'
		)</script>
		";

	} 

	if (isset($cedulaIgual) && $cedulaIgual == true) {
		echo " <script>Swal.fire(
		'¡Lo lamento ".$nombre."!',
		'Su contraseña no puede ser su misma cédula.',
		'error'
		)</script>
		";

	}

	?>

	<script type="text/javascript">
		$("#imgContrasena").click(function () {


		          var cambio = document.getElementById("password");
		          if(cambio.type == "password"){
		            cambio.type = "text";
		            $('i#h1').removeClass('icon-visibility').addClass('icon-visibility_off');
		          }else{
		            cambio.type = "password";
		              $('i#h1').removeClass('icon-visibility_off').addClass('icon-visibility');
		          }
		        

		});

		$("#imgContrasena2").click(function () {


		          var cambio = document.getElementById("passwordos");
		          if(cambio.type == "password"){
		            cambio.type = "text";
		            $('i#h2').removeClass('icon-visibility').addClass('icon-visibility_off');
		          }else{
		            cambio.type = "password";
		              $('i#h2').removeClass('icon-visibility_off').addClass('icon-visibility');
		          }
		        

		});

		function confirmarModificar(){
              Swal.fire({
                title: '¿Está seguro de su nueva contraseña?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡actualizar!'
              }).then((result) => {
                if (result.isConfirmed) {

                  var form = $('#recuperar');
                  form.submit(); 

                }
              })
            }

	</script>

	</html>

