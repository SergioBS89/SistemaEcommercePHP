

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
        // $res2=UsersController::createProductRate($dates); 
        
        // Manda al js el okay del la conexion
       echo json_encode($res);
    //    echo json_encode($res2);
      

    }

}
// RECIVO UN ARRAY CON AJAX EN FORMATO JSON CON LOS PEDIDOS

if(isset($_POST["id"])){
       
    $order = new Payment();
    $order ->id = $_POST["id"];
    $order ->idUser = $_POST["idUser"];
    $order ->name = $_POST["name"];
    $order ->adress = $_POST["adress"];
    $order ->city = $_POST["city"];
    $order-> createOrder();
    }
    
  
   
?>

