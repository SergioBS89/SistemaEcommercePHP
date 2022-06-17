<!-- 
/* -------------------------------------------------------------------------- */
/*                          COMPROBACION DE USUARIO                           */
/* -------------------------------------------------------------------------- */ -->

<?php
$StaticUrlAdmin = StaticRute::RuteAdministrator();
$staticRute = StaticRute::rute();

if (!isset($_SESSION["session"])) {

    echo '
    
    <script>
    window.location="' . $staticRute . '";
    </script>';

    exit();
}
?>

<!-- /* -------------------------------------------------------------------------- */
/*                             SECCION DE USUARIO                             */
/* -------------------------------------------------------------------------- */ -->

<div class="container-fluid well well-sm barProducts">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 viewProducts">
                <div class=" col-xs-6">
                    <!--=====================================
			            BREADCRUMB O MIGAS DE PAN
			            ======================================-->
                    <ul class="text-uppercase" style="margin: 0;">
                        <li class="bread"><a style="color: red;" href="<?php echo $StaticUrl; ?>">HOME</a></li>
                        <li class="bread"><span>/ </span><?php echo $valueURL ?></li>
                    </ul>
                </div>
                <div class="col-xs-6 titleSectionProducts">
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /* -------------------------------------------------------------------------- */
/*                                   PERFIL USUARIO                                  */
/* -------------------------------------------------------------------------- */ -->
<!-- div 1 -->
<div class="container-fluid">
    <!-- div 2 -->
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#orderList">My Orders</a></li>
            <li><a data-toggle="tab" href="#wishes">Wish List</a></li>
            <li><a data-toggle="tab" href="#profile">Profile</a></li>
        </ul>
        <br>
        <!-- div 3 -->
        <div class="tab-content">

            <!-- /* -------------------------------------------------------------------------- */
                 /*                                 MIS COMPRAS                                */
                 /* -------------------------------------------------------------------------- */ -->
            <!-- div 4 -->
            <div id="orderList" class="tab-pane fade in active">

                <?php
                $row = "id_user";
                $valueRow = $_SESSION["userId"];

                $res = UsersController::showOrder($row, $valueRow);


                if (!$res) {
                    echo '
                    <div class="row">
                        <div class="col-12-xs text-center noProduct">
                
                            <h1>No orders!!</h1>
                            <h2>Get some products</h2>
                
                        </div>
                    </div>
                    ';
                } else {

                    foreach ($res as $key => $value) {

                        // Asigno a la variable el valor id del producto que tengo se a comprado
                        $valueRow = json_decode($value["id_product"]);

                        foreach ($valueRow as $key => $value2) {

                            $idProd = (int)$value2;



                            // Llamo al controlador para recivir los datos de los productos que coinciden con el id
                            $product = ProductsController::showProductsProfile($idProd);
                            foreach ($product as $key => $value3) {
                                // var_dump($value3);
                                echo '
                    <!-- div 5 -->
                    <div class="panel panel-default">
                        <!-- div 6 -->
                        <div class="panel-body">
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="' . $staticRute . $value3["rute"] . '">
                                        <img  style="width: 100%; padding: 30px;" class"img-thumbnail" src="' . $value3["image"] . '">
                                    </a>
                                </div> 
                                 <!-- div 7 -->
                                 <div class=" col-sm-6 col-xs-12 productProfile">
                                     <h1>' . $value3["name"] . '</h1>
                                     ';
                                if ($value3["offer"] == 1) {
                                    echo '
                                                    <h3 class="textProf">Price: <span class="oldPrice">' . $value3["price"] . '</span> / ' . $value3["priceOnOffer"] . '<span>€</span></h3> 
                                                    <h3 class="textProf">  Product Purchased On ' . substr($value["date"], 0, -8) . '</h3> 
                                                    
                                                    ';
                                } else {
                                    echo '
                                                    <h3 class="textProf">Price: ' . $value3["price"] . '</h3>  
                                                    <h3 class="textProf"> Product Purchased On ' . substr($value["date"], 0, -8) . '</h3>                                   
                                                    
                                                    ';
                                }

                                // Muestro los datos personales del cliente
                                echo '
                            <h3 class="textProf">Client: ' . $value["name"] . '</h3> 
                            <h3 class="textProf">Adress: ' . $value["adress"] . '</h3> 
                            <h3 class="textProf">City: ' . $value["location"] . '</h3> 
                             ';


                                if ($value["stateDelivery"] == 0) {
                                    echo '
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%">
                                                Order Processing
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                                Packing 
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                                Shipphing
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                                Delivered
                                            </div>
                                        </div>';
                                } else if ($value["stateDelivery"] == 1) {
                                    echo '
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%">
                                                Order Processing
                                            </div>
                                            <div class="progress-bar progress-bar-danger " role="progressbar" style="width:25%">
                                                 Packing 
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                            Shipphing
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                               Delivered
                                            </div>
                                        </div>';
                                } else if ($value["stateDelivery"] == 2) {
                                    echo '
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%">
                                            Order Processing
                                            </div>
                                            <div class="progress-bar progress-bar-danger " role="progressbar" style="width:25%">
                                                Packing 
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                                Shipphing
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                                Delivered
                                            </div>
                                        </div>';
                                } else {
                                    echo '
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%">
                                            Order Processing
                                            </div>
                                            <div class="progress-bar progress-bar-danger " role="progressbar" style="width:25%">
                                                Packing 
                                            </div>
                                            <div class="progress-bar progress-bar-danger " role="progressbar" style="width:25%">
                                                Shipphing
                                            </div>
                                            <div class="progress-bar firstColors " role="progressbar" style="width:25%">
                                                Delivered
                                            </div>
                                        </div>
                                        ';
                                }
                                echo '
                                <!--fin div 7 -->
                                </div> ';

                                /* -------------------------------------------------------------------------- */
                                /*                 OPCION DE VALORAR PRODUCTO               */
                                /* -------------------------------------------------------------------------- */

                                $idUser = $_SESSION["userId"];
                                $idProduct = $value3["id"];

                                $rate = UsersController::showRates($idProduct, $idUser);

                                // SI EN LA BASE DE DATOS NOOO HAY VALORACIONES SE MUESTRA ESTO
                                if ($rate == FALSE) {

                                    echo '     
                                <!-- div 8 -->
                            <div class="col-md-3 col-sm-6 col-xs-12"> 
                                    <a class="takeId takeIdProduct" href="#modalRate" data-toggle="modal" idUserUser="' . $value["id_user"] . '" idProdProd="' . $value3["id"] . '">                               
                                        <button class="btn btn-default firstColors" style="margin-top:20px;" data-toggle="modal">                                    			
                                           RATE PRODUCT<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                        </button>
                                    </a>
                                    <br>
                                    <br> 
                                    ';
                                }
                                // SI EN LA BASE DE DATOS HAY VALORACIONES SE MUESTRAN
                                if ($rate != FALSE) {

                                    echo '
                                <!-- div 8 -->
                                <div class="col-md-3 col-sm-6 col-xs-12"> 
                                        <a class="takeId takeIdProduct" href="#modalRate" data-toggle="modal" idComment="' . $rate["id"] . '">                               
                                            <button class="btn btn-default firstColors" style="margin-top:20px;" data-toggle="modal">                                    			
                                               MODIFY RATE<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                            </button>
                                        </a>
                                        <br>
                                        <br> 
                                        
                                ';


                                    switch ($rate["rate"]) {
                                        case 1:
                                            echo '
                                            <div>
                                            Your Rating: ' . $rate["rate"] . '.0 |
                                            <i class="starsRating fa fa-star stars"></i>
                                            <i class="starsRating fa fa-star-o stars"></i>
                                            <i class="starsRating fa fa-star-o stars"></i>
                                            <i class="starsRating fa fa-star-o stars"></i>
                                            <i class="starsRating fa fa-star-o stars"></i>
                                        </div>';
                                            break;
                                        case 2:
                                            echo '
                                                <div>
                                                Your Rating: ' . $rate["rate"] . '.0 |
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star-o stars"></i>
                                                <i class="starsRating fa fa-star-o stars"></i>
                                                <i class="starsRating fa fa-star-o stars"></i>
                                            </div>';
                                            break;
                                        case 3:
                                            echo '
                                            <div>
                                            Your Rating: ' . $rate["rate"] . '.0 |
                                            <i class="starsRating fa fa-star stars"></i>
                                            <i class="starsRating fa fa-star stars"></i>
                                            <i class="starsRating fa fa-star stars"></i>
                                            <i class="starsRating fa fa-star-o stars"></i>
                                            <i class="starsRating fa fa-star-o stars"></i>
                                        </div>';
                                            break;
                                        case 4:
                                            echo '
                                            <div>
                                                Your Rating: ' . $rate["rate"] . '.0 |
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star-o stars"></i>
                                            </div>';
                                            break;
                                        case 5:
                                            echo '
                                                <div>
                                                Your Rating: ' . $rate["rate"] . '.0 |
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                                <i class="starsRating fa fa-star stars"></i>
                                            </div>                   
                                   
                                            ';
                                            break;
                                    }
                                }

                                if ($rate != FALSE) {
                                    echo '
                             <h5>' . $rate["comment"] . '</h5>
                            
                             ';
                                }


                                echo '
                        <!-- fin div 8 -->                       
                        </div>
                          
                        <!-- fin div 6 -->    
                        </div> 
                    <!--fin div 5 -->                            
                    </div>
                                ';
                            }
                        }
                    }
                }


                // 

                ?>
                <!--fin div 4 -->
            </div>

            <!-- /* -------------------------------------------------------------------------- */
                      /*                                 MIS DESEOS                                 */
                       /* -------------------------------------------------------------------------- */ -->
            <!-- div 4a -->
            <div id="wishes" class="tab-pane fade">

                <?php
                $row = "id_user";
                $valueRow = $_SESSION["userId"];
                $res = UsersController::showWhises($row, $valueRow);

                if (!$res) {
                    echo '
                    <div class="row">
                        <div class="col-12-xs text-center noProduct">
                
                            <h1>No whises..</h1>
    
                        </div>
                    </div>
                    ';
                } else {

                    foreach ($res as $key => $value) {

                        // Asigno a la variable el valor id del producto que tengo se a comprado
                        $valueRow = $value["id_product"];

                        // Llamo al controlador para recivir los datos de los productos que coinciden con el id
                        $product = ProductsController::showProductsProfile($valueRow);
                        foreach ($product as $key => $value2) {
                            echo '
                    <!-- div 5a -->
                    <div class="panel panel-default">
                        <!-- div 6a -->
                        <div class="panel-body">
                                
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="' . $staticRute . $value2["rute"] . '">
                                        <img  style="width: 100%;  padding: 30px;" class"img-thumbnail" src="' . $value2["image"] . '">
                                    </a>
                                </div> 
                                <!-- div 7a -->
                                <div class=" col-sm-6 col-xs-12 productProfile">
                                    <h1>' . $value2["name"] . '</h1>
                                    ';
                            if ($value2["offer"] == 1) {
                                echo '
                                                    <h3 class="textProf">Price: <span class="oldPrice">' . $value2["price"] . '</span> / '
                                    . $value2["priceOnOffer"] . '<span>€</span></h3> 
                                                    ';
                            } else {
                                echo '
                                                    <h3 class="textProf">Price: ' . $value2["price"] . '</h3>  
                                                    ';
                            }
                            echo '
                                     <a>                               
                                     <button class="btn btn-default firstColors addLocalStorage" style="margin-top:20px;"
                                     idProductLS="' . $value2["id"] . '"
                                     nameLS="' . $value2["name"] . '"				 
                                     priceOneUnit="' . $value2["priceOnOffer"] . '"
                                     priceLS="' . $value2["priceOnOffer"] . '"
                                     imageLS="' . $value2["image"] . '"
                                     weigthLS="' . $value2["weight"] . '"					 
                                     weightOneUnit="' . $value2["weight"] . '" >                                    			
                                        ADD TO CART<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                     </button>
                                    </a>
                                    <br>
                                    <a class=" takeIdProduct" href="#modalWish" data-toggle="modal" idProd="' . $value2["id"] . '">                               
                                        <button class="btn btn-default firstColors" style="margin-top:20px;">                                    			
                                           REMOVE PRODUCT<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                        </button>
                                    </a>
                                <!--final div 7a -->
                                </div>
                        <!--final div 6a -->   
                        </div> 
                    <!--final div 5a -->
                    </div>';
                        }
                    }
                }


                ?>


                <!-- fin div 4a -->
            </div>




            <!-- /* -------------------------------------------------------------------------- */
                        /*                            CONFIGURAR MI CUENTA                            */
                        /* -------------------------------------------------------------------------- */ -->
            <div id="profile" class="tab-pane fade">

                <div class="container-fluid">

                    <!-- <div class="container"> -->


                        <div>
                            <h3>Change user's picture</h3>
                            <p>Select one of them:</p>
                        </div>
                        <div class="gridPictures">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/boy.png' ?>" class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/cat.png' ?>" class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/dog.png' ?>" class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/dog2.png' ?>"class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/dia.png' ?>" class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/dia2.png' ?>"class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/girl.png' ?>"class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/pop.png' ?>" class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/samu.png' ?>"class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/samu2.png'?>"class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/sos.png' ?>" class="img-circle picProf" alt="">
                            <img src="<?php echo $StaticUrlAdmin . 'views/img/users/default/girl2.png'?>"class="img-circle picProf" alt="">
                        </div>
                        <div style="display: flex; justify-content: center; margin: 10px;">
                        <!-- Boton recive los datos Js con el valor src de la imagen seleccionada-->
                            <button sendSRC='' sendID='<?php echo $_SESSION["userId"] ?>' id="btnPicture" class="btn btn-default firstColors">Confirm</button>
                        </div>
                        <?php var_dump($_SESSION["userId"]) ?>


                    <!-- </div> -->

                </div>



            </div>

            <!--fin div 3 -->
        </div>
        <!--fin div 2 -->
    </div>
    <!--fin div 1 -->
</div>

<!-- /* -------------------------------------------------------------------------- */
/*                          VENTANA MODAL PARA CREAR NUEVA VALORACION                          */
/* -------------------------------------------------------------------------- */ -->




<div id="modalRate" class="modal fade modalForm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">USER REVIEW</h2>


            </div>
            <div class="modal-body modalBody">

                <form method="POST" id="formRate" onsubmit="return valComment()">

                    <!-- INPUTS INVISIBLES PARA CONSEGUIR EL ID DEL PRODUCTO Y ID USUARIO QUE VAMOS A VALORAR -->
                    <input type="hidden" value="" id="idModalCreate" name="produc">
                    <input type="hidden" value="" id="idModalCreate2" name="user">
                    <!-- INPUT INVISIBLE PARA CONSEGUIR EL NUMERO DE ID PRIMARY KEY DEL COMENTARIO QUE VAMOS A VALORAR -->
                    <input type="hidden" value="" id="idModalModyf" name="idComment">
                    <!--   con = Container  for items in the form-->
                    <div class="contLogin" style="display: flex; align-items: center;">
                        <!-- VALORACION -->

                        <h2 style="text-align: center;" class="clasificacion">
                            <input id="radio1" type="radio" name="stars" value="5">
                            <!--
                          --><label for="radio1">★</label>
                            <!--
                          --><input id="radio2" type="radio" name="stars" value="4">
                            <!--
                          --><label for="radio2">★</label>
                            <!--
                          --><input id="radio3" type="radio" name="stars" value="3">
                            <!--
                          --><label for="radio3">★</label>
                            <!--
                          --><input id="radio4" type="radio" name="stars" value="2">
                            <!--
                          --><label for="radio4">★</label>
                            <!--
                          --><input id="radio5" type="radio" name="stars" value="1">
                            <!--
                          --><label for="radio5">★</label>
                        </h2>
                        <br>
                        <!--Comentario sobre el producto-->

                        <h4 style="color: white; text-align: center;"> Your opinion is very important for us:</h4>
                        <textarea style="width: 100%; padding: 10px;" name="comment" rows="4" id="newComment" maxlength="250"></textarea>

                        <br>
                        <br>



                        <!--    Boton Update-->
                        <div style="text-align: center;">
                            <button class="logIn" style="margin: auto;" style="margin-top: 20px;">RATE PRODUCT</button>
                        </div>
                        <br>

                    </div>
            </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>
<!-- /* -------------------------------------------------------------------------- */
/*                   LLAMADA AL METODO CREAR RATING               */
/* -------------------------------------------------------------------------- */ -->
<?php
$rating = new UsersController();
$rating->newRate();
?>


<!-- /* -------------------------------------------------------------------------- */
/*                   LLAMADA AL METODO ACTUALIZAR RATING               */
/* -------------------------------------------------------------------------- */ -->
<?php
$rating = new UsersController();
$rating->modifRate();
?>




<!-- /* -------------------------------------------------------------------------- */
/*                          VENTANA MODAL PARA ELIMINAR PRODUCTO LISTA DE DESEOS                    */
/* -------------------------------------------------------------------------- */ -->



<div id="modalWish" class="modal fade modalForm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">WISH LIST</h2>


            </div>
            <div class="modal-body modalBody modalBodyWishes">

                <form method="POST">

                    <!-- INPUT INVISIBLE PARA CONSEGUIR EL ID DEL PRODUCTO QUE VAMOS A VALORAR -->
                    <input type="hidden" value="" id="idModalWish" name="idProdWish">


                    <!--    Boton Update-->
                    <br>
                    <div style="text-align: center;">
                        <h4 style="color: white;">Are you sure you want to remove the product from the list?</h4>
                        <br>
                        <button type="submit" class="logIn">REMOVE PRODUCT</button>
                    </div>
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /* -------------------------------------------------------------------------- */
/*                   LLAMADA AL METODO REMOVER PRODUCTOS             */
/* -------------------------------------------------------------------------- */ -->

<?php
$remove = new UsersController();
$remove->removeWish();
?>