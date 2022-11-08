
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
              <input type="hidden" name="id_nomina" id="id_nomina" value="<?php echo $datos['id_nomina'];?>"  style="visibility:hidden">
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

              <div class="form-group">
                <label for="periodo_desde">Periodo desde:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
                <input value="<?php echo date("Y-m-d", strtotime($datos['periodo_desde']));?>" type="date" class="form-control" name="periodo_desde" id="id_periodo_desde">
                </div>
              </div>
              <div class="form-group">
                <label for="periodo_hasta">Periodo hasta:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
                <input value="<?php echo date("Y-m-d", strtotime($datos['periodo_hasta']));?>" type="date" class="form-control" name="periodo_hasta" id="id_periodo_hasta">
                </div>
              </div>
              <div class="form-group">
                <label for="horas_extras">Horas extras:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-schedule"></i></span>
                  <input value="<?php echo $datos['horas_extras'];?>" type="number" name="horas_extras" id="horas_extras" class="form-control" placeholder="Solos carácteres numéricos" aria-describedby="addon-wrapping">
                </div>
              </div>
              <label for="tipo_pago">Metodo de pago: </label>
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class=" icon-switch_camera"></i></span>
                <select class="form-control" id="id_tipo_pago" name="tipo_pago">
                  <option value="<?php echo $datos['tipo_pago'];?>"><?php echo $datos['tipo_pago'];?></option>
                 <option value="Efectivo">Efectivo</option>
                 <option value="Transferencia">Transferencia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_pago">Fecha de pago:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-date_range"></i></span>
                <input value="<?php echo date("Y-m-d", strtotime($datos['fecha_pago']));?>" type="date" class="form-control" name="fecha_pago" id="fecha_pago">
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
    