<?php 

//Requerimos una vez la pagina con la funcion conection()
require_once "conection_database.php";

class AdminModel{

    /* -------------------------------------------------------------------------- */
    /*                     METODO PARA COMPROBAR USUARIO ADMIN                    */
    /* -------------------------------------------------------------------------- */

    public static function checkAdminModel($table,$id){

        $stmt=Conection::conectDB()->prepare("SELECT admin FROM $table WHERE id = :value ");
        $stmt -> bindParam(":value", $id, PDO::PARAM_STR);
    
		$stmt -> execute();

		return $stmt -> fetch();
        
		$stmt = null;
    }

     /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve el LISTADO de productos totales   */
    /* -------------------------------------------------------------------------- */
    static public function showProductsAdminModel($table,$order,$numPage,$num){

			$stmt = Conection::conectDB()->prepare("SELECT * FROM $table ORDER BY $order LIMIT $numPage, $num");

			$stmt -> execute();

			return $stmt -> fetchAll();

		
		$stmt = null;

	}

      /* -------------------------------------------------------------------------- */
    /*          METODO QUE ACTUALIZA LOS DATOS DE LOS PRODUCTOS*/
    /* -------------------------------------------------------------------------- */
    static public function updateProductsModel($table,$dates){

        $stmt = Conection::conectDB()->prepare("UPDATE $table SET id_category = :idCat, id_subCat = :idSubcat, name = :nameProd, rute = :rute, offer = :offer,
         description = :desc, price = :price, priceOnOffer = :priceOnOffer, discount = :disccount, numSells = :numSells, image = :image, numViews = :numViews,
         weight = :weigth, deliver = :delivery WHERE id = :idProduct");

        $stmt -> bindParam(":idProduct", $dates["idProd"], PDO::PARAM_STR);
        $stmt -> bindParam(":nameProd",$dates["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCat", $dates["cat"], PDO::PARAM_STR);
		$stmt -> bindParam(":idSubcat", $dates["subcat"], PDO::PARAM_STR);
		$stmt -> bindParam(":desc", $dates["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":rute", $dates["rute"], PDO::PARAM_STR);
		$stmt -> bindParam(":offer", $dates["offer"], PDO::PARAM_STR);
		$stmt -> bindParam(":price", $dates["price"], PDO::PARAM_STR);
		$stmt -> bindParam(":disccount", $dates["disccount"], PDO::PARAM_STR);
		$stmt -> bindParam(":priceOnOffer", $dates["priceOnOffer"], PDO::PARAM_STR);
		$stmt -> bindParam(":image", $dates["image"], PDO::PARAM_STR);
		$stmt -> bindParam(":weigth", $dates["weigth"], PDO::PARAM_INT);
		$stmt -> bindParam(":delivery", $dates["delivery"], PDO::PARAM_STR);
		$stmt -> bindParam(":numViews", $dates["numViews"], PDO::PARAM_INT);
		$stmt -> bindParam(":numSells", $dates["numSells"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
      
        $stmt = null; 

}
 /* -------------------------------------------------------------------------- */
    /*           Metodo que devuelve el LISTADO de productos totales   */
    /* -------------------------------------------------------------------------- */
    static public function modalProductAdminModel($table,$id){

        $stmt = Conection::conectDB()->prepare("SELECT * FROM $table WHERE id=:value");
        $stmt -> bindParam(":value", $id, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

    
    $stmt = null;

}
 /* -------------------------------------------------------------------------- */
    /*           METODO QUE ELIMINA UN PRODUCTO  */
    /* -------------------------------------------------------------------------- */
    static public function removeProductModel($table,$dates){
 
        $stmt=Conection::conectDB()->prepare(" DELETE FROM $table WHERE id = :value");
        $stmt -> bindParam(":value", $dates["id"], PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt = null;
}

}
?>