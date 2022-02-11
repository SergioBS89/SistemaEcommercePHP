<?php 
//Llamada a la template html con programacion POO

//Para poder instanciar una clase de otro archivo es necesario el uso de requiere
require_once "controllers/template_controller.php";
//Para poder instanciar una clase de otro archivo es necesario el uso de requiere
require_once "models/template_model.php";

//Creamos el objeto de la clase
$template = new TemplateController();

//Llamamos a la funcion de la clase
$template-> getTemplate();

?>