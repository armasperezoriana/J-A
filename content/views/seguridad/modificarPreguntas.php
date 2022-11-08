
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Datos del usuario <?php echo $_SESSION['nombre']. ' ' . $_SESSION['apellido'];?></h5>
      <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"><span class="mensajes"></span></div> 
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">

      <form method="POST" id="formularioPreguntasSeguridad" name="formularioPreguntasSeguridad">

      <div class="form-group">
        <label for="exampleFormControlSelect1">Pregunta 1:</label>
        <select class="form-control" name="pregunta_one" id="pregunta_one">
          <option value="¿Nombre de madre?">¿Nombre de madre?</option>
          <option value="¿Nombre de padre?">¿Nombre de padre?</option>
          <option value="¿Nombre de tu mascota?">¿Nombre de tu mascota?</option>
          <option value="¿Nombre de tu primer colegio?">¿Nombre de tu primer colegio?</option>
          <option value="¿Nombre de tu primer hijo?">¿Nombre de tu primer hijo?</option>
          <option value="¿Color favorito?">¿Color favorito?</option>
          <option value="¿Animal favorito?">¿Animal favorito?</option>
          <option value="¿Comida favorita?">¿Comida favorita?</option>
          <option value="¿Pelicula favorita?">¿Pelicula favorita?</option>
        </select>
      </div> 

      <br>
      <div class="form-group">
        <label for="exampleInputPassword1">Respuesta 1:</label>
        <input type="text" class="form-control" name="respuesta_one" id="respuesta_one" placeholder="Respuesta" style="width:100%;" autocomplete="off" onkeypress="return checkQuest(event)">
      </div>
      <hr>
      <div class="form-group">
        <label for="exampleInputPassword1">Pregunta 2:</label>
        <input type="text" class="form-control" name="pregunta_two" id="pregunta_two" placeholder="Pregunta" style="width:100%;" autocomplete="off">
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputPassword1">Respuesta 2:</label>
        <input type="text" class="form-control" name="respuesta_two" id="respuesta_two" placeholder="Respuesta" style="width:100%;" autocomplete="off" onkeypress="return checkQuest(event)">
      </div>

      <hr>
      <div class="form-group">
        <label for="exampleInputPassword1">Pregunta 3:</label>
        <input type="text" class="form-control" name="pregunta_tre" id="pregunta_tre" placeholder="Pregunta" style="width:100%;" autocomplete="off">
      </div>
      <br>
      <div class="form-group">
        <label for="exampleInputPassword1">Respuesta 3:</label>
        <input type="text" class="form-control" name="respuesta_tre" id="respuesta_tre" placeholder="Respuesta" style="width:100%;" autocomplete="off" onkeypress="return checkQuest(event)">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Firma Digital:</label>
        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Ejem. Cardenales" style="width:100%;" autocomplete="off" onkeypress="return checkQuest(event)">
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
