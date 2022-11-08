
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar rol</h5>
            <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"><span class="mensajes"></span></div>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          <div class="modal-body">
            <form id="formularioRol" name="formularioRol" method="POST">
 
              <div class="form-group">
                <label for="contrasena">Nombre Rol:</label>
                <div class="input-group flex-nowrap">
                <input type="text" class="form-control" name="rol" id="rol" maxlength="32">
                </div>
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlSelect1">Estado:</label>
                <select class="form-control" id="estado" name="estado">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>

              <br>
                <center><button type="submit" id="submit" class="btn btn-success">Registrar</button></center>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

              </div>
            </div>
          </div>
        