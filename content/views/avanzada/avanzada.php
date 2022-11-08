<!doctype html>
  <html lang="en">

  <head>
    <?php $components->head(); ?>
    <style type="text/css">
       img.zoom {
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
        }
         
        .transition {
            -webkit-transform: scale(0.9); 
            -moz-transform: scale(0.9);
            -o-transform: scale(0.9);
            transform: scale(0.9);
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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Seguridad</h2>
                <p class="" style="display: none;">Descargar registros</p>
                   
              </div>

              <div class="col-lg-3 d-flex" style="visibility: hidden;">
                
              </div>

            </div>
          </div>
        </section>

        <section class="bg-grey" >
          <div class="container">
            <div class="row">

              <?php if(!isset($operacionCBT) && !isset($operacionEXBT) && !isset($operacionEBT) ){ 
               } else { ?>

              <div class="col-lg-6 my-3">
                <div class="card rounded-0">
                  
                  <div class="card text-center">

                  <h5 class="card-title my-2">Bitácoras y BD</h5>
                  </div>
                  <a  href="?url=avanzada&opcion=bitacora"><center>
                    <img src="assets/img/descarga.jpg" class="zoom card-img-bottom my-2" style="width: 30%; cursor: pointer;">
                    </center></a>
                

                    

                  </div>
                </div>

                <?php } ?>

                <?php if(!isset($operacionRRL) && !isset($operacionMRL) && !isset($operacionERL) && !isset($operacionMAC) && !isset($operacionARL)){ 
                } else { ?>

                <div class="col-lg-6 my-3">
                <div class="card rounded-0">
                  
                  <div class="card text-center">

                  <h5 class="card-title my-2">Seguridad Avanzada</h5>
                  
                </div>

                    <center>
                    <img src="assets/img/savanzada.png" class="zoom card-img-bottom my-2" style="width: 30%; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#avanzada" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top">
                    </center>

                  </div>    
                </div>

                <?php } ?>

            </div>

            </div>
    

        </section>

        </div>
    </div>
    

    <?php $components->scripts(); ?>

    <script>
     
        $(document).ready(function(){
            $('.zoom').hover(function() {
                $(this).addClass('transition');
            }, function() {
                $(this).removeClass('transition');
            });
        });

     </script>

     <div class="modal fade" id="avanzada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seguridad avanzada</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none;" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                
                <div class="row">

                  <?php if(!isset($operacionRRL) && !isset($operacionMRL) && !isset($operacionERL) && !isset($operacionARL)){ 
                } else { ?>

                  <div class="col-lg-6 my-3">
                    <div class="card rounded-0">
                      
                      <center>
                        <img src="assets/img/roles.png" class="card-img-bottom my-2" style="width: 50%; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#avanzada" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" onClick="document.location.href='?url=avanzada&opcion=rol'">
                      </center>
                      
                      <div class="card text-center">

                      <h6 class="card-title my-2" style="color: black;">Gestionar Roles</h6>
                      
                       </div>
                      </div>    
                </div>

                <?php } ?>

                <?php if(!isset($operacionMAC)){ 
                } else { ?>

                <div class="col-lg-6 my-3">
                    <div class="card rounded-0">
                      
                      <center>
                        <img src="assets/img/acceso.png" class="card-img-bottom my-2" style="width: 50%; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#avanzada" data-whatever="@mdo" data-bs-toggle="tooltip" data-bs-placement="top" onClick="document.location.href='?url=avanzada&opcion=accesos'">
                      </center>
                      
                      <div class="card text-center">

                      <h6 class="card-title my-2" style="color: black;">Gestionar Accesos</h6>
                      
                       </div>
                      </div>    
                </div>
                
                <?php  } ?>

                </div>

              </div>
            </div>
          </div> 
      
      </div>


  </div>


</html>