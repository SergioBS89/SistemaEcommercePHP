

<?php 
require_once '../controllers/products_controller.php';
require_once '../models/products_model.php';
require_once '../controllers/users_controller.php';
require_once '../models/users_model.php';


class Payment{

    public function createOrder(){
   

        $dates = array(
            "idUser" => $this->idUser,
            "idProduct" => $this->id,           
            "name" => $this->name,
            "adress" => $this->adress,
            "city" => $this->city);

        $res=UsersController::createOrder($dates); 
        $res2=UsersController::createProductRate($dates); 
        
        // Manda al js el okay del la conexion
       echo json_encode($res);
       echo json_encode($res2);
      

    }

}
// RECIVO UN ARRAY CON AJAX, LO DECODIFICO Y HACEMOS FOREACH PARA ASI PODER RECORRER LOS ELEMENTOS

if(isset($_POST["id"])){
    $array = json_decode($_POST["id"]);
    foreach ($array as $key => $value) {    
    $order = new Payment();
    $order ->id = $value;
    $order ->idUser = $_POST["idUser"];
    $order ->name = $_POST["name"];
    $order ->adress = $_POST["adress"];
    $order ->city = $_POST["city"];
    $order-> createOrder();
    }
    }
   
?>

