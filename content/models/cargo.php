<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Cargo extends Conexion {
    private $id;
    private $nombre_cargo;
    private $sueldo_semanal;
    private $prima_por_hogar;
    private $status;
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
            $respuestaArreglo += ['resp' => true];
            return $respuestaArreglo;
          } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
            $errorReturn = ['resp' => false];
            $errorReturn += ['info' => "error sql:{$e}"];

            return $errorReturn; //retornamos el contenido de esa variable
          }

    }
    public function existe($dato){ 
        $strSql = "SELECT  * FROM cargo WHERE nombre_cargo = '$dato' AND status > 0";
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

    public function modificarCargo(){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE cargo 
                       SET sueldo_semanal = :sueldo_semanal,
                          nombre_cargo = :nombre_cargo,
                          prima_por_hogar = :prima_por_hogar
                     WHERE id_cargo= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':sueldo_semanal', $this->sueldo_semanal);
                $strExec->bindValue(':prima_por_hogar', $this->prima_por_hogar);
                $strExec->bindValue(':nombre_cargo', $this->nombre_cargo);
                $strExec->bindValue(':id', $this->id);
                $strExec->execute(); 
              
                $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
                $respuestaArreglo += ['resp' => true];
                return $respuestaArreglo;
              
              } 

                catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
                $errorReturn = ['resp' => false];
                $errorReturn = ['info' => "error sql:{$e}"];
                return $errorReturn; //retornamos el contenido de esa variable
            }
        
          }


      public function consultarCargos(){
           $strSql = 'SELECT * FROM cargo WHERE status = 1 ORDER BY id_cargo desc '; 
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

      public function eliminar($id){   //funcion para modificar al usuarios
        $eliminado = 0;
         $strSql = "UPDATE cargo 
                       SET status = :status
                     WHERE id_cargo='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':status', $eliminado);
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
        
          }//Fin

     // METODOS SETTER
    public function setId($id){
      $this->id=$id;
    }
    public function setNombre_cargo($nombre_cargo){
      $this->nombre_cargo=$nombre_cargo;
    }
    public function setSueldo_semanal($sueldo_semanal){
      $this->sueldo_semanal=$sueldo_semanal;
    }
    public function setPrima_por_hogar($prima_por_hogar){
      $this->prima_por_hogar=$prima_por_hogar;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
    public function getNombre_cargo(){
        return $this->nombre_cargo; 
    }
    public function getSueldo_semanal(){
        return $this->sueldo_semanal;   
    }
    public function getPrima_por_hogar(){
        return $this->prima_por_hogar;
    }
    public function getStatus(){
        return $this->status;
    }

    }

?>