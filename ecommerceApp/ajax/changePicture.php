
<?php  
require_once '../controllers/users_controller.php';
require_once '../models/users_model.php';


/* -------------------------------------------------------------------------- */
/*                  RECIBE EL SRC DE LAS IMAGEN DEL LOGO              */
/* -------------------------------------------------------------------------- */

class Picture{


    public function changePic(){

        $dates = array(
           "src" => $this->src,
           "id" =>$this->id
        );
    
        $res=UsersController::changePicture($dates); 
        
        // Manda al js el okay del la conexion
       echo $res;

    }

    
}

// Comprobamos si llegaron los datos de ajax
if(isset($_POST["srcImg"])){

$valSrc = new Picture();
$valSrc -> src = $_POST["srcImg"];
$valSrc -> id = $_POST["idUser"];
$valSrc-> changePic();
}


?>