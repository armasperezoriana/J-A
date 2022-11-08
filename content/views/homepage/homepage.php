<!doctype html>
<html lang="en">

<head>
	<?php $components->head(); ?>
</head>
 
<body>



	<div class="loader"></div>

	<div class="d-flex">

		<?php $components->sidebar(); ?>

		<div class="w-100">

			<?php $components->navbar(); ?>
	
				<section class="py-3">
					<div class="container">
						<div class="row">

							<div class="col-lg-9">

								<h2 class="font-weight-bold mb-0">Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?></h2>
								<p class="lead text-muted">Chequea las ultimas notificaciones.</p>
                                
							</div>


						</div>
					</div>
				</section>

				<section class="bg-mix">

					<div class="container">
						<div class="card rounded-0">
							<div class="card-body">
								<div class="row">
									<h6 class="text-muted"><div id="al" class="titulo"></div></h6>
										
										<div class="col-4 col-md-4 stat my-3">
											<div class="mx-auto">
												<h6 class="font-weight-bold mb-0">BCV: <h3 class="text-success">
													<div id="bcv"></div></h3></h6>
											</div>
										</div>

										<div class="col-4 col-md-4 stat my-3">
											<div class="mx-auto">
												<h6 class="font-weight-bold mb-0">DolarToday: <h3 class="text-success"><div id="dolartoday"></div></h3></h6>
											</div>
										</div>

										<div class="col-4 col-md-4 stat my-3">
											<div class="mx-auto">
												<h6 class="font-weight-bold ">Promedio: <h3 class="text-success"><div id="promedio"></div></h3></h6>
											</div>
										</div>

										<div class="col-12">

											<div class="mx-auto">
												<table class="table">
												  <thead>
												    <tr>
												      <th scope="col">Valor en bd</th>
												      <th scope="col">Ultima actualizacion</th>
												      <th scope="col">Actualizar</th>
												    </tr>
												  </thead>
												  <tbody>
												    <tr>
												      <td><?php echo $valor_actual . " bs"; ?></td>
												      <td><?php echo $fecha_actualizacion; ?></td>
												      <td><center><button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#modificar" data-whatever="@mdo" data-toggle="tooltip" data-placement="top"><i class="icon-border_color" style="font-size: 15px"></i></button></center></td>
												      <div class="modal fade" id="modificar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							                                  <?php require 'content/views/homepage/modificar.php'; ?> 
							                                </div>
												    </tr>
												  </tbody>
												</table>
												
												
											</div>
										</div> 

								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="bg-grey">
					<div class="container">
						<div class="row">

							<div class="col-lg-8 my-3">
								<div class="card rounded-0">
									<div class="card-header bg-light">
										<h6 class="font-weight-bold mb-0">Inasistencias desde los ultimos 30 dias</h6>
									</div>

									<div class="card-body" style="width: 98%;">
										
										<canvas id="myChart"></canvas>

									</div>
								</div>
							</div>

							<div class="col-lg-4 my-3">
								<div class="card rounded-0">

									<div class="card-header bg-light">
										<h6 class="font-weight-bold mb-0">Trabajadores de reposo</h6>
									</div>

									<div class="card-body pt-2">
										<?php
										$actual = date('Y-m-d'); 
										foreach ($consultarInasistencia as $datos) { 
										if(($datos['descripcion'] == 'Reposo') && ($datos['hasta'] > $actual)){ ?>
										<div class="d-flex border-bottom py-2">
											<div class="d-flex me-3">
												<h2 class="align-self-center mb-0"><i class="icon-person" style="font-size: 35px"></i></h2>
											</div>

											<div class="align-selft-center">
												<h6 class="d-inline-block mb-0"><?php echo $datos['nombre'].' ' . $datos['apellido'];?></h6>
												<span class="badge bg-success ms-2">Reincorporación: <?php echo  $datos['hasta'];?></span>
												<small class="d-block text-muted"><?php echo 'C.I: '. $datos['cedula'];?></small>
											</div>
										</div>

									<?php }} ?>

										<a href="?url=inasistencia" class="btn btn-primary w-100">Ver todas las inasistencias</a>

									</div>

								</div>
								<div class="card rounded-0">
								<div class="card-header bg-light">
										<h6 class="font-weight-bold mb-0">Trabajadores por nomina</h6>
									</div>
								<div class="card-body pt-2">
										<?php
										$actual = date('Y-m-d'); 
										foreach ($trabajadores_nomina_pendiente as $trabajador => $periodo_hasta) { 
											$date1 = new DateTime($periodo_hasta);
											$date2 = new DateTime($actual);
											$diff = $date1->diff($date2);
											$diferencia_dias = $diff->days;
											?>
										<div class="d-flex border-bottom py-2">
											<div class="d-flex me-3">
												<h2 class="align-self-center mb-0"><i class="icon-person" style="font-size: 35px"></i></h2>
											</div>

											<div class="align-selft-center">
												<h6 class="d-inline-block mb-0"><?php echo $trabajador;?></h6>
												<span class="badge bg-success ms-2">Ultima nomina: 
													<?php echo  $periodo_hasta;?></span>
												<small class="d-block text-muted"><?php echo 'Dias atrasados: '. $diferencia_dias;?></small>	
											</div>
										</div>

									<?php } ?>

										<a href="?url=nomina" class="btn btn-primary w-100">Ver todas las nominas</a>

									</div>
								</div>
							</div>


						</div>

					</div>
		

				</section>

		</div>
	</div>

	<?php $components->scripts(); 

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
          ?>

	<script>

		const ctx = document.getElementById('myChart').getContext('2d');
		const myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Inasistencias injustificadas'],
					datasets: [
						<?php
						foreach ($trabajadores_inasistencias as $trabajador => $cantidad_dias) { 
							if ($cantidad_dias >0) {
						?>
						{

						label: '<?php echo $trabajador;?>',
						data: [
						'<?php echo $cantidad_dias;?>',
						 
						],

						backgroundColor: [
						'<?php color_rand(); ?>',
						],

						maxBarThickness: 50,

					},
					<?php }} ?> ]

				},
				options: {

					scales: {
						y: {

							beginAtZero: true
						}
					}
				}
		});
	</script>
	<script src="<?php echo _THEME_?>/js/AJAX/homepage.js"></script>

</body>

</html>