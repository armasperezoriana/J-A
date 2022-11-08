<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Inasistencia extends Conexion {
    private $id;
    private $cedula_trabajador;
    private $descripcion;
    private $desde;
    private $hasta;
    private $status;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registrar(){
         $strSql = 'INSERT INTO permiso (cedula_trabajador, 
                                       descripcion,
                                       desde,
                                       hasta,
                                       status) 
                              VALUES (:cedula_trabajador, 
                                      :descripcion,
                                      :desde,
                                      :hasta,
                                      :status)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
            $strExec->bindParam(':descripcion', $this->descripcion);
            $strExec->bindParam(':desde', $this->desde);
            $strExec->bindParam(':hasta', $this->hasta);
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

    public function modificar(){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE permiso 
                       SET cedula_trabajador = :cedula_trabajador,
                          descripcion = :descripcion,
                          desde = :desde,
                          hasta = :hasta
                     WHERE id_permiso= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':cedula_trabajador', $this->cedula_trabajador);
                $strExec->bindValue(':descripcion', $this->descripcion);
                $strExec->bindValue(':desde', $this->desde);
                $strExec->bindValue(':hasta', $this->hasta);
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
           $strSql = 'SELECT * FROM permiso INNER JOIN trabajadores ON permiso.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON cargo.id_cargo = trabajadores.id_cargo WHERE permiso.status >= 1 ORDER BY id_permiso desc'; 
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

      public function consultarInasistencia($cedula){
           $strSql = "SELECT * FROM permiso WHERE cedula_trabajador = '$cedula' AND descripcion = 'Falta' AND status = 1"; 
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
         $strSql = "UPDATE permiso 
                       SET status = :status
                     WHERE id_permiso='$id'";
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
    public function setCedula($cedula_trabajador){
      $this->cedula_trabajador=$cedula_trabajador;
    }
    public function setDescripcion($descripcion){
      $this->descripcion=$descripcion;
    }
    public function setDesde($desde){
      $this->desde=$desde;
    }
    public function setHasta($hasta){
      $this->hasta=$hasta;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
    public function getCedula(){
        return $this->cedula_trabajador; 
    }
    public function getDescripcion(){
        return $this->descripcion;   
    }
    public function getDesde(){
        return $this->desde;
    }
    public function getHasta(){
        return $this->hasta;
    }
    public function getStatus(){
        return $this->status;
    }

    }

?>