<?php
  
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;
    
  class Notificacion extends Conexion {

    private $idUsuario;
    private $respuesta;

    private $idEmisor;
    private $idReceptor;
    private $asunto;
    private $mensaje;
    private $cifrado;
    private $tipo;
    private $favorito;
    private $fecha;
    private $leido;
    private $aprobacion;
    private $idBuzon;
      
    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }

    public function registrarAcceso(){
         $strSql = 'INSERT INTO acceso (idUsuario, 
                                       respuesta) 
                              VALUES (:idUsuario, 
                                      :respuesta)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':idUsuario', $this->idUsuario);
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

    public function ultimoMensaje(){
              $strSql = 'SELECT MAX(idNotificacion) AS id FROM notificaciones';
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


    public function registrarNotificacion(){
         $strSql = 'INSERT INTO notificaciones (idEmisor,
                                                idReceptor,
                                                asunto,
                                                mensaje,
                                                tipo,
                                                favorito,
                                                fecha,
                                                leido) 
                                        VALUES (:idEmisor,
                                                :idReceptor,
                                                :asunto,
                                                :mensaje,
                                                :tipo,
                                                :favorito,
                                                :fecha,
                                                :leido)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':idEmisor', $this->idEmisor);
            $strExec->bindParam(':idReceptor', $this->idReceptor);
            $strExec->bindParam(':asunto', $this->asunto);
            $strExec->bindParam(':mensaje', $this->mensaje);
            $strExec->bindParam(':tipo', $this->tipo);
            $strExec->bindParam(':favorito', $this->favorito);
            $strExec->bindParam(':fecha', $this->fecha);
            $strExec->bindParam(':leido', $this->leido);

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

    public function registrarNotificacionCifrado(){
         $strSql = 'INSERT INTO notificaciones (idEmisor,
                                                idReceptor,
                                                asunto,
                                                cifrado,
                                                tipo,
                                                favorito,
                                                fecha,
                                                leido) 
                                        VALUES (:idEmisor,
                                                :idReceptor,
                                                :asunto,
                                                :cifrado,
                                                :tipo,
                                                :favorito,
                                                :fecha,
                                                :leido)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':idEmisor', $this->idEmisor);
            $strExec->bindParam(':idReceptor', $this->idReceptor);
            $strExec->bindParam(':asunto', $this->asunto);
            $strExec->bindParam(':cifrado', $this->cifrado);
            $strExec->bindParam(':tipo', $this->tipo);
            $strExec->bindParam(':favorito', $this->favorito);
            $strExec->bindParam(':fecha', $this->fecha);
            $strExec->bindParam(':leido', $this->leido);

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


   public function actTipo($id){
        $strSql = "UPDATE notificaciones  SET tipo=:tipo
                                WHERE idNotificacion='".$id."'";
                     
     $respuestaArreglo = '';  
      try {
        $strExec = Conexion::prepare($strSql);  
        $strExec->bindValue(':tipo',$this->tipo);

        $strExec->execute(); 
        $respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
        $respuestaArreglo += ['estatus' => true];
        return $respuestaArreglo;
      } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
        $errorReturn = ['estatus' => false];
        $errorReturn += ['info' => "error sql:{$e}"];

        return $errorReturn; //retornamos el contenido de esa variable
      }

    }

    public function registrarMensaje(){
               $strSql = 'INSERT INTO mensajes (idBuzon,
                                                idEmisor,
                                                idReceptor) 
                                        VALUES (:idBuzon,
                                                :idEmisor,
                                                :idReceptor)'; 
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':idBuzon', $this->idBuzon);
            $strExec->bindParam(':idEmisor', $this->idEmisor);
            $strExec->bindParam(':idReceptor', $this->idReceptor);

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

    public function modificarTipoMensaje($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE notificaciones 
                       SET tipo = :tipo
                     WHERE idNotificacion='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':tipo', $this->tipo);
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

    public function setFav($id){
        $strSql = "UPDATE notificaciones  SET favorito=:favorito
                                WHERE idNotificacion='".$id."'";
                     
     $respuestaArreglo = '';  
      try {
        $strExec = Conexion::prepare($strSql);  
        $strExec->bindValue(':favorito',$this->favorito);

        $strExec->execute(); 
        $respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
        $respuestaArreglo += ['estatus' => true];
        return $respuestaArreglo;
      } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
        $errorReturn = ['estatus' => false];
        $errorReturn += ['info' => "error sql:{$e}"];

        return $errorReturn; //retornamos el contenido de esa variable
      }

    }

    public function modificarNotificacion($id){
        $strSql = "UPDATE notificaciones  SET mensaje=:mensaje,
                                              idReceptor=:idReceptor,
                                              leido=:leido
                                        WHERE idNotificacion='".$id."'";
                     
     $respuestaArreglo = '';  
      try {
        $strExec = Conexion::prepare($strSql);  
        $strExec->bindValue(':mensaje',$this->mensaje);
        $strExec->bindValue(':idReceptor',$this->idReceptor);
        $strExec->bindValue(':leido',$this->leido);
        $strExec->execute(); 
        $respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
        $respuestaArreglo += ['estatus' => true];
        return $respuestaArreglo;
      } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
        $errorReturn = ['estatus' => false];
        $errorReturn += ['info' => "error sql:{$e}"];

        return $errorReturn; //retornamos el contenido de esa variable
      }

    }

    public function modificarAprobacion($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE acceso 
                       SET aprobacion = :aprobacion
                     WHERE idUsuario='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':aprobacion', $this->aprobacion);
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

    public function actualizarVisualizacion($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE notificaciones 
                       SET leido = :leido
                     WHERE idNotificacion='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':leido', $this->leido);
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

    public function chequeoMensaje($idMsj){
              $strSql = "SELECT *FROM mensajes 
                                WHERE mensajes.idBuzon ='$idMsj'";
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

    public function eliminarRegistro($msj){

       $strSql="DELETE FROM notificaciones WHERE idNotificacion='$msj'"; // creamos la setencia sql
        $strExec = Conexion::prepare($strSql);
        $strExec->execute();

    }

    public function eliminarRegistroEmisor($msj){

       $strSql="DELETE FROM mensajes WHERE idBuzon='$msj'"; // creamos la setencia sql
        $strExec = Conexion::prepare($strSql);
        $strExec->execute();

    }

    public function eliminarMsj($msj){
       $strSql = "UPDATE notificaciones  SET idReceptor=:idReceptor
                                          WHERE idNotificacion='".$msj."'";
                     
     $respuestaArreglo = '';  
      try {
        $strExec = Conexion::prepare($strSql);  
        $strExec->bindValue(':idReceptor',$this->idReceptor);

        $strExec->execute(); 
        $respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
        $respuestaArreglo += ['estatus' => true];
        return $respuestaArreglo;
      } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
        $errorReturn = ['estatus' => false];
        $errorReturn += ['info' => "error sql:{$e}"];

        return $errorReturn; //retornamos el contenido de esa variable
      }

    }

    public function consultarBuzon($id){
           $strSql = 'SELECT * FROM notificaciones  
                          LEFT JOIN usuarios
                                ON  notificaciones.idEmisor = usuarios.idUsuario
                          LEFT JOIN trabajadores
                                ON usuarios.cedula_trabajador = trabajadores.cedula
                             WHERE notificaciones.idReceptor = '.$id.' 
                               AND notificaciones.tipo != 3
                             ORDER BY idNotificacion desc '; 
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

      public function consultarBuzonFavoritos($id){
           $strSql = 'SELECT * FROM notificaciones  
                          LEFT JOIN usuarios
                                ON  notificaciones.idEmisor = usuarios.idUsuario
                          LEFT JOIN trabajadores
                                ON usuarios.cedula_trabajador = trabajadores.cedula
                             WHERE notificaciones.idReceptor = '.$id.' 
                               AND notificaciones.tipo != 4
                               AND notificaciones.favorito = 1
                             ORDER BY idNotificacion desc '; 
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

      public function consultarBuzonArchivados($id){
           $strSql = 'SELECT * FROM notificaciones  
                          LEFT JOIN usuarios
                                ON  notificaciones.idEmisor = usuarios.idUsuario
                          LEFT JOIN trabajadores
                                ON usuarios.cedula_trabajador = trabajadores.cedula
                             WHERE notificaciones.idReceptor = '.$id.' 
                               AND notificaciones.tipo = 3
                             ORDER BY idNotificacion desc '; 
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

      public function consultarBuzonEnviados($id){
           $strSql = 'SELECT * FROM mensajes  
                          LEFT JOIN notificaciones
                                ON mensajes.idBuzon = notificaciones.idNotificacion
                          LEFT JOIN usuarios
                                ON  mensajes.idReceptor = usuarios.idUsuario
                          LEFT JOIN trabajadores
                                ON usuarios.cedula_trabajador = trabajadores.cedula
                             WHERE mensajes.idEmisor = '.$id.' 
                             ORDER BY idNotificacion desc '; 
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

      public function consultarNotificaciones($id){
              $strSql = "SELECT * FROM notificaciones 
                                 WHERE tipo = '1'
                                   AND idReceptor = '$id'
                              ORDER BY leido ASC";
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

      public function consultarMensaje($idMensaje, $idUsuario){
           $strSql = 'SELECT * FROM notificaciones  
                          LEFT JOIN usuarios
                                 ON  notificaciones.idEmisor = usuarios.idUsuario
                          LEFT JOIN trabajadores
                                 ON usuarios.cedula_trabajador = trabajadores.cedula
                          LEFT JOIN cargo
                                 ON trabajadores.id_cargo = cargo.id_cargo
                             WHERE notificaciones.idReceptor = '.$idUsuario.'
                               AND notificaciones.idNotificacion = '.$idMensaje.'
                             ORDER BY idNotificacion desc '; 
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

      public function consultarMensajesEnviados($idMensaje, $idUsuario){
           $strSql = 'SELECT * FROM notificaciones
                              LEFT JOIN usuarios
                                ON notificaciones.idReceptor = usuarios.idUsuario
                              LEFT JOIN trabajadores
                                ON usuarios.cedula_trabajador = trabajadores.cedula
                                WHERE  notificaciones.idNotificacion = '.$idMensaje; 
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

      public function consultarNotificacionesxLeer($id){
              $strSql = "SELECT * FROM notificaciones 
                             LEFT JOIN usuarios
                                    ON notificaciones.idEmisor = usuarios.idUsuario
                             LEFT JOIN trabajadores 
                                    ON usuarios.cedula_trabajador = trabajadores.cedula
                                 WHERE tipo != '3'
                                   AND idReceptor = '$id'
                                   AND leido = 0
                              ORDER BY leido ASC";
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

          public function consultarNotificacionesxLeerMax($id){
              $strSql = "SELECT * FROM notificaciones 
                             LEFT JOIN usuarios
                                    ON notificaciones.idEmisor = usuarios.idUsuario
                             LEFT JOIN trabajadores 
                                    ON usuarios.cedula_trabajador = trabajadores.cedula
                                 WHERE tipo != '3'
                                   AND idReceptor = '$id'
                                   AND leido = 0
                              ORDER BY leido ASC
                                 LIMIT 5";
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


     // METODOS SETTER

    public function setIdusuario($id){
      $this->idUsuario=$id;
    }

    public function setBuzon($idBuzon){
      $this->idBuzon=$idBuzon;
    }

    public function setIdEmisor($idEmisor){
      $this->idEmisor=$idEmisor;
    }

    public function setidReceptor($idReceptor){
      $this->idReceptor=$idReceptor;
    }

    public function setasunto($asunto){
      $this->asunto=$asunto;
    }

    public function setmensaje($mensaje){
      $this->mensaje=$mensaje;
    }

    public function setcifrado($cifrado){
      $this->cifrado=$cifrado;
    }

    public function settipo($tipo){
      $this->tipo=$tipo;
    }

    public function setfavorito($favorito){
      $this->favorito=$favorito;
    }

    public function setfecha($fecha){
      $this->fecha=$fecha;
    }

    public function setleido($leido){
      $this->leido=$leido;
    }

    public function setRespuesta($resp){
      $this->respuesta=$resp;
    }

    public function setAprobacion($apro){
      $this->aprobacion=$apro;
    }
    
// Metodos Getter

    public function getConex(){
        return $this->conex;}

    public function getAprobacion(){
        return $this->aprobacion; 
    }

    public function getBuzon(){
        return $this->idBuzon; 
    }
   
    public function getIdusuario(){
        return $this->idUsuario; 
    }
    public function getRespuesta(){
        return $this->respuesta;   
    }

    public function getfecha(){
        return $this->fecha;   
    }

    public function getleido(){
        return $this->leido;   
    }

    public function getfavorito(){
        return $this->favorito;   
    }

    public function gettipo(){
        return $this->tipo;   
    }

    public function getmensaje(){
        return $this->mensaje;   
    }

    public function getcifrado(){
        return $this->cifrado;   
    }

    public function getasunto(){
        return $this->asunto;   
    }

    public function getidReceptor(){
        return $this->idReceptor;   
    }

    public function getidEmisor(){
        return $this->idEmisor;   
    }

    }

?>