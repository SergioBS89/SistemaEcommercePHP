<?php

$staticUrlAdmin = StaticRute::ruteAdministrator();
$StaticUrl = StaticRute::rute();
?>


<div class="container-fluid well well-sm barProducts">
    

	<div class="container">

		<div class="row">

			<div class="col-xs-12 titleSectionProducts">
				<h1>SPECIAL NEW PRODUCTS</h1>
			</div>
			<div class=" col-xs-0">

			</div>
		</div>
	</div>
</div>
<br>

<div class="contianer-fluid">
	<div class="container">
		<div class="row">
			<div class="col-xs-7">
				<h4>
					<!-- Volvemos al ultimo punto -->
					<a href="javascript:history.back()" class=" pull-left backStore">

						<i class="fa fa-reply"></i><span></span> CONTINUE SHOPPING
					</a>
				</h4>
			</div>

			<!-- <div class="col-xs-5">
				<h4 class="pull-right">
					<a href="#" class="backStore">
						ADD TO WISHES <span></span> <i class="fa fa-solid fa-heart"></i>
					</a>
				</h4>
			</div> -->

			<div class="clearflix"></div>
		</div>
	</div>
</div>

<hr>


<?php

// BSUCAMOS EN LA BASE DE DATOS SI EXISTE LA RUTE DEL PRODUCTO PARA MOSTRARLO

$rute = $ruteArray[1];
$descritionNewProduct = ProductsController::descriptionNewProduct($rute);
?>
<!-- 
 /* -------------------------------------------------------------------------- */
 /*                       SECCION INFORMACION DEL PRODUCTO                      */
 /* -------------------------------------------------------------------------- */ -->

<div class="container-fluid">
	<div class="container">
		<div class="row contProductZoom">

			<div class="col-md-5 col-sm-6 col-xs-12 zoomImg">

				<!-- Clase de bootstrap para las imagenes  -->
				<img id="productDesc" class="img-thumbnail" src="<?php echo $descritionNewProduct['image'] ?>" alt="what happen">

			</div>
			<!-- /* ------------------------ DESCRIPCION DEL PRODUCTO ------------------------ */ -->
			<div class="col-md-7 col-sm-6 col-xs-12">
				<div class="col-md-12 textDescription">
					<!-- NOMBRE -->
					<h1><?php echo $descritionNewProduct["name"]; ?></h1>

				

					 <!-- /* -------------------------- DESCRIPTION PRODUCTO -------------------------- */ -->

					<h4><?php echo $descritionNewProduct["description"]; ?></h4>

					<!--PRECIO -->
					<!-- Mostramos la oferta de precio en funcion del producto -->
									
			      	<div class="priceDescription">
			      	<h2 >Try It For <span style="color: red;"> Free!</span></h2>	                   	
			      	</div>
                      <h5>Only one special product for each purchase made</h5>		
			      
				</div>
				
				<div class="col-md-6 col-xs-12">
					<button id="addProof" class="btn btn-default btn-block btn-lg firstColors">
						<a href="">
							<small>ADD TO CART </small><i class="fa fa-shopping-cart col-md-0"></i>
						</a>
					</button>
				</div>
				<h4 style="margin-top: 20px;" class="col-md-12 col-sm-0 col-xs-0">
					<span class="label label-default infoProduct">
						<i class="fa fa-clock-o" style="margin-right:5px"></i>
						<?php echo $descritionNewProduct["delivery"] ?> days to delivery |
						<i class="glyphicon glyphicon-scale"style="margin-right:5px"></i>
						<?php echo $descritionNewProduct["weight"] ?> kg |
					|
						<i class="fa fa-eye" style="margin:0px 5px"></i>
						viewed <span id="viewsProducts"><?php echo $descritionNewProduct["numViews"] ?></span> times
					</span>
				</h4>





			</div>

			<!-- ZONA DE ZOOM -->
			<div id="placeZoomId" class="col-md-7 col-sm-6 col-xs-12 placeZoom hideImgProduct">
				<!-- padding para mejorar zoom -->
				<img style="padding: 60px;" src="" alt="">
			</div>

		</div>
	</div>
</div>
<div class="clearfix"></div>
<hr>



