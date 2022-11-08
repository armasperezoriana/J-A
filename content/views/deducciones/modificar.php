
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
              <input type="text" name="id_deducciones" id="id_deducciones" value="<?php echo $datos['id_deducciones'];?>"  style="visibility:hidden">
              <div class="form-group">
                <label for="ivss">IVSS:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping">%</span>
                  <input value="<?php echo $datos['ivss'];?>" type="number" name="ivss" id="ivss" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping" step=".01">
                </div>
              </div>
              <div class="form-group">
                <label for="rpe">RPE:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping">%</span>
                  <input value="<?php echo $datos['rpe'];?>" type="number" name="rpe" id="rpe" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping" step=".01">
                </div>
              </div>
              <div class="form-group">
                <label for="faov">FAOV:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping">%</span>
                  <input value="<?php echo $datos['faov'];?>" type="number" name="faov" id="faov" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping" step=".01">
                </div>
              </div>
              <div class="form-group">
                <label for="inces">INCES:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping">%</i></span>
                  <input value="<?php echo $datos['inces'];?>" type="number" name="inces" id="inces" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping" step=".01">
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
    