<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Rol extends Conexion {

    private $nombre_cargo;
    private $sueldo_semanal;
    private $prima_por_hogar;
      
    private $conex;
    
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registerCargo(){
         $strSql = 'INSERT INTO cargo (nombre_cargo, 
                                       sueldo_semanal,
                                       prima_por_hogar,
                                       status) 
                              VALUES (:nombre_cargo, 
                                      :sueldo_semanal,
                                      :prima_por_hogar,
                                      :status)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':nombre_cargo', $this->nombre_cargo);
            $strExec->bindParam(':sueldo_semanal', $this->sueldo_semanal);
            $strExec->bindParam(':prima_por_hogar', $this->prima_por_hogar);
            $strExec->bindParam(':status', $this->status);
            $strExec->execute(); 
            $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
            $respuestaArreglo += ['estatus' => true];
            return $respuestaArreglo;
          } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];

            return $errorReturn; //retornamos el contenido de esa variable
          }

    }

    public function modificarCargo($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE cargo 
                       SET sueldo_semanal = :sueldo_semanal,
                           prima_por_hogar = :prima_por_hogar
                     WHERE id_cargo='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':sueldo_semanal', $this->sueldo_semanal);
                $strExec->bindValue(':prima_por_hogar', $this->prima_por_hogar);
                $strExec->execute(); 
              
                $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
                $respuestaArreglo += ['estado' => true];
                return $respuestaArreglo;
              
              } 

                catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
                $errorReturn = ['estado' => false];
                $errorReturn = ['info' => "error sql:{$e}"];
                return $errorReturn; //retornamos el contenido de esa variable
            }
        
          }


      public function consultarRoles(){
           $strSql = 'SELECT * FROM roles WHERE status_rol >= 1 ORDER BY id_rol desc '; 
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

      public function eliminarCargo($id){ 

      $strSql = "DELETE FROM cargo WHERE id_cargo='$id'"; 
      $strExec = Conexion::prepare($strSql);
      $strExec->execute();
      $respuestaArreglo = true;
      return $respuestaArreglo;

      }//Fin

     // METODOS SETTER

    public function setNombreCargo($name){
      $this->nombre_cargo=$name;
    }
    public function setSueldoSemanal($sueldo){
      $this->sueldo_semanal=$sueldo;
    }
    public function setPrimaHogar($primaHogar){
      $this->prima_por_hogar=$primaHogar;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    
// Metodos Getter

    public function getConex(){
        return $this->conex;}
   
    public function getNombreCargo(){
        return $this->nombre_cargo; 
    }
    public function getSueldoSemanal(){
        return $this->sueldo_semanal;   
    }
    public function getPrimaHogar(){
        return $this->prima_por_hogar;
    }
    public function getStatus(){
        return $this->status;
    }

    }

?>