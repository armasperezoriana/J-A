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
               
                <h2 class="font-weight-bold w-100 align-self-center" style="width: 100%;">Gestión de reportes</h2>
                <p class="" style="visibility: hidden;">Descargar registros</p>
                   
              </div>

              <div class="col-lg-3 d-flex" style="visibility: hidden;">
                
              </div>

            </div>
          </div>
        </section>

        <section class="bg-mix">

          <div class="container">
            <div class="card rounded-0">
              <div class="card-body">
                <div class="row">

                    <div class="col-2 col-md-2 stat my-4">
                      <div class="mx-auto">
                        <h6 class="font-weight-bold">Inasistencias: </h6>
                         <a class="btn btn-info pull-right" href="?url=generarPDF&opcion=consultarInasistencias" target="_blank"><i class=" icon-print" style="font-size: 15px"></i>Generar PDF</a>
                      </div>
                    </div>

                    <div class="col-2 col-md-3 stat my-4">
                      <div class="mx-auto">
                        <h6 class="font-weight-bold ">Recibo de nominas: </h6>
                        <a class="btn btn-info pull-right" href="?url=generarPDF&opcion=consultarNominas" target="_blank"><i class=" icon-print" style="font-size: 15px"></i>Generar PDF</a>
                      </div>
                    </div>
                    <div class="col-2 col-md-3 stat my-4">
                      <div class="mx-auto">
                        <h6 class="font-weight-bold ">Recibo de trabajos extras: </h6>
                        <a class="btn btn-info pull-right" href="?url=generarPDF&opcion=consultarTrabajos_extras" target="_blank"><i class=" icon-print" style="font-size: 15px"></i>Generar PDF</a>
                      </div>
                    </div>
                    <div class="col-2 col-md-4 stat my-4">
                      <div class="mx-auto">
                        <h6 class="font-weight-bold ">Recibo de bonos:</h6>
                        <a class="btn btn-info pull-right" href="?url=generarPDF&opcion=consultarBonos" target="_blank"><i class=" icon-print" style="font-size: 15px"></i>Generar PDF</a>
                      </div>
                    </div>

              

                </div>
              </div>
            </div>
          </div>
        </section>

        </div>
    </div>
    

    <?php $components->scripts(); ?>
    
    
          <script src="<?php echo _THEME_?>/js/AJAX/cargo.js"></script>


</body>

</html>