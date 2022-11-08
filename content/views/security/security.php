<!doctype html>
  <html lang="en">

  <head>
    <?php $components->head(); ?>

    <style type="text/css">
      
       @media
    only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

  
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    td:before {
      /* Now like a table header */
      position: right;
      /* Top/left values mimic padding */
      top: 0;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }

    /*
    Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
    td:nth-of-type(1):before { content: "Cargo: "; }
    td:nth-of-type(2):before { content: "Sueldo semanal: "; }
    td:nth-of-type(3):before { content: "Prima por hogar: "; }
  }
 

    </style>
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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de seguridad</h2>
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
                                <h6  class="font-weight-bold mb-0">Roles</h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">
                                     <a  href="?url=bitacora" class="btn btn-warning pull-right"><i class="icon-data_usage" style="font-size: 15px"></i>Bitacora y BD</a>
                                     <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#registrar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar Cargo"><i class="icon-add" style="font-size: 15px"></i></button>

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
                                  <th scope="col">Nombre del rol</th>
                                  <th scope="col">Permisos</th>
                                  <th scope="col">Modificar</th>
                                  <th scope="col">Eliminar</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultarRoles as $datos) { ?>

                                <tr align="center">                             
                                  <th scope="row"><?php echo $n++;?></th>
                                  <td><?php echo $datos['nombre_rol']; ?></td>
                                  <td>
                                  <?php if($datos['id_rol'] !== '1'){ ?>                                     
                                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#permisos<?php echo $n;?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top"><i class="icon-border_color" style="font-size: 15px"></i></button>
                                  <?php } ?>
                                  </td>
                                  <td>
                                  <?php if($datos['id_rol'] !== '1'){ ?>                                     
                                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#modificar<?php echo $n;?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top"><i class="icon-border_color" style="font-size: 15px"></i></button>
                                  <?php } ?>
                                  </td>

                                <!-- Modal modificar -->
                                <div class="modal fade" id="modificar<?php echo $n;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <?php require 'content/views/security/modificar.php'; ?> 
                                </div>
                                <!-- Modal permisos -->
                                <div class="modal fade" id="permisos<?php echo $n;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <?php require 'content/views/security/permisos.php'; ?> 
                                </div>

                                  <td> 
                                    <?php if($datos['id_rol'] !== '1'){ ?>
                                    <button type="button" onclick="eliminar(<?php echo $datos['id_rol'];?>);" class="btn btn-danger pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar"><i class="icon-delete" style="font-size: 15px"></i></button>
                                    <?php } ?>
                                  </td>
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
     <?php require 'content/views/security/registrar.php'; ?> 
    </div>
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/security/ayuda.php'; ?> 
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
    
          <script src="<?php echo _THEME_?>/js/AJAX/security.js"></script>


</body>

</html>