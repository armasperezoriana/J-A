
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
              <input type="text" name="id_cargo" id="id_cargo" value="<?php echo $datos['id_cargo'];?>"  style="visibility:hidden">
              <div class="form-group">
                <label for="nombre_cargo_modificar">Nombre del cargo:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-payment"></i></span>
                  <input value="<?php echo $datos['nombre_cargo'];?>" type="text" name="nombre_cargo_modificar" id="nombre_cargo_modificar" class="form-control" placeholder="Solos carácteres alfabéticos" aria-describedby="addon-wrapping" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="sueldo_semanal">Sueldo semanal:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-monetization_on"></i></span>
                  <input value="<?php echo $datos['sueldo_semanal'];?>" type="number" name="sueldo_semanal" id="sueldo_semanal" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping" step=".01">
                </div>
              </div>
              <div class="form-group">
                <label for="prima_hogar">Prima por hogar:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-monetization_on"></i></span>
                  <input value="<?php echo $datos['prima_por_hogar'];?>" type="number" name="prima_hogar" id="prima_hogar" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping" step=".01">
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
    