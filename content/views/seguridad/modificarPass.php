
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Datos del usuario <?php echo $_SESSION['nombre']. ' ' . $_SESSION['apellido'];?></h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
 
     <p class="text-muted mb-2">Por su seguridad, su contraseña no puede ser su misma contraseña por default.</p>

     <form method="POST" action="?url=seguridad&opcion=modificarPass">

      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña actual:</label>
        <input type="text" onkeypress="return checkEspacio(event)" class="form-control" id="passActual" name="passActual" placeholder="Respuesta" style="width:100%;">
      </div>
      <hr>
      <div class="form-group">
        <label for="exampleInputPassword1">Nueva contraseña:</label>
        <input type="text"  onkeypress="return checkEspacio(event)" class="form-control" id="passOne" name="passOne" placeholder="Ingrese su nueva contraseña" style="width:100%;">
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirme su contraseña:</label>
        <input type="text"  onkeypress="return checkEspacio(event)" class="form-control" id="passTwo" name="passTwo" placeholder="Confirme su nueva contraseña" style="width:100%;">
      </div>
      <br>

      <center>
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
      </center>

    </form>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  </div>
</div>
</div>
