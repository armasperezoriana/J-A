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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de Operaciones</h2>
                <p class="" style="visibility: hidden;">Descargar registros</p>
                   
              </div>

              <div class="col-lg-3 d-flex" style="visibility: hidden;">
                
              </div>

            </div>
          </div>
        </section>

        <form action="?url=avanzada&opcion=actualizarOperaciones&idRol=<?php echo $idRol; ?>" name="as" id="as" method="POST">

        <section class="bg-grey" >
          <div class="container">
            <div class="row">

              

              <?php foreach ($modulos as $modals): ?>
 
              <div class="col-lg-4 my-2">
                <div class="card rounded-0">
                   
                    <table>

                                <thead>
                                  <tr>
                                   <th>

                                     <p> 
                                      <img src='<?php echo $modals['icono']; ?>' width='50' height='50' class="m-2" align="left"><h6 style="margin-top: 30px; margin-left: 60px">
                                        Operaciones <strong><?php echo $modals['nombre_modulo'];?></strong>
                                      </h6> 
                                    </p>
                                  </th>

                                  <th></th>
                                </tr>

                              </thead>
                            </table>

                            <table>

                              <?php foreach ($operaciones as $operacion){ if ($operacion['id_modulo'] == $modals['id_modulo']) { ?>
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th ><center><label>

                                      <input type="hidden" name="idRol" value="<?php echo $idRol;?>">

                                      <input  style="margin-left: 5px" type="checkbox" name="idOperacion[]" value="<?php echo $operacion['id_operacion'];?>" <?php foreach ($rolOperacion as $key){ if ($key['id_operacion'] == $operacion['id_operacion']) {
                                        echo 'checked';
                                      }} ?> /> 
                                      <span> </span>
                                    </label></center></th>
                                    <th><h6>
                                      <?php echo $operacion['nombre_operacion'] ?></h6></th>
                                      
                                    </tr>
                                  </thead>

                                <?php }} 

                                ?>
                 
                              </table> 

                  </div>    
                </div>

                <?php endforeach; ?>

            </div>

          </div>
    

        </section>

                <br><center>
                       <input type="button" onclick="actualizarPermisos();" value="GUARDAR CAMBIOS" class="btn btn-primary darken-3 btn-small">
                       <br><br>
                        <input type="button" onClick="document.location.href='?url=avanzada&opcion=rol'" value="VOLVER" class="btn btn-success darken-3 btn-small">
                   </center>
                <br>
              </form>

        </div>
    </div>
    

    <?php $components->scripts(); ?>

    <script src="<?php echo _THEME_?>/js/AJAX/avanzada.js"></script>
   
    <script type="text/javascript">

      function actualizarPermisos(){
              Swal.fire({
                title: "¿Desea realizar estos cambios?", 
                text: "¡No podrás revertir éste paso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡actualizar!'
              }).then((result) => {
                if (result.isConfirmed) {

                  var form = $('#as');
                  form.submit(); 

                }
              })
            }
    </script>

    <?php 

      if (isset($_GET["actO"]) && $_GET["actO"] == "true") {
            echo " <script>Swal.fire(
            '¡Excelente!',
            'Las operaciones han sido agregadas con éxito.',
            'success'
            )</script>
            ";

          }

    ?>
</body>

</html>