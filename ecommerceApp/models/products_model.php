
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
    static public function showProductsPaginatorModel($table,$rowProduct,$valueRow,$num,$order,$mode,$page){

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

    }
    

?>

<!-- /*=============================================
	MOSTRAR INFOPRODUCTO
	=============================================*/

	static public function mdlMostrarInfoProducto($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	
	/*=============================================
	MOSTRAR BANNER
	=============================================*/

	static public function mdlMostrarBanner($tabla, $ruta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BUSCADOR
	=============================================*/

	static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	LISTAR PRODUCTOS
	=============================================*/

	static public function mdlListarProductosBusqueda($tabla, $busqueda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	} -->
