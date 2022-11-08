<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO; 
    
  class Usuario extends Conexion {

    private $contrasena;
    private $cedula_trabajador;
    private $id_rol;
    private $foto;
    private $status;
    private $seguridad;

    private $conex;
   
     public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }
    public function registerUsuario(){

         $strSql = 'INSERT INTO usuarios (contrasena, id_rol, cedula_trabajador, status) 
                              VALUES (:contrasena, :id_rol, :cedula_trabajador, :status)'; 
         $respuestaArreglo = '';  
          try {
            $pass_cifrado = password_hash($this->contrasena, PASSWORD_DEFAULT);
            // var_dump($this->contrasena);
            // var_dump($pass_cifrado);
            $strExec = Conexion::prepare($strSql); 
            $strExec->bindParam(':contrasena', $pass_cifrado);
            $strExec->bindParam(':cedula_trabajador', $this->cedula_trabajador);
            $strExec->bindParam(':id_rol', $this->id_rol);
            $strExec->bindParam(':status', $this->status);
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

    public function modificarFoto($ci){
        $strSql = "UPDATE usuarios 
                          SET foto = :foto 
                        WHERE cedula_trabajador ='".$ci."'";
                     
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql);
            $strExec->bindValue(':foto',$this->foto);
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

    // ************************************* NUEVA FUNCION *************************************

      public function consultaUsuariosAccesos(){
         
            $strSql = 'SELECT * FROM usuarios 
                          INNER JOIN roles 
                                  ON usuarios.id_rol = roles.id_rol 
                          INNER JOIN trabajadores 
                                  ON usuarios.cedula_trabajador = trabajadores.cedula 
                              WHERE usuarios.idUsuario !=1 AND usuarios.status > 0
                            ORDER BY usuarios.status asc'; 
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

    public function actualizarPaso($id){
        $strSql = "UPDATE usuarios 
                          SET pasoSeguridad = :seguridad 
                        WHERE idUsuario ='".$id."'";
                     
         $respuestaArreglo = '';  
          try {
            $strExec = Conexion::prepare($strSql);
            $strExec->bindValue(':seguridad',$this->seguridad);
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

     public function modificarUsuario($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE usuarios 
                       SET contrasena = :contrasena,
                           id_rol = :id_rol
                     WHERE idUsuario='$id'";
          $respuestaArreglo = '';   
              
              try {

                $pass_cifrado = password_hash($this->contrasena, PASSWORD_DEFAULT);
                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':contrasena', $pass_cifrado);
                $strExec->bindValue(':id_rol', $this->id_rol);
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

        public function modificarUsuarioSinHash($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE usuarios 
                       SET contrasena = :contrasena,
                           id_rol = :id_rol
                     WHERE idUsuario='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':contrasena', $this->contrasena);
                $strExec->bindValue(':id_rol', $this->id_rol);
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

        public function intentoUsuario($id){   //funcion para modificar al usuarios
      
         $strSql = "UPDATE usuarios 
                       SET status = :status
                     WHERE idUsuario='$id'";
          $respuestaArreglo = '';   
              
              try {

                $strExec = Conexion::prepare($strSql);  
                $strExec->bindValue(':status', $this->status);
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

         public function eliminarUsuario($id){   //funcion para modificar al usuarios
        $eliminado = 0;
         $strSql = "UPDATE usuarios 
                       SET status = :status
                     WHERE idUsuario='$id'";
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
        
          }

     public function SearchPass($ci){
      $strSql = "SELECT * FROM usuarios 
                         WHERE cedula_trabajador=$ci
                           AND status > 0
                           AND status < 4 ";
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
      }// fin del metodo Buscar

       public function searchExiste($ci){
      $strSql = "SELECT * FROM usuarios 
                         WHERE cedula_trabajador=$ci";
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
      }// fin del metodo Buscar

      public function SearchUsuarioBloqueado($ci){
      $strSql = "SELECT * FROM usuarios INNER JOIN preguntas_seguridad ON usuarios.idUsuario = preguntas_seguridad.idUsuario WHERE usuarios.cedula_trabajador= $ci";
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
      }// fin del metodo Buscar

      public function SearchPassBloqueo($ci){
      $strSql = "SELECT * FROM usuarios 
                         WHERE cedula_trabajador=$ci
                           AND status > 0
                           AND status < 4";
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
      }// fin del metodo Buscar

       public function notificarBloqueo($ci){
      $strSql = "SELECT * FROM usuarios 
                         WHERE cedula_trabajador=$ci
                           AND status > 0";
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
      }// fin del metodo Buscar

      public function consultaUsuarios(){
           //$strSql = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE status >= 1 ORDER BY idUsuario desc '; 
            $strSql = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol INNER JOIN trabajadores ON usuarios.cedula_trabajador = trabajadores.cedula WHERE usuarios.status = 1 ORDER BY idUsuario desc'; 
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

       public function consultarCiUsuarios($cedula){
           //$strSql = 'SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE status >= 1 ORDER BY idUsuario desc '; 

            $strSql = 'SELECT * FROM usuarios 
                          INNER JOIN roles 
                                  ON usuarios.id_rol = roles.id_rol 
                          INNER JOIN trabajadores 
                                  ON usuarios.cedula_trabajador = trabajadores.cedula 
                               WHERE usuarios.status > 0
                                 AND usuarios.status < 4
                                 AND usuarios.cedula_trabajador = '.$cedula; 
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

      public function buscarUsuarios($id){

            $strSql = 'SELECT * FROM usuarios 
                          INNER JOIN roles 
                                  ON usuarios.id_rol = roles.id_rol 
                          INNER JOIN trabajadores 
                                  ON usuarios.cedula_trabajador = trabajadores.cedula 
                               WHERE usuarios.idUsuario = '.$id; 
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

      public function SearchDates(){
      $strSql = "SELECT * FROM usuarios
                     RIGHT JOIN trabajadores
                         ON usuarios.cedula_trabajador = trabajadores.cedula
                           ";
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
      }// fin del metodo Buscar

      public function consultarPreguntas($id){
      $strSql = "SELECT * FROM usuarios
                    RIGHT JOIN preguntas_seguridad
                            ON usuarios.idUsuario = preguntas_seguridad.idUsuario
                      WHERE usuarios.idUsuario = $id
                           ";
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
      }// fin del metodo Buscar

       public function consultarKeys($id){
      $strSql = "SELECT * FROM key_usuarios
                         WHERE idUsuario = $id
                           ";
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
      }// fin del metodo Buscar

       // METODOS SETTER


    public function setPasoSeguridad($seguridad){
      $this->seguridad=$seguridad;
    }
    public function setContrasena($contrasena){
      $this->contrasena=$contrasena;
    }
    public function setCedula_trabajador($cedula_trabajador){
      $this->cedula_trabajador=$cedula_trabajador;
    }
    public function setId_rol($id_rol){
      $this->id_rol=$id_rol;
    }
    public function setStatus($status){
      $this->status=$status;
    }
    public function setFoto($foto){
      $this->foto=$foto;
    }
    
// Metodos Getter

    public function getConex(){
        return $this->conex;}
   

    public function getContrasena(){
        return $this->contrasena;   
    }
    public function getPasoSeguridad(){
        return $this->seguridad;   
    }
    public function getCedula_trabajador(){
        return $this->cedula_trabajador;
    }
    public function getId_rol(){
        return $this->id_rol;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getFoto(){
        return $this->foto;
    }

    }

?>