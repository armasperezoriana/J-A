<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Deducciones extends Conexion {
    private $id;
    private $ivss;
    private $rpe;
    private $faov;
    private $inces;
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

    public function modificar(){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE deducciones 
                       SET ivss = :ivss,
                          rpe = :rpe,
                          faov = :faov,
                          inces = :inces
                     WHERE id_deducciones= :id";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':ivss', $this->ivss);
                $strExec->bindValue(':rpe', $this->rpe);
                $strExec->bindValue(':faov', $this->faov);
                $strExec->bindValue(':inces', $this->inces);
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
           $strSql = 'SELECT * FROM deducciones ORDER BY id_deducciones desc '; 
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
    
// Metodos Getter
    public function getId(){
        return $this->id;}
    public function getConex(){
        return $this->conex;}
   
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

    }

?>