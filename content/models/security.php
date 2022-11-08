<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;

  class Security extends Conexion {
    private $id;
    private $nombre_rol;
    private $status;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registrarRol(){
         $strSql = 'INSERT INTO roles (nombre_rol,
                                       status) 
                              VALUES (:nombre_rol,
                                      :status)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':nombre_rol', $this->nombre_rol);
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

    public function modificarRol(){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE roles 
                       SET nombre_rol = :nombre_rol
                     WHERE id_rol= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':nombre_rol', $this->nombre_rol);
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


      public function consultarRoles(){
           $strSql = 'SELECT * FROM roles WHERE status >= 1 ORDER BY id_rol desc '; 
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
         $strSql = "UPDATE roles 
                       SET status = :status
                     WHERE id_rol='$id'";
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
    public function setNombre_rol($nombre_rol){
      $this->nombre_rol=$nombre_rol;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
    public function getNombre_rol(){
        return $this->nombre_rol; 
    }

    public function getStatus(){
        return $this->status;
    }

    }

?>