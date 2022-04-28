<?php 

//Requerimos una vez la pagina con la funcion conection()
require_once "conection_database.php";


class TemplateModel{
    

    static public function modelStyleTemplate($table){

        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table");
        $stmt ->execute();

        return $stmt -> fetch();
        
        //Cerramos la conexion
        $stmt -> null;
    }
}

?>