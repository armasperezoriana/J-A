<?php
	
  namespace content\models;
  
  use content\models\conexion as Conexion;
  use \PDO;

  class GestionBD extends Conexion {

    private $conex;
   
    public function __construct(){
                     
                 $this->conex = parent::__construct();
                
      }
      public function respaldar(){
        $day=date("d");
        $mont=date("m");
        $year=date("Y");
        $hora=date("H-i-s");
        $fecha=$day.'_'.$mont.'_'.$year;
        $DataBASE=$fecha."_(".$hora."_hrs).sql";
        $tables=array();
        $result=Conexion::sql('SHOW TABLES');
        if($result){
        while($row=mysqli_fetch_row($result)){
           $tables[] = $row[0];
        }
        $sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
        $sql.='CREATE DATABASE IF NOT EXISTS '._DB_NAME_WEB_.";\n\n";
        $sql.='USE '._DB_NAME_WEB_.";\n\n";;
        foreach($tables as $table){
            $result=Conexion::sql('SELECT * FROM '.$table);
            if($result){
                $numFields=mysqli_num_fields($result);
                $sql.='DROP TABLE IF EXISTS '.$table.';';
                $row2=mysqli_fetch_row(Conexion::sql('SHOW CREATE TABLE '.$table));
                $sql.="\n\n".$row2[1].";\n\n";
                for ($i=0; $i < $numFields; $i++){
                    while($row=mysqli_fetch_row($result)){
                        $sql.='INSERT INTO '.$table.' VALUES(';
                        for($j=0; $j<$numFields; $j++){
                            $row[$j]=addslashes($row[$j]);
                            $row[$j]=str_replace("\n","\\n",$row[$j]);
                            if (isset($row[$j])){
                                $sql .= '"'.$row[$j].'"' ;
                            }
                            else{
                                $sql.= '""';
                            }
                            if ($j < ($numFields-1)){
                                $sql .= ',';
                            }
                        }
                        $sql.= ");\n";
                    }
                }
                $sql.="\n\n\n";
                $error=0;

            }else{
                $error=1;
            }
        }
        if($error==1){
           echo 'Ocurrio un error inesperado al crear la copia de seguridad';
        }else{
            chmod(_BACKUP_PATH_, 0777);
            $sql.='SET FOREIGN_KEY_CHECKS=1;';
            $handle=fopen(_BACKUP_PATH_.$DataBASE,'w+');
            $sql = openssl_encrypt($sql, AES, KEY);
            if(fwrite($handle, $sql)){
                fclose($handle);
                echo '1';
            }else{
              echo 'Ocurrio un error inesperado al crear la copia de seguridad';
            }
        }
    }else{
        echo 'Ocurrio un error inesperado';
    }

    
      }

    public function restore($valor){
        $restorePoint=Conexion::limpiarCadena($valor);
        $archivo = file_get_contents($restorePoint);
        $archivo = openssl_decrypt($archivo, AES, KEY);
        $sql=explode(";",$archivo);
        $totalErrors=0;
        set_time_limit (60);
        $con=mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASS_, _DB_NAME_WEB_);
        $con->query("SET FOREIGN_KEY_CHECKS=0");
        for($i = 0; $i < (count($sql)-1); $i++){
            if($con->query($sql[$i].";")){  
            }else{ 
                $totalErrors++; 
            }
        }
        $con->query("SET FOREIGN_KEY_CHECKS=1");
        $con->close();
        if($totalErrors<=0){
         echo "1";
        }else{
         echo '0';
        }
    }


    }

?>