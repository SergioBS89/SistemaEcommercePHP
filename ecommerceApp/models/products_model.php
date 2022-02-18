
<?php 

//Requerimos una vez la pagina con la funcion conection()
require_once "conection_database.php";

class ProductsModel{

    //metodo que devuelve los registros de las categorias
    public static function showCategories($table){
    
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table");
        $stmt ->execute();


        //Usamos fetchAll porque devolvemos varias filas de registros
        return $stmt -> fetchAll();
        
        //Cerramos la conexion
        $stmt -> null;
    }


    /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve los registros de las subcategorias           */
    /* -------------------------------------------------------------------------- */
    public static function showSubCategories($table,$id){
    
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE id_category = :id_cat");
        
        //Le digo al script sql que el parametro $id es igual a :id_cat
        $stmt -> bindParam(":id_cat",$id,PDO::PARAM_INT);
        
        $stmt ->execute();


        //Usamos fetchAll porque devolvemos varias filas de registros
        return $stmt -> fetchAll();
        
        //Cerramos la conexion
        $stmt -> null;
    }
}

?>