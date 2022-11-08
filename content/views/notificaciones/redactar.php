
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enviar mensaje</h5>
            <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"><span class="mensajes"></span></div>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formularioEnviar" name="formularioEnviar" method="POST">
 
              <div class="form-group">
                <label for="exampleFormControlSelect1">Para:</label>
                <select class="form-control" id="idReceptor" name="idReceptor">
                  <?php foreach ($consultarUsuarios as $usuarios) {
                        //  if($usuarios["idUsuario"] != $_SESSION['idUsuario']){ 
                        echo "<option value='".$usuarios['idUsuario']."'>".$usuarios['nombre'].' '. $usuarios['apellido']."</option>";
                 // } 
                } ?>  
                </select>
              </div>

          <div class="form-group">
            <label for="contrasena">Asunto:</label>
            <div class="input-group flex-nowrap">
            <input type="text" class="form-control" name="asunto" id="asunto" maxlength="32">
            </div>
          </div>
          <div class="form-group">
            <label for="contrasena2">Mensaje:</label>
            <div class="input-group flex-nowrap">
            <textarea class="form-control" name="msj" id="msj" placeholder="Ingrese su mensaje" maxlength="1000"></textarea></div>
          </div>
          <br>
            <center><button type="submit" class="btn btn-success">Enviar</button></center>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    