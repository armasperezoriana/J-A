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
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                      <div style="margin-top: 8px;" class="d-grid gap-2">

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#redactar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar Usuario">Redactar</button>

                      </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                      <div class="float-right" style="margin-top: 8px;" class="d-grid gap-2">

                       <form action="?url=notificaciones&opcion=eliminarMsj&ruta=inicio" method="POST" id="eliminarMsj" name="eliminarMsj"> 

                        <a href="#" onclick="document.getElementById('eliminarMsj').action='?url=notificaciones&opcion=actualizarArchivar&ruta=inicioBuzon.php'; document.eliminarMsj.submit();" data-position="bottom" data-tooltip="Archivar mensajes seleccionados" class="btn btn-warning pull-right" style="border-radius: 3em;"><i class="icon-archive prefix"></i></a>

                        <a href="#" onclick="eliminarMensajes();" data-position="bottom" data-tooltip="Eliminar mensajes seleccionados" class="btn btn-danger pull-right" style="border-radius: 3em;"><i class="icon-delete prefix"></i></a>

                        <a href="?url=notificaciones" data-position="bottom" data-tooltip="Actualizar buzón" class="btn btn-success pull-right" style="border-radius: 3em;"><i class="icon-refresh prefix"></i></a>

                      </div>
                    </div> 

                  </div>

                  <hr>
                  <div class="row">

                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3"> 

                      <table class="highlight">

                        <tbody>    

                          <tr>

                            <td class="d-grid gap-2">
                             <button class="btn btn-success" type="button" disabled>
                              <i class="icon-markunread prefix"></i> Mensajes<span class="badge">4</span>
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

                    <table class="table table-hover">
                      <tbody>


                        <?php if(!empty($consultarBuzon)){  foreach ($consultarBuzon as $buzon) { 

                          if($buzon["leido"] == 0){  

                            $f = $buzon['fecha']; 
                            $Mensajefecha = date('Y-m-d',strtotime($f));    
                            $Mensajehora = date('H:i:s',strtotime($f));

                            if(empty($buzon['foto'])){

                              $foto = "assets/img/user4.png";

                            }else{

                              $foto = $buzon["foto"];
                            }

                            ?>
                            <tr <?php if($buzon["leido"]=='1'){ ?> style="background: #EEEEEE;" <?php } ?> >
                              <td scope="row"><input  style="cursor: pointer;" type="checkbox" name="id_delete[]" class="id_delete" value="<?php echo $buzon['idNotificacion'];?>" /></td>

                              <?php if($buzon["favorito"] == "0"){ ?>

                                <td><i type="button"  onClick="document.location.href='?url=notificaciones&opcion=actualizarFavorito&idMensaje=<?php echo $buzon["idNotificacion"];?>&ruta=inicioBuzon.php&setFav=1'" class="waves-effect waves-block waves-light icon-star_border"></i></td>

                              <?php }else { ?>

                                <td><i type="button" onClick="document.location.href='?url=notificaciones&opcion=actualizarFavorito&idMensaje=<?php echo $buzon["idNotificacion"];?>&ruta=inicioBuzon.php&setFav=0'"  class="waves-effect waves-block waves-light icon-star"></i></td>
                              <?php } ?>

                              <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><img class="img-fluid avatar rounded-circle" src="<?php echo $foto;?>" style="width: 30px; height: 30px;"></td>

                              <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><?php if($buzon["leido"]=='1'){ echo $buzon["nombre"]." ".$buzon["apellido"]; } else {  echo "<b>".$buzon["nombre"]." ".$buzon["apellido"]."</b>"; } ?></td>

                              <?php $resultado = $buzon['mensaje'];

                              $resultado = substr($resultado, 0, 18); 
                              $n_s = strlen($resultado);

                              if ($n_s > 15) {

                                $resultado = $resultado."..";

                              } 

                              if (strlen($buzon["asunto"]) > 20 ) {

                                $resultado= substr($resultado, 0, 8); 
                                $resultado = $resultado."..";

                              } 

                              ?>

                              <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><?php if($buzon["leido"]=='1'){ echo $buzon["asunto"]." - ".$resultado; } else{  echo "<b>".$buzon["asunto"]."</b> - ".$resultado; } ?></td>

                              <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"> <i class="icon-hourglass_empty"> </i> </td>

                              <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><?php if ($Mensajefecha == $_SESSION['date']) { echo  "Hoy a las ".$Mensajehora; } else { echo "El ".$Mensajefecha." a las ".$Mensajehora;} ?></td>

                            </tr>
                          <?php  } } } else { echo "<center> No hay mensajes en su buzon </center>"; } ?>

                          <?php if(!empty($consultarBuzon)){  foreach ($consultarBuzon as $buzon) { 

                            if($buzon["leido"] == 1){  

                              $f = $buzon['fecha']; 
                              $Mensajefecha = date('Y-m-d',strtotime($f));    
                              $Mensajehora = date('H:i:s',strtotime($f));

                              if(empty($buzon['foto'])){

                                $foto = "assets/img/user4.png";

                              }else{

                                $foto = $buzon["foto"];
                              }

                              ?>
                              <tr <?php if($buzon["leido"]=='1'){ ?> style="background: #EEEEEE;" <?php } ?> >
                                <td scope="row"><input  style="cursor: pointer;" type="checkbox" name="id_delete[]" class="id_delete" value="<?php echo $buzon['idNotificacion'];?>" /></td>

                                <?php if($buzon["favorito"] == "0"){ ?>

                                  <td><i type="button"  onClick="document.location.href='?url=notificaciones&opcion=actualizarFavorito&idMensaje=<?php echo $buzon["idNotificacion"];?>&ruta=inicioBuzon.php&setFav=1'" class="waves-effect waves-block waves-light icon-star_border"></i></td>

                                <?php }else { ?>

                                  <td><i type="button" onClick="document.location.href='?url=notificaciones&opcion=actualizarFavorito&idMensaje=<?php echo $buzon["idNotificacion"];?>&ruta=inicioBuzon.php&setFav=0'"  class="waves-effect waves-block waves-light icon-star"></i></td>
                                <?php } ?>

                                <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><img class="img-fluid avatar rounded-circle" src="<?php echo $foto;?>" style="width: 30px; height: 30px;"></td>

                                <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><?php if($buzon["leido"]=='1'){ echo $buzon["nombre"]." ".$buzon["apellido"]; } else {  echo "<b>".$buzon["nombre"]." ".$buzon["apellido"]."</b>"; } ?></td>

                                <?php $resultado = $buzon['mensaje'];

                                $resultado= substr($resultado, 0, 18); 
                                $n_s = strlen($resultado);

                                if ($n_s > 15) {

                                  $resultado = $resultado."..";

                                } 

                                if (strlen($buzon["asunto"]) > 20 ) {

                                  $resultado= substr($resultado, 0, 8); 
                                  $resultado = $resultado."..";

                                } 

                                ?>



                                <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><?php if($buzon["leido"]=='1'){ echo $buzon["asunto"]."</b> - ".$resultado; } else{  echo "<b>".$buzon["asunto"]."</b> - ".$resultado; } ?></td>

                                <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"> <i class="icon-hourglass_empty"> </i> </td>

                                <td style="cursor: pointer;" onClick="document.location.href='?url=notificaciones&opcion=verMensajeBuzon&idMensaje=<?php echo $buzon["idNotificacion"];?>&direc=imbox&view=1'"><?php if ($Mensajefecha == $_SESSION['date']) { echo  "Hoy a las ".$Mensajehora; } else { echo "El ".$Mensajefecha." a las ".$Mensajehora;} ?></td>

                              </tr>
                            <?php  } } } ?>

                          </tbody>
                        </table>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="settings">
                      </div>
                    </div>
                  </div>

                </form>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</div>


</section>

</div>
</div>

<!-- Modal Registrar -->
<div class="modal fade" id="redactar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <?php require 'content/views/notificaciones/redactar.php'; ?> 
</div>


<?php $components->scripts(); ?>

<script src="<?php echo _THEME_?>/js/AJAX/notificaciones.js"></script>


<script type="text/javascript">

  function eliminarMensajes(url){
    Swal.fire({
      title: '¿Realmente desea eliminar los mensajes seleccionados?',
      text: "¡No podrás revertir éste paso!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, ¡eliminar!'
    }).then((result) => {
      if (result.isConfirmed) {

        Swal.fire(
          '¡Excelente!',
          'El mensaje se ha eliminado correctamente',
          'success'
          ).then(() => {
                            // Aquí la alerta se ha cerrado
                            var form = $('#eliminarMsj');
                            form.submit(); 
                          });

        } else {

          Swal.fire(
            '¡Eliminación cancelada!',
            'No se han eliminado los mensajes',
            'error'
            )

        }
      })
  }

</script>

<?php 

if (isset($actArchivar) && $actArchivar == "true") {

 echo " <script>Swal.fire(
 '¡Excelente!',
 'Su mensaje ha sido archivado correctamente.',
 'success'
 )</script>
 ";

}

if (isset($_GET['mensajeD']) && $_GET['mensajeD'] == "true") {

 echo " <script>Swal.fire(
 '¡Excelente!',
 'El mensaje ha sido descifrado y mandado al usuario superior para la aprobación o declinación del mismo.',
 'success'
 )</script>
 ";

}



?>


</body>

</html>