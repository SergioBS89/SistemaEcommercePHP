
                  <!-- /* --------------------------------------------------------------------------*/
                       /*                      HTML DE TODO EL HEADER DEL PROYECTO                  */
                       /* --------------------------------------------------------------------------*/ -->

<!-- Rutas url fijas -->
<?php

$servidor = StaticRute::RuteAdministrator();
$StaticUrl = StaticRute::rute();
?> 

<!-- /* ----------------------------------------------------------------------*/
/*                           REDES SOCIALES , LOGO  Y LOGIN   HEADER                        */
/* -------------------------------------------------------------------------- */ -->

<!--IMPORTANTE!!-> Las clases de bootstrap estan separadas con guiones, las creadas por mi usan camelCase-->


<div class="container-fluid barraTop"  style="position: relative;" id="top">
     <!-- /* ------------------------------- PNG DEL TOP ------------------------------ */ -->
            <!-- CAMBIAR AL SUBIR A SERVIDOR -->
            <img src="http://localhost/PROYECTOS/SistemaEcommercePHP/administrator/views/img/logos/imgTop.png" class="imgTop" alt="eoooo">
            

    <div class="container">
       
        <div class="row" >           
    
             <!-- /* ----------------------------- REDES SOCIALES DINAMICAS----------------------------- */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 social" id="social"> 
                <ul>
                    <?php   
                     //Lamamos al controlador para la conexion a la base de datos 
                    $stylesDB = TemplateController::controllerStyleTemplate();                
                    
                    // json_decode()--transforma un string(json), en un array
                    $jsonSocialMedia = json_decode($stylesDB["socialMedia"], true);
                    
                    //Recorremos el resultado de los registros devueltos
                    foreach($jsonSocialMedia as $key => $value){
                        // Se imprimen las etiquetas que mostraran todas las redes
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

            <!-- /* --------------------------------- LOGO DINAMICO--------------------------------- */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 " id="logotipo">
            <?php             
                echo ' <a href="'.$StaticUrl.'">
                    <img src="'.$stylesDB["logo"].'" class="img-responsive myLogo">
                       </a>
                       '; 
            ?>               
            </div>

            <!-- /* --------------------------------LOGIN-------------------------------- */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 register" id="register">
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
            /*                        CATEGORIAS, CARRITO, BUSCADOR                                  */
            /* -------------------------------------------------------------------------- */ -->
<header class="container-fluid">

    <div class="container">
    
        <div class="row" id="containerCat">
    
            
           
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 ">          
            <!--Contenedor vacio para compensar layout de bootstrap-->       
            </div>
            
            <!-- /* ------ Contenedor que contiene el boton de categorias y el buscador ------ */ -->
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                
             <!-- /* -----------------------------BOTON DE CATEGORIAS---------------------------- */ -->
                 
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 firstColors" id="btnCategories">
                
                    <p>CATEGORIES
                        <!-- Pull-right usa una clase de bootstrap que desplaza el boton hacia la izquierda -->
                        <span class="pull-right">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>
    
                <!-- /* --------------------------------BUSCADOR-------------------------------- */ -->
                <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="search">
    
                    <input type="search" name="searchProduct" class="form-control inputSearch" placeholder="Search">
                    <!-- input-group-btn posiciona el boton de buscador en la misma linea del contenedor -->
                    <span class="input-group-btn">
                        <a href="<?php echo $StaticUrl;?>SearcH/1/new">
                            <button class="btn btn-default firstColors btnSearch" type="submit">
                                <i class="fa fa-search "></i>
                            </button>
                        </a>
                    </span>
                </div>

            </div>
    
            <!-- /* --------------------------- CARRITO DE COMPRAS --------------------------- */ -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="shopCart">
                <a href="#">
                    <button class="btn btn-default pull-left firstColors btnShopCart" type="submit">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </a>
    
                <p>YOUR BASKET
                    <span class="quantityBasket"></span><br>0 € <span class="totalBasket"></span>
                </p>
    
            </div>
    
        </div>

        <!-- /* ------------------------------- DESPLEGABLE DE CATEGORIAS ------------------------------- */ -->

        <div class="col-xs-12 firstColors" id="categories">

        <!-- /* -------------------------------------------------------------------------- */
        /*                          CATEGORIAS Y SUBCAT.. DINAMICAS                       */
        /* -------------------------------------------------------------------------- */ -->

        <?php     

        //Varible que pide al controlador los resultados de la base de datos de las categorias
        $categoryDinamic = ProductsController::controllerCategoriesDinamic();

        //Recorro el resultado obtenido del controlador, asigno el nombre de cada categoria dentro de la etiqueta

        foreach($categoryDinamic as $key => $value){
               // Al pulsar en cada una de las categorias, se manda a la url el valor RUTE 
            echo ' <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <h4 class="titlesCat">
                           
                        <!-- concateno la url fija para evitar duplicar la url en las categorias-->
                            <a href="'.$StaticUrl.$value['rute'].'" class="catAncor">'.$value['category'].'</a>
                        </h4>
                        <hr class="lineTitleCat" style="width: 100px;">
                        <ul>';
        // 
        
        $subCategoriesDinamic = ProductsController::controllerSubCategoriesDinamic($value['id']);
        
         //Recorro el resultado obtenido del controlador, asigno el nombre de cada subcategoria dentro de la etiqueta
        foreach($subCategoriesDinamic as $key => $value){
             // Al pulsar en cada una de las subcategorias, se manda a la url el valor RUTE 
            echo '          
                        <!-- concateno la url fija para evitar duplicar la url en las categorias-->
                            <li><a href="'.$StaticUrl.$value['rute'].'" class="subCatAncor">'.$value['subcategory'].'</a></li>
                            ';
        }
        // Cierro las etiquetas abiertas en el bloque de arriba
            echo '
                        </ul>
                    </div>';        
        }
        
        ?>          

        </div>
    </div>
</header>






