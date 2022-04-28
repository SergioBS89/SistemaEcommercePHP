<?php 

require_once '../controllers/products_controller.php';
require_once '../models/products_model.php';
require_once '../controllers/users_controller.php';
require_once '../models/users_model.php';


class AjaxProducts{

    public function ajaxViews(){

        $dates = array("counter"=>$this->counter,
                       "rute" =>$this->rute);

        $res=ProductsController::updateNumViews($dates);  
        
        // Manda al js el okay del la conexion
        echo $res;
    }

    public function addWishList(){

        
        $dates = array(
            "idProduct" => $this ->idProdu,
            "idUser" => $this ->idUser
        );

        $res=UsersController::addProductListWish($dates);  
        
        // Manda al js el okay del la conexion
        echo $res;
        
    }
}

/* ------------------------- DATOS NUMERO DE VISTAS ------------------------- */
// Si existe la variable post enviada desde rateProducts.js con ajax
if(isset($_POST["counter"])){

	$numViews = new AjaxProducts();
	$numViews -> counter = $_POST["counter"];
	$numViews -> rute = $_POST["rute"];
	$numViews -> ajaxViews();
}

/* ---------------------- DATOS AGREGAR A LISTA DESEOS ---------------------- */
// Si existe la variable post enviada desde rateProducts.js con ajax
if(isset($_POST["idProduct"])){

	$add = new AjaxProducts();
	$add -> idProdu = $_POST["idProduct"];
    $add -> idUser = $_POST["idUser"];
	$add -> addWishList();
}
?>

