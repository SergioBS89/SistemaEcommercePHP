
<!-- /* -------------------------------------------------------------------------- */
/*                             HTML DE TODO EL HEADER                        */
/* -------------------------------------------------------------------------- */ -->

<!-- Las clases de bootstrap estan separadas con guiones, las creadas por mi usan camelCase-->

<div class="container-fluid barraTop">

    <div class="container">

        <div class="row">

            <!-- /* --------------------------------- social --------------------------------- */ -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
                <ul>
                    <li>
                        <a href="https://facebook.com/" target="_blank">
                            <i class="fa fa-facebook-square socialMedia whiteFacebook" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="https://youtube.com/" target="_blank">
                            <i class="fa fa-youtube-square socialMedia whiteFacebook" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="https://twitter.com/" target="_blank">
                            <i class="fa fa-twitter-square socialMedia whiteFacebook" aria-hidden="true"></i>
                        </a>
                    </li>  

                    <li>
                        <a href="https://google.com/" target="_blank">
                            <i class="fa fa-google socialMedia whiteFacebook" aria-hidden="true"></i>
                        </a>
                    </li>  

                    <li>
                        <a href="https://instagram.com/" target="_blank">
                            <i class="fa fa-instagram socialMedia whiteFacebook" aria-hidden="true"></i>
                        </a>
                    </li>   

                </ul>
            </div>

            <!-- /* -------------------------------- registro usuarios-------------------------------- */ -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 register">
                <ul>
                <li><a href="#modalSignIn" data-toggle="modal">Sign in</a></li>
                <li></li>
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

        <!-- /* -------------------------------- logotipo -------------------------------- */ -->
        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotype">
            <a href="#">
                <img src="http://localhost/PROYECTOS/SistemaEcommercePHP/back-end/views/img/logos/logo.png" class="img-responsive">
            </a>
        </div>

        <!-- /* --------------------------CATEGORIAS Y BUSCADOR------------------------- */ -->
        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
            
             <!-- /* ----------------------------- boton categoria ---------------------------- */ 
             Pull-right usa una clase de bootstrap que desplaza el boton hacia la izquierda-->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategories">
            
                <p>CATEGORIES
                    <span class="pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span>
                </p>
            </div>

            <!-- /* -------------------------------- buscador -------------------------------- */ -->
            <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="search">

                <input type="search" name="buscar" class="form-control" placeholder="Search">
                <!-- input-group-btn posiciona el boton de buscador en la misma linea del contenedor -->
                <span class="input-group-btn">
                    <a href="#">
                        <button class="btn btn-default backColor" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </a>
                </span>
            </div>
        </div>

        <!-- /* --------------------------- CARRITO DE COMPRAS --------------------------- */ -->
        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
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
</div>
</header>






