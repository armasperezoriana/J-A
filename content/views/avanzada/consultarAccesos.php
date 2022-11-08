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
    td:nth-of-type(1):before { content: ""; }
    td:nth-of-type(2):before { content: "Nombre:  "; }
    td:nth-of-type(3):before { content: "Apellido:  "; }
    td:nth-of-type(4):before { content: "Cédula:  "; }
    td:nth-of-type(5):before { content: "Rol:  "; }
    td:nth-of-type(6):before { content: "Correo:  "; }
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

              <div class="col-lg-8 d-flex">
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de Acceso Usuarios</h2>
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
                                <h6  class="font-weight-bold mb-0">Accesos de los usuarios</h6>
                              </div>

                              <div class="col-lg-4">
                                    <div class="float-right">

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
                                  <th></th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Apellido</th>
                                  <th scope="col">Cédula</th>
                                  <th scope="col">Rol</th>
                                  <th scope="col">Correo</th>
                                  <th scope="col">Restaurar</th>
                                  <th scope="col">Estatus</th>
                                </tr>
                              </thead>
                              <tbody>
                               <?php $n=1; foreach ($consultaUsuarios as $datos) { 

                                    if(empty($datos['foto'])){

                                      $foto = "assets/img/user4.png";
                                    
                                    }else{

                                      $foto = $datos["foto"];
                                    }
                                ?>
                                <tr align="center">                             
                                  <th scope="row"><center><?php echo $n++;?></center></th>
                                  <td><center><?php if($datos["status"] == 1){  ?> <img src="assets/img/enabled.png" style="height: 10px!important;" class="img-fluid avatar rounded-circle"> <?php } ?><?php if($datos["status"] == 4){  ?> <img src="assets/img/disabled.png" style="height: 10px!important;" class="img-fluid avatar rounded-circle"> <?php } ?><img src="<?php echo $foto; ?>"  style="height: 30px!important; margin-left: 10px;" class="img-fluid avatar rounded-circle"></center></td>
                                  <td><?php echo $datos['nombre']; ?></td>
                                  <td><?php echo $datos['apellido']; ?></td>
                                  <td><?php echo $datos['cedula_trabajador']; ?></td>
                                  <td><?php echo $datos['nombre_rol'];?></td>
                                  <td><?php echo $datos['correo'];?></td>
                                  
                                  <td>  
                                    <?php if($datos['cedula'] !== '0000'){ ?>
                                    <center>
                                    <button type="button" class="btn btn-warning pull-right" data-bs-toggle="modal"  data-bs-target="#modificar-<?php echo $datos['idUsuario'];?>" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="modificar Usuario"><i class="icon-cached" style="color: white; font-size: 15px"></i></button>
                                    </center>
                                    <?php } ?>
                                  </td>

                                <!-- Modal modificar -->
                            
                                <div class="modal fade" id="modificar-<?php echo $datos['idUsuario'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Restaurar <?php echo $datos["nombre"]." ".$datos["apellido"];?> </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>

                                          <div class="modal-body">
                                            
                                            <div class="row">

                                              <div class="col-lg-6 my-3">
                                                <div class="card rounded-0">
                                                  
                                                  <center>
                                                    <img src="assets/img/preguntasS.png" class="card-img-bottom my-2" style="width: 50%; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#avanzada" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" onclick="eliminarPreguntas('<?php echo $datos['idUsuario'];?>');">
                                                  </center>
                                                  
                                                  <div class="card text-center">

                                                  <h6 class="card-title my-2" style="color: black;">Preguntas de seguridad</h6>
                                                  
                                                   </div>
                                                  </div>    
                                            </div>

                                            <div class="col-lg-6 my-3">
                                                <div class="card rounded-0">
                                                  
                                                  <center>
                                                    <img src="assets/img/contrasena.png" class="card-img-bottom my-2" style="width: 50%; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#avanzada" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top"  onclick="eliminarContrasena('<?php echo $datos['idUsuario'];?>');">
                                                  </center>
                                                  
                                                  <div class="card text-center">

                                                  <h6 class="card-title my-2" style="color: black;">Contraseña</h6>
                                                  
                                                   </div>
                                                  </div>    
                                            </div>

                                            <div class="col-lg-6 my-3">
                                                <div class="card rounded-0">
                                                  
                                                  <center>
                                                    <img src="assets/img/esteganografia.png" class="card-img-bottom my-2" style="width: 50%; cursor: pointer;" >
                                                  </center>
                                                  
                                                  <div class="card text-center">

                                                  <h6 class="card-title my-2" style="color: black;">Esteganografía</h6>
                                                  
                                                   </div>
                                                  </div>    
                                            </div>

                                            <div class="col-lg-6 my-3">
                                                
                                                  
                                                  <center>
                                                    <img src="<?php echo $foto;?>" class=" rounded-circle card-img-bottom my-2" style="width: 50%;">
                                                  </center>
                                       
                                                  </div>    
                                            </div>

                                            </div>

                                          </div>
                                        </div>
                                      </div> 
                                  
                                  </div>

                                  <td> 

                                    <?php if($datos['cedula'] !== '0000'){ ?>
                                    <center>

                                      <?php if($datos['status'] == 1){ ?>

                                         <button type="button" onclick="actualizarDesingreso('<?php echo $datos['idUsuario'];?>');" class="btn btn-success pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar Usuario"><i class="icon-check" style="font-size: 15px"></i></button>

                                      <?php } ?>

                                      <?php if($datos['status'] == 4){ ?>

                                         <button type="button" onclick="actualizarIngreso('<?php echo $datos['idUsuario'];?>');" class="btn btn-danger pull-right" data-whatever="@mdo" data-toggle="tooltip" data-placement="top" title="eliminar Usuario"><i class="icon-close" style="font-size: 15px"></i></button>

                                      <?php } ?>

                                    </center>
                                    <?php } ?>
                                  </td>
                                </tr>

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
                    
          </div>
    

        </section>

        </div>
    </div>
    
    <!-- Modal Ayuda -->
    <div class="modal fade" id="ayuda" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <?php require 'content/views/usuario/ayuda.php'; ?> 
    </div>

    <?php $components->scripts(); ?>
    <script src="<?php echo _THEME_?>/js/AJAX/acceso.js"></script>

    
    <script type="text/javascript">
         // Initialize the DataTable
        $(document).ready(function() {
      $('#tableID').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      });
    });
        
    </script>


</body>

</html>