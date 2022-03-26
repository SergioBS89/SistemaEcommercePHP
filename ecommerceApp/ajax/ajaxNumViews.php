<?php 

require_once '../controllers/products_controller.php';
require_once '../models/products_model.php';

class AjaxNumViews{

    public function ajaxViews(){

        $dates = array("counter"=>$this->counter,
                       "rute" =>$this->rute);

        $res=ProductsController::updateNumViews($dates);  
        
        // Manda al js el okay del la conexion
        echo $res;
    }
}
// Si existe la variable post enviada desde countViews.js con ajax
if(isset($_POST["counter"])){

	$numViews = new AjaxNumViews();
	$numViews -> counter = $_POST["counter"];
	$numViews -> rute = $_POST["rute"];
	$numViews -> ajaxViews();
}
?>