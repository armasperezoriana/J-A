<?php 
 
	foreach ($operaciones as $operacion):

		// *************** USUARIO ***************
		if ($operacion["id_operacion"] == 1) {
			
			$operacionRU = 1; // operacion registrar usuario
		}

		if ($operacion["id_operacion"] == 2) {
			
			$operacionMU = 1; // operacion modificar usuario 
		}

		if ($operacion["id_operacion"] == 3) {
			
			$operacionEU = 1; // operacion eliminar usuario
		}

		if ($operacion["id_operacion"] == 4) {
			
			$operacionCU = 1; // operacion consultar usuario
		}	

		// *************** TRABAJADOR ***************

		if ($operacion["id_operacion"] == 5) {
			
			$operacionRT = 1; // operacion registrar trabajador
		}

		if ($operacion["id_operacion"] == 6) {
			
			$operacionMT = 1; // operacion modificar trabajador
		}

		if ($operacion["id_operacion"] == 7) {
			
			$operacionET = 1; // operacion eliminar trabajador
		}		

		if ($operacion["id_operacion"] == 8) {
			
			$operacionCT = 1; // operacion consultar trabajador
		}

		// *************** CARGO ***************

		if ($operacion["id_operacion"] == 9) {
			
			$operacionRC = 1; // operacion registrar cargo
		}

		if ($operacion["id_operacion"] == 10) {
			
			$operacionMC = 1; // operacion modificar cargo
		}

		if ($operacion["id_operacion"] == 11) {
			
			$operacionEC = 1; // operacion eliminar cargo
		}

		if ($operacion["id_operacion"] == 12) {
			
			$operacionCC = 1; // operacion consultar cargo
		}

		// *************** INASISTENCIA ***************

		if ($operacion["id_operacion"] == 13) {
			
			$operacionRI = 1; // operacion registrar inasistencia
		}

		if ($operacion["id_operacion"] == 14) {
			
			$operacionMI = 1; // operacion modificar inasistencia
		}

		if ($operacion["id_operacion"] == 15) {
			
			$operacionEI = 1; // operacion eliminar inasistencia
		}

		if ($operacion["id_operacion"] == 16) {
			
			$operacionCI = 1; // operacion consultar inasistencia
		}

		// *************** NOMINAS ***************

		if ($operacion["id_operacion"] == 17) {
			
			$operacionRN = 1; // operacion registrar nominas 
		}

		if ($operacion["id_operacion"] == 18) {
			
			$operacionMN = 1; // operacion eliminar nominas 
		}

		if ($operacion["id_operacion"] == 19) {
			
			$operacionEN = 1; // operacion eliminar nominas 
		}

		if ($operacion["id_operacion"] == 20) {
			
			$operacionCN = 1; // operacion consultar nominas 
		}

		// *************** TRABAJOS EXTRAS ***************

		if ($operacion["id_operacion"] == 21) {
			
			$operacionRTE = 1; // operacion registrar trabajos extras  
		}

		if ($operacion["id_operacion"] == 22) {
			
			$operacionMTE = 1; // operacion registrar trabajos extras  
		}

		if ($operacion["id_operacion"] == 23) {
			
			$operacionETE = 1; // operacion elimninar trabajos extras  
		}

		if ($operacion["id_operacion"] == 24) {
			
			$operacionCTE = 1; // operacion consultar trabajos extras  
		}

		// *************** BONOS ***************

		if ($operacion["id_operacion"] == 25) {
			
			$operacionRCT = 1; // operacion registrar bono  
		}

		if ($operacion["id_operacion"] == 26) {
			
			$operacionMCT = 1; // operacion modificar bono  
		}

		if ($operacion["id_operacion"] == 27) {
			
			$operacionECT = 1; // operacion eliminar bono  
		}

		if ($operacion["id_operacion"] == 28) {
			
			$operacionCCT = 1; // operacion consultar bono  
		}

		// *************** BITACORAS ***************

		if ($operacion["id_operacion"] == 29) {
			
			$operacionCBT = 1; // operacion consultar bitacoras  
		}

		if ($operacion["id_operacion"] == 30) {
			
			$operacionEXBT = 1; // operacion exportar bitacoras  
		}

		if ($operacion["id_operacion"] == 31) {
			
			$operacionEBT = 1; // operacion eliminar bitacoras  
		}

		// *************** ROLES ***************

		if ($operacion["id_operacion"] == 32) {
			
			$operacionRRL = 1; // operacion registrar roles   
		}

		if ($operacion["id_operacion"] == 33) {
			
			$operacionMRL = 1; // operacion modificar roles   
		}

		if ($operacion["id_operacion"] == 34) {
			
			$operacionERL = 1; // operacion eliminar roles   
		}

		// *************** ACCESOS ***************

		if ($operacion["id_operacion"] == 35) {
			
			$operacionMAC = 1; // operacion modificar accesos   
		}

		// *************** REPORTES ***************

		if ($operacion["id_operacion"] == 36) {
			
			$operacionCREP = 1; // operacion consultar reportes   
		}

		if ($operacion["id_operacion"] == 37) {
			
			$operacionARL = 1; // operacion asignar roles   
		}

		// *************** RECIBO BONOS ***************

		if ($operacion["id_operacion"] == 38) {
			
			$operacionRRB = 1; // operacion registrar recibo bonos   
		}

		if ($operacion["id_operacion"] == 39) {
			
			$operacionMRB = 1; // operacion modificar recibo bonos   
		}

		if ($operacion["id_operacion"] == 40) {
			
			$operacionERB = 1; // operacion eliminar recibo bonos   
		}

		if ($operacion["id_operacion"] == 41) {
			
			$operacionCRB = 1; // operacion consultar recibo bonos   
		}


	endforeach;

	if(!isset($operacionCREP)){ 

        $_SESSION["reporteMod"] = "vacio";

    }else{

    	$_SESSION["reporteMod"] = "existe";
    }

	if(!isset($operacionCCT) && !isset($operacionMCT) && !isset($operacionECT) && !isset($operacionRCT) && !isset($operacionCRB) && !isset($operacionERB) && !isset($operacionRRB) && !isset($operacionMRB) && !isset($operacionCCT) && !isset($operacionRN) && !isset($operacionMN) && !isset($operacionEN) && !isset($operacionCN) && !isset($operacionRTE) && !isset($operacionMTE) && !isset($operacionETE) && !isset($operacionCTE)){ 

        $_SESSION["reciboMod"] = "vacio";

    }else{

    	$_SESSION["reciboMod"] = "existe";
    }

	if(!isset($operacionCBT) && !isset($operacionEXBT) && !isset($operacionEBT)){ 

        $_SESSION["bitacoraMod"] = "vacio";

    }else{

    	$_SESSION["bitacoraMod"] = "existe";
    }

    if(!isset($operacionCCT) && !isset($operacionMCT) && !isset($operacionECT) && !isset($operacionRCT)){ 

        $_SESSION["bonoCTMod"] = "vacio";

    }else{

    	$_SESSION["bonoCTMod"] = "existe";
    }

	if(!isset($operacionCRB) && !isset($operacionERB) && !isset($operacionRRB) && !isset($operacionMRB) && !isset($operacionCCT)){ 

        $_SESSION["bonoMod"] = "vacio";

    }else{

    	$_SESSION["bonoMod"] = "existe";
    }

	if(!isset($operacionRN) && !isset($operacionMN) && !isset($operacionEN) && !isset($operacionCN)){ 

        $_SESSION["nominaMod"] = "vacio";

    }else{

    	$_SESSION["nominaMod"] = "existe";
    }

	if(!isset($operacionRTE) && !isset($operacionMTE) && !isset($operacionETE) && !isset($operacionCTE)){ 

        $_SESSION["trabajoeMod"] = "vacio";

    }else{

    	$_SESSION["trabajoeMod"] = "existe";
    }

	if(!isset($operacionARL) && !isset($operacionMAC) && !isset($operacionERL) && !isset($operacionMRL) && !isset($operacionRRL) && !isset($operacionEBT) && !isset($operacionEXBT)){ 

        $_SESSION["seguridaMod"] = "vacio";

    }else{

    	$_SESSION["seguridaMod"] = "existe";
    }

	if(!isset($operacionCU) && !isset($operacionEU) && !isset($operacionMU) && !isset($operacionRU)){ 

        $_SESSION["usuarioMod"] = "vacio";

    }else{

    	$_SESSION["usuarioMod"] = "existe";
    }

    if(!isset($operacionCT) && !isset($operacionET) && !isset($operacionMT) && !isset($operacionRT)){ 

        $_SESSION["trabajadorMod"] = "vacio";

    }else{

    	$_SESSION["trabajadorMod"] = "existe";
    }

    if(!isset($operacionCC) && !isset($operacionEC) && !isset($operacionMC) && !isset($operacionRC)){ 

        $_SESSION["cargoMod"] = "vacio";

    }else{

    	$_SESSION["cargoMod"] = "existe";
    }

    if(!isset($operacionCI) && !isset($operacionEI) && !isset($operacionMI) && !isset($operacionRI)){ 

        $_SESSION["inasistenciaMod"] = "vacio";

    }else{

    	$_SESSION["inasistenciaMod"] = "existe";
    }

    if(!isset($operacionCI) && !isset($operacionEI) && !isset($operacionMI) && !isset($operacionRI) && !isset($operacionCC) && !isset($operacionEC) && !isset($operacionMC) && !isset($operacionRC) && !isset($operacionCT) && !isset($operacionET) && !isset($operacionMT) && !isset($operacionRT)){ 

        $_SESSION["trabajadorModTotal"] = "vacio";

    }else{

    	$_SESSION["trabajadorModTotal"] = "existe";
    }



?>