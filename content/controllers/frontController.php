<?php
 
    namespace content\controllers; 

    use config\settings\sysConfig as sysConfig;

    class frontController extends sysConfig{


      protected $url;
      protected $controller;
      protected $route; 

      public function __construct($request){
 
            if(isset($request)){
            
                  $FrontObj = new sysConfig();
                  $this->url = $request;
                  $this->controller = $FrontObj->_Dir_();
                  $this->route = $FrontObj->_Contro_();
                  $this->validarUrl($this->url);
            
            }else{
                  
                  die(require_once 'content/views/errorView.php');
                  
            }

      }

      private function validarUrl($url){

            $validar = preg_match_all("/^[a-zA-Z0-9-@\/.=:_#$ ]{1,700}$/", $url);

            if($validar == 1){

                  $this->cargarUrl($url);

            }else{

                  die('Ésta url no es valida');

            }
      }

      private function cargarUrl($url){

            $controllerPath = $this->controller.$url."Controller.php";

            if(file_exists($controllerPath)){
                  
                  require_once($controllerPath);

            }else{

                  //die('El controlador '.$controllerPath.' no existe');
                 die(require_once 'content/views/errorView.php');

            }	

      }

}
        
?>

        