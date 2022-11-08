
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Complete los campos</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form class="formulario_registrar" id="formulario" action="" method="POST">

              <div class="form-group">
                <label for="exampleFormControlSelect1">Trabajador:</label>
                <select class="form-control" id="exampleFormControlSelect1" name="cedula_trabajador">
                  <?php foreach ($consultarTrabajadores as $trabajadores) {
                        echo "<option value='".$trabajadores['cedula']."'>".$trabajadores['nombre'].' '. $trabajadores['apellido']."</option>";
                  } ?> 
                </select>
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect2">Rol:</label>
                <select class="form-control" id="exampleFormControlSelect2" name="id_rol">
                  <?php foreach ($consultarRoles as $roles) {
                        
                        echo "<option value='".$roles['id_rol']."'>".$roles['nombre_rol']."</option>";
                  } ?> 
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
    