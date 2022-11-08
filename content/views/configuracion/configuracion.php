<!doctype html>
  <html lang="en">

  <head>
    <?php $components->head(); ?>
  </head>

  <body class="bg-grey">

<div class="loader"></div>

  <div class="d-flex">

    <?php $components->sidebar(); ?>

    <div class="w-100">

      <?php $components->navbar(); ?>

      <section class="py-3" style="background-color: #F8F7F7;">
          <div class="container">
            <div class="row">

              <div class="col-lg-8 d-flex">
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Editar su Perfil</h2>
                <p class="" style="display: none;">Descargar registros</p>
                   
              </div>

              <div class="col-lg-3 d-flex" style="visibility: hidden;">
                
              </div>

            </div>
          </div>
        </section>

        <section class="bg-grey" >
          <div class="container">
            <div class="row">

              <div class="col-lg-12 my-3">
                <div class="card rounded-0">
                  
                  <div class="card text-center">
	
				<div class="card-body">
					<h5 class="card-title">Es importante mantener su perfil actualizado <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></h5>
				</div>
				<div class="card" style="width: 100%;">
					<ul class="list-group list-group-flush">

						<li class="list-group-item">
							
							Foto de perfil

							<a href="#pass"data-position="bottom" style="position: relative; margin-left: 28%; color: black!important;"data-bs-toggle="modal"  data-bs-target="#foto" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-mode_edit prefix"></i></a>

						</li>


						<li class="list-group-item"> 

							Cambio de contraseña			

							<a href="#pass"data-position="bottom" style="position: relative; margin-left: 20%; color: black!important;"data-bs-toggle="modal"  data-bs-target="#pass" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-mode_edit prefix"></i></a>
 

						</li>
					</ul>
				</div>

			</div>
                </div>
              </div>

              <div class="col-lg-4 my-3">
        				<br><br><br><br><br><br><br><br><br>
              </div>

            </div>

          </div>
    

        </section>

        </div>
    </div>
    

    <?php $components->scripts(); ?>



<!-- Modal modificar foto -->
	<div class="modal fade" id="foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
	<?php require 'content/views/configuracion/modificarFotoConfiguracion.php'; ?>
	</div>

	<!-- Modal modificar contraseña -->
	<div class="modal fade" id="pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
	<?php require 'content/views/configuracion/modificarPassConfiguracion.php'; ?>

	</div>


	<?php 


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


</html>