<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Nomina extends Conexion {
    private $id;
    private $cedula_trabajador;
    private $periodo_desde;
    private $periodo_hasta;
    private $horas_extras;
    private $tipo_pago;
    private $fecha_pago;
    private $status;
    private $ivss;
    private $rpe;
    private $faov;
    private $inces;
    private $total_pagar_nomina;
    private $inasistencias;

    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

      public function registrar(){
         $strSql = 'INSERT INTO nomina (cedula_trabajador, 
                                       periodo_desde,
                                       periodo_hasta,
                                       horas_extras,
                                       tipo_pago,
                                       fecha_pago,
                                       status,
                                       ivss,
                                       rpe,
                                       faov,
                                       inces,
                                       total_pagar_nomina,
                                       inasistencias) 
                              VALUES (:cedula_trabajador, 
                                      :periodo_desde,
                                      :periodo_hasta,
                                      :horas_extras,
                                      :tipo_pago,
                                      :fecha_pago,
                                      :status,
                                      :ivss,
                                      :rpe,
                                      :faov,
                                      :inces,
                                      :total_pagar_nomina,
                                      :inasistencias)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
            $strExec->bindParam(':periodo_desde', $this->periodo_desde);
            $strExec->bindParam(':periodo_hasta', $this->periodo_hasta);
            $strExec->bindParam(':horas_extras', $this->horas_extras);
            $strExec->bindParam(':tipo_pago', $this->tipo_pago);
            $strExec->bindParam(':fecha_pago', $this->fecha_pago);
            $strExec->bindParam(':status', $this->status);

            $strExec->bindParam(':ivss', $this->ivss);
            $strExec->bindParam(':rpe', $this->rpe);
            $strExec->bindParam(':faov', $this->faov);
            $strExec->bindParam(':inces', $this->inces);
            $strExec->bindParam(':total_pagar_nomina', $this->total_pagar_nomina);
            $strExec->bindParam(':inasistencias', $this->inasistencias);

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
      
         $strSql = "UPDATE nomina 
                       SET cedula_trabajador = :cedula_trabajador,
                          periodo_desde = :periodo_desde,
                          periodo_hasta = :periodo_hasta,
                          horas_extras = :horas_extras,
                          tipo_pago = :tipo_pago,
                          fecha_pago = :fecha_pago,

                          ivss = :ivss,
                          rpe = :rpe,
                          faov = :faov,
                          inces = :inces,
                          total_pagar_nomina = :total_pagar_nomina,
                          inasistencias = :inasistencias
                     WHERE id_nomina= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
                $strExec->bindParam(':periodo_desde', $this->periodo_desde);
                $strExec->bindParam(':periodo_hasta', $this->periodo_hasta);
                $strExec->bindParam(':horas_extras', $this->horas_extras);
                $strExec->bindParam(':tipo_pago', $this->tipo_pago);
                $strExec->bindParam(':fecha_pago', $this->fecha_pago);
                $strExec->bindParam(':ivss', $this->ivss);
                $strExec->bindParam(':rpe', $this->rpe);
                $strExec->bindParam(':faov', $this->faov);
                $strExec->bindParam(':inces', $this->inces);
                $strExec->bindParam(':total_pagar_nomina', $this->total_pagar_nomina);
                $strExec->bindParam(':inasistencias', $this->inasistencias);
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
           $strSql = 'SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON cargo.id_cargo = trabajadores.id_cargo WHERE nomina.status >= 1 ORDER BY id_nomina desc'; 
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
      public function consultarNomina($cedula){
           $strSql = "SELECT * FROM nomina INNER JOIN trabajadores ON nomina.cedula_trabajador = trabajadores.cedula INNER JOIN cargo ON cargo.id_cargo = trabajadores.id_cargo WHERE nomina.status >= 1 AND cedula_trabajador = '$cedula' ORDER BY periodo_hasta DESC LIMIT 1"; 
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
         $strSql = "UPDATE nomina 
                       SET status = :status
                     WHERE id_nomina='$id'";
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
    public function setPeriodo_desde($periodo_desde){
      $this->periodo_desde=$periodo_desde;
    }
    public function setPeriodo_hasta($periodo_hasta){
      $this->periodo_hasta=$periodo_hasta;
    }
    public function setHoras_extras($horas_extras){
      $this->horas_extras=$horas_extras;
    }
    public function setTipo_pago($tipo_pago){
      $this->tipo_pago=$tipo_pago;
    }
    public function setFecha_pago($fecha_pago){
      $this->fecha_pago=$fecha_pago;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    public function setIvss($ivss){
      $this->ivss=$ivss;
    }
    public function setRpe($rpe){
      $this->rpe=$rpe;
    }
    public function setFaov($faov){
      $this->faov=$faov;
    }

    public function setInces($inces){
      $this->inces=$inces;
    }
    public function setTotal_nomina_pagar($total_pagar_nomina){
      $this->total_pagar_nomina=$total_pagar_nomina;
    }
    public function setInasistencia($inasistencias){
      $this->inasistencias=$inasistencias;
    }
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
    public function getCedula(){
        return $this->cedula_trabajador; 
    }
    public function getPeriodo_desde(){
        return $this->periodo_desde;   
    }
    public function getPeriodo_hasta(){
        return $this->periodo_hasta;
    }
    public function getHoras_extras(){
        return $this->horas_extras;
    }
    public function getTipo_pago(){
        return $this->tipo_pago;
    }
    public function getFecha_pago(){
        return $this->fecha_pago;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getIvss(){
        return $this->ivss;
    }
    public function getRpe(){
        return $this->rpe;
    }
    public function getFaov(){
        return $this->faov;
    }
    public function getInces(){
        return $this->inces;
    }
    public function getTotal_nomina_pagar(){
        return $this->total_pagar_nomina;
    }
    public function getInasistencia(){
        return $this->inasistencias;
    }

    }

?>