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
                ?>
                <?php
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
                            /*                 OPCION DE VALORAR PRODUCTO O VER VALORACION                */
                            /* -------------------------------------------------------------------------- */


                            if ($value["is_rated"] == 0) {

                                echo '     
                                    <a href="#modalRate" data-toggle="modal" idComm="">                               
                                    <button class="btn btn-default firstColors pull-right" data-toggle="modal">
                                    			
                                       RATE PRODUCT<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                    </button>
                                    </a>
                                     ';
                            } else {

                                echo '
                                    <a href="#modalSeeRate" data-toggle="modal" idComm="">
                                    <button class="btn btn-default firstColors pull-right" data-toggle="modal">                                    				
                                       SEE RATING<span style="margin-left:10px" class="fa fa-chevron-right"></span>
                                    </button> 
                                    </a> ';
                            }
                            }
                            echo '
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
/*                          VENTANA MODAL VALORACION                          */
/* -------------------------------------------------------------------------- */ -->

<div id="modalSeeRate" class="modal fade modalForm" role="dialog">

<div class="modal-content modal-dialog">
    <h1>seee</h1>
</div>
</div>

<div id="modalRate" class="modal fade modalForm" role="dialog">

<div class="modal-content modal-dialog">
    <h1>rate</h1>
</div>
</div>