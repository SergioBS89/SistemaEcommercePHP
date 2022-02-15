
                  <!-- /* --------------------------------------------------------------------------*/
                       /*                      HTML DE TODO EL HEADER DEL PROYECTO                  */
                       /* --------------------------------------------------------------------------*/ -->


<!-- /* ----------------------------------------------------------------------*/
/*                           REDES SOCIALES Y LOGIN                           */
/* -------------------------------------------------------------------------- */ -->

<!-- Las clases de bootstrap estan separadas con guiones, las creadas por mi usan camelCase-->
<div class="container-fluid barraTop" id="top">

    <div class="container">

        <div class="row">

            <!-- /* --------------------------------- social --------------------------------- */ -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
                <ul>
                    <?php 
                    //Lamamos al controlador para la conexion a la base de datos 
                    $stylesDB = TemplateController::controllerStyleTemplate();
                    
                    // json_decode()--transforma un string(json), en un array
                    $jsonSocialMedia = json_decode($stylesDB["socialMedia"], true);
                    
                    //Recorremos el resultado de los registros devueltos
                    foreach($jsonSocialMedia as $key => $value){
                        echo '
                        <li>
                        <a href="'.$value["url"].'" target="_blank">
                            <i class="fa fa-lg '.$value["red"].' socialMedia '.$value["style"].'" aria-hidden="true"></i>
                        </a>
                    </li>';
                    }
                    
                    ?>
                    

                </ul>
            </div>

            <!-- /* -------------------------------- registro usuarios-------------------------------- */ -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 register">
                <ul>
                <li><a href="#modalSignIn" data-toggle="modal">Sign in</a></li>
                <li>|</li>
                <li><a href="#modalSignUp" data-toggle="modal">Sign up</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>  

            <!-- -------------------------------------------------------------------------- */
            /*                                   HEADER                                   */
            /* -------------------------------------------------------------------------- */ -->
<header class="container-fluid">

    <div class="container">
    
        <div class="row" id="header">
    
            <!-- /* -------------------------------- LOGO -------------------------------- */ -->
           
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
            
            <!-- Traigo dinamicamente el logo desde la Base de Datos -->
            <?php 
                echo ' <a href="#">
                    <img src="'.$stylesDB["logo"].'" class="img-responsive">
                       </a>
                       '; 
            ?>
                
            </div>
    
            <!-- /* --------------------------CATEGORIAS Y BUSCADOR------------------------- */ -->
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                
                 <!-- /* ----------------------------- boton categoria ---------------------------- */ 
                 Pull-right usa una clase de bootstrap que desplaza el boton hacia la izquierda-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategories">
                
                    <p>CATEGORIES
                        <span class="pull-right">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>
    
                <!-- /* -------------------------------- buscador -------------------------------- */ -->
                <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="search">
    
                    <input type="search" name="buscar" class="form-control" placeholder="Search">
                    <!-- input-group-btn posiciona el boton de buscador en la misma linea del contenedor -->
                    <span class="input-group-btn">
                        <a href="#">
                            <button class="backColor btn btn-default backColor" type="submit">
                                <i class="fa fa-search "></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>
    
            <!-- /* --------------------------- CARRITO DE COMPRAS --------------------------- */ -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="shopCart">
                <a href="#">
                    <button class="btn btn-default pull-left backColor" type="submit">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </a>
    
                <p>YOUR BASKET
                    <span class="quantityBasket"></span><br>EU € <span class="totalBasket"></span>
                </p>
    
            </div>
    
        </div>

        <!-- /* ------------------------------- CATEGORIAS ------------------------------- */ -->

        <div class="col-xs-12 backColor" id="categories">

        <!-- /* -------------------------------------------------------------------------- */
        /*                          CATEGORIAS DINAMICAMENTE                          */
        /* -------------------------------------------------------------------------- */ -->

        <?php 
        
        //Varible que pide al controlador los resultados de la base de datos de las categorias
        $categoryDinamic = ProductsController::controllerCategoriesDinamic();

        //Recorro el resultado obtenido del controlador, asigno el nombre de cada categoria dentro de la etiqueta

        foreach($categoryDinamic as $key => $value){

            echo ' <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <h4>
                            <a href="#" id="pixelCategories">'.$value['category'].'</a>
                        </h4>
                        <hr style="width: 100px;">
                        <ul>';
        
        //Varible que pide al controlador los resultados de la base de datos de las subcategorias,
        //  toma por parametro el id de cada categoria.

        $subCategoriesDinamic = ProductsController::controllerSubCategoriesDinamic($value['id']);
        
         //Recorro el resultado obtenido del controlador, asigno el nombre de cada subcategoria dentro de la etiqueta
        foreach($subCategoriesDinamic as $key => $value){
            echo '
                            <li><a href="#" class="pixelSubCategories">'.$value['subcategory'].'</a></li>
                            ';
        }
            echo '
                    </ul>
                </div>';
        
        }
        
        ?>          

        </div>
    </div>
</header>






