<?php  

require_once '../controllers/admin_controller.php';
require_once '../models/admin_model.php';



class AjaxAdmin{


    public function showProductModal(){

        
        $dates = array(
            "idProduct" => $this ->idProdu,
        );

        $res=AdminController::modalProductAdmin($dates);  
        
        // Manda al js el okay del la conexion
        echo json_encode($res);
        
    }
}


if(isset($_POST["idProduct"])){

	$add = new AjaxAdmin();
	$add -> idProdu = $_POST["idProduct"];
	$add -> showProductModal();
}
?>

