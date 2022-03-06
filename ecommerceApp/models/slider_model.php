<?php 

//Requerimos una vez la pagina con la funcion conection()
require_once "conection_database.php";

class SliderModel{
    
        //Metodo estatico ya que recibe un parametro la funcion
        static public function modelSliderStyle($table){
    
            $stmt = Conection::conectDB()->prepare("SELECT * FROM $table");
            $stmt ->execute();
            
            //Devolvemos varios registros de la tabla
            return $stmt -> fetchAll();
            
            //Cerramos la conexion
            $stmt -> null;
        }

     }
    

?>