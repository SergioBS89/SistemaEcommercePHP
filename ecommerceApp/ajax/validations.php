<?php  
require_once '../controllers/users_controller.php';
require_once '../models/users_model.php';


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

    /* -------------------------------------------------------------------------- */
    /*        METODO PARA VALIDAR EL INICIO DE SESION CON LOS DATOS DE AJAX       */
    /* -------------------------------------------------------------------------- */

    // public function valSignIn(){

    //     $dates = array(
    //     "valueName"=>$this->valueName,
    //     "valuePass" =>$this->valuePass);

    //     $res=UsersController::valSignIN($dates);

    //     echo $res;
    // }
 


}

// Comprobamos si llegaron los datos de ajax
if(isset($_POST["emailRep"])){

$valEmail = new AjaxValidation();
$valEmail ->valueEmail = $_POST["emailRep"];
$valEmail->emailRep();
}

// if(isset($_POST["nameIN"])){

// $valSignIN = new AjaxValidation();
// $valSignIN -> valueName = $_POST["nameIN"];
// $valSignIN -> valuePass = $_POST["passIN"];
// $valSignIN ->valSignIn();
// }
?>