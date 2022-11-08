<?php
  
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
  use PDOException;
    
  class Trabajador extends Conexion {

    private $nombre;
    private $cargo;
    private $apellido;
    private $cedula;
    private $fecha_ingreso;
    private $t_celular;
    private $celular;
    private $fecha_nacimiento;
    private $correo;
    private $estado;

    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registerTrabajador(){
         $strSql = 'INSERT INTO trabajadores (nombre, 
                                       apellido,
                                       cedula,
                                       fecha_ingreso,
                                       correo,
                                       id_cargo,
                                       fecha_nacimiento,
                                       t_celular,
                                       celular,
                                       estado) 
                              VALUES (:nombre, 
                                      :apellido,
                                      :cedula,
                                      :fecha_ingreso,
                                      :correo,
                                      :id_cargo,
                                      :fecha_nacimiento,
                                      :t_celular,
                                      :celular,
                                      :estado)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':nombre', $this->nombre);
            $strExec->bindParam(':apellido', $this->apellido);
            $strExec->bindParam(':cedula', $this->cedula);
            $strExec->bindParam(':estado', $this->estado);
            $strExec->bindParam(':fecha_ingreso', $this->fecha_ingreso);
            $strExec->bindParam(':correo', $this->correo);
            $strExec->bindParam(':id_cargo', $this->cargo);
            $strExec->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
            $strExec->bindParam(':t_celular', $this->t_celular);
            $strExec->bindParam(':celular', $this->celular);
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

    public function modificar(){   //funcion para modificar al usuarios
         $strSql = "UPDATE trabajadores 
                       SET nombre = :nombre,
                           apellido = :apellido,
                           correo = :correo,
                           fecha_ingreso = :fecha_ingreso,
                           id_cargo = :id_cargo,
                           fecha_nacimiento = :fecha_nacimiento,
                           t_celular = :t_celular,
                           celular = :celular
                     WHERE cedula= :cedula";
          $respuestaArreglo = '';   
              
              try {
                $strExec = Conexion::prepare($strSql);  
                $strExec->bindParam(':nombre', $this->nombre);
                $strExec->bindParam(':apellido', $this->apellido);
                $strExec->bindParam(':correo', $this->correo);
                $strExec->bindParam(':cedula', $this->cedula);
                $strExec->bindParam(':fecha_ingreso', $this->fecha_ingreso);
                $strExec->bindParam(':correo', $this->correo);
                $strExec->bindParam(':id_cargo', $this->cargo);
                $strExec->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
                $strExec->bindParam(':t_celular', $this->t_celular);
                $strExec->bindParam(':celular', $this->celular);
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
      public function existe($dato){ 
        $strSql = "SELECT  * FROM trabajadores WHERE cedula = '$dato' AND estado > 0";
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


      public function consultarTrabajadores(){
           $strSql = 'SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE trabajadores.estado >= 1 AND cedula != 0000'; 
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
      public function consultarTrabajador($cedula){
           $strSql = "SELECT * FROM trabajadores INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE trabajadores.estado >= 1 AND cedula = '$cedula'"; 
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
         $strSql = "UPDATE trabajadores 
                       SET estado = :estado
                     WHERE cedula='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':estado', $eliminado);
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

    public function setNombre($nombre){
      $this->nombre=$nombre;
    }
    public function setApellido($apellido){
      $this->apellido=$apellido;
    }
    public function setCedula($cedula){
      $this->cedula=$cedula;
    }
    public function setFecha_ingreso($fecha_ingreso){
      $this->fecha_ingreso=$fecha_ingreso;
    }
    public function setCorreo($correo){
      $this->correo=$correo;
    }
    public function setCelular($celular){
      $this->celular=$celular;
    }
    public function setT_celular($t_celular){
      $this->t_celular=$t_celular;
    }
    public function setFecha_nacimiento($fecha_nacimiento){
      $this->fecha_nacimiento=$fecha_nacimiento;
    }
    public function setCargo($cargo){
      $this->cargo=$cargo;
    }
    public function setStatus($estado){
      $this->estado=$estado;
    }
    
// Metodos Getter

    public function getConex(){
        return $this->conex;}
   
    public function getNombre(){
        return $this->nombre; 
    }
    public function getApellido(){
        return $this->apellido;   
    }
    public function getCedula(){
        return $this->cedula;
    }
    public function getFecha_ingreso(){
        return $this->fecha_ingreso;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getCelular(){
      return $this->celular;
    }
    public function getT_celular(){
      return $this->t_celular;
    }
    public function getFecha_nacimiento(){
      return $this->fecha_nacimiento;
    }
    public function getCargo(){
        return $this->cargo;
    }
    public function getStatus(){
        return $this->estado;
    }

    }

?>