<?php

    namespace config\settings;

    use content\models\conexion as Conexion;

    if(file_exists("content/config/data.xml")){
        $system = simplexml_load_file("content/config/data.xml");
    }else{
        require_once("content/component/error500.php");
        die('
                <title>Mantenimiento</title>'
                . $html500 .
                '<input type="hidden" id="ms" value="No se ha encontrado el archivo de auto carga de clases Vendor, por favor recargue la página nuevamente. Si el error persiste pongase en contacto con el equipo de Soporte Técnico.">'
            );
    }  


    define("_SYS_VER_", $system->version);
    define("_DIRECTORY_", $system->dir);
    define("_CONF_", $system->conf);
    define("_ROUTE_", $system->ext);
    define("_CONTROLLER_", $system->dir);
    define("_THEME_", $system->theme);
    define("_SERIAL_", $system->serial);  
    define("_MODEL_", $system->model);
    define("_DB_SERVER_", $system->server);
    define("_DB_NAME_WEB_", $system->dbname); 
    define("_DB_USER_", $system->user);
    define("_DB_PASS_", $system->pass);
    define("_VIEWS_", $system->views);
    define("_TIPO_DB_", $system->tipodb);
    define("_BACKUP_PATH_", $system->backup);
    define("KEY", "chirinos");
    define("AES", "AES-256-ECB");

    class sysConfig{

        public function _int(){
           
            if(!file_exists("content/controllers/frontController.php")){
        
                die(require_once 'content/views/errorView.php');
            
            }else{ 

                $conexion = new Conexion();
                
                if($conexion->getErrorConexion() == 0){

                            if (!empty($_GET["url"]) && $_GET['url'] == "pasoLogin") {
                                
                                $_SESSION['ventana'] = 'Recuperar contraseña';
                                return $_REQUEST = $_GET["url"];


                            } else {

                            if (!empty($_SESSION["idUsuario"])) {
                                
                                if (!empty($_GET["url"])) {

                                        if(isset($_SESSION['nominaMod']) && $_SESSION['nominaMod'] == "vacio" && $_GET['url'] == "nomina"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['reporteMod']) && $_SESSION['reporteMod'] == "vacio" && $_GET['url'] == "Reportes"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['bitacoraMod']) && $_SESSION['bitacoraMod'] == "vacio" && isset($_GET['opcion']) && $_GET['opcion'] == "bitacora"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['bonoMod']) && $_SESSION['bonoMod'] == "vacio" && $_GET['url'] == "recibo_bono"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['bonoMod']) && $_SESSION['bonoMod'] == "vacio" && $_GET['url'] == "bono"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['bonoCTMod']) && $_SESSION['bonoCTMod'] == "vacio" && $_GET['url'] == "bono"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['seguridaMod']) && $_SESSION['seguridaMod'] == "vacio" && $_GET['url'] == "avanzada"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['usuarioMod']) && $_SESSION['usuarioMod'] == "vacio" && $_GET['url'] == "usuario"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['trabajadorModTotal']) && $_SESSION['trabajadorModTotal'] == "vacio" && $_GET['url'] == "trabajador"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['trabajoeMod']) && $_SESSION['trabajoeMod'] == "vacio" && $_GET['url'] == "trabajos_extras"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['trabajadorMod']) && $_SESSION['trabajadorMod'] == "vacio" && $_GET['url'] == "trabajador"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        if(isset($_SESSION['cargoMod']) && $_SESSION['cargoMod'] == "vacio" && $_GET['url'] == "cargo"){

                                            return $_REQUEST = 'homepage';
                                        
                                        } 

                                        if(isset($_SESSION['inasistenciaMod']) && $_SESSION['inasistenciaMod'] == "vacio" && $_GET['url'] == "inasistencia"){

                                            return $_REQUEST = 'homepage';
                                        
                                        }

                                        else{ 

                                            return $_REQUEST = $_GET["url"];
                                        }
                                                             
                                    
                                }else {

                                    return $_REQUEST = 'homepage';
                                }
                                

                            }else {

                                $_SESSION['ventana'] = 'Inicio de Sesión';
                                return $_REQUEST = 'login';

                            } }
                    
                
                    }else {

                    die(require_once 'content/views/errorView.php');
                }

            }
            
        }

        protected function _Contro_(){
            return _CONTROLLER_;
        }

        protected function _User_(){
            return _DB_USER_;
        }

        protected function _Pass_(){
            return _DB_PASS_;
        }

        protected function _WEB_(){
            return _DB_NAME_WEB_;
        }

        protected function _KEY_(){
            return KEY;
        }

        protected function _AES_(){
            return AES;
        }

        protected function _BD_Server_(){
            return _DB_SERVER_;
        }

        protected function _Model_(){
            return _MODEL_;
        }

        protected function _Theme_(){
            return _THEME_;
        }

        protected function _Index_(){
            return _INDEX_FILE_;
        }

        protected function _Dir_(){
            return _DIRECTORY_;
        }

        protected function _Version_(){
            return _SYS_VER_;
        }

        protected function _Root_(){
            return _ROUTE_;
        }

        protected function _VIEWS_(){
            return _VIEWS_;
        }

        protected function _TIPO_DB_(){
            return _TIPO_DB_;
        }

        protected function _DB_NAME_WEB_(){
            return _DB_NAME_WEB_;
        }
         protected function _BACKUP_PATH_(){
            return _BACKUP_PATH_;
        }

    }


?>