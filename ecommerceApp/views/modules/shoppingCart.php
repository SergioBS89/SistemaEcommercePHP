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

        <div class="panel panel-default listProdShopp"  id="listProdShopp">       
           
               
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
            <div class="panel-body panButton"><button class="btn btn-default firstColors">CHECKOUT</button></div>
        </div>
    </div>
</div>
</div>