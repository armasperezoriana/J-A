<!doctype html>
  <html lang="en">

  <head>
    <?php $components->head(); ?>
     <style type="text/css">

     td {

       padding: 5px!important;
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

              <div class="col-lg-8 d-flex">
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Notificaciones</h2>
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
                  
                  <div class="card-body pt-2">

                     <div class="container">    

                   <!-- Gmail Header Starts here -->

                        <div class="row">

                          <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"> 
                            
                            <table class="highlight">

                              <tbody>    

                                <tr onClick="document.location.href='?url=notificaciones'">

                                  <td class="d-grid gap-2">
                                   <button class="btn btn-success" type="button">
                                      <i class="icon-markunread prefix"></i> Mensajes
                                   </button>
                                  </td>

                                </tr>
 
                                <tr onClick="document.location.href='?url=notificaciones&opcion=mensajesEnviados'">

                                  <td class="d-grid gap-2">
                                   <button class="btn btn-danger" type="button">
                                      <i class="icon-send prefix"></i> Enviados 
                                   </button>
                                  </td>

                                </tr>

                                <tr onClick="document.location.href='?url=notificaciones&opcion=favoritos'">

                                  <td class="d-grid gap-2">
                                   <button class="btn btn-info" type="button">
                                      <i class="icon-star prefix"></i> Favoritos
                                   </button>
                                  </td>

                                </tr>

                                <tr onClick="document.location.href='?url=notificaciones&opcion=archivados'">

                                  <td class="d-grid gap-2">
                                   <button class="btn btn-warning" type="button" style="color: white;">
                                      <i class="icon-archive prefix"></i> Archivados
                                   </button>
                                  </td>

                                </tr>

                              </tbody>

                            </table>

                          </div>

                          <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"> 
                            <div role="tabpanel">

                                <div class="tab-content">
                                  <div role="tabpanel" class="tab-pane active" id="home">
                                                             
                                    <div style="margin-top: 2%; margin-left: 40px; margin-right: 40px"> 
                                      <?php foreach($consultarMensaje as $msj){ 

                                          $f = $msj['fecha']; 
                                              $Mensajefecha = date('Y-m-d',strtotime($f));    
                                              $Mensajehora = date('H:i:s',strtotime($f));

                                              if(empty($msj['foto'])){

                                                  $foto = "assets/img/user4.png";
                                                
                                                }else{

                                                  $foto = $msj["foto"];
                                                }

                                      ?>
                                      <div>
                                        <div class="row">

                                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-top: 5%;">
                                            <img src="<?php echo $foto; ?>" alt="user" width="60" style="width: 60px;  height: 60px;" class="rounded-circle" />
                                            </div>

                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 p-2">
                                              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                  
                                                  <?php if(isset($nickname)){ ?>
                                                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="icon-assignment" style="color: white;"></i>
                                                  </button>
                                                  <?php } ?>

                                            </div>
                                            <h6><?php echo $msj["nombre"]." ".$msj["apellido"]; ?></h6>
                                            <label >Correo: <?php echo $msj["correo"]; ?></label>

                                            </div>

                                          </div>

                                          <div class="row">
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <!-- Button trigger modal -->
                                             
                                                <!-- Modal -->
                                                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="staticBackdropLabel">Perfil de <?php echo $msj["nombre"]." ".$msj["apellido"]; ?></h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          
                                                          <form id="formulario" action="" method="POST">

                                                            <center>
                                                              
                                                              <img src="<?php echo $foto; ?>" alt="user" width="60" style="width: 60px;  height: 60px;" class="rounded-circle" />
                                                              <br><br>
                                                            </center>
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="icon-payment"></i></span>
                                                                    <input type="text" class="form-control" value="<?php echo $msj["cedula"]; ?>" disabled>
                                                                  </div>

                                                                  <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="icon-mail_outline"></i></span>
                                                                    <input type="text" class="form-control"  value="<?php echo $msj["correo"]; ?>" disabled>
                                                                  </div>

                                                                  <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="icon-phone_android"></i></span>
                                                                    <input type="text" class="form-control"  value="<?php echo $msj["t_celular"].$msj["celular"]; ?>" disabled>
                                                                  </div>

                                                                  <label for="basic-url" class="form-label">Cargo</label>
                                                                  <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="<?php echo $msj["nombre_cargo"]; ?>" disabled>
                                                                  </div>

                                                                  <label for="basic-url" class="form-label">fecha de nacimiento</label>
                                                                  <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="<?php echo $msj["fecha_nacimiento"]; ?>" disabled>
                                                                  </div>

                                                                  <label for="basic-url" class="form-label">fecha de ingreso</label>
                                                                  <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="<?php echo $msj["fecha_ingreso"]; ?>" disabled>
                                                                  </div>

                                                                  <?php if($_SESSION["rol"] == 1 || $_SESSION["rol"] == 2){  ?>

                                                                  <div class="input-group">
                                                                    <span class="input-group-text">Firma digital</span>
                                                                    <input type="text" id="firma" class="form-control" aria-label="With textarea" onkeypress="return check(event)" value="<?php echo $nickname;?>">
                                                                    <input id="firm" type="button" class="copy" value="Copiar">
                                                                  </div>
                                                                  <br>

                                                                 <?php } if($_SESSION["rol"] == 1){ ?>
                                                                  <div class="input-group">
                                                                    <span class="input-group-text">Llave privada</span>
                                                                    <textarea id="keyPrivada" class="form-control" aria-label="With textarea" onkeypress="return check(event)"><?php echo $privKey;?></textarea>
                                                                    <input id="priv" type="button" class="copy" value="Copiar">
                                                                  </div>
                                                                  <br>

                                                                  <?php } ?>
                                                                  
                                                                  <div class="input-group">
                                                                    <span class="input-group-text">Llave pública</span>
                                                                    <textarea id="keyPublica" class="form-control" aria-label="With textarea" onkeypress="return check(event)"><?php echo $pubKey;?></textarea>
                                                                    <input id="pub" type="button" class="copy" value="Copiar">
                                                                  </div>
                                                            
                                                            </form>
 
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                          </div>


                
                                           <hr>
                                        <p><b><?php echo $msj["asunto"]; 

                                              ?></b></p>
                                        <p><?php 

                                        if ($_SESSION['rol'] != 1 && $emptyMsj = false) {
                                          
                                            echo 'El mensaje a sido decifrado, falta esperar por la aprobación del usuario superior.';

                                        } else { 

                                        echo $textoMsj;

                                       }

                                       if ($msj["tipo"] == 4) {
                                            
                                             echo '<center><button class="btn btn-danger" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Descifrar</button></center>';

                                        }

                                        if ($msj["tipo"] == 6 && $_SESSION['rol'] == 1) {
                                            
                                             echo "<center>

                                                            <a type='button' data-bs-toggle='modal' href='#desbloquear' class='btn btn-success'><i class='icon-check'></i></a> 

                                                            <a type='button' href='?url=notificaciones&opcion=declinarEmail&idMensaje=".base64_encode($msj["idNotificacion"])."' class='btn btn-danger'><i class='icon-close'></i></a> 

                                                    </center>";

                                        }


                                         ?></p>

                                         <div class="modal fade" id="desbloquear" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Verificación de llaves</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $idMensaje;?>" method="POST">
                                                     <label for="basic-url" class="form-label"> Por favor, ingrese la llave privada del usuario bloqueado.</label>
                      
                                                    <div class="input-group">                                                        
                                                        <span class="input-group-text">Llave privada</span>
                                                        <input type="text" onkeypress="return check(event)" id="llaveIngresada" name="llaveIngresada" class="form-control" aria-label="With textarea" autocomplete="off">                                                              
                                                    </div>
                                                    <br>

                                                </div>
                                                <div class="modal-footer">
                                                 <button type="submit" class="btn btn-success">Desbloquear</button>
                                                 <form>
                                                </div>
                                              </div>
                                            </div>
                                          </div> 

                                         <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalToggleLabel">Verificación del usuario bloqueado</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <form action="?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $idMensaje;?>" method="POST">
                                                     <label for="basic-url" class="form-label"> Por favor, copie y pegue la firma digital del usuario bloqueado.</label>
                                                
                                                    <div class="input-group">                                                        
                                                        <span class="input-group-text">Firma digital</span>
                                                        <input type="text" id="firmaIngresada" onkeypress="return check(event)" name="firmaIngresada" class="form-control" aria-label="With textarea" autocomplete="off">                                                              
                                                    </div>
                                                    <br>

                                                </div>
                                                <div class="modal-footer">
                                                 <button type="submit" class="btn btn-success">Descifrar</button>
                                                 <form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>                                                                                   


                                         <label style="height:auto; margin-top: 15px; margin-left: -28px; float:right;">El <?php echo $Mensajefecha;?> a las <?php echo $Mensajehora;?></label><br>
                                      </div>

                                      <?php  } ?>
                                    </div>
                                  </div>

                                  <div role="tabpanel" class="tab-pane" id="settings">
                                  </div>
                                </div>
                            </div>                                      
                                                        
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>

              <div class="col-lg-4 my-3">
                  <br><br><br>
              </div>

            </div>

          </div>
    

        </section>

        </div>
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

          } 

          if (isset($luismiguel) && $luismiguel == 'firmaY') {
            echo " <script>Swal.fire(
            '¡Desbloqueo Éxitoso!',
            'El usuario ha sido desbloqueado con exito.',
            'success'
            )</script>
            ";

          } 

          if (isset($luismiguel) && $luismiguel == 'firmaX') {
            echo " <script>Swal.fire(
            '¡Lo lamentamos!',
            'La llave privada ingresada no es la correcta.',
            'error'
            )</script>
            ";

          } 

          if (isset($declinado) && $declinado == "usuarioDeclinado") {
            echo " <script>Swal.fire(
            '¡Usuario declinado!',
            'El usuario ha sido bloqueado por completo dentro del sistema.',
            'success'
            )</script>
            ";

          } 

          if (isset($envioEmail) && $envioEmail == true) {
            echo " <script>Swal.fire(
            '¡Envío exitoso!',
            'La llave de seguridad ha sido enviada correctamente al correo del usuario.',
            'success'
            )</script>
            ";

          }

          if (isset($envioEmail) && $envioEmail == false) {
            echo " <script>Swal.fire(
            '¡Oppss..!',
            'Lo lamentamos, ocurrió un error durante el envío, por favor, revise su conexión y vuelva a intentar.',
            'error'
            )</script>
            ";

          }

          if (isset($estadoRegistro) && $estadoRegistro == false) {

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

          if (isset($mensajeD) && $mensajeD == 'mensajeD') {

             echo "<script>

                        Swal.fire(
                              '¡Mensaje descifrado!',
                              'La firma del usuario bloqueado coincide')

                       </script>";

              $mensajeD = null;

          }

          if (isset($mensajeD) && $mensajeD == 'mensajeND') {

             echo "<script>

                        Swal.fire(
                              '¡Error...!',
                              'La firma del usuario bloqueado no coincide')

                       </script>";

              $mensajeD = null;

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

  <script type="text/javascript">
    var button = document.getElementById("priv"),
        input = document.getElementById("keyPrivada");
 
    button.addEventListener("click", function(event) {
        event.preventDefault();
        input.select();
        document.execCommand("priv");
    });
</script>


<script type="text/javascript">
    var button2 = document.getElementById("pub"),
        input2 = document.getElementById("keyPublica");
 
    button2.addEventListener("click", function(event) {
        event.preventDefault();
        input2.select();
        document.execCommand("pub");
    });
</script>

<script type="text/javascript">
    var button2 = document.getElementById("privForm"),
        input2 = document.getElementById("privadaConsulta");
 
    button2.addEventListener("click", function(event) {
        event.preventDefault();
        input2.select();
        document.execCommand("privForm");
    });
</script>

<script>
document.querySelectorAll(".copy").forEach(el => el.addEventListener("click", copy));
 
function copy(e) {
    // obtenemos el input
    const input = this.previousElementSibling;
 
    // Selecciona el contenido del campo
    input.select();
 
    // Copia el texto seleccionado
    document.execCommand("copy");
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Texto copiado',
      showConfirmButton: false,
      timer: 1000
    })
}

              function check(e) {
                        tecla = (document.all) ? e.keyCode : e.which;

                        //Tecla de retroceso para borrar, siempre la permite
                        if (tecla == 8) {
                            return true;
                        }

                        // Patrón de entrada, en este caso solo acepta numeros y letras
                        patron = /^\S/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                    } 
</script>


</body>

</html>