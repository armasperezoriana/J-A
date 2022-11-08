
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
              <input type="hidden" name="id_bono" id="id_bono" value="<?php echo $datos['id_bono'];?>"  style="visibility:hidden">
              <label for="nombre_bono">Nombre del bono:</label>
                <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-payment"></i></span>
                  <input value="<?php echo $datos['nombre_bono'];?>" type="text" name="nombre_bono" id="nombre_bono" class="form-control" placeholder="Solos carácteres alfabéticos" aria-label="Solo carácteres numericos" aria-describedby="addon-wrapping" maxlength="50">
                </div>
              <label for="nombre_cargo">Cargo:</label>
              <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class="icon-people"></i></span>
                <select class="form-control" id="nombre_cargo" name="nombre_cargo">
                <option value="<?php echo $datos['id_cargo'];?>"><?php echo $datos['nombre_cargo'] ?></option>
                    <?php foreach ($consultaCargos as $cargo) { 
                    if ($cargo['nombre_cargo'] != $datos['nombre_cargo']) {
                           echo "<option value='".$cargo['id_cargo']."'>".$cargo['nombre_cargo']."</option>";
                         }     
                      
                   } ?> 
                 </select>
                         
              </div>
              <div class="form-group">
                <label for="valor">Valor del bono:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-monetization_on"></i></span>
                  <input value="<?php echo $datos['valor'];?>" type="number" name="valor" id="id_valor" class="form-control" placeholder="Solos carácteres numericos" aria-describedby="addon-wrapping" step=".01">
                </div>
            </div>
            <div class="form-group">
                <label for="dias">Cada cuantos dias se efectuará:</label>
                <div class="input-group flex-nowrap">
                  <span class="input-group-text" id="addon-wrapping"><i class="icon-today"></i></span>
                  <input value="<?php echo $datos['dias'];?>" type="number" name="dias" id="id_dias" class="form-control" placeholder="Solos carácteres numericos" aria-describedby="addon-wrapping">
                </div>
            </div>
              <label for="moneda">Moneda de pago: </label>
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping"><i class=" icon-switch_camera"></i></span>
                <select class="form-control" id="moneda" name="moneda">
                  <option value="<?php echo $datos['moneda'];?>"><?php 
                  if ($datos['moneda'] == 1) {
                    echo "Dolar";
                  }else{
                    echo "Bs";
                  }?></option>
                 <option value="1">Dolar</option>
                 <option value="2">Bs</option>
                </select>
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
    