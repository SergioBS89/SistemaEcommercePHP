<?php

$staticUrlAdmin = StaticRute::ruteAdministrator();
$StaticUrl = StaticRute::rute();
?>



<!-- /* -------------------------------------------------------------------------- */
/*                                  SECCION DE COMPRAS                 */
/* -------------------------------------------------------------------------- */ -->

<div class="container-fluid well well-sm barProducts">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 viewProducts">

                <div class=" col-xs-12">

                    <!--=====================================
			            BREADCRUMB O MIGAS DE PAN
			            ======================================-->

                    <ul class="text-uppercase" style="margin: 0;">
                        <li class="bread"><a style="color: red;" href="<?php echo $StaticUrl; ?>">HOME</a><span> /</span></li>
                        <li class="bread">SHOPPING CART</li>
                    </ul>
                </div>
                <div class="col-sm-6"></div>

            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">

    <div class="container">

        <div class="panel panel-default listProdShopp" id="listProdShopp">


            <!--Este contenido viene desde JS  -->

        </div>
    </div>
</div>
<hr>
<!-- /* -------------------------------------------------------------------------- */
/*                                  SUBTOTAL                                  */
/* -------------------------------------------------------------------------- */ -->
<div class="container-fluid" id="hideSubtotal">
    <div class="container" style="display: flex; justify-content: center;">
        <div class="panel panel-default col-md-5 col-sm-6 col-xs-10" style="padding: 0; ">
            <div class="panel-headding panelShop">
                <h3>SUMMARY</h3>
            </div>

            <div class="panel-body  subtotal priceSubtotal ">
                <!-- /* ----------------------------- Codigo desde JS ---------------------------- */ -->
            </div>
            <div class="panel-body subtotal weightDelivery">
                <!-- /* ----------------------------- Codigo desde JS ---------------------------- */ -->
            </div>
            <div class="panel-body subtotal priceDelivery">
                <!-- /* ----------------------------- Codigo desde JS ---------------------------- */ -->
            </div>
            <div class="panel-body  subtotal priceTotal">
                <h5>Total:</h5><span class="pull-right"></span>
            </div>
            <div class="panel-body panButton">
                <button id="checkout" class="btn btn-default firstColors" href="#modalPayment" data-toggle="modal">CHECKOUT</button>
            </div>
        </div>
    </div>
</div>
</div>



<!-- /* -------------------------------------------------------------------------- */
/*                          VENTANA MODAL PARA FINALIZAR COMPRA                   */
/* -------------------------------------------------------------------------- */ -->


<div id="modalPayment" class="modal fade modalForm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">CONFIRM PAYMENT</h2>


            </div>
            <div class="modal-body modalBody">

                <form method="POST">
                <div class="contPayment">
                    <br>
                    <br>
                   
                        <input class="formInput" type="text" placeholder="Name and Surnames" name="name"  required>
                        <br>
                        <br>
                        <input class="formInput" type="text" placeholder="Adress" name="adress"  required>
                        <br>
                        <br>
                        <input class="formInput" type="text" placeholder="City" name="city" required>
                        <br>
                    
                    <div class="finalPayment">
                        <h4 style="color: white;"></h4>
                 
                </div>
                </div>
                   
                    <br>
                    <div style="text-align: center;">
                        <br>
                        <button class="logIn confPay">FINISH PAYMENT</button>
                    </div>
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>