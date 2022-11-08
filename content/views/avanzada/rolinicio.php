<!doctype html>
  <html lang="en">

  <head>
    
    <?php $components->head(); ?>
    <?php require_once 'assets/css/modulos/responsiveRol.php'; ?>

  </head> 

  <body class="bg-grey">

<div class="loader"></div>

  <div class="d-flex">

    <?php $components->sidebar(); ?>

    <div class="w-100">

      <?php $components->navbar(); ?>

      <section class="py-3" style="background-color: #F8F7F7;"> 
          <div class="container">
            <div class="row">

              <div class="col-lg-8 d-flex">
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de Roles</h2>
                <p class="" style="visibility: hidden;">Descargar registros</p>
                   
              </div>

              <div class="col-lg-3 d-flex" style="visibility: hidden;">
                
              </div>

            </div>
          </div>
        </section>

        <section class="bg-grey" >
          <div class="container">
            <div class="row">

              <div class="col-lg-12 my-3">
                <div class="card rounded-0">
                  
                  <div class="card-header bg-light">

                          <div class="row">
                              <div class="col-lg-8">
                                <h6  class="font-weight-bold mb-0">Roles registrados ultimamente</h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">
                                      
                                       <?php if(!isset($operacionRRL)){ 
                                       } else { ?>

                                       <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#redactar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar Usuario"><i class="icon-add" style="font-size: 15px"></i></button>

                                       <?php } ?>

                                    </div>
                              </div>

                          </div>

                  </div> 

                  <div class="card-body pt-2">

                      <table class="table table-hover" id="tableID">
                              <thead>
                                <tr align="center">
                                  <th scope="col">#</th>
                                  <th scope="col">Nombre rol</th>

                                  <?php if(!isset($operacionARL)){ 
                                  } else { ?>
                                  <th scope="col">Asignar</th>
                                  <?php } ?>
                                 
                                 <?php if(!isset($operacionMRL)){ 
                                  } else { ?>
                                  <th scope="col">Modificar</th>
                                 <?php } ?>

                                 <?php if(!isset($operacionERL)){ 
                                  } else { ?>
                                  <th scope="col">Eliminar</th>
                                  <?php  } ?>

                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($roles as $datos) {                                     
                                ?>
                                <tr align="center">                             
                                  <th scope="row"><center><?php echo $n++;?></center></th>
                                  <td><?php echo $datos['nombre_rol']; ?></td>

                                  <?php if(!isset($operacionARL)){ 
                                  } else { ?>

                                  <td>
                                    <?php if($datos['nombre_rol'] !== 'root'){ ?>
                                    <button type="button" onClick="document.location.href='?url=avanzada&opcion=inicioPermisos&id_rol=<?php echo $datos['id_rol']; ?>'" class="btn btn-primary"><i class="icon-add" style="color: white;"></i></button>
                                    <?php } ?>
                                  </td>
                                  <?php } ?>
                                  <?php if(!isset($operacionMRL)){ 
                                  } else { ?>

                                  <td>
                                      <?php if($datos['nombre_rol'] !== 'root'){ ?>
                                       <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#redactar-<?php echo $datos["id_rol"]; ?>" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="registrar Usuario"><i class="icon-cached" style="color: white;"></i></button>
                                      <?php } ?>
                                  </td>
                                  <?php } ?>

                                  <?php if(!isset($operacionERL)){ 
                                  } else { ?>

                                  <td>
                                    <?php if($datos['nombre_rol'] !== 'root' && $datos['nombre_rol'] !== 'admin'){ ?>
                                       <button type="button" class="btn btn-danger" onclick="eliminarRol(<?php echo $datos['id_rol'];?>);"><i class="icon-delete" style="color: white;"></i></button>
                                    <?php } ?>
                                  </td>
                                  <?php } ?>
                                    
                                </tr>

                                 <!-- Modal Modificar -->
                                       <div class="modal fade" id="redactar-<?php echo $datos["id_rol"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Modificar rol</h5>
                                              <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"><span class="mensajes"></span></div>
                                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div> 
                                            <div class="modal-body">
                                              <form id="modificarRol" name="modificarRol" method="POST">
                                   
                                                <div class="form-group">
                                                  <label for="contrasena">Nombre Rol:</label>
                                                  <div class="input-group flex-nowrap">
                                                  <input type="text" class="form-control" name="rol" id="rol" value="<?php echo $datos["nombre_rol"]; ?>" maxlength="32">
                                                  </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                  <label for="exampleFormControlSelect1">Estado:</label>
                                                  <select class="form-control" id="estado" name="estado">
                                                    
                                                    <?php if($datos["status_rol"] == 1){  ?>
                                                    <option value="1">Activo</option>
                                                    <option value="2">Inactivo</option>
                                                    <?php } ?>

                                                    <?php if($datos["status_rol"] == 2){  ?>
                                                    <option value="2">Inactivo</option>
                                                    <option value="1">Activo</option>
                                                    <?php } ?>

                                                  </select>
                                                </div>

                                                <input type="hidden" name="idRol" id="idRol" value="<?php echo $datos["id_rol"]; ?>"> 
                                                <br>
                                                  <center><button type="submit" id="modificarRol" name="modificarRol" class="btn btn-warning" style="color: white;">Actualizar</button></center>
                                                  </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                                </div>
                                              </div>
                                            </div>
                                          </div>

                              <?php } ?>
                            </tbody>
                            </table>

                  </div>
                </div>
              </div>

            </div>
                    <center>
                      <input type="button" onClick="document.location.href='?url=avanzada'" value="VOLVER" class="btn btn-success darken-3 btn-small">
                    </center>
                    <br>
          </div>  
    

        </section>

        </div>
    </div>
    

    <!-- Modal Registrar -->
    <div class="modal fade" id="redactar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/avanzada/registrarRol.php'; ?> 
    </div>
 

    <?php $components->scripts(); ?>
    <script src="<?php echo _THEME_?>/js/AJAX/validaciones.js"></script>
    <script src="<?php echo _THEME_?>/js/AJAX/avanzada.js"></script>
   


</body>

</html>