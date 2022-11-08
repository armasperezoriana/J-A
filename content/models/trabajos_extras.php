<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Trabajos_extras extends Conexion {
    private $id;
    private $cedula_trabajador;
    private $descripcion_trabajo;
    private $fecha_trabajo;
    private $descripcion;
    private $cantidad;
    private $total_unidad;
    private $fecha_pago;
    private $tipo_pago;
    private $total_pagar;
    private $status;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registrar(){
         $strSql = 'INSERT INTO trabajosextras (cedula_trabajador, 
                                       descripcion_trabajo,
                                       fecha_trabajo,
                                       descripcion,
                                       cantidad,
                                       total_unidad,
                                       fecha_pago,
                                       tipo_pago,
                                       total_pagar,
                                       status) 
                              VALUES (:cedula_trabajador, 
                                      :descripcion_trabajo,
                                      :fecha_trabajo,
                                      :descripcion,
                                      :cantidad,
                                      :total_unidad,
                                      :fecha_pago,
                                      :tipo_pago,
                                      :total_pagar,
                                      :status)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
            $strExec->bindParam(':descripcion_trabajo', $this->descripcion_trabajo);
            $strExec->bindParam(':fecha_trabajo', $this->fecha_trabajo);
            $strExec->bindParam(':descripcion', $this->descripcion);
            $strExec->bindParam(':cantidad', $this->cantidad);
            $strExec->bindParam(':total_unidad', $this->total_unidad);
            $strExec->bindParam(':fecha_pago', $this->fecha_pago);
            $strExec->bindParam(':tipo_pago', $this->tipo_pago);
            $strExec->bindParam(':total_pagar', $this->total_pagar);
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
      
         $strSql = "UPDATE trabajosextras 
                       SET cedula_trabajador = :cedula_trabajador,
                          descripcion_trabajo = :descripcion_trabajo,
                          fecha_trabajo = :fecha_trabajo,
                          descripcion = :descripcion,
                          cantidad = :cantidad,
                          total_unidad = :total_unidad,
                          fecha_pago = :fecha_pago,
                          tipo_pago = :tipo_pago,
                          total_pagar = :total_pagar
                     WHERE id_trabajosExtras= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
                $strExec->bindParam(':descripcion_trabajo', $this->descripcion_trabajo);
                $strExec->bindParam(':fecha_trabajo', $this->fecha_trabajo);
                $strExec->bindParam(':descripcion', $this->descripcion);
                $strExec->bindParam(':cantidad', $this->cantidad);
                $strExec->bindParam(':total_unidad', $this->total_unidad);
                $strExec->bindParam(':fecha_pago', $this->fecha_pago);
                $strExec->bindParam(':tipo_pago', $this->tipo_pago);
                $strExec->bindParam(':total_pagar', $this->total_pagar);
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
           $strSql = 'SELECT * FROM trabajosextras INNER JOIN trabajadores ON trabajosextras.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON trabajadores.id_cargo = cargo.id_cargo WHERE trabajosextras.status = 1'; 
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
         $strSql = "UPDATE trabajosextras 
                       SET status = :status
                     WHERE id_trabajosExtras='$id'";
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
    public function setDescripcion_trabajo($descripcion_trabajo){
      $this->descripcion_trabajo=$descripcion_trabajo;
    }
    public function setFecha_trabajo($fecha_trabajo){
      $this->fecha_trabajo=$fecha_trabajo;
    }
    public function setDescripcion($descripcion){
      $this->descripcion=$descripcion;
    }
    public function setCantidad($cantidad){
      $this->cantidad=$cantidad;
    }
    public function setTotal_unidad($total_unidad){
      $this->total_unidad=$total_unidad;
    }
    public function setFecha_pago($fecha_pago){
      $this->fecha_pago=$fecha_pago;
    }
    public function setTipo_pago($tipo_pago){
      $this->tipo_pago=$tipo_pago;
    }
    public function setTotal_pagar($total_pagar){
      $this->total_pagar=$total_pagar;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;
    }
   
    public function getCedula(){
        return $this->cedula_trabajador; 
    }
    public function getDescripcion_trabajo(){
        return $this->descripcion_trabajo;   
    }
    public function getFecha_trabajo(){
        return $this->fecha_trabajo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getCantidad(){
        return $this->cantidad; 
    }
    public function getTotal_unidad(){
        return $this->total_unidad;   
    }
    public function getFecha_pago(){
        return $this->fecha_pago;
    }
    public function getTipo_pago(){
        return $this->tipo_pago;
    }
    public function getTotal_pagar(){
        return $this->total_pagar;
    }
    public function getStatus(){
        return $this->status;
    }

    }

?>