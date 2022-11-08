<!doctype html>
  <html lang="en">

  <head>

    <?php $components->head(); ?>
    <?php require_once "assets/css/modulos/responsiveCargo.php"; ?>

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

              <div class="col-lg-12 d-flex">
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de Cargos</h2>
                <p class="" style="visibility: hidden;">Descargar registros</p>
                   
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
                  
                  <div class="card-header bg-light">

                          <div class="row">
                              <div class="col-lg-8">
                                <h6  class="font-weight-bold mb-0">Cargos registrados ultimamente</h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">

                                    <?php if(isset($operacionRC)){ ?> 
                                     <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#registrar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar Cargo"><i class="icon-add" style="font-size: 15px"></i></button>
                                     <?php } ?>

                                    <button type="button" class="btn btn-secondary pull-right" data-bs-toggle="modal" data-bs-target="#ayuda" data-whatever="@mdo"><i class="icon-help_outline" style="font-size: 15px"></i></button> 
                                    </div>
                              </div>

                          </div>

                  </div>

                  <div class="card-body pt-2">

                       <table class="table table-hover" id="tableID">

                              <thead>
                                <tr align="center">
                                  <th scope="col">#</th>
                                  <th scope="col">Nombre del cargo</th>
                                  <th scope="col">Sueldo semanal</th>
                                  <th scope="col">Prima por hogar</th>

                                  <?php if(isset($operacionMC)){ ?>
                                  <th scope="col">Modificar</th>
                                  <?php } if(isset($operacionEC)){ ?>
                                  <th scope="col">Eliminar</th>
                                  <?php  } ?>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultaCargos as $datos) { ?>

                                <tr align="center">                             
                                  <th scope="row"><?php echo $n++;?></th>
                                  <td><?php echo $datos['nombre_cargo']; ?></td>
                                  <td><?php echo $datos['sueldo_semanal']; ?></td>
                                  <td><?php echo $datos['prima_por_hogar']; ?></td>

                                  <?php if(isset($operacionMC)){ ?>
                                  <td>                                     
                                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#modificar<?php echo $n;?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top"><i class="icon-border_color" style="font-size: 15px"></i></button>
                                    
                                  </td>
                                  <?php  } ?>

                                  <!-- Modal modificar -->
                                  <div class="modal fade" id="modificar<?php echo $n;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php require 'content/views/cargo/modificar.php'; ?> 
                                  </div>

                                  <?php if(isset($operacionEC)){ ?>
                                  <td> 
                                    <button type="button" onclick="eliminar(<?php echo $datos['id_cargo'];?>);" class="btn btn-danger pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar"><i class="icon-delete" style="font-size: 15px"></i></button>
                                  </td>
                                  <?php } ?>
                                </tr>

                              <?php } ?>
                            </tbody>
                            </table>

                  </div>
                </div>
              </div>

            </div>

          </div>
    

        </section>

        </div>
    </div>
    
    <!-- Modal Registrar -->
    <div class="modal fade" id="registrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/cargo/registrar.php'; ?> 
    </div>
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/cargo/ayuda.php'; ?> 
    </div>

    <?php $components->scripts(); ?>
    <?php 
          if (isset($estadoRegistro) && $estadoRegistro == true) {
            echo " <script>Swal.fire(
            '¡Registro Éxitoso!',
            'El trabajador ha sido registrado con exito.',
            'success'
            )</script>
            ";

          } if (isset($estadoRegistro) && $estadoRegistro == false) {

             echo " <script>Swal.fire(
            'Oppss..!',
            'Lo lamentamos, ocurrió un error al intentar registrar.',
            'error'
            )</script>
            ";

          }

            if (isset($estado) && $estado == true) {
            echo " <script>Swal.fire(
            '¡Actualizado!',
            'El trabajador ha sido actualizado con exito.',
            'success'
            )</script>
            ";

          } if (isset($estado) && $estado == false) {

             echo " <script>Swal.fire(
            'Oppss..!',
            'Lo lamentamos, ocurrió un error al intentar actualizar.',
            'error'
            )</script>
            ";

          }

          if (isset($estadoEliminado) && $estadoEliminado == true) {
            echo " <script>Swal.fire(
            '¡Eliminado!',
            'El trabajador ha sido eliminado con exito.',
            'success'
            )</script>
            ";

          } if (isset($estadoEliminado) && $estadoEliminado == false) {

             echo " <script>Swal.fire(
            'Oppss..!',
            'Lo lamentamos, ocurrió un error al intentar eliminar.',
            'error'
            )</script>
            ";

          }
           ?>
          <script src="<?php echo _THEME_?>/js/AJAX/validaciones.js"></script>
          <script src="<?php echo _THEME_?>/js/AJAX/cargo.js"></script>


</body>

</html>