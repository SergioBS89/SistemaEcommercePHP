

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
    /*                METODO PARA COMPROBAR SI EXISTEN LAS SUBCATEGORIAS       */
    /* -------------------------------------------------------------------------- */

    public static function controllerSubCategoriesExisting($ruteProduct,$value){

        //asignamos el valor de la tabla de la base de datos
        $table = "subcategories";
        
        //El controlador le pide al modelo que traiga esa info
        $res = ProductsModel::checkSubCategories($table,$ruteProduct,$value);

        return $res;
    }

    /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LOS PRODUCTOS  PAGINA INICIO                  */
    /* -------------------------------------------------------------------------- */

    public static function showProducts($orderBy){

    $table = "products";

    $res = ProductsModel::showProductsModel($table,$orderBy);

    return $res;
    }
     /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LOS PRODUCTOS EN LISTA COMPRAS                 */
    /* -------------------------------------------------------------------------- */

    public static function showProductsProfile($valueRow){

        $table = "products";
    
        $res = ProductsModel::showProductsProfileModel($table,$valueRow);
    
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

    public static function showProductsList($rowProduct,$valueRow,$numProducts,$order,$mode,$page){

        $table = "products";
    
        $res = ProductsModel::showProductsListModel($table,$rowProduct,$valueRow,$numProducts,$order,$mode,$page);
    
        return $res;
        }


         /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LA PAGINACION               */
    /* -------------------------------------------------------------------------- */

    public static function countProducts($order,$rowProduct,$valueRow){

        $table = "products";
    
        $res = ProductsModel::countProductsModel($table, $order, $rowProduct, $valueRow);
    
        return $res;
        }

    
       /* -------------------------------------------------------------------------- */
    /*            METODO PARA LISTAR LOS PRODUCTOS DEL BUSCADOR         */
    /* -------------------------------------------------------------------------- */

    public static function searchingProducts($searchProduct,$numProducts,$order,$mode,$page){

        $table = "products";
    
        $res = ProductsModel::searchingProductsModel($table,$searchProduct,$numProducts,$order,$mode,$page);
    
        return $res;
        }



    /* -------------------------------------------------------------------------- */
    /*            METODO PARA CONTAR LOS PRODUCTOS DEL BUSCADOR         */
    /* -------------------------------------------------------------------------- */

    public static function countProductsSearch($searchProduct){

        $table = "products";
    
        $res = ProductsModel::countProductsSearchModel($table,$searchProduct);
    
        return $res;
        }

    
     /* -------------------------------------------------------------------------- */
    /*            METODO QUE DEVUELVE EL RESULTADO DE UN PRODUCTO PARA LA DESCRIPCION       */
    /* -------------------------------------------------------------------------- */

    public static function descriptionProduct($rute){

        $table = "products";
    
        $res = ProductsModel::descriptionProductModel($table,$rute);
    
        return $res;
    }
  
      /* -------------------------------------------------------------------------- */
    /*                      METODO PARA MOSTRAR LOS PRODUCTOS REALCIONADOS                   */
    /* -------------------------------------------------------------------------- */

    public static function showProductsRelated($valueRow,$valueRow2,$valueRow3,$orderBy){

        $table = "products";
    
        $res = ProductsModel::showProductsRelatedModel($table,$valueRow,$valueRow2,$valueRow3,$orderBy);
    
        return $res;
        }

            /* -------------------------------------------------------------------------- */
    /*  METODO PARA ACTUALIZAR EL NUMERO DE VISTAS EN LA BASE DE DATOS                  */
    /* -------------------------------------------------------------------------- */

    public static function updateNumViews($dates){

        $table = "products";
    
        $res = ProductsModel::updateNumViewsModel($table,$dates);
    
        return $res;
        }


}

?>