<!doctype html>
  <html lang="en">

  <head>
    <?php $components->head(); ?>
    <?php require_once "assets/css/modulos/responsiveUsuario.php"; ?>
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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de Usuarios</h2>
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
                                <h6  class="font-weight-bold mb-0">Usuarios registrados ultimamente</h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">

                                      <?php if(isset($operacionRU)){ ?>
                                      <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#registrar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar Usuario"><i class="icon-add" style="font-size: 15px"></i></button>
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
                                  <th></th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Apellido</th>
                                  <th scope="col">Cédula</th>
                                  <th scope="col">Rol</th>
                                  <th scope="col">Correo</th>

                                  <?php if(isset($operacionMU)){ ?>
                                  <th scope="col">Modificar</th>

                                  <?php } if(isset($operacionEU)){ ?>
                                  <th scope="col">Eliminar</th>
                                  <?php } ?>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultaUsuarios as $datos) { 

                                    if(empty($datos['foto'])){

                                      $foto = "assets/img/user4.png";
                                    
                                    }else{

                                      $foto = $datos["foto"];
                                    }
                                ?>
                                <tr align="center">                             
                                  <th scope="row"><center><?php echo $n++;?></center></th>
                                  <td><center><img src="<?php echo $foto; ?>"  style="height: 30px!important;" class="img-fluid avatar rounded-circle"></center></td>
                                  <td><?php echo $datos['nombre']; ?></td>
                                  <td><?php echo $datos['apellido']; ?></td>
                                  <td><?php echo $datos['cedula_trabajador']; ?></td>
                                  <td><?php echo $datos['nombre_rol'];?></td>
                                  <td><?php echo $datos['correo'];?></td>
                                  
                                  <?php if(isset($operacionMU)){ ?> 
                                  <td>  
                                    <?php if($datos['cedula'] !== '0000'){ ?>
                                    <center>
                                    <button type="button" class="btn btn-primary pull-right" data-bs-toggle="modal"  data-bs-target="#modificar<?php echo $datos['idUsuario'];?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-border_color" style="font-size: 15px"></i></button>
                                    </center>
                                    <?php } ?>
                                  </td>
                                  <?php } ?>

                                  <!-- Modal modificar -->
                                  <div class="modal fade" id="modificar<?php echo $datos['idUsuario'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php require 'content/views/usuario/modificar.php'; ?> 
                                  </div>

                                  <?php if(isset($operacionEU)){ ?>
                                  <td> 

                                    <?php if($datos['cedula'] !== '0000'){ ?>
                                    <center>
                                    <button type="button" onclick="eliminar(<?php echo $datos['idUsuario'];?>);" class="btn btn-danger pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar"><i class="icon-delete" style="font-size: 15px"></i></button>
                                    <?php } ?>
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
     <?php require 'content/views/usuario/registrar.php'; ?> 
    </div>
    
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/usuario/ayuda.php'; ?> 
    </div>

    <?php $components->scripts(); ?>
    <?php 
          if (isset($estadoRegistro) && $estadoRegistro == true) {
            echo " <script>Swal.fire(
            '¡Registro Éxitoso!',
            'El usuario ha sido registrado con exito.',
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
            'El usuario ha sido actualizado con exito.',
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
            'El usuario ha sido eliminado con exito.',
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
    
    <script type="text/javascript">
         // Initialize the DataTable
        $(document).ready(function() {
      $('#tableID').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
        
      function confirmarModificar(){
              Swal.fire({
                title: '¿Deseas realmente modificar éste Usuario?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡actualizar!'
              }).then((result) => {
                if (result.isConfirmed) {

                  var form = $('#modificarUsuario');
                  form.submit(); 

                }
              })
            }
            function eliminarUsuario(url){
              Swal.fire({
                title: '¿Deseas realmente eliminar éste Usuario?',
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡eliminar!'
              }).then((result) => {
                if (result.isConfirmed) {

                  window.location=url;

                } else {

                  Swal.fire(
                      '¡Eliminación cancelada!',
                      'El Usuario ha sido salvado.',
                      'error'
                      )

                }
              })
            }
      $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

  </script>
  <script src="<?php echo _THEME_?>/js/AJAX/usuario.js"></script>


</body>

</html>