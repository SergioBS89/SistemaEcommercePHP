<?php 
/* -------------------------------------------------------------------------- */
/*              Llamada a la template html           */
/* -------------------------------------------------------------------------- */

//Para poder hacer uso de las clases de otros archivos es necesario el uso de requiere
require_once "controllers/template_controller.php";
require_once "controllers/products_controller.php";
require_once "controllers/slider_controller.php";
require_once "controllers/users_controller.php";
require_once "controllers/admin_controller.php";
require_once "models/template_model.php";
require_once "models/products_model.php";
require_once "models/static_rute.php";
require_once "models/slider_model.php";
require_once "models/users_model.php";
require_once "models/admin_model.php";
// require_once "ajax/ajaxAdministrator.php";


//Creamos el objeto de la clase
$template = new TemplateController();

//Llamamos a la funcion de la clase
$template-> getTemplate();

?>