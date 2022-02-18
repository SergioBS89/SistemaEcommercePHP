

<?php 

class ProductsController{

     /* -------------------------------------------------------------------------- */
    /*                METODO PARA MOSTRAR LAS CATEGORIAS DINAMICAS          */
    /* -------------------------------------------------------------------------- */

    public static function controllerCategoriesDinamic(){

        //asignamos el valor de la tabla de la base de datos
        $table = "category";
        
        //El controlador le pide al modelo que traiga esa info
        $res = ProductsModel::showCategories($table);

        return $res;
    }
    
     /* -------------------------------------------------------------------------- */
    /*                METODO PARA MOSTRAR LAS SUBCATEGORIAS DINAMICAS          */
    /* -------------------------------------------------------------------------- */
    public static function controllerSubCategoriesDinamic($id){

        //asignamos el valor de la tabla de la base de datos
        $table = "subcategories";
        
        //El controlador le pide al modelo que traiga esa info
        $res = ProductsModel::showSubCategories($table,$id);

        return $res;
    }
}

?>