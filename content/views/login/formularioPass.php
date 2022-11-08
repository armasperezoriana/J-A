		
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
					class="" style="height: 1000px!important;">
				</div>

				<?php foreach ($usuarioExistente as $usuario) { ?>

					<div class=" box-2 d-flex flex-column h-100" style="margin-top: 2%;">
						<div class="mt-5">
							<h5> <?php echo $usuario["nombre"]." ".$usuario["apellido"]; ?> </h5>
							<p class="mb-1 h-1">CAMBIO DE CLAVE</p>
							<hr>

							<div class="d-flex flex-column ">
								<div id="formContent">

									<form action="?url=pasoLogin&opcion=consultarDatos" id="recuperar" method="post">

										<p class="text-muted mb-2">1 - Indique si la fecha a continuacion es su fecha de nacimiento</p>

										<p><h8>FECHA DE NACIMIENTO: <?php $fechaSeleccionada = NULL; for ($i=1; $i<=1; $i++){
											$var=rand( 0 , $items );
								                if (in_array($array[$var], $preguntadas)){ // Buscamos si la pregunta ya se habia hecho
								                $i--;  // restamos 1 para reutilizar el indice de la pregunta repetida  
								            }else{
								              echo $array[$var];  // Mostramos la pregunta
								              $fechaSeleccionada.= $array[$var];
								              $preguntadas[].=$array[$var];  // y la agregamos a las que ya se hicieron        
								          }

								      } ?>
								  </h8></p>

								  <input type="hidden" name="fechaSelec" value="<?php echo $fechaSeleccionada;?>">
								  <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario'];?>">

								  <p>
								  	<label>
								  		<input name="fechaGroup" value="si" class="with-gap" type="radio" />
								  		<span>Si</span>
								  	</label>
								  </p>
								  <p>
								  	<label>
								  		<input name="fechaGroup" value="no" class="with-gap" type="radio" />
								  		<span>No</span>
								  	</label>
								  </p>

								  <p class="text-muted mb-2">2- Indique si su número celular termina con los siguientes 4 dígitos</p>

								</p>
								<p><h8>ÚLTIMOS 4 DIGITOS: <?php $numSelec = NULL; for ($i=1; $i<=1; $i++){
									$var=rand( 0 , $items );
								            if (in_array($arrayNum[$var], $preguntasNum)){ // Buscamos si la pregunta ya se habia hecho
								            $i--;  // restamos 1 para reutilizar el indice de la pregunta repetida  
								        }else{
								          echo $arrayNum[$var];  // Mostramos la pregunta
								          $numSelec.=$arrayNum[$var];
								          $preguntasNum[].=$arrayNum[$var];  // y la agregamos a las que ya se hicieron        
								      }

								  } ?>
								</h8></p>

								<input type="hidden" name="numSeleccionado" value="<?php echo $numSelec;?>">

								<p>
									<label> 
										<input name="celularGroup" value="si" class="with-gap" type="radio" />
										<span>Si</span>
									</label>
								</p>
								<p>
									<label>
										<input name="celularGroup" value="no" class="with-gap" type="radio" />
										<span>No</span>
									</label>
								</p>

								<p class="text-muted mb-2">3- Ahora responda sus preguntas de seguridad</p>

								<div class="form-group"><?php $i=0; foreach($questAndRespuest as $quest){ $i++; ?>
									<input type="hidden" name="preguntas[]" value="<?php echo $quest['pregunta']; ?>">
									<p><h8><?php echo $i." - ".$quest['pregunta']; ?></h8></p>
								</div>

								<div class="form-group">
									<label id="respuesta[]"><p class="text-muted mb-2"></p></label>
									<input class="form-control w-100" type="password" placeholder="Respuesta <?php echo $i; ?>" id="respuesta[]" name="respuesta[]">
								</div>

							<?php } ?>
							<br>

							<center>
								<input type="submit" class="fadeIn fourth" value="SIGUIENTE" id="entrar">  
								<!-- <button type="submit" class="fadeIn fourth" id="entrar" name="entrar"> Entrar </button> -->
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

if (isset($existe) && $existe == true) {
	echo " <script>Swal.fire(
	'¡Bienvenido de vuelta ".$nombre."!',
	'Por favor, complete éste formulario para seguir.',
	'success'
	)</script>
	";

} 	

?>

</html>

