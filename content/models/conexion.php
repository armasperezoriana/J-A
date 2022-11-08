<?php 
namespace content\models;

use \PDO; 
class Conexion extends PDO {
  public $tipo_de_base = 'mysql';
  public $host='localhost';
  public $bd= 'j_a';
  public $password='';
  public $user='root';
  public $port=5432;
  public $repconexion ;
  public $errorconexion ;
  public $conexion ;

  public function __construct(){
    
    try {

          $this->conexion= parent::__construct("{$this->tipo_de_base}:dbname={$this->bd};host={$this->host};charset=utf8", $this->user, $this->password);//ejecutamos la conexion
          $this->repconexion = true;
          $this->errorconexion=0;
        } catch (PDOException $e) {
         $this->errorconexion = "error en:".$e; 
                        }// fin del catch
          }// fin del método constructor
    public static function sql($query){
        $con=mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASS_, _DB_NAME_WEB_);
        mysqli_set_charset($con, "utf8");
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }else{
            mysqli_autocommit($con, false);
            mysqli_begin_transaction($con, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            if($consul=mysqli_query($con, $query)){
                if (!mysqli_commit($con)) {
                    print("Falló la consignación de la transacción\n");
                    exit();
                }
            }else{
                mysqli_rollback($con);
                echo "Falló la transacción";
                exit();
            }
            return $consul;
        }
    } 
    public static function limpiarCadena($valor) {
        $valor=addslashes($valor);
        $valor = str_ireplace("<script>", "", $valor);
        $valor = str_ireplace("</script>", "", $valor);
        $valor = str_ireplace("SELECT * FROM", "", $valor);
        $valor = str_ireplace("DELETE FROM", "", $valor);
        $valor = str_ireplace("UPDATE", "", $valor);
        $valor = str_ireplace("INSERT INTO", "", $valor);
        $valor = str_ireplace("DROP TABLE", "", $valor);
        $valor = str_ireplace("TRUNCATE TABLE", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("\\", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        return $valor;
    }

          
          public function getrRepConexion(){
            return  $this->repconexion; }
            
      public function getErrorConexion() { //metodo que nos devuelve el mensaje de error si no llega a darse la conexion
        return $this->errorconexion;
      }

}// fin de la clase 

?>
