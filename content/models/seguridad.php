<?php

namespace content\models;

use content\models\conexion as Conexion;
use \PDO; 

class Seguridad extends Conexion {

    private $pregunta;
    private $respuesta;
    private $idUsuario;
    private $keyPublica;
    private $keyPrivada;
    private $signature;
    
    private $conex;
    
    public function __construct(){
       
       $this->conex = parent::__construct();
       
   }

   public function buscarPreguntas($id){
       
      $strSql = "SELECT * FROM preguntas_seguridad WHERE idUsuario=$id";
      $respuestaArreglo = '';
      
      
      try {
        
        $strExec = Conexion::prepare($strSql);
        $strExec->execute();
                    $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC); //retorna
                    $strExec->execute(); 
                    
          } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch

            $errorReturn += ['info' => "error sql:{$e}"];
            return $errorReturn; ; //retornamos el contenido de esa variable
          }// fin del catch

          
          return $respuestaArreglo;
      }

      public function buscar_questUS($id, $pregunta){
          $strSql = "SELECT * FROM preguntas_seguridad WHERE idUsuario = '$id' AND pregunta = '$pregunta'";
          $respuestaArreglo = '';
          try {
            $strExec = Conexion::prepare($strSql);
            $strExec->execute();
            $strExec ->setFetchMode(PDO::FETCH_ASSOC);
                $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC); //retornamos todos los datos de la ejecucion
                return $respuestaArreglo;
              } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
                $errorReturn += ['info' => "error sql:{$e}"];
                return $errorReturn; //retornamos el contenido de esa variable
             }// fin del catch
          }// fin del metodo consultar


          public function addQuest(){

           $strSql = 'INSERT INTO preguntas_seguridad 
           (idUsuario, 
              pregunta, 
              respuesta) 

           VALUES (:idUsuario, 
            :pregunta, 
            :respuesta)'; 
           $respuestaArreglo = '';  

           try {

            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':idUsuario', $this->idUsuario);
            $strExec->bindParam(':pregunta', $this->pregunta);
            $strExec->bindParam(':respuesta', $this->respuesta);
            $strExec->execute(); 
            $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
            $respuestaArreglo += ['estatus' => true];
            return $respuestaArreglo;
          } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];

            return $errorReturn; //retornamos el contenido de esa variable
        }

        }

        public function registrarKeys(){

           $strSql = 'INSERT INTO key_usuarios 
                                   (idUsuario, 
                                    keyPrivada, 
                                    keyPublica) 

                            VALUES (:idUsuario, 
                                    :keyPrivada, 
                                    :keyPublica)'; 
          
           $respuestaArreglo = '';  

           try {

            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':idUsuario', $this->idUsuario);
            $strExec->bindParam(':keyPrivada', $this->keyPrivada);
            $strExec->bindParam(':keyPublica', $this->keyPublica);
            $strExec->execute(); 
            $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC);
            $respuestaArreglo += ['estatus' => true];
            return $respuestaArreglo;
          } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
            $errorReturn = ['estatus' => false];
            $errorReturn += ['info' => "error sql:{$e}"];

            return $errorReturn; //retornamos el contenido de esa variable
        }

        }

        public function eliminarLlave($id){ // metodo eliminar

        $strSql="DELETE FROM acceso WHERE idAcceso='$id'"; // creamos la setencia sql
        $strExec = Conexion::prepare($strSql);
        $strExec->execute();
       
        }

    
     // METODOS SETTER

    public function setPregunta($pregunta){
      $this->pregunta=$pregunta;
  }
  
  public function setRespuesta($respuesta){
      $this->respuesta=$respuesta;
  }
  
  public function setIdusuario($idUsuario){
      $this->idUsuario = $idUsuario;
  }

  public function setKeyPublica($publica){
      $this->keyPublica = $publica;
  }

  public function setKeyPrivada($privada){
      $this->keyPrivada = $privada;
  }

  public function setSignature($signature){
      $this->signature = $signature;
  }

// Metodos Getter

    public function getConex(){
        return $this->conex;}
    
    public function getSignature(){
        return $this->signature; 
    }

    public function getKeyPublica(){
        return $this->keyPublica; 
    }

    public function getKeyPrivada(){
        return $this->keyPrivada; 
    }

    public function getPregunta(){
        return $this->pregunta; 
    }

    public function getRespuesta(){
        return $this->respuesta; 
    }

    public function getId(){
        return $this->idUsuario; 
    }

}

?>