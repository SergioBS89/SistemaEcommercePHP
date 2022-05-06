<?php  
require_once '../controllers/users_controller.php';
require_once '../models/users_model.php';


/* -------------------------------------------------------------------------- */
/*                  RECIBE DATOS PARA VALIDAR EMAIL REPETIDO                  */
/* -------------------------------------------------------------------------- */

class AjaxValidation{


    /* -------------------------------------------------------------------------- */
    /*         METODO PARA PARA VALIDAR EL EMAIL REPETIDO ENVIADO CON AJAX        */
    /* -------------------------------------------------------------------------- */
    public function emailRep(){

        $dates = $this->valueEmail;
        $table="user";

        $res=UsersController::checkEmail($dates); 
        
        // Manda al js el okay del la conexion
       echo json_encode($res);

    }

    
}

// Comprobamos si llegaron los datos de ajax
if(isset($_POST["emailRep"])){

$valEmail = new AjaxValidation();
$valEmail ->valueEmail = $_POST["emailRep"];
$valEmail->emailRep();
}


?>