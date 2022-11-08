
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
            <form class="formulario_registrar" id="formulario" action="" method="POST">
              <div class="form-group">
                <label for="nombre_cargo">Nombre del cargo:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-assignment"></i></span>
                  <input type="text" name="nombre_cargo" id="nombre_cargo" class="form-control" placeholder="Solos carácteres alfabéticos" aria-label="Solo carácteres numericos" aria-describedby="addon-wrapping" maxlength="30">
                </div>
              </div>
              <div class="form-group">
                <label for="sueldo_semanal">Sueldo semanal:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-monetization_on"></i></span>
                  <input type="number" name="sueldo_semanal" id="sueldo_sem" class="form-control" placeholder="Solos carácteres numéricos" aria-label="Solo carácteres alfabéticos" aria-describedby="addon-wrapping" step=".01">
                </div>
              </div>
              <div class="form-group">
                <label for="prima_hogar">Prima por hogar:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-monetization_on"></i></span>
                  <input type="number" name="prima_hogar" id="prima_hogar" class="form-control" placeholder="Solos carácteres numéricos" aria-label="Solo carácteres alfabéticos" aria-describedby="addon-wrapping" step=".01">
                </div>
              </div>
          <br>
            <center><button type="submit" id="submit" value="agregar" class="btn btn-success">Registrar</button></center>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    