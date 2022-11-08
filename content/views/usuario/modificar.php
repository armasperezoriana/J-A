
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Datos del usuario <?php echo $datos['nombre']. ' ' . $datos['apellido'];?></h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="formulario_modificar" id="formulario" action="" method="POST">
    <div class="form-group">
        <label for="exampleFormControlSelect2">Rol:</label>
         <select class="form-control" id="exampleFormControlSelect2" name="id_rol">
          <option value="<?php echo $datos['id_rol'];?>"><?php echo $datos['nombre_rol'] ?></option>
            <?php foreach ($consultarRoles as $roles) { 
            if ($roles['nombre_rol'] != $datos['nombre_rol']) {
                   echo "<option value='".$roles['id_rol']."'>".$roles['nombre_rol']."</option>";
                 }     
              
           } ?> 
         </select>
    </div>
    <div class="form-group">

            <div class="input-group flex-nowrap">
            <input type="hidden" class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese la contraseña" value="<?php echo $datos['contrasena'];?>">
            </div>
          </div>
      <div class="form-group">
            <div class="input-group flex-nowrap">
            <input type="hidden" class="form-control" name="contrasena2" id="contrasena2" placeholder="Repita la contraseña" value="<?php echo $datos['contrasena'];?>"></div>
      </div>
  
        <input value="<?php echo $datos['idUsuario'];?>" type="hidden" name="idUsuario" >

        <div class="form-group">
         <center><button type="submit" id="submit_modificar" value="modificar" class="btn btn-success">Modificar</button></center>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
                                  