

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
     /* -------------------------------------------------------------------------- */
    /*                METODO PARA COMPROBAR SI EXISTEN LAS CATEGORIAS       */
    /* -------------------------------------------------------------------------- */

    public static function controllerCategoriesExisting($ruteProduct,$value){

        //asignamos el valor de la tabla de la base de datos
        $table = "category";
        
        //El controlador le pide al modelo que traiga esa info
        $res = ProductsModel::checkCategories($table,$ruteProduct,$value);

        return $res;
    }
      /* -------------------------------------------------------------------------- */
    /*                METODO PARA COMPROBAR SI EXISTEN LAS CATEGORIAS       */
    /* -------------------------------------------------------------------------- */

    public static function controllerSubCategoriesExisting($ruteProduct,$value){

        //asignamos el valor de la tabla de la base de datos
        $table = "subcategories";
        
        //El controlador le pide al modelo que traiga esa info
        $res = ProductsModel::checkSubCategories($table,$ruteProduct,$value);

        return $res;
    }

    /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LOS PRODUCTOS                     */
    /* -------------------------------------------------------------------------- */

    public static function showProducts($orderBy){

    $table = "products";

    $res = ProductsModel::showProductsModel($table,$orderBy);

    return $res;
    }
     /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LOS PRODUCTOS EN OFERTA                 */
    /* -------------------------------------------------------------------------- */

    public static function showProductsOnOffer(){

        $table = "products";
    
        $res = ProductsModel::showProductsOnOfferModel($table);
    
        return $res;
        }

     /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LOS PRODUCTOS EN OFERTA                 */
    /* -------------------------------------------------------------------------- */

    public static function showProductDescription($ruteProduct,$value){

        $table = "products";
    
        $res = ProductsModel::showProductDescriptionModel($table,$ruteProduct,$value);
    
        return $res;
        }


       /* -------------------------------------------------------------------------- */
    /*            METODO PARA LISTAR TODOS LOS PRODUCTOS           */
    /* -------------------------------------------------------------------------- */

    public static function showProductsPaginator($rowProduct,$valueRow,$numProducts){

        $table = "products";
    
        $res = ProductsModel::showProductsPaginatorModel($table,$rowProduct,$valueRow,$numProducts);
    
        return $res;
        }


         /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LA PAGINACION               */
    /* -------------------------------------------------------------------------- */

    public static function countProducts($ordenar,$ruteProduct,$value){

        $table = "products";
    
        $res = ProductsModel::countProductsModel($table, $ordenar, $ruteProduct, $value);
    
        return $res;
        }

}

?>