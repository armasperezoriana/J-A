<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class GenerarPDF extends Conexion {
    private $id;
    private $nombre_bono;
    private $nombre_cargo;
    private $valor;
    private $dias;
    private $moneda;
    private $status;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function consultarTrabajosExtras($id){
           $strSql = "SELECT * FROM `trabajosextras` INNER JOIN trabajadores ON trabajosextras.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE id_trabajosExtras = '$id' AND trabajosextras.status = 1"; 
           $respuestaArreglo = '';  
            try {
            
              $strExec = Conexion::prepare($strSql); 
              $strExec->execute(); 
              $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
              return $respuestaArreglo;
            } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
              $errorReturn += ['info' => "error sql:{$e}"];

              return $errorReturn; //retornamos el contenido de esa variable
            }

      }
      public function consultarRecibo_bono($id){
           $strSql = "SELECT * FROM recibos_bonos INNER JOIN trabajadores ON recibos_bonos.cedula_trabajador = trabajadores.cedula INNER JOIN cargo on trabajadores.id_cargo = cargo.id_cargo INNER JOIN bonos ON bonos.id_bono = recibos_bonos.id_bono WHERE id_recibo_bono = '$id' AND recibos_bonos.status = 1"; 
           $respuestaArreglo = '';  
            try {
            
              $strExec = Conexion::prepare($strSql); 
              $strExec->execute(); 
              $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
              return $respuestaArreglo;
            } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
              $errorReturn += ['info' => "error sql:{$e}"];

              return $errorReturn; //retornamos el contenido de esa variable
            }

      }
      public function consultarNomina($id){
           $strSql = "SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo on trabajadores.id_cargo = cargo.id_cargo WHERE id_nomina = '$id' AND nomina.status >= 1"; 
           $respuestaArreglo = '';  
            try {
            
              $strExec = Conexion::prepare($strSql); 
              $strExec->execute(); 
              $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
              return $respuestaArreglo;
            } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
              $errorReturn += ['info' => "error sql:{$e}"];

              return $errorReturn; //retornamos el contenido de esa variable
            }

      }

    }

?>