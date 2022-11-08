<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Bono extends Conexion {
    private $id;
    private $nombre_bono;
    private $id_cargo;
    private $valor;
    private $dias;
    private $moneda;
    private $status;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registrar(){
         $strSql = 'INSERT INTO bonos (nombre_bono, 
                                       id_cargo,
                                       valor,
                                       dias,
                                       moneda,
                                       status) 
                              VALUES (:nombre_bono, 
                                      :id_cargo,
                                      :valor,
                                      :dias,
                                      :moneda,
                                      :status)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':nombre_bono', $this->nombre_bono);
            $strExec->bindParam(':id_cargo', $this->id_cargo);
            $strExec->bindParam(':valor', $this->valor);
            $strExec->bindParam(':dias', $this->dias);
            $strExec->bindParam(':moneda', $this->moneda);
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
        $strSql = "SELECT  * FROM bonos WHERE nombre_bono = '$dato' AND status > 0";
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

    public function modificar(){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE bonos 
                       SET nombre_bono = :nombre_bono,
                          id_cargo = :id_cargo,
                          valor = :valor,
                          dias = :dias,
                          moneda = :moneda
                     WHERE id_bono= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql); 
                $strExec->bindValue(':nombre_bono', $this->nombre_bono); 
                $strExec->bindValue(':id_cargo', $this->id_cargo);
                $strExec->bindValue(':valor', $this->valor);
                $strExec->bindValue(':dias', $this->dias);
                $strExec->bindValue(':moneda', $this->moneda);
                $strExec->bindValue(':id', $this->id);
                $strExec->execute(); 
              
                $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
                $respuestaArreglo += ['resp' => true];
                return $respuestaArreglo;
              
              } 

                catch (PDOException $e){ //si hay un error en la instruccion sql entramos en el catch
                $errorReturn = ['resp' => false];
                $errorReturn = ['info' => "error sql:{$e}"];
                return $errorReturn; //retornamos el contenido de esa variable
            }
        
          }


      public function consultar(){
           $strSql = 'SELECT * FROM bonos INNER JOIN cargo ON bonos.id_cargo = cargo.id_cargo WHERE bonos.status >= 1 ORDER BY id_bono desc'; 
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
      public function consultarBono($id_bono){
           $strSql = "SELECT * FROM bonos INNER JOIN cargo ON bonos.id_cargo = cargo.id_cargo WHERE bonos.status >= 1 AND id_bono = '$id_bono' ORDER BY id_bono desc"; 
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
         $strSql = "UPDATE bonos 
                       SET status = :status
                     WHERE id_bono='$id'";
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
    public function setNombre_bono($nombre_bono){
      $this->nombre_bono=$nombre_bono;
    }
    public function setNombre_cargo($id_cargo){
      $this->id_cargo=$id_cargo;
    }
    public function setValor($valor){
      $this->valor=$valor;
    }
    public function setDias($dias){
      $this->dias=$dias;
    }
    public function setMoneda($moneda){
      $this->moneda=$moneda;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
    public function getNombre_bono(){
        return $this->nombre_bono; 
    }
    public function getNombre_cargo(){
        return $this->id_cargo;   
    }
    public function getValor(){
        return $this->valor;
    }
    public function getDias(){
        return $this->dias;
    }
    public function getMoneda(){
        return $this->moneda;
    }
    public function getStatus(){
        return $this->status;
    }

    }

?>