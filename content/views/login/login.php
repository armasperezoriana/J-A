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

		<div class="container">
			<div class="body d-md-flex align-items-center justify-content-between" style="background-color: #F9F8F8;">
				<div class="box-1 mt-md-0 mt-5">
					<img src="assets/img/fondo3.jpg"
					class="" style="height: 500px;">
				</div>

				<div class=" box-2 d-flex flex-column h-100" style="margin-top: -15%;">
					<div class="mt-5">
						<p class="mb-1 h-1 my-5">J&A CHIRINOS INSTALACIONES C.A</p>
						<p class="text-muted mb-2">Domicilio fiscal: Cr. 2 con Av. Rotaría y calle 3 casa nro 63-73 sector Brisas del Obelisco Barquisimeto - Lara zona postal 3001.</p>
						<div class="d-flex flex-column ">
							
							<div id="formContent">

								<form id="loginform" method="post">

									<div class="col-md-12">
										<input type="text" id="cedula" onkeypress="return check(event)" value="0000" class="form-control" name="cedula" placeholder="Cédula" autocomplete="off">
										<i class="icon-payment"></i></
									</div>
									
									<div class="col-xs-3">
										<input type="password" id="password" class="form-control" name="password" value="root" placeholder="Contraseña" autocomplete="off">
										<a href="javascript:void(0);" style="color: black;" id="imgContrasena" data-activo=false><i id="h1" class="icon-visibility"></i></a>
									</div>

									<br>

									<div class="">
										<div class="g-recaptcha" data-sitekey="6Le9Xo4hAAAAAHh51sob4kj2_IfRtaE07Ol3_B98">
										</div>

									</div>

									<center>
										<input type="submit" class="fadeIn fourth" value="INICIAR SESIÓN" id="entrar">  
									</center> 
									
								</form>		

								<div id="formFooter" style="text-align: right;">
									<br><br>
									<a class="underlineHover" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Recuperar usuario</a>
									<!--<a class="underlineHover" href="?url=pasoLogin&opcion=consultarPreguntas">Recuperar contraseña</a> -->
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</body>

	<!-- Modal Desbloquear -->
	
	<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalToggleLabel">Ingrese su cédula</h5>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
				</div>
				<div class="modal-body">
					
					
					<div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"> <span class="mensajes"></span></div>
					<input type="text" id="cedula_bloqueado"  onkeypress="return checkQuestCi(event)" name="cedula_bloqueado" class="form-control w-100" placeholder="Cédula" autocomplete="off">

				</div>
				<div class="modal-footer">

					<button style="background-color: red;  border: none;" class="btn btn-primary" id="bloqueado_siguiente" type="button" style="background-color: #142063;" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" disabled>Siguiente</button>

				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalToggleLabel2">Complete sus preguntas de seguridad</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<form id="formulario1" name="formulario1" action="?url=pasoLogin&opcion=solicitarDesbloqueo" method="POST">
						<div class="result"></div>
					</form>
					
					
				</div>
				<div class="modal-footer">
					<button onclick="enviar_recuperacion();" class="btn btn-success">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php $components->scripts(); 
$components->scriptsLogin();

?>

<script src="<?php echo _THEME_?>/js/AJAX/recuperar_usuario.js"></script>

<?php require_once _THEME_."/js/alerts/alertsLogin.php"; ?>

</html>