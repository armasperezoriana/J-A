<!doctype html>
  <html lang="en">

  <head>
    <?php $components->head(); ?>

    <style type="text/css">
      
       @media
    only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

  
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
      display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
    }

    td:before {
      /* Now like a table header */
      position: right;
      /* Top/left values mimic padding */
      top: 0;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }

    /*
    Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
    td:nth-of-type(1):before { content: "Cargo: "; }
    td:nth-of-type(2):before { content: "Sueldo semanal: "; }
    td:nth-of-type(3):before { content: "Prima por hogar: "; }
  }
 

    </style>
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

              <div class="col-lg-12 d-flex">
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Bitacora del sistema</h2>
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
                              </div>

                              <div class="">
                                    <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagen" src="<?php echo _THEME_.'/img/carga.gif'?>"> <span class="mensajes"></span></div>
                                    <div class="float-right">
       
                                     <?php if(isset($operacionEXBT)){ ?>
                                     <button type="button" class="btn btn-success pull-right" onclick="respaldar()"><i class="icon-data_usage" style="font-size: 15px"></i>Respaldar BD</button>

                                     <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#restaurar" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar BD"><i class="icon-data_usage" style="font-size: 15px"></i>Restaurar BD</button>
                                     <?php } ?>
                                    
                                    <button type="button" class="btn btn-secondary pull-right" data-bs-toggle="modal" data-bs-target="#ayuda" data-whatever="@mdo"><i class="icon-help_outline" style="font-size: 15px"></i></button> 
                                    </div>
                              </div>

                          </div>

                  </div>

                  <div class="card-body pt-2">

                       <table class="table table-hover" id="tableID">

                              <thead>
                                <tr align="center">
                                  <th scope="col">#</th>
                                  <th scope="col">Fecha-hora</th>
                                  <th scope="col">Accion</th>
                                  <th scope="col">Tabla</th>
                                  <th scope="col">Referencia</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultarBitacora as $datos) { ?>

                                <tr align="center">                             
                                  <th scope="row"><?php echo $n++;?></th>
                                  <td><?php echo $datos['fecha']; ?></td>
                                  <td><?php echo $datos['accion']; ?></td>
                                  <td><?php echo $datos['tabla']; ?></td>
                                  <td><?php echo $datos['dato_referencia']; ?></td>
                                  
                                </tr>

                              <?php } ?>
                            </tbody>
                            </table>

                  </div>
                </div>
              </div>

            </div>

          </div>
           <center>
            <input type="button" onClick="document.location.href='?url=avanzada'" value="VOLVER" class="btn btn-success darken-3 btn-small">
            </center>
            <br>
        </section>

        </div>
    </div>
    
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <p> Se muestra una lista de todos las operaciones que se han realizado en el sistema, indicando el usuario que realizó la accion, en que modulo, fecha y hora. Ademas estan dos opciones mas para realizar un respaldo de la base de datos y tambien para restaurarla.</p>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="restaurar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selecciona un punto de restauración</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border:none">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" id="formulario_restore" method="POST">
              <div id="alert" style="text-align: center;"><img style="width: 100px;" id="imagenRestore" src="<?php echo _THEME_.'/img/carga.gif'?>"> <span class="mensajes"></span></div>
              <div class="form-group">
                    <select name="restorePoint" class="form-control">
                      <?php
                        $ruta=_BACKUP_PATH_;
                        if(is_dir($ruta)){
                            if($aux=opendir($ruta)){
                                while(($archivo = readdir($aux)) !== false){
                                    if($archivo!="."&&$archivo!=".."){
                                        $nombrearchivo=str_replace(".sql", "", $archivo);
                                        $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                        $ruta_completa=$ruta.$archivo;
                                        if(is_dir($ruta_completa)){
                                        }else{
                                            echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                        }
                                    }
                                } 
                                closedir($aux);
                            }
                        }else{
                            echo $ruta." No es ruta válida";
                        }
                      ?>
                    </select>
                    </div>
                    <center><button onclick="restore()" type="submit" id="submit" value="agregar" class="btn btn-success">Aceptar</button></center>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <?php $components->scripts(); ?>
    
    <script src="<?php echo _THEME_?>/js/AJAX/security.js"></script>


</body>

</html>