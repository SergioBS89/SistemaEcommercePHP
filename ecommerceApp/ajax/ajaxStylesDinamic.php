
<?php 

require_once '../controllers/template_controller.php';
require_once '../models/template_model.php';

class AjaxStylesDinamics{

    public function ajaxStyles(){

        $res= TemplateController::controllerStyleTemplate();

        //json_encode() - Transforma un array en un string
        echo json_encode($res);
    }
}
$obj= new AjaxStylesDinamics();
$obj -> ajaxStyles();
?>