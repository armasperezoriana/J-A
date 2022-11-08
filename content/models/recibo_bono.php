<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Recibo_bono extends Conexion {
    private $id;
    private $id_bono;
    private $periodo_desde;
    private $periodo_hasta;
    private $tipo_pago;
    private $fecha_pago;
    private $inasistencias;
    private $valor_actual;
    private $total_pago;
    private $status;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registrar(){
         $strSql = 'INSERT INTO recibos_bonos (cedula_trabajador, 
                                       id_bono,
                                       periodo_desde,
                                       periodo_hasta,
                                       tipo_pago,
                                       fecha_pago,
                                       inasistencias,
                                       valor_actual,
                                       total_pagar,
                                       status) 
                              VALUES (:cedula_trabajador, 
                                      :id_bono,
                                      :periodo_desde,
                                      :periodo_hasta,
                                      :tipo_pago,
                                      :fecha_pago,
                                      :inasistencias,
                                      :valor_actual,
                                      :total_pagar,
                                      :status)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
            $strExec->bindParam(':id_bono', $this->id_bono);
            $strExec->bindParam(':periodo_desde', $this->periodo_desde);
            $strExec->bindParam(':periodo_hasta', $this->periodo_hasta);
            $strExec->bindParam(':tipo_pago', $this->tipo_pago);
            $strExec->bindParam(':fecha_pago', $this->fecha_pago);
            $strExec->bindParam(':inasistencias', $this->inasistencias);
            $strExec->bindParam(':valor_actual', $this->valor_actual);
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
      
         $strSql = "UPDATE recibos_bonos 
                       SET cedula_trabajador = :cedula_trabajador,
                          id_bono = :id_bono,
                          periodo_desde = :periodo_desde,
                          periodo_hasta = :periodo_hasta,
                          tipo_pago = :tipo_pago,
                          fecha_pago = :fecha_pago,
                          inasistencias = :inasistencias,
                          valor_actual = :valor_actual,
                          total_pagar = :total_pagar
                     WHERE id_recibo_bono= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
                $strExec->bindParam(':id_bono', $this->id_bono);
                $strExec->bindParam(':periodo_desde', $this->periodo_desde);
                $strExec->bindParam(':periodo_hasta', $this->periodo_hasta);
                $strExec->bindParam(':tipo_pago', $this->tipo_pago);
                $strExec->bindParam(':fecha_pago', $this->fecha_pago);
                $strExec->bindParam(':inasistencias', $this->inasistencias);
                $strExec->bindParam(':valor_actual', $this->valor_actual);
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
           $strSql = 'SELECT * FROM recibos_bonos INNER JOIN trabajadores ON recibos_bonos.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON cargo.id_cargo = trabajadores.id_cargo INNER JOIN bonos ON bonos.id_bono = recibos_bonos.id_bono WHERE recibos_bonos.status = 1'; 
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
         $strSql = "UPDATE recibos_bonos 
                       SET status = :status
                     WHERE id_recibo_bono='$id'";
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
    public function setId_bono($id_bono){
      $this->id_bono=$id_bono;
    }
    public function setPeriodo_desde($periodo_desde){
      $this->periodo_desde=$periodo_desde;
    }
    public function setPeriodo_hasta($periodo_hasta){
      $this->periodo_hasta=$periodo_hasta;
    }
    public function setTipo_pago($tipo_pago){
      $this->tipo_pago=$tipo_pago;
    }
    public function setFecha_pago($fecha_pago){
      $this->fecha_pago=$fecha_pago;
    }
    public function setInasistencia($inasistencias){
      $this->inasistencias=$inasistencias;
    }
    public function setValor_actual($valor_actual){
      $this->valor_actual=$valor_actual;
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
    public function getId_bono(){
        return $this->id_bono;   
    }
    public function getPeriodo_desde(){
        return $this->periodo_desde;
    }
    public function getPeriodo_hasta(){
        return $this->periodo_hasta;
    }
    public function getTipo_pago(){
        return $this->tipo_pago; 
    }
    public function getFecha_pago(){
        return $this->fecha_pago;   
    }
    
    public function getInasistencia(){
        return $this->inasistencias;
    }
    public function getValor_actual(){
        return $this->valor_actual; 
    }
    public function getTotal_pagar(){
        return $this->total_pagar;   
    }

    public function getStatus(){
        return $this->status;
    }

    }

?>