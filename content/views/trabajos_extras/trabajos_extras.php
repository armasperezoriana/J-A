<!doctype html>
  <html lang="en">

  <head>

    <?php $components->head(); ?>
    <?php require_once "assets/css/modulos/responsiveTrabajosE.php"; ?>
    
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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de trabajos extras</h2>
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
                                <h6  class="font-weight-bold mb-0">Trabajos extras registrados ultimamente</h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">

                                     <?php if(isset($operacionRTE)){ ?>
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
                                  <th scope="col">Trabajador</th>
                                  <th scope="col">Cedula</th>
                                  <th scope="col">Descripcion</th>
                                  <th scope="col">Fecha de pago</th>
                                  <th scope="col">Pago</th>
                                  <th scope="col">Generar</th>

                                  <?php if(isset($operacionMTE)){ ?>
                                  <th scope="col">Modificar</th>

                                  <?php }if(isset($operacionETE)){ ?>
                                  <th scope="col">Eliminar</th>
                                  <?php } ?>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultarTrabajos_extras as $datos) { ?>

                                <tr align="center">                             
                                  <th scope="row"><?php echo $n++;?></th>
                                  <td><?php echo $datos['nombre']. ' ' . $datos['apellido']; ?></td>
                                  <td><?php echo $datos['cedula']; ?></td>
                                  <td><?php echo $datos['descripcion_trabajo']; ?></td>
                                  <td><?php echo $datos['fecha_pago']; ?></td>
                                  <td><?php echo $datos['total_pagar']. ' $ '; ?></td>
                                  <td>
                                   <a class="btn btn-info pull-right" href="?url=generarPDF&opcion=trabajos_extras<?php echo '$'.$datos['id_trabajosExtras']?>" target="_blank"><i class=" icon-print" style="font-size: 15px"></i></a>                                     
                                  </td> 

                                  <?php if(isset($operacionMTE)){ ?>             
                                  <td>                                     
                                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#modificar<?php echo $n;?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top"><i class="icon-border_color" style="font-size: 15px"></i></button>
                                  </td>
                                  <?php } ?>

                                  <!-- Modal modificar -->
                                  <div class="modal fade" id="modificar<?php echo $n;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php require 'content/views/trabajos_extras/modificar.php'; ?> 
                                  </div>

                                  <?php if(isset($operacionETE)){ ?> 
                                  <td> 
                                    <button type="button" onclick="eliminar(<?php echo $datos['id_trabajosExtras'];?>);" class="btn btn-danger pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar"><i class="icon-delete" style="font-size: 15px"></i></button>
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
     <?php require 'content/views/trabajos_extras/registrar.php'; ?> 
    </div>
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/trabajos_extras/ayuda.php'; ?> 
    </div>

    <?php $components->scripts(); ?>
    <script src="<?php echo _THEME_?>/js/AJAX/validaciones.js"></script>
    <script src="<?php echo _THEME_?>/js/AJAX/trabajos_extras.js"></script>


</body>

</html>