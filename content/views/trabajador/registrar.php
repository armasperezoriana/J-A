
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
            <form class="formulario_registrar" action="" method="POST">
              <div class="form-group">
                <label for="cedula">Cedula:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-payment"></i></span>
                  <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Solos carácteres numéricos" aria-label="Solo carácteres numericos" aria-describedby="addon-wrapping">
                </div>
              </div>
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-person"></i></span>
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Solos carácteres alfabéticos" aria-label="Solo carácteres alfabéticos" aria-describedby="addon-wrapping" maxlength="30">
                </div>
              </div>
              <div class="form-group">
                <label for="apellido">Apellido:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-person"></i></span>
                  <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Solos carácteres alfabéticos" aria-label="Solo carácteres alfabéticos" aria-describedby="addon-wrapping" maxlength="30">
                </div>
              </div>

              <div class="form-group">
                <label for="correo">Correo electronico:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-mail_outline"></i></span>
                  <input type="text" name="correo" id="correo" class="form-control" placeholder="ejemplo@gmail.com" aria-label="Solo carácteres alfabéticos" aria-describedby="addon-wrapping" maxlength="50">
                </div>
              </div>
              
                <label for="t_celular">Celular: </label>
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-phone_android"></i></span>
                <select class="form-control" id="t_celular" name="t_celular">
                 <option value="0412">0412</option>
                 <option value="0414">0414</option>
                 <option value="0424">0424</option>
                 <option value="0416">0416</option>
                 <option value="0426">0426</option>
                </select>
                <input type="number" class="form-control" name="celular" id="celular" maxlength="10">
              </div>
              <label for="cargo">Cargo:</label>
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-people"></i></span>
                <select class="form-control" id="cargo" name="cargo">
                  <?php foreach ($consultaCargos as $cargo) {
                        echo "<option value='".$cargo['id_cargo']."'>".$cargo['nombre_cargo']."</option>";
                  } ?> 
                </select>         
              </div>
          <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
            </div>
          </div>
          <div class="form-group">
            <label for="fecha_ingreso">Fecha de ingreso:</label>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
            <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso">
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
    