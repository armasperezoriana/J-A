
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
              <label for="cedula_trabajador">Trabajador:</label>
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-person_outline"></i></span>
                <select class="form-control" id="cedula_trabajador" name="cedula_trabajador">
                  <?php foreach ($consultarTrabajadores as $trabajador) {
                        echo "<option value='".$trabajador['cedula']."'>".$trabajador['nombre'].' '.$trabajador['apellido'].' - '. $trabajador['cedula']."</option>";
                  } ?> 
                </select>         
              </div>
              <label for="descripcion">Descripcion de la inasistencia: </label>
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-priority_high"></i></span>
                <select class="form-control" id="descripcion" name="descripcion">
                 <option value="Falta">Falta</option>
                 <option value="Permiso">Permiso</option>
                 <option value="Reposo">Reposo</option>
                </select>
              </div>
              <div class="form-group">
            <label for="periodo_desde">Desde:</label>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
            <input type="date" class="form-control" name="periodo_desde" id="periodo_desde">
            </div>
          </div>
          <div class="form-group">
            <label for="periodo_hasta">Hasta:</label>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
            <input type="date" class="form-control" name="periodo_hasta" id="periodo_hasta">
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
    