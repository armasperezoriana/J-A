<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Avanzada extends Conexion {

    private $id_operacion;
    private $id_rol;
    private $nombre_rol;
    private $status_rol;
      
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function consultarAvanzada(){
           $strSql = 'SELECT * FROM roles WHERE status_rol != 4 ORDER BY id_rol desc '; 
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
      public function existe($dato){ 
        $strSql = "SELECT  * FROM roles WHERE nombre_rol = '$dato' AND status_rol > 0";
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

      public function consultarOperaciones(){
           $strSql = 'SELECT * FROM operaciones
                                     '; 
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

      public function consultarRolOperacion($rol){
           $strSql = 'SELECT * FROM rol_operacion WHERE id_rol = '.$rol; 
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

      public function consultarModulos(){
           $strSql = 'SELECT * FROM modulos 
                                     '; 
           $respuestaArreglo = '';  
            try {
            
              $strExec = Conexion::prepare($strSql); 
              $strExec->execute(); 
              $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
              return $respuestaArreglo;
            } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch

              return $errorReturn; //retornamos el contenido de esa variable
            }

      }

      public function consultarRol($rol){
           $strSql = 'SELECT * FROM roles WHERE id_rol = '.$rol; 

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

      public function eliminarAntiguosPermisos($idRol){

       $strSql="DELETE FROM rol_operacion WHERE id_rol ='$idRol'"; // creamos la setencia sql
        $strExec = Conexion::prepare($strSql);
        $strExec->execute();

    }

    public function eliminarPreguntas($idUsuario){

       $strSql="DELETE FROM preguntas_seguridad WHERE idUsuario ='$idUsuario'"; // creamos la setencia sql
        $strExec = Conexion::prepare($strSql);
        $strExec->execute();

    }

     public function actualizarOperaciones(){

    $strSql = 'INSERT INTO rol_operacion (id_rol,
                                 id_operacion)

                         VALUES (:id_rol,
                                 :id_operacion)'; 

               $respuestaArreglo = '';  
                try {

                  $strExec = Conexion::prepare($strSql);  
                  $strExec->bindParam(':id_rol',$this->id_rol);
                  $strExec->bindParam(':id_operacion',$this->id_operacion);

                  $strExec->execute(); 
                  $respuestaArreglo = $strExec->fetchAll(); 
                  $respuestaArreglo += ['status' => true];
                 
                 return $respuestaArreglo ;

                } catch (PDOException $e) { 
                  $errorReturn = ['status' => false];
                  $errorReturn += ['info' => "error sql:{$e}"];

                  return $errorReturn;
                }

          }//Fin


     public function registrarRol(){

          $strSql = 'INSERT INTO roles (nombre_rol,
                                       status_rol)

                               VALUES (:nombre_rol,
                                       :status_rol)'; 

                     $respuestaArreglo = '';  
                      try {

                        $strExec = Conexion::prepare($strSql);  
                        $strExec->bindParam(':nombre_rol',$this->nombre_rol);
                        $strExec->bindParam(':status_rol',$this->status_rol);

                        $strExec->execute(); 
                        $respuestaArreglo = $strExec->fetchAll(); 
                        $respuestaArreglo += ['estatus' => true];
                       
                       return $respuestaArreglo ;

                      } catch (PDOException $e) { 
                        $errorReturn = ['estatus' => false];
                        $errorReturn += ['info' => "error sql:{$e}"];

                        return $errorReturn;
                      }

                }//Fin

    public function modificarRol($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE roles 
                       SET nombre_rol = :nombre_rol,
                          status_rol = :status_rol
                     WHERE id_rol= $id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':nombre_rol', $this->nombre_rol);
                $strExec->bindValue(':status_rol', $this->status_rol);
                $strExec->execute(); 
              
                $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
                $respuestaArreglo += ['estatus' => true];
                return $respuestaArreglo;
              
              } 

                catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
                $errorReturn = ['estatus' => false];
                $errorReturn = ['info' => "error sql:{$e}"];
                return $errorReturn; //retornamos el contenido de esa variable
            }
        
          }

    public function eliminarRol($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE roles 
                       SET status_rol = :status_rol
                     WHERE id_rol= $id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':status_rol', $this->status_rol);
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
    public function consultarBitacora(){
           $strSql = 'SELECT * FROM bitacora ORDER BY idbitacora desc '; 
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



     // METODOS SETTER

    public function setidOperacion($id_operacion){
      $this->id_operacion=$id_operacion;
    }
    
    public function setRol($id_rol){
      $this->id_rol=$id_rol;
    }

    public function setNombreRol($nombre){
      $this->nombre_rol=$nombre;
    }

    public function setEstado($estado){
      $this->status_rol=$estado;
    }

// Metodos Getter

    public function getConex(){
        return $this->conex;}
   
    public function getidOperacion(){
        return $this->id_operacion; 
    }
    
    public function getSueldoSemanal(){
        return $this->id_rol;   
    }

    public function getNombreRol(){
        return $this->nombre_rol;   
    }

    public function getEstado(){
        return $this->status_rol;   
    }

    }

?>