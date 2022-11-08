
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
              <label for="cedula_trabajador">Trabajador encargado:</label>
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-person_outline"></i></span>
                <select class="form-control" id="cedula_trabajador" name="cedula_trabajador">
                  <?php foreach ($consultarTrabajadores as $trabajador) {
                        echo "<option value='".$trabajador['cedula']."'>".$trabajador['nombre'].' '.$trabajador['apellido'].' - '. $trabajador['cedula']."</option>";
                  } ?> 
                </select>         
              </div>
              <div class="form-group">
                <label for="descripcion_trabajo">Descripcion del trabajo</label>
                <textarea maxlength="210" class="form-control" name="descripcion_trabajo" id="id_descripcion_trabajo" rows="1" placeholder="Ingrese la descripcion del trabajo en general asi como el area o ubicacion de donde se realizó"></textarea>
              </div>
              

            <div class="form-group">
              <label for="fecha_trabajo">Fecha del trabajo:</label>
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
                <input type="date" class="form-control" name="fecha_trabajo" id="id_fecha_trabajo">
              </div>
            </div>
          
            <div class="form-group">
                <label for="descripcion">Descripcion detallada:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-list"></i></span>
                  <input type="text" name="descripcion" id="id_descripcion" maxlength="50" class="form-control" placeholder="Solos carácteres alfanumérico" aria-describedby="addon-wrapping">
                </div>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-format_list_numbered"></i></span>
                  <input type="number" name="cantidad" id="id_cantidad" class="form-control" placeholder="Solos carácteres numericos" aria-describedby="addon-wrapping">
                </div>
            </div>
            <div class="form-group">
                <label for="total_unidad">Pago por unidad $:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-attach_money"></i></span>
                  <input type="number" name="total_unidad" id="id_total_unidad" class="form-control" placeholder="Solos carácteres numericos" aria-describedby="addon-wrapping" step=".01">
                </div>
            </div>
            <div class="form-group">
              <label for="fecha_pago">Fecha del pago:</label>
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
                <input type="date" class="form-control" name="fecha_pago" id="id_fecha_pago">
              </div>
            </div>
            <label for="tipo_pago">Metodo de pago: </label>
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class=" icon-switch_camera"></i></span>
                <select class="form-control" id="id_tipo_pago" name="tipo_pago">
                 <option value="Efectivo">Efectivo</option>
                 <option value="Transferencia">Transferencia</option>
                </select>
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
    