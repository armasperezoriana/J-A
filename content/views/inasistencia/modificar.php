
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
              <input type="hidden" name="id_permiso" id="id_permiso" value="<?php echo $datos['id_permiso'];?>"  style="visibility:hidden">
              <label for="cedula_trabajador">Trabajador:</label>
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-person_outline"></i></span>
                <select class="form-control" id="cedula_trabajador" name="cedula_trabajador">
                <option value="<?php echo $datos['cedula_trabajador'];?>"><?php echo $datos['nombre'].' '. $datos['apellido'].' - '. $datos['cedula_trabajador'] ?></option>
                  <?php foreach ($consultarTrabajadores as $trabajador) {
                       if ($trabajador['cedula'] != $datos['cedula_trabajador']) {
                        echo "<option value='".$trabajador['cedula']."'>".$trabajador['nombre'].' '.$trabajador['apellido'].' - '. $trabajador['cedula']."</option>";
                        }
                  } ?> 
                </select>         
              </div>
              <label for="descripcion">Descripcion de la inasistencia: </label>
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-priority_high"></i></span>
                <select class="form-control" id="descripcion" name="descripcion">
                <option value="<?php echo $datos['descripcion'];?>"><?php echo $datos['descripcion'];?></option>
                 <option value="Falta">Falta</option>
                 <option value="Permiso">Permiso</option>
                 <option value="Reposo">Reposo</option>
                </select>
              </div>
              <div class="form-group">
            <label for="periodo_desde">Desde:</label>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
            <input type="date" class="form-control" name="periodo_desde" id="periodo_desde" value="<?php echo date("Y-m-d", strtotime($datos['desde']));?>">
            </div>
          </div>
          <div class="form-group">
            <label for="periodo_hasta">Hasta:</label>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
            <input type="date" class="form-control" name="periodo_hasta" id="periodo_hasta" value="<?php echo date("Y-m-d", strtotime($datos['hasta']));?>">
            </div>
          </div>
          <br>
            <center><button type="submit" id="submit" value="agregar" class="btn btn-success">Modificar</button></center>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    