
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ayuda de usuario</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border:none">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"];  ?></label>
                <p> Se muestra una lista de todos los trabajadores activos registrados en el sistema, con opciones de registrar un trabajador nuevo, modificar uno existente o eliminar.</p>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    