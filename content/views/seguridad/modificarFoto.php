
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Datos del usuario <?php echo $_SESSION['nombre']. ' ' . $_SESSION['apellido'];?></h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     <form method="POST" id="perfil" name="perfil" action="?url=seguridad&opcion=actualizarFoto" enctype="multipart/form-data">
      <div class="row"> 

        <div>
         
          <center>
            <div id="preview"> <img src="<?php if(!empty($_SESSION['foto'])){ echo $_SESSION['foto'];} else{ echo 'assets/img/user3.png';} ?>" class="img-circle" width="150" /></div>
            <label>Subir imagen</label><br>
            <input type="file" class="form-control" id="foto_perfil" name="foto_perfil" style="color: transparent;" accept="image/jpeg,image/jpg,image/png" required>
          </center>

          <script type="text/javascript">
            document.getElementById("foto_perfil").onchange = function(e) {
                                // Creamos el objeto de la clase FileReader
                                let reader = new FileReader();

                                // Leemos el archivo subido y se lo pasamos a nuestro fileReader
                                reader.readAsDataURL(e.target.files[0]);

                                // Le decimos que cuando este listo ejecute el código interno
                                reader.onload = function(){
                                  let preview = document.getElementById('preview'),
                                  image = document.createElement('img');

                                  image.src = reader.result;

                                  $("#preview").html('<img  class="img-circle" width="150" height="150" src="'+ image.src +'" >');
                                };
                              } 
                            </script>
                          </div>

                        </div>

                        <center>
                          <br>
                          <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Guardar</button>
                        </center>

                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
