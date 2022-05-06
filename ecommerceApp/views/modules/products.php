<?php
$StaticUrlAdmin = StaticRute::RuteAdministrator();
$staticRute = StaticRute::rute();
?>
<!-- 
/* -------------------------------------------------------------------------- */
/*                       SECCION DE PRODUCTOS EN OFERTA                       */
/* -------------------------------------------------------------------------- */ -->

<!-- Con la clase well de bootstrap creamos un padding al contenedor-->
<div class="container-fluid well well-sm barProducts">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 viewProducts">
				<!-- /* --------------------------------- Titulo --------------------------------- */ -->
				<div class="col-sm-6 col-xs-6 titleSectionProducts">
					<h1>ON OFFER</h1>
				</div>

				<!-- /* --------------------------------- ver mas -------------------------------- */ -->
				<div class="col-sm-6 col-xs-6">
					<a href="onOffer/1">
						<button class="btn btn-default firstColors pull-right seeMore">
							SEE MORE <span class="fa fa-chevron-right"></span>
						</button>
					</a>
				</div>


			</div>
		</div>
	</div>
</div>




<!-- /* -------------------------------------------------------------------------- */
/*                             PRODUCTOS EN OFERTA                            */
/* -------------------------------------------------------------------------- */ -->
<div class="container-fluid products">

	<div class="container">

		<div class="row">

			<hr>

			<!-- /* --------------------------- LISTA DE PRODUCTOS --------------------------- */ -->

			<ul class="listProducts">

				<?php
				$products = ProductsController::showProductsOnOffer();

				foreach ($products as $key => $value) {


					echo '
			
			<li class="col-md-3 col-sm-4 col-xs-6">
				<div class="containerImgProduct">					
					<a href="' . $value["rute"] . '" class="pixelProducto">						
						<img src="' . $value["image"] . '" class="img-responsive" >
					</a>
					<span class="stickerOffer"></span>	

                </div>
				<div class="productName">
				    <h5>' . $value["name"] . '</h5>
					
						';

					/* -------------------------------------------------------------------------- */
					/*                             ESTRELLAS DINAMICAS                            */
					/* -------------------------------------------------------------------------- */

					// Parametros para mandar a la base de datos
					$productId = $value["id"];
					$userId = null;

					$countRates = UsersController::showRates($productId, $userId);
					$quanRates = 0;
					$totalRates = 0;
					$mediaRates = 0;

					foreach ($countRates as $key => $value3) {

						if ($value3["rate"] != 0) {
							$quanRates += 1;
							$totalRates += $value3["rate"];
							$mediaRates = $totalRates / $quanRates;
						}
					}

					switch (floor($mediaRates)) {
						case 1:
							echo '
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  (' . $quanRates . ')</span>
						</div>';
							break;
						case 2:
							echo '
								<div class="rating">								
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>';
							break;
						case 3:
							echo '
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  (' . $quanRates . ')</span>
						</div>';
							break;
						case 4:
							echo '
							<div class="rating">
								
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>
							
							';
							break;
						case 5:
							echo '
								<div class="rating">
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>';

							break;
						default:
							echo '
								<div class="rating">
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
							</div>';
							break;
					}

					echo '
				
				    		    
				    <div class="col-sm-12 col-xs-12 price offer">					
					<span class="oldPrice">' . $value["price"] . '</span><h2>' . $value['priceOnOffer'] . '	<span>€</span></h2>
				    </div>
				</div>

			</li>			
			';
				}
				?>
			</ul>

		</div>
	</div>

</div>


<!-- /* -------------------------------------------------------------------------- */
/*                       SECCION DE PRODUCTOS MAS VENDIDOS                       */
/* -------------------------------------------------------------------------- */  -->

<div class="container-fluid well well-sm barProducts">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 viewProducts">
				<!-- /* --------------------------------- Titulo --------------------------------- */ -->
				<div class="col-sm-6 col-xs-6 titleSectionProducts">
					<h1>TOP SALES</h1>
				</div>

				<!-- /* --------------------------------- ver mas -------------------------------- */ -->
				<div class="col-sm-6 col-xs-6">
					<a href="topsales/1">
						<button class="btn btn-default firstColors pull-right seeMore">
							SEE MORE <span class="fa fa-chevron-right"></span>
						</button>
					</a>
				</div>
				<!-- </div>		 -->

			</div>
		</div>
	</div>
</div>



<!-- /* -------------------------------------------------------------------------- */
/*                             PRODUCTOS BEST SELLER                          */
/* -------------------------------------------------------------------------- */ -->
<div class="container-fluid products">

	<div class="container">

		<div class="row">

			<hr>

			<!-- /* --------------------------- LISTA DE PRODUCTOS --------------------------- */ -->

			<ul class="listProducts">

				<?php
				$orderBy = "numSells";
				$products = ProductsController::showProducts($orderBy);
				foreach ($products as $key => $value) {
					echo '
					
			<li class="col-md-3 col-sm-4 col-xs-6">
			<div class="containerImgProduct">					
				<a href="' . $value["rute"] . '" class="pixelProducto">						
					<img src="' . $value["image"] . '" class="img-responsive" >
				</a>
			';
					if ($value["offer"] == 1) {
						echo '	<span class="stickerOffer"></span>';
					}
					echo '
			</div>
			  <!-- Nombre del producto -->
			<div class="productName">
				<h5>' . $value["name"] . '<br><br></h5>	';
					/* -------------------------------------------------------------------------- */
					/*                             ESTRELLAS DINAMICAS                            */
					/* -------------------------------------------------------------------------- */

					// Parametros para mandar a la base de datos
					$productId = $value["id"];
					$userId = null;

					$countRates = UsersController::showRates($productId, $userId);
					$quanRates = 0;
					$totalRates = 0;
					$mediaRates = 0;

					foreach ($countRates as $key => $value3) {

						if ($value3["rate"] != 0) {
							$quanRates += 1;
							$totalRates += $value3["rate"];
							$mediaRates = $totalRates / $quanRates;
						}
					}

					switch (floor($mediaRates)) {
						case 1:
							echo '
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  (' . $quanRates . ')</span>
						</div>';
							break;
						case 2:
							echo '
								<div class="rating">								
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>';
							break;
						case 3:
							echo '
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  (' . $quanRates . ')</span>
						</div>';
							break;
						case 4:
							echo '
							<div class="rating">
								
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>
							
							';
							break;
						case 5:
							echo '
								<div class="rating">
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>';

							break;
						default:
							echo '
								<div class="rating">
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
							</div>';
							break;
					}

					if ($value["offer"] == 1) {
						echo '
					<div class="col-sm-12 col-xs-12 price offer">					
					<span class="oldPrice">' . $value["price"] . '</span><h2>' . $value['priceOnOffer'] . '	<span>€</span></h2>';
					} else {
						echo '
					<div class="col-xs-12 price ">					
					<h2>' . $value["price"] . '<span>€</span></h2>';
					}
					echo '
			</div>
			</div>

		</li>';
				}
				?>

			</ul>

		</div>
	</div>

</div>




<!-- /* -------------------------------------------------------------------------- */
/*                       SECCION DE PRODUCTOS MAS VISTOS                   */
/* -------------------------------------------------------------------------- */  -->

<!-- Con la clase well de bootstrap creamos un padding al contenedor-->
<div class="container-fluid well well-sm barProducts">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 viewProducts">
				<!-- /* --------------------------------- Titulo --------------------------------- */ -->
				<div class="col-sm-6 col-xs-6 titleSectionProducts">
					<h1>MOST VIEWED</h1>
				</div>

				<!-- /* --------------------------------- ver mas -------------------------------- */ -->
				<div class="col-sm-6 col-xs-6">
					<a href="mostViewed/1">
						<button class="btn btn-default firstColors pull-right seeMore">
							SEE MORE <span class="fa fa-chevron-right"></span>
						</button>
					</a>
				</div>
				<!-- </div>		 -->

			</div>
		</div>
	</div>
</div>



<!-- /* -------------------------------------------------------------------------- */
/*                             PRODUCTOS EN OFERTA                            */
/* -------------------------------------------------------------------------- */ -->
<div class="container-fluid products">

	<div class="container">

		<div class="row">

			<hr>


			<ul class="listProducts">

				<?php
				$orderBy = "numViews";
				$products = ProductsController::showProducts($orderBy);
				foreach ($products as $key => $value) {
					echo '
					
			<li class="col-md-3 col-sm-4 col-xs-6">
			<div class="containerImgProduct">					
				<a href="' . $value["rute"] . '" class="pixelProducto">						
					<img src="' . $value["image"] . '" class="img-responsive" >
				</a>
			';
					if ($value["offer"] == 1) {
						echo '	<span class="stickerOffer"></span>';
					}
					echo '
			</div>
			  <!-- Nombre del producto -->
			<div class="productName">
				<h5>' . $value["name"] . '<br><br></h5>	';
					/* -------------------------------------------------------------------------- */
					/*                             ESTRELLAS DINAMICAS                            */
					/* -------------------------------------------------------------------------- */

					// Parametros para mandar a la base de datos
					$productId = $value["id"];
					$userId = null;

					$countRates = UsersController::showRates($productId, $userId);
					$quanRates = 0;
					$totalRates = 0;
					$mediaRates = 0;

					foreach ($countRates as $key => $value3) {

						if ($value3["rate"] != 0) {
							$quanRates += 1;
							$totalRates += $value3["rate"];
							$mediaRates = $totalRates / $quanRates;
						}
					}

					switch (floor($mediaRates)) {
						case 1:
							echo '
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  (' . $quanRates . ')</span>
						</div>';
							break;
						case 2:
							echo '
								<div class="rating">								
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>';
							break;
						case 3:
							echo '
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  (' . $quanRates . ')</span>
						</div>';
							break;
						case 4:
							echo '
							<div class="rating">
								
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>
							
							';
							break;
						case 5:
							echo '
								<div class="rating">
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<i class=" starsRating fa fa-star stars"></i>
								<span> (' . $quanRates . ')</span>
							</div>';

							break;
						default:
							echo '
								<div class="rating">
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
								<i class=" starsRating fa fa-star-o stars"></i>
							</div>';
							break;
					}

					if ($value["offer"] == 1) {
						echo '
					<div class="col-sm-12 col-xs-12 price offer">					
					<span class="oldPrice">' . $value["price"] . '</span><h2>' . $value['priceOnOffer'] . '	<span>€</span></h2>';
					} else {
						echo '
					<div class="col-xs-12 price ">					
					<h2>' . $value["price"] . '<span>€</span></h2>';
					}
					echo '
			</div>
			</div>

		</li>';
				}
				?>

			</ul>

		</div>
	</div>

</div>



<div class="clearfix"></div>





