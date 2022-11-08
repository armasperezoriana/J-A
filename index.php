<?php

    if(file_exists("vendor/autoload.php")){
        session_start(); 

        require_once("vendor/autoload.php");
        
        
    }else{

        if(file_exists("content/component/error500.php")){
            require_once("content/component/error500.php");
        }

        die('
                <title>Mantenimiento</title>'
                . $html500 .
                '<input type="hidden" id="ms" value="No se ha encontrado el archivo de auto carga de clases Vendor, por favor recargue la página nuevamente. Si el error persiste pongase en contacto con el equipo de Soporte Técnico.">'
            );
    }


    use config\settings\sysConfig as sysConfig;

    $globalConfig = new sysConfig();
    $globalConfig->_int();

    use content\controllers\frontController as frontController;
    $IndexSystem = new frontController($_REQUEST);

?>