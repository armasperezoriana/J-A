
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Complete los campos</h5>
            <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"> <span class="mensajes"></span></div>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="formulario_modificar" id="formulario" action="" method="POST">
              <input type="text" name="id_rol" id="id_rol" value="<?php echo $datos['id_rol'];?>"  style="visibility:hidden">
              <div class="form-group">
                <label for="nombre_rol">Nombre del rol:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-payment"></i></span>
                  <input value="<?php echo $datos['nombre_rol'];?>" type="text" name="nombre_rol" id="nombre_rol" class="form-control" placeholder="Solos carácteres alfabéticos" aria-describedby="addon-wrapping">
                </div>
              </div>
          <br>
            <center><button type="submit" id="submit_modificar" value="modificar" class="btn btn-success">Modificar</button></center>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    