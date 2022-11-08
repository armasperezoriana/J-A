<?php
    
    namespace content\component;

    class componentViews { 

        static public function head(){

            echo('
                
            <link rel="shortcut icon" href="'._THEME_.'/img/2.ico" />
            <title>J&A | '.$_SESSION['ventana'].'</title>
           
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <!-- Bootstrap CSS -->
            <script src="'._THEME_.'/js/jquery.min.js"></script>
            <script src="'._THEME_.'/js/sweetalert2.all.min.js"></script>
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/sweetalert2.css">

            <link rel="stylesheet" href="'._THEME_.'/css/bootstrap.min.css" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/icons/style.css">
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/fonts.css">
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/styleSidebar.css">
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/style.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
            <?php ?>


              <style type="text/css">
                h3{margin-left: 50%;}
                @media (max-width:767px) {
                h3 {    
                  margin-left: 0px;
                  text-align: center!important;
                    }
                }
                #alert img{
                  display: none;
                }

              </style>


                  <!-- DataTables CSS -->
                    <link rel="stylesheet" href=
                "https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
                  
                    <!-- DataTables JS -->
                    <script src=
                "https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
                    </script>

                     <script>

                      function spanReal(){

                            var span = $.ajax({
                              url: "?url=notificaciones&opcion=spanMensaje",
                              dataType:"text",
                              async:false
                            }).responseText;

                            document.getElementById("spanMensaje").innerHTML = span;
                          }
                          setInterval(spanReal, 1000);

                    </script>

                    <script>

                      function tiempoReal(){

                            var tabla = $.ajax({
                              url: "?url=notificaciones&opcion=llenarBuzon",
                              dataType:"text",
                              async:false
                            }).responseText;

                            document.getElementById("MensajeNotificaciones").innerHTML = tabla;
                          }
                          setInterval(tiempoReal, 1000);

                    </script>  
                 
            ');
            
        }

        static public function headLogin(){

            echo('
          
            <link rel="shortcut icon" href="'._THEME_.'/img/2.ico" />
          <title>J&A | '.$_SESSION['ventana'].'</title>
          
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <!-- Bootstrap CSS -->
            <script src="'._THEME_.'/js/jquery.min.js"></script>
         <script src="'._THEME_.'/js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/sweetalert2.css">

            <link rel="stylesheet" href="'._THEME_.'/css/bootstrap.min.css" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/icons/style.css">
            <link rel="stylesheet" type="text/css" href="'._THEME_.'/css/fonts.css">
       
              <style type="text/css">
                h3{margin-left: 50%;}
                @media (max-width:767px) {
                h3 {    
                  margin-left: 0px;
                  text-align: center!important;
                    }
                }
                #alert img{
                  display: none;
                }

                #global {
                  height: 300px;
                  width: 200px;
                  border: 1px solid #ddd;
                  background: #f1f1f1;
                  overflow-y: scroll;
                }
                #mensajes {
                  height: auto;
                }
                .texto {
                  padding:4px;
                  background:#fff;
                }
              </style>


                  <!-- DataTables CSS -->
                    <link rel="stylesheet" href=
                "https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
                  
                    <!-- DataTables JS -->
                    <script src=
                "https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
                    </script>
            ');
            
        }

       static public function scripts(){

            echo '<script>
                        $(window).load(function() {
                            $(".loader").fadeOut("slow");
                          });
                  </script>
                  <script src="'._THEME_.'/js/popper.js"></script>
                  <script src="'._THEME_.'/js/bootstrap.min.js"></script>
                  <script src="'._THEME_.'/js/chart/dist/chart.js"></script>
                  <script src="'._THEME_.'/js/chart/dist/chart.min.js"></script>
                  <script src="'._THEME_.'/js/main.js"></script>
                  <script>
                           $(".dropdown-toggle").dropdown();
                  </script>
                  <script src="'._THEME_.'/js/lupaSearch.js"></script>';

 
        }
       static public function sidebar(){ 

         if ($_SESSION["usuarioMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCU {
                      display: none;
                    }

                  </style>';

           } 

           if ($_SESSION["bonoMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCB {
                      display: none;
                    }

                  </style>';

           }

           if ($_SESSION["reporteMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionRPT {
                      display: none;
                    }

                  </style>';

           }

           if ($_SESSION["reciboMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionRM {
                      display: none;
                    }

                  </style>';

           }

           if ($_SESSION["trabajadorMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCT {
                      display: none;
                    }

                  </style>';

           }

           if ($_SESSION["nominaMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCN {
                      display: none;
                    }

                  </style>';

           } 

           if ($_SESSION["trabajoeMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCTE {
                      display: none;
                    }

                  </style>';

           } 

           if ($_SESSION["cargoMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCC {
                      display: none;
                    }

                  </style>';

           }

           if ($_SESSION["inasistenciaMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #operacionCI {
                      display: none;
                    }

                  </style>';

           } 

           if ($_SESSION["trabajadorModTotal"] == "vacio") {
            
            echo '<style type="text/css">
                    #trabajadorTotalMod {
                      display: none;
                    }

                  </style>';

           }

           if ($_SESSION["seguridaMod"] == "vacio") {
            
            echo '<style type="text/css">
                    #seguridadMod {
                      display: none;
                    }

                  </style>';

           }  

         switch ($_SESSION['ventana']) {

               case 'Configuración':

                echo '<style>
                      #configuracionMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

              case 'Inicio':
                
                echo '<style>
                      #homepageMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Usuarios':
                
                echo '<style>
                      #usuarioMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Trabajadores':
                
                echo '<style>
                      #trabajadorMenu {
                          color: #ffc107!important;
                          }
                  </style>
                  ';

                break;

                case 'Cargos':

                echo '<style>
                      #cargoMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Permisos':

                echo '<style>
                      #inasistenciaMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Notificaciones':

                echo '<style>
                      #notificacionesMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Trabajos extras':

                echo '<style>
                      #trabajos_extrasMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Nomina':

                echo '<style>
                      #nominaMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Deducciones':

                echo '<style>
                      #nominaMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Seguridad Avanzada':

                echo '<style>
                      #seguridadA {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Recibo de bonos':

                echo '<style>
                      #recibo_bonoMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Bonos':

                echo '<style>
                      #recibo_bonoMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

                case 'Reportes':

                echo '<style>
                      #reportesMenu {
                          color: #ffc107!important;
                          }
                  </style>';

                break;

               
            }

            if (empty($_SESSION['foto'])) {
                
                $_SESSION['foto'] = "assets/img/user4.png";
            }

            echo '<nav id="sidebar" style="height: auto!important">
                    <div class="p-4 pt-5">


                      <center>
                      <a class="navbar-brand" href="#" style="margin-top: -25%!important">
                        <img src="assets/img/logo.png" alt="" width="37" height="25" class="d-inline-block align-text-top">
                        <font face="Muli9" size="5" color="white">'.$_SESSION['nombre']." ".$_SESSION['apellido'].'</font>
                      </a>
                      </center>

                      <a href="#" class="img logo rounded-circle mb-5" style="background-image: url('.$_SESSION["foto"].');"></a>

                      <ul class="list-unstyled components mb-5" style="margin-top: -15%!important">
                        
                        <li>
                            <a href="?url=homepage" id="homepageMenu"><i class="icon-home" style="font-size: 15px" ></i> Inicio</a>
                        </li> 

                        <li>
                            <a href="?url=notificaciones" id="notificacionesMenu"><i class="icon-chat_bubble" style="font-size: 15px" ></i> Notificaciones</a>
                        </li> 

                        <li id="operacionCU">
                            <a href="?url=usuario" id="usuarioMenu"><i class="icon-person" style="font-size: 15px"></i> Gestion de usuarios</a>
                        </li>

                        <li id="trabajadorTotalMod">

                          <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="icon-assignment" style="font-size: 15px"></i> Gestión de trabajadores <i class="icon-arrow_drop_down" style="font-size: 15px; align-items: left;"></i></a> 
                         
                          <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li id="operacionCT">
                                <a href="?url=trabajador" id="trabajadorMenu"><i class="icon-account_box" style="margin-left: 10%;" style="font-size: 15px"></i> Trabajadores</a>
                            </li>
                            <li id="operacionCC">
                                <a href="?url=cargo" id="cargoMenu"><i class="icon-pan_tool" style="margin-left: 10%; font-size: 15px"></i> Cargos</a>
                            </li>
                            <li id="operacionCI">
                                <a href="?url=inasistencia" id="inasistenciaMenu"><i class="icon-done_all" style="margin-left: 10%;"   style="font-size: 15px"></i> Inasistencias</a>
                            </li>
                          </ul>

                        </li>

                        <li id="operacionRM">

                          <a href="#recibos" data-bs-toggle="collapse" aria-expanded="false"><i class="icon-description" style="font-size: 15px"></i> Gestion de recibos <i class="icon-arrow_drop_down" style="font-size: 15px; align-items: left;"></i></a> 
                         
                          <ul class="collapse list-unstyled" id="recibos">
                            <li id="operacionCTE">
                                <a href="?url=trabajos_extras" id="trabajos_extrasMenu"><i class="icon-add" style="margin-left: 10%;"   style="font-size: 15px"></i> Gestion de trabajos extras</a>
                            </li>
                            <li id="operacionCN">
                                <a href="?url=nomina" id="nominaMenu"><i class="icon-playlist_add_check" style="margin-left: 10%;"   style="font-size: 15px"></i> Gestion de recibo nominas</a>
                            </li>
                            <li id="operacionCB">
                                <a href="?url=recibo_bono" id="recibo_bonoMenu"><i class="icon-attach_money" style="margin-left: 10%;"   style="font-size: 15px"></i> Gestion de recibo bonos</a>
                            </li>
                          </ul>

                        </li>

                        <li id="seguridadMod">
                          <a href="?url=avanzada" id="seguridadA"><i class="icon-lock" style="font-size: 15px"></i> Seguridad</a>
                        </li>

                        <li>
                          <a href="?url=configuracion" id="configuracionMenu"><i class="icon-settings" style="font-size: 15px"></i> Configuración</a>
                        </li>
                        <li id="operacionRPT">
                          <a href="?url=reportes" id="reportesMenu"><i class="icon-poll" style="font-size: 15px"></i> Reportes</a>
                        </li>
                        <li>

                          <a href="?url=cerrarSesion"><i class="icon-exit_to_app" style="font-size: 15px"></i> Cerrar sesión</a>

                        </li>
                        
                      </ul>

                      <div class="footer">
                        <p>
                          © Copyright <strong><span>Empresa J&A Chirinos instalaciones C.A by <br><a href="http://www.uptaebvirtual.edu.ve/web/" target="_blank" style="color: #ffc107!important">Uptaeb.com</a></p>
                      </div>

                    </div>
                  </nav>';

                   switch ($_SESSION['ventana']) {
              

                        case 'Trabajadores':
                        
                            echo '<script>

                                  $("ul#homeSubmenu").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Cargos':
                        
                            echo '<script>

                                  $("ul#homeSubmenu").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Permisos':
                        
                            echo '<script>

                                  $("ul#homeSubmenu").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Inasistencia':
                        
                            echo '<script>

                                  $("ul#homeSubmenu").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Trabajos extras':
                        
                            echo '<script>

                                  $("ul#recibos").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Nomina':
                        
                            echo '<script>

                                  $("ul#recibos").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Deducciones':
                        
                            echo '<script>

                                  $("ul#recibos").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Recibo de bonos':
                        
                            echo '<script>

                                  $("ul#recibos").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;

                         case 'Bonos':
                        
                            echo '<script>

                                  $("ul#recibos").removeClass("collapse list-unstyled").addClass("collapse.show list-unstyled");

                              </script>';

                         break;
                    }
        }

        static public function navbar(){

 
            echo '<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" id="hide-me">
                    <div class="container-fluid">

                      <button type="button" id="sidebarCollapse" class="btn btn-primary d-lg-none">
                        <i class="icon-dehaze"></i> 
                        <span class="sr-only">Toggle Menu</span>
                      </button>

                      <form class="d-flex position-relative my-2 d-inline-block" style="width: 50%;">
                        <input class="form-control me-2" type="text" placeholder="Buscar" aria-label="Buscar" name="lupa" id="lupa" autocomplete="off">
                        <button class="btn btn-search position-absolute" style="cursor: default;"><i class=" icon-search
            "></i></button>
                      </form> 

                      <div class="collapse position-relative navbar-collapse" style="float:left;" id="navbarSupportedContent">
              
                          <div class="d-none d-lg-block">
              
                            <div class="navbar-nav ms-auto mb-2 mb-lg-0 btn-group">
              
                              <a style="margin-inline-start: 780px!important;" id="Mibtn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                              <i class="btn-lm icon-notifications img-fluid avatar rounded-circle mr-2" style="font-size: 30px;"></i>
                               
                                <div id="spanMensaje"></div> 

                              </a>
              
                              <ul class="menu dropdown-menu dropdown-menu-end">
              
                                <div>
                                  <div class="d-flex card prueba border-0 my-0">
              
                                    <div class="d-flex card-header bg-light my-0" style="background: white!important">
                                      <h6 class="font-weight-bold mb-0" style="margin-top: -10px!important;">Notificaciones recientes</h6>
                                    </div>
              
                                    <div class="card-body pt-2">
                                       
                                       <div id="MensajeNotificaciones"></div>
                                                
              
                                    </div>
                                  </div>
                              </ul>
              
                            </div>
                          </div>
                      
                        </div>
                     </div>
        </nav>';
        }

        static public function footer(){

            echo '<footer id="footer" >

                    <div class="copyright"> © Copyright <strong><span>Empresa J&A Chirinos instalaciones C.A</span></strong></div>
                    <div class="credits"> PNFI 4301 </div>

              </footer>';
        }

        static public function scriptsLogin(){

                  echo '<script type="text/javascript">
 
                          $(document).ready(function() {
                            $("#loginform").submit(function(e) {
                              e.preventDefault();

                              let ci = $("#cedula").val();
                              let pass = $("#password").val();

                              if (ci.length >3) {
                                if (pass.length >3) {

                                  $.ajax({
                                    type: "POST",
                                    url: "?url=login",
                                    data: {cedula: ci, password: pass},
                                    dataType: "json",

                                    success: function(data){

                                      if(data.msj == "good"){

                                          Swal.fire({
                                          icon: "success",
                                          text: "Iniciando sesión",
                                          showConfirmButton: false,
                                          timer: 1500,
                                          heightAuto: false

                                        })

                                        setTimeout(function(){                                          
                                               window.location = "?url=homepage&opcion=validarUsuario";
                                               return;
                                        }, 2000);
                                        

                                      }

                                      if(data.msj == "bad"){

                                        Swal.fire({
                                          icon: "error",
                                          title: "Oops...",
                                          text: "Los datos ingresados son errados, a los (3) intentos su usuario quedará totalmente bloqueado y tendrá que comunicarse con su administrador para el desbloqueo del mismo.",
                                          heightAuto: false
                                        })

                                      }

                                       if(data.msj == "noexiste"){

                                        Swal.fire({
                                          icon: "error",
                                          title: "Oops...",
                                          text: "Lo lamentamos, este usuario no existe dentro del sistema",
                                          heightAuto: false
                                        })

                                      }

                                      if(data.msj == "bloq"){

                                        Swal.fire({
                                          icon: "error",
                                          title: "Oops...",
                                          text: "Lo lamentamos, este usuario se encuentra actualmente bloqueado dentro del sistema, por favor, recupere su usuario si previamente aún no lo ha hecho.",
                                          heightAuto: false
                                        })

                                      }
                                    }
                                  });

                                }else {

                                  Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "La contraseña no es valida",
                                    heightAuto: false
                                  })
                                }

                              }else {

                                Swal.fire({
                                  icon: "error",
                                  title: "Oops...",
                                  text: "La cédula no es valida",
                                  heightAuto: false
                                })
                              }


                            });

                            
                          });

                        function enviar_recuperacion(){

                             document.formulario1.submit()
                          
                          }

                    $("#imgContrasena").click(function () {


                        var cambio = document.getElementById("password");

                        if(cambio.type == "password"){

                          cambio.type = "text";
                          $("i#h1").removeClass("icon-visibility").addClass("icon-visibility_off");

                        }else{

                          cambio.type = "password";
                          $("i#h1").removeClass("icon-visibility_off").addClass("icon-visibility");

                        }
            

                    });

                    function check(e) {
                        tecla = (document.all) ? e.keyCode : e.which;

                        //Tecla de retroceso para borrar, siempre la permite
                        if (tecla == 8) {
                            return true;
                        }

                        // Patrón de entrada, en este caso solo acepta numeros y letras
                        patron = /[0-9]/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                    } 

                    $("#exampleModalToggle2").on("hidden.bs.modal", mifunction)

                    function mifunction(){

                      // establecer la fecha de expiración a una hora atrás
                      setcookie("cedula_bloqueado", "", time() - 3600);
                    
                    }

                    function checkQuest(e) {
                        tecla = (document.all) ? e.keyCode : e.which;

                        //Tecla de retroceso para borrar, siempre la permite
                        if (tecla == 8) {
                            return true;
                        }

                        // Patrón de entrada, en este caso solo acepta numeros y letras
                        patron = /[a-z]/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                    } 

                  function checkQuestCi(e) {
                        tecla = (document.all) ? e.keyCode : e.which;

                        //Tecla de retroceso para borrar, siempre la permite
                        if (tecla == 8) {
                            return true;
                        }

                        // Patrón de entrada, en este caso solo acepta numeros y letras
                        patron = /[0-9]/;
                        tecla_final = String.fromCharCode(tecla);
                        return patron.test(tecla_final);
                    } 

                  </script>';
        }

    }
