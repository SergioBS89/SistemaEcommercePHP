
<?php 

//Requerimos una vez la pagina con la funcion conection()
require_once "conection_database.php";

class ProductsModel{

    /* -------------------------------------------------------------------------- */
    /*             metodo que devuelve los registros de las categorias            */
    /* -------------------------------------------------------------------------- */
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

    /* -------------------------------------------------------------------------- */
    /*       metodo que comprueba si la lista de categorias en la BD existe       */
    /* -------------------------------------------------------------------------- */
    public static function checkCategories($table,$ruteProduct,$value){
    
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE $ruteProduct = :value");

        $stmt -> bindParam(":value",$value,PDO::PARAM_STR);
        $stmt ->execute();


        //Usamos fetch porque devolvemos una fila de registros
        return $stmt -> fetch();
        
        //Cerramos la conexion
        $stmt -> null;
    }

 /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve los registros de las subcategorias           */
    /* -------------------------------------------------------------------------- */
    public static function checkSubCategories($table,$ruteProduct,$value){
    
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE $ruteProduct = :value");
        
        //Le digo al script sql que el parametro $id es igual a :id_cat
        $stmt -> bindParam(":value",$value,PDO::PARAM_STR);
        
        $stmt ->execute();


        //Usamos fetchAll porque devolvemos varias filas de registros
        return $stmt -> fetchAll();
        
        //Cerramos la conexion
        $stmt -> null;
    }
    }
    

?>