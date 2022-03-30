
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


    /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve los registros de la tabla productos para la pagina principal      */
    /* -------------------------------------------------------------------------- */
    public static function showProductsModel($table,$orderBy){

        // Traemos un maximo de 4 productos para mostar en las principales secciones
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table ORDER BY $orderBy desc LIMIT 4");    
        $stmt ->execute();
        //Usamos fetchAll porque devolvemos varias filas de registros
        return $stmt -> fetchAll();
        
        //Cerramos la conexion
        $stmt -> null;
    }

     /* -------------------------------------------------------------------------- */
    /*        METODO PARA MOSTRAR PRODUCTOS EN  LISTA DE COMPRAS  DENTRO DEL PERFIL */
    /* -------------------------------------------------------------------------- */
    public static function showProductsProfileModel($table,$valueRow){

        // Traemos un maximo de 4 productos para mostar en las principales secciones
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE id = :value ");   
        $stmt -> bindParam(":value",$valueRow,PDO::PARAM_STR); 
        $stmt ->execute();
        //Usamos fetchAll porque devolvemos varias filas de registros
        return $stmt -> fetchAll();
        
        //Cerramos la conexion
        $stmt -> null;
    }



     /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve los registros de la tabla productos CON OFERTA para la pagina principal      */
    /* -------------------------------------------------------------------------- */
    public static function showProductsOnOfferModel($table){

        // Traemos un maximo de 4 productos para mostar en las principales secciones
        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE offer = 1 LIMIT 4");    
        $stmt ->execute();
        //Usamos fetchAll porque devolvemos varias filas de registros
        return $stmt -> fetchAll();
        
        //Cerramos la conexion
        $stmt -> null;
    }


    /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve los registros de la tabla productos CON OFERTA para la pagina principal      */
    /* -------------------------------------------------------------------------- */
    public static function showProductDescriptionModel($table,$ruteProduct,$value){

        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE $ruteProduct = :value");
        
        //Le digo al script sql que el parametro $id es igual a :id_cat
        $stmt -> bindParam(":value",$value,PDO::PARAM_STR);
        
        $stmt ->execute();


        //Usamos fetch porque devolvemos un solo registro
        return $stmt -> fetch();
        
        //Cerramos la conexion
        $stmt -> null;
    }

     /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve el LISTADO de productos   */
    /* -------------------------------------------------------------------------- */
    static public function showProductsListModel($table,$rowProduct,$valueRow,$num,$order,$mode,$page){

		if($rowProduct != null){

        

			$stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE $rowProduct = :value ORDER BY $order $mode LIMIT $page, $num");

		    
           //Le digo al script sql que el parametro
           $stmt -> bindParam(":value",$valueRow,PDO::PARAM_STR);
        //    $stmt -> bindParam(":num",$num,PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetchAll();

		}
        // SI HAY QUE MOSTRAR LOS PRODUCTOS MOSTVIEWED O BESTSELLER
        else{

			$stmt = Conection::conectDB()->prepare("SELECT * FROM $table ORDER BY $order $mode LIMIT $page, $num");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		$stmt = null;

	}
    /*=============================================
	CONTADOR DE PRODUCTOS PARA LA PAGINACION
	=============================================*/

	static public function countProductsModel($table,$rowProduct, $valueRow, $order){

        if($rowProduct != null){

        

			$stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE $rowProduct = :value");

		    
           //Le digo al script sql que el parametro
           $stmt -> bindParam(":value",$valueRow,PDO::PARAM_STR);
        //    $stmt -> bindParam(":num",$num,PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetchAll();

		}
        // SI HAY QUE MOSTRAR LOS PRODUCTOS MOSTVIEWWED O BESTSELLER
        else{

			$stmt = Conection::conectDB()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		$stmt = null;

	}

    /* -------------------------------------------------------------------------- */
    /*                        LISTAR PRODUCTOS DEL BUSCADOR                       */
    /* -------------------------------------------------------------------------- */

	static public function searchingProductsModel($table, $searchProduct,$numProducts,$order,$mode,$page){

		$stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE rute like '%$searchProduct%'
        OR name like '%$searchProduct%' OR description like '%$searchProduct%' ORDER BY $order $mode LIMIT $page, $numProducts");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;

	}
    /* -------------------------------------------------------------------------- */
    /*                          CONTAR PRODUCTOS BUSCADOR                         */
    /* -------------------------------------------------------------------------- */

	static public function descriptionProductModel($table,$rute){

		$stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE rute = :value");
        $stmt -> bindParam(":value",$rute,PDO::PARAM_STR);
		$stmt -> execute();
        
        //Uso de fetch porque solo devuelve un solo registro
		return $stmt -> fetch();

		$stmt = null;

	} 

     /* -------------------------------------------------------------------------- */
    /*                          CONTAR PRODUCTOS BUSCADOR                         */
    /* -------------------------------------------------------------------------- */

	static public function countProductsSearchModel($table,$searchProduct){

		$stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE rute like '%$searchProduct%' OR name like '%$searchProduct%'
         OR description like '%$searchProduct%'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;

	} 
      /* -------------------------------------------------------------------------- */
    /*                          CONTAR PRODUCTOS BUSCADOR                         */
    /* -------------------------------------------------------------------------- */

	static public function showProductsRelatedModel($table,$valueRow,$valueRow2,$valueRow3,$orderBy){

		$stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE $valueRow = id_category AND $valueRow2 = id_subCat 
        AND :value <> rute  ORDER BY $orderBy LIMIT 4");
        $stmt -> bindParam(":value",$valueRow3,PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt = null;

	} 

/* -------------------------------------------------------------------------- */
/*                         ACTUALIZAR NUMERO DE VISTAS DE PRODUCTOS                   */
/* -------------------------------------------------------------------------- */

	static public function updateNumViewsModel($tabla, $dates){

        $stmt = Conection::conectDB()->prepare("UPDATE $tabla SET numViews = :rowProduct WHERE rute = :rute");

        $stmt -> bindParam(":rowProduct", $dates["counter"], PDO::PARAM_STR);
		$stmt -> bindParam(":rute", $dates["rute"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;

    }
    }
    

?>

