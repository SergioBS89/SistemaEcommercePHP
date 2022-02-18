<?php 

class TemplateController

{
    /* -------------------------------------------------------------------------- */
    /*                      METODO QUE LLAMA A LA TEMPLATE               */
    /* -------------------------------------------------------------------------- */

    public function getTemplate(){

    #Ponemos la ruta absoluta del fichero que queremos mostrar
    include "views/template.php"; 

    }

    /* -------------------------------------------------------------------------- */
    /*                METODO PARA CAMBIAR LOS ESTILOS DINAMICAMENTE               */
    /* -------------------------------------------------------------------------- */

    public static function controllerStyleTemplate(){

        //asignamos el valor de la tabla de la base de datos
        $table = "template_styles";
        
        //El controlador le pide 
        $res = TemplateModel::modelStyleTemplate($table);

        return $res;
    }
    
}

?>