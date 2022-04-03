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
                        <li class="bread"><a href="<?php echo $StaticUrl; ?>">HOME<span>/</span></a></li>
                        <li class="bread"><?php echo $valueURL ?></li>
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
<div class="container-fluid">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#orderList">My Order</a></li>
            <li><a data-toggle="tab" href="#wishes">Wishes</a></li>
            <!-- <li><a data-toggle="tab" href="#profile">My Profile</a></li> -->
        </ul>

        <!-- /* -------------------------------------------------------------------------- */
        /*                                 MIS COMPRAS                                */
        /* -------------------------------------------------------------------------- */ -->
        <br>
        <div class="tab-content">
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
                        $valueRow = $value["id_product"];

                        // Llamo al controlador para recivir los datos de los productos que coinciden con el id
                        $product = ProductsController::showProductsProfile($valueRow);
                        foreach ($product as $key => $value2) {
                            echo '
                    
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="' . $staticRute . $value2["rute"] . '">
                                        <img  style="width: 100%;" class"img-thumbnail" src="' . $value2["image"] . '">
                                    </a>
                                </div> 
                                <div class=" col-sm-6 col-xs-12 productProfile">
                                    <h1>' . $value2["name"] . '</h1>
                                    ';
                            if ($value2["offer"] == 1) {
                                echo '
                                        <h3 class="textProf">Price: <span class="oldPrice">' . $value2["price"] . '</span> / ' . $value2["priceOnOffer"] . '<span>€</span></h3> 
                                        <h3 class="textProf">  Product Purchased On ' . substr($value["date"], 0, -8) . '</h3> 
                                        <br>
                                        ';
                            } else {
                                echo '
                                        <h3 class="textProf">Price: ' . $value2["price"] . '</h3>  
                                        <h3 class="textProf"> Product Purchased On ' . substr($value["date"], 0, -8) . '</h3>                                   
                                        <br>
                                        ';
                            }
                            if ($value["delivery"] == 0) {
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
                            } else if ($value["delivery"] == 1) {
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
                            } else if ($value["delivery"] == 2) {
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
                            echo
                            '
                            </div> ';

                            /* -------------------------------------------------------------------------- */
                            /*                 OPCION DE VALORAR PRODUCTO               */
                            /* -------------------------------------------------------------------------- */

                            $idUser = $_SESSION["userId"];
                            $idProduct = $value2["id"];

                            $rate = UsersController::showRates($idProduct, $idUser);
            
                            

                                echo '     
                                
                                <div class="col-md-3 col-sm-6 col-xs-12"> 
                                    <a class="takeId takeIdProduct" href="#modalRate" data-toggle="modal" idComm="'.$rate["id"].'">                               
                                    <button class="btn btn-default firstColors" style="margin-top:20px;" data-toggle="modal">                                    			
                                       RATE PRODUCT<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                    </button>
                                    </a>
                                    <br>
                                    <br>
                                

                                     ';
                                     switch ($rate["rate"]) {
                                        case 1:
                                            echo '
                                            <div>
                                            Your Rating: '.$rate["rate"].'.0 |
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
                                                Your Rating: '.$rate["rate"].'.0 |
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
                                            Your Rating: '.$rate["rate"].'.0 |
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
                                                Your Rating: '.$rate["rate"].'.0 |
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
                                                Your Rating: '.$rate["rate"].'.0 |
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
                        
                        echo '
                                           
                                           <h5>'.$rate["comment"].'</h5>
                                           
                            </div>
                        </div>                             
                    </div>
                        ';
                    }
                }
              

                ?>

                <!-- </div> -->

                <!-- /* -------------------------------------------------------------------------- */
                      /*                                 MIS DESEOS                                 */
                       /* -------------------------------------------------------------------------- */ -->
                <div id="wishes" class="tab-pane fade">

                    <h3>Menu 1</h3>
                    <p>Some content in menu .</p>
                </div>
            </div>

        </div>


        <!-- /* -------------------------------------------------------------------------- */
                /*                            CONFIGURAR MI CUENTA                            */
                /* -------------------------------------------------------------------------- */ -->
        <!-- <div id="profile" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div> -->

    </div>
</div>

<!-- /* -------------------------------------------------------------------------- */
/*                          VENTANA MODAL PARA INSERTAR NUEVA VALORACION                          */
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
                
                <!-- INPUT INVISIBLE PARA CONSEGUIR EL ID DEL PRODUCTO QUE VAMOS A VALORAR -->
                <input type="hidden" value="" id="idModalCreate" name="idRate">
                    <!--   con = Container  for items in the form-->
                    <div class="contLogin" style="display: flex; align-items: center;" >
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
                            <textarea style="width: 100%; padding: 10px;" name="comment" rows="4"  id="newComment" maxlength="250"></textarea>
                           
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
/*                   LLAMADA AL METODO DE REGISTRO USUARIOS                   */
/* -------------------------------------------------------------------------- */ -->
<?php 
$rating = new UsersController();
$rating-> newRate();
?>

