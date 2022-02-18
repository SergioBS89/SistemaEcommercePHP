<?php  
/* -------------------------------------------------------------------------- */
/*               CLASE PARA MANTENER LA RUTA DE DIRECTORIOS FIJA              */
/* -------------------------------------------------------------------------- */
//  Para poder enviar varios paramametros dentro de la url amigable, es necesario crear un ruta de directorios fija y no
//  se creen conflictos con los directorios

class StaticRute{

    public static function rute(){


        //Cambiar ruta cuando subimos el proyecto
        return "http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/";
    }
}

?>