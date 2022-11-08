<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Dolar extends Conexion {
    private $id;
    private $valor_actual;
    private $fecha_actualizacion;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

    public function modificar(){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE dolar 
                       SET valor_actual = :valor_actual,
                        fecha_actualizacion = :fecha_actualizacion
                     WHERE id_dolar= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':valor_actual', $this->valor_actual);
                $strExec->bindValue(':fecha_actualizacion', $this->fecha_actualizacion);
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


      public function consultar(){
           $strSql = 'SELECT * FROM dolar ORDER BY id_dolar desc '; 
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
    public function setId($id){
      $this->id=$id;
    }
    public function setValor_actual($valor_actual){
      $this->valor_actual=$valor_actual;
    }
    public function setFecha_actualizacion($fecha_actualizacion){
      $this->fecha_actualizacion=$fecha_actualizacion;
    }

    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
    public function getValor_actual(){
        return $this->valor_actual; 
    }
    public function getFecha_actualizacion(){
        return $this->fecha_actualizacion; 
    }

    }
?>