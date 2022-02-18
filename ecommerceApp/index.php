<?php 
/* -------------------------------------------------------------------------- */
/*              //Llamada a la template html con programacion POO             */
/* -------------------------------------------------------------------------- */

//Para poder hacer uso de las clases de otro archivo es necesario el uso de requiere
require_once "controllers/template_controller.php";
require_once "controllers/products_controller.php";
require_once "models/template_model.php";
require_once "models/products_model.php";
require_once "models/static_rute.php";


//Creamos el objeto de la clase
$template = new TemplateController();

//Llamamos a la funcion de la clase
$template-> getTemplate();

?>