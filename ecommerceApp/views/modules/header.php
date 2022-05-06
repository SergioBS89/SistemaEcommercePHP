<!-- /* --------------------------------------------------------------------------*/
                       /*                      HTML DE TODO EL HEADER DEL PROYECTO                  */
                       /* --------------------------------------------------------------------------*/ -->

<!-- Rutas url fijas -->
<?php

$StaticUrlAdmin = StaticRute::RuteAdministrator();
$StaticUrl = StaticRute::rute();
?>


<!-- /* ----------------------------------------------------------------------*/
/*                           REDES SOCIALES , LOGO  Y LOGIN   HEADER                        */
/* -------------------------------------------------------------------------- */ -->

<!--IMPORTANTE!!-> Las clases de bootstrap estan separadas con guiones, las creadas por mi usan camelCase-->


<div class="container-fluid barraTop" style="position: relative;" id="top">
    <!-- /* ------------------------------- PNG DEL TOP ------------------------------ */ -->
    <!-- CAMBIAR AL SUBIR A SERVIDOR -->
    <img src="http://localhost/PROYECTOS/SistemaEcommercePHP/administrator/views/img/logos/imgTop.png" class="imgTop" alt="eoooo">


    <div class="container">

        <div class="row">

            <!-- /* ----------------------------- REDES SOCIALES DINAMICAS----------------------------- */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 social" id="social">
                <ul>
                    <?php
                    //Lamamos al controlador para la conexion a la base de datos 
                    $stylesDB = TemplateController::controllerStyleTemplate();

                    // json_decode()--transforma un string(json), en un array
                    $jsonSocialMedia = json_decode($stylesDB["socialMedia"], true);

                    //Recorremos el resultado de los registros devueltos
                    foreach ($jsonSocialMedia as $key => $value) {
                        // Se imprimen las etiquetas que mostraran todas las redes
                        echo '
                        <li>
                        <a href="' . $value["url"] . '" target="_blank">
                            <i class="fa fa-lg ' . $value["red"] . ' socialMedia ' . $value["style"] . '" aria-hidden="true"></i>
                        </a>
                    </li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- /* --------------------------------- LOGO DINAMICO--------------------------------- */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 " id="logotipo">
                <?php
                echo ' <a href="' . $StaticUrl . '">
                    <img src="' . $stylesDB["logo"] . '" class="img-responsive myLogo">
                       </a>
                       ';
                ?>
            </div>

            <!-- /* --------------------------------LOGIN-------------------------------- */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 register" id="register">
                <ul>

                    <?php if (isset($_SESSION["session"])) {

                        if ($_SESSION["session"] == 1) {

                            echo '
                  <!--  <img style="width: 10%;" class="img-circle pull-left" src="' . $StaticUrlAdmin . 'views/img/users/default/sos.png">-->
                    <li><a href="' . $StaticUrl . 'profile">My profile</a></li>
                    <li>|</li>
                    <li><a href="' . $StaticUrl . 'exit">Close</a></li>
                    ';
                        }
                    } else {
                        echo '
                    <li><a href="#modalSignIn" data-toggle="modal" data-target="#myModalIn">Sign In</a></li>
                    <li>|</li>
                    <li><a href="#modalSignUp" data-toggle="modal" data-target="#myModalUp">Sign Up</a></li>
                    ';
                    }


                    ?>

                </ul>
            </div>
        </div>

    </div>
</div>


<!-- /* -------------------------------------------------------------------------- */
 /*                         VENTANA MODAL PARA EL LOGIN                        */
 /* -------------------------------------------------------------------------- */ -->
<div id="myModalIn" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title ">Sign In<i class="glyphicon glyphicon-log-in" style="margin-left: 3px;"></i></h3>

            </div>
            <div class="modal-body modalBody  modalBodySignIn">

                <form method="POST">

                    <div class="contLogin">
                        <br>
                        <div class="containerInputs">
                            <!--   username-->
                            <span style="margin-left: 7px;">
                                <i class="fa fa-user"></i>
                            </span>
                            <input class="formInput" id="nameIN" type="text" placeholder="Username" name="user">
                            <br>
                            <br>
                            <!--Contraseña-->
                            <span class="input-item">
                                <i class="fa fa-key"></i>
                            </span>

                            <input class="formInput" type="password" placeholder="Password" id="passIN" name="pass">
                            <span style="margin-left: 3px;">
                                <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                            </span>

                            <br>
                            <br>

                            <!--    Boton LogIn -->
                            <button class="logIn" type="submit"> Log In </button>
                            <br>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /* -------------------------------------------------------------------------- */
/*                   LLAMADA AL METODO DE INICIO SESION          */
/* -------------------------------------------------------------------------- */ -->

<?php
$userIN = new UsersController();
$userIN->valSignIn();
?>



<!-- /* -------------------------------------------------------------------------- */
 /*                         VENTANA MODAL PARA EL REGISTRO                */
 /* -------------------------------------------------------------------------- */ -->
<div id="myModalUp" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-lime">Sign Up <i class="fa fa-user-plus" aria-hidden="true"></i></h3>

            </div>
            <div class="modal-body modalBody">
                <!-- <div class="overlay"> -->
                <!-- /* -------------------------------------------------------------------------- */
                  /*                                    LOGIN REGISTRO                               */
                  /* -------------------------------------------------------------------------- */ -->
                <form method="POST" onsubmit="return signUp();">
                    <!--   con = Container  for items in the form-->
                    <div class="contLogin">
                        <br>
                        <div class="containerInputs">
                            <!--nombre usuario-->
                            <span style="margin-left: 5px;">
                                <i class="fa fa-user"></i>
                            </span>
                            <input class="formInput" id="nameUP" type="text" placeholder="   Username" name="username">
                            <br>
                            <br>
                            <!--   email-->
                            <span>
                                <i class="fa">@</i>
                            </span>
                            <input class="formInput" id="emailUP" type="email" placeholder="Email" name="email">
                            <br>
                            <br>
                            <!--Contraseña-->
                            <span>
                                <i class="fa fa-key"></i>
                            </span>

                            <input class="formInput" id="passUP" type="password" placeholder="Password" name="password">
                            <span style="margin-left: 3px;">

                            </span>

                            <br>
                            <br>
                            <!--Repite contraseña-->
                            <span class="input-item">
                                <i class="fa fa-key"></i>
                            </span>

                            <input class="formInput" id="repeatPass" type="password" placeholder="Repeat Password" required>
                            <span style="margin-left: 3px;">

                            </span>
                            <br>

                            <!--    Boton crear cuenta-->
                            <button class="logIn pull-left" style="margin-top: 20px;">Create Account</button>
                        </div>

                        <div class="otherButtons pull-right">
                            <!-- <button class="btn forgotButton">Forgot Password</button>   -->
                            <div class="changeModal pull-right">
                                <button class="btn btn-default buttonSignIn firstColors">
                                <a href="#myModalIn" data-toggle="modal" data-dismiss="modal"> Sign In </a>
                                <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- /* -------------------------------------------------------------------------- */
/*                   LLAMADA AL METODO DE REGISTRO USUARIOS                   */
/* -------------------------------------------------------------------------- */ -->
<?php
$user = new UsersController();
$user->signUpUsers();
?>





<!-- -------------------------------------------------------------------------- */
            /*                        CATEGORIAS, CARRITO, BUSCADOR                                  */
            /* -------------------------------------------------------------------------- */ -->
<header class="container-fluid">

    <div class="container">

        <div class="row" id="containerCat">
            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">

                <!--Boton del buscador-->
                <div class="input-group col-xs-12" id="search">

                    <input type="search" name="searchProduct" class="form-control inputSearch" placeholder="Search">
                    <!-- input-group-btn posiciona el boton de buscador en la misma linea del contenedor -->
                    <span class="input-group-btn">
                        <!-- Al pulsar, se manda a la url el valor de SearcH/1/new para una posterior busqueda -->
                        <a href="<?php echo $StaticUrl; ?>SearcH/1/new">
                            <button class="btn btn-default firstColors btnSearch" type="submit">
                                <i class="fa fa-search "></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>

            <!-- Contenedor para proporciones bootstrap -->

            <div class="col-lg-2 col-md-2 col-sm-1 col-xs-0"></div>




            <!-- /* ------ Contenedor que contiene el boton de categorias ------ */ -->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">

                <!-- /* -----------------------------BOTON DE CATEGORIAS---------------------------- */ -->

                <div class="col-lg-7 col-md-8 col-sm-11 col-xs-12 firstColors" id="btnCategories">

                    <p>CATEGORIES
                        <!-- Pull-right usa una clase de bootstrap que desplaza el boton hacia la izquierda -->
                        <span class="pull-right">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </p>
                </div>
            </div>

        
            <!-- /* --------------------------- CARRITO DE COMPRAS --------------------------- */ -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 pull-right" id="shopCart">
                <a href="<?php echo $StaticUrl;?>shoppingCart ">
                    <button class="btn btn-default pull-left firstColors btnShopCart" type="submit">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                </a>

                <p><span class="quantityBasket"> TOTAL AMOUNT:</span>
                <br> 
                <span class="totalBasket"></span><span>€</span>
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

            foreach ($categoryDinamic as $key => $value) {
                // Al pulsar en cada una de las categorias, se manda a la url el valor RUTE 
                echo ' <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <h4 class="titlesCat">
                           
                        <!-- concateno la url fija para evitar duplicar la url en las categorias-->
                            <a href="' . $StaticUrl . $value['rute'] . '/1" class="catAncor">' . $value['category'] . '</a>
                        </h4>
                        <hr class="lineTitleCat" style="width: 100px;">
                        <ul>';
                // 

                $subCategoriesDinamic = ProductsController::controllerSubCategoriesDinamic($value['id']);

                //Recorro el resultado obtenido del controlador, asigno el nombre de cada subcategoria dentro de la etiqueta
                foreach ($subCategoriesDinamic as $key => $value) {
                    // Al pulsar en cada una de las subcategorias, se manda a la url el valor RUTE 
                    echo '          
                        <!-- concateno la url fija para evitar duplicar la url en las categorias-->
                            <li><a href="' . $StaticUrl . $value['rute'] . '/1" class="subCatAncor">' . $value['subcategory'] . '</a></li>
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