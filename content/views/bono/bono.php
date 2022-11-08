<!doctype html>
  <html lang="en">

  <head>

    <?php $components->head(); ?>
    <?php require_once "assets/css/modulos/responsiveBono.php"; ?>
    
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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de Bonos</h2>
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
                                <h6  class="font-weight-bold mb-0"></h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">
                                    
                                     <?php if(isset($operacionRCT)){ ?>
                                     <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#registrar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar"><i class="icon-add" style="font-size: 15px"></i></button>
                                     <?php  } ?> 

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
                                  <th scope="col">Nombre del bono</th>
                                  <th scope="col">Pago</th>
                                  <th scope="col">Cada cuanto corresponde</th>
                                  <th scope="col">Cargo</th>

                                  <?php if(isset($operacionMCT)){ ?>
                                  <th scope="col">Modificar</th>
                                  <?php } if(isset($operacionECT)){ ?>
                                  <th scope="col">Eliminar</th>
                                  <?php } ?>

                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultarBonos as $datos) { ?>

                                <tr align="center">                             
                                  <th scope="row"><?php echo $n++;?></th>
                                  <td><?php echo $datos['nombre_bono']; ?></td>
                                  <td>
                                    <?php
                                      if ($datos['moneda'] == 1) {
                                        echo $datos['valor']. " $";
                                      }else{
                                        echo $datos['valor']. " bs";
                                      }
                                    ?></td>
                                  <td><?php echo $datos['dias']. ' dias'; ?></td>
                                  <td><?php echo $datos['nombre_cargo']; ?></td>

                                  <?php if(isset($operacionMCT)){ ?>
                                  <td>                                     
                                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#modificar<?php echo $n;?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top"><i class="icon-border_color" style="font-size: 15px"></i></button>
                                    
                                  </td>
                                  <?php } ?>

                                  <!-- Modal modificar -->
                                  <div class="modal fade" id="modificar<?php echo $n;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php require 'content/views/bono/modificar.php'; ?> 
                                  </div>

                                  <?php if(isset($operacionECT)){ ?>
                                  <td> 
                                    <button type="button" onclick="eliminar(<?php echo $datos['id_bono'];?>);" class="btn btn-danger pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar"><i class="icon-delete" style="font-size: 15px"></i></button>
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

            <center> <input type="button" onClick="document.location.href='?url=recibo_bono'" value="VOLVER" class="btn btn-success darken-3 btn-small"></center>

          </div>
    

        </section>

        </div>
    </div>
    
    <!-- Modal Registrar -->
    <div class="modal fade" id="registrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/bono/registrar.php'; ?> 
    </div>
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/bono/ayuda.php'; ?> 
    </div>

    <?php $components->scripts(); ?>
    <script src="<?php echo _THEME_?>/js/AJAX/validaciones.js"></script>
    <script src="<?php echo _THEME_?>/js/AJAX/bono.js"></script>

</body>

</html>