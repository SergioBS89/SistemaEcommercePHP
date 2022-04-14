<?php

$staticUrlAdmin = StaticRute::ruteAdministrator();
$StaticUrl = StaticRute::rute();
?>


<div class="container-fluid well well-sm barProducts">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 titleSectionProducts">
				<h1>PRODUCT INFORMATION</h1>
			</div>
			<div class=" col-xs-0">

			</div>
		</div>
	</div>
</div>
<br>

<?php

// BUSCAMOS EN LA BASE DE DATOS SI EXISTE LA RUTE DEL PRODUCTO PARA MOSTRARLO

$rute = $ruteArray[0];
$descritionProduct = ProductsController::descriptionProduct($rute);

?>

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
           <!-- SI EXISTE UN USUARIO REGISTRADO SE MUESTRA EL BOTON DE AGREGAR A LISTA DE DESEOS -->
			<?php 
			if(isset($_SESSION["userId"])){
			$dates = array(
				"id_user"=>$_SESSION["userId"],
				"id_product" => $descritionProduct["id"]
			);
			$isWish = UsersController::checkWishList($dates);

			
			
			if($isWish==false){

				echo '
				<div class="col-xs-5">
				<h4 class="pull-right">
					<span id="addWishes" href="" class="backStore" idUser =  "'.$_SESSION["userId"].'"
					 idProd = "'.$descritionProduct["id"].'">
						ADD TO WISHES <span></span> <i class="fa fa-solid fa-heart-o"></i>
                    </span>
				</h4>
			</div>';
			}else{
				echo '
				<div class="col-xs-5">
				<h4 class="pull-right">
					<span class= "backStore">
						I <span></span> <i class="fa fa-solid fa-heart"></i> THIS PRODUCT
                    </span>
				</h4>
			</div>';
			}
			}
			?>
			

		

			<div class="clearflix"></div>
		</div>
	</div>
</div>

<hr>



<!-- 
 /* -------------------------------------------------------------------------- */
 /*                       SECCION INFORMACION DEL PRODUCTO                      */
 /* -------------------------------------------------------------------------- */ -->

<div class="container-fluid">
	<div class="container">
		<div class="row contProductZoom">

			<div class="col-md-5 col-sm-6 col-xs-12 zoomImg">

				<!-- Clase de bootstrap para las imagenes  -->
				<img id="productDesc" class="img-thumbnail" src="<?php echo $descritionProduct['image'] ?>" alt="what happen">

			</div>
			<!-- /* ------------------------ DESCRIPCION DEL PRODUCTO ------------------------ */ -->
			<div class="col-md-7 col-sm-6 col-xs-12">
				<div class="col-md-12 textDescription">
					<!-- NOMBRE -->
					<h1><?php echo $descritionProduct["name"]; ?></h1>

					<!-- /* --------------------------- ESTRELLAS DINAMICAS -------------------------- */ -->
					<?php
								// Parametros para mandar a la base de datos 
								$productId = $descritionProduct["id"];
								$userId = null;

								$countRates = UsersController::showRates($productId, $userId);
								$quanRates = 0;
								$totalRates=0;
								$mediaRates=0;

								foreach ($countRates as $key => $value3) {
								
									if ($value3["rate"] != 0){
										$quanRates += 1;
										$totalRates += $value3["rate"];
										$mediaRates= $totalRates/$quanRates;										
										
								}
								
								}
								
								switch (floor($mediaRates)) {
									case 1:
										echo '
										<div class="ratingDescription">
										
										<i class=" starsRatingDescription fa fa-star stars"></i>
										<i class=" starsRatingDescription fa fa-star-o stars"></i>
										<i class=" starsRatingDescription fa fa-star-o stars"></i>
										<i class=" starsRatingDescription fa fa-star-o stars"></i>
										<i class=" starsRatingDescription fa fa-star-o stars"></i>
										<span style="font-size:22px"> ('.$quanRates.')</span>
									</div>';
										break;
									case 2:
										echo '
											<div class="ratingDescription">
											
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<span style="font-size:22px"> ('.$quanRates.')</span>
										</div>';
										break;
									case 3:
										echo '
										<div class="ratingDescription">
										
										<i class=" starsRatingDescription fa fa-star stars"></i>
										<i class=" starsRatingDescription fa fa-star stars"></i>
										<i class=" starsRatingDescription fa fa-star stars"></i>
										<i class=" starsRatingDescription fa fa-star-o stars"></i>
										<i class=" starsRatingDescription fa fa-star-o stars"></i>
										<span style="font-size:22px"> ('.$quanRates.')</span>
									</div>';
										break;
									case 4:
										echo '
										<div class="ratingDescription">
											
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<span style="font-size:22px"> ('.$quanRates.')</span>
										</div>
										
										';
										break;
									case 5:
										echo '
											<div class="ratingDescription">
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<i class=" starsRatingDescription fa fa-star stars"></i>
											<span style="font-size:22px"> ('.$quanRates.')</span>
										</div>';
										
										break;
									default:
									echo '
											<div class="ratingDescription">
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
											<i class=" starsRatingDescription fa fa-star-o stars"></i>
										</div>';
										break;
								}
								?>

					 <!-- /* -------------------------- DESCRIPTION PRODUCTO -------------------------- */ -->

					<h4><?php echo $descritionProduct["description"]; ?></h4>

					<!--PRECIO -->
					<!-- Mostramos la oferta de precio en funcion del producto -->
					<?php if ($descritionProduct["offer"] == 0) {
						echo '					
			      	<div class="priceDescription">
			      	<h2>' . $descritionProduct["price"] . '<span>€</span></h2>				
			      	</div>
			      	';
					} else {
						echo '					
			        <div class="priceDescription spacePrice">
					<span  class="percent">' . $descritionProduct["discount"] . ' % OFF!</span>	
			        <span class="oldPrice">' . $descritionProduct["price"] . '</span>
			        <h2>' . $descritionProduct['priceOnOffer'] . '<span>€</span></h2>
			        </div>
			        	';
					} ?>
				</div>
				<!-- <div class="col-md-3 col-xs-6">
					<select class="form-control pull-left" id="chooseQuantity" style="cursor: pointer;">
						<option value="1">1 unit</option>
						<option value="2">2 unit</option>
						<option value="3">3 unit</option>
						<option value="4">4 unit</option>
						<option value="5">5 unit</option>
						<option value="6">6 unit</option>
						<option value="7">7 unit</option>
						<option value="8">8 unit</option>
						<option value="9">9 unit</option>
					</select>
				</div> -->
				<div class="col-md-6 col-xs-12">
					<button id="addLocalStorage" class="btn btn-default btn-block btn-lg firstColors"
					 idProductLS="<?php echo $descritionProduct["id"]; ?>"
					 nameLS="<?php echo $descritionProduct["name"]; ?>"
					 offerLS="<?php echo $descritionProduct["offer"]; ?>"					 
					 priceOneUnit="<?php echo $descritionProduct["priceOnOffer"]; ?>"
					 priceLS="<?php echo $descritionProduct["priceOnOffer"]; ?>"
					 discountLS="<?php echo $descritionProduct["discount"]; ?>"
					 imageLS="<?php echo $descritionProduct["image"]; ?>"
					 weigthLS="<?php echo $descritionProduct["weight"]; ?>"					 
					 weightOneUnit="<?php echo $descritionProduct["weight"]; ?>"					 
					
					>
						<!-- <a href=""> -->
							<small>ADD TO CART </small><i class="fa fa-shopping-cart col-md-0"></i>
						<!-- </a> -->
					</button>
					
				</div>
				<h4 style="margin-top: 20px;" class="col-md-12 col-sm-0 col-xs-0">
					<span class="label label-default infoProduct">
						<i class="glyphicon glyphicon-inbox" style="margin-right:5px;"></i>						
						 In Stock <span style="margin: 0 5px 0 3px">  |  </span>
						<i class="glyphicon glyphicon-scale"style="margin-right:5px"></i>
						 <?php echo $descritionProduct["weight"] ?> kg <span style="margin: 0 5px 0 3px">  |  </span>
						<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
						<?php echo $descritionProduct["numSells"]; ?> purchases <span style="margin: 0 5px 0 3px">  |  </span>
						<i class="fa fa-eye" style="margin:0px 5px"></i>
						viewed <span id="viewsProducts"><?php echo $descritionProduct["numViews"] ?></span> times
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

<!-- /* -------------------------------------------------------------------------- */
 /*                             SECCION COMENTARIOS                            */
 /* -------------------------------------------------------------------------- */ -->
<div class="container-fluid">

	<div class="container">
		<?php
		// Parametros para mandar a la base de datos
		$productId = $descritionProduct["id"];
		$userId = null;

		$countComm = UsersController::showRates($productId, $userId);
		$quan = 0;

		foreach ($countComm as $key => $value2) {

			if ($value2["comment"] != "")
				$quan += 1;
		}
		?>


		<div class="row" id="navComments">

			<ul class="nav nav-pills">
				<li class="firstColors" style="margin-left: 15px;"><a href="#"><?php echo $quan ?> comments</a></li>
				<!-- <li class=""><a href="#">see more</a></li> -->
				<!-- <li class="pull-right"><a href="#">
						
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
					</a></li> -->


			</ul>
		</div>
		<hr>
		<!-- /* -------------------------- LISTA DE COMENTARIOS -------------------------- */ -->

		<?php

		// Parametros para mandar a la base de datos
		$productId = $descritionProduct["id"];
		$userId = null;

		$rates = UsersController::showRates($productId, $userId);



		foreach ($rates as $key => $value) {

		

			$id = $value["id_user"];

			// Conocemos el nombre de cada usuario que puso una valoracion
			$username = UsersController::showName($id);

			/* ---------------- SI NO EXISTEN COMENTARIOS NO MUESTRA NADA --------------- */
			if ($value["comment"] != '') {

				echo '
			<div class="row">
			<div class="panel-group col-xs-12">
				<div class="panel panel-default">

					<div class="panel-heading text-uppercase userBar">
						<img class="img-circle pull-left" src="' . $staticUrlAdmin . 'views/img/users/default/sos.png">
						<span>' . $username["username"] . '</span>
					</div>

					<div class="panel-body comment" id="noComm">
						<h5>' . $value["comment"] . '</h5>
					</div>';
				switch ($value["rate"]) {
					case 1:
						echo '
						<div class="panel-footer">
						Rating: ' . $value["rate"] . '.0 |
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
					</div>';
						break;
					case 2:
						echo '
							<div class="panel-footer">
							Rating: ' . $value["rate"] . '.0 |
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star-o stars"></i>
							<i class="starsRating fa fa-star-o stars"></i>
							<i class="starsRating fa fa-star-o stars"></i>
						</div>';
						break;
					case 3:
						echo '
						<div class="panel-footer">
						Rating: ' . $value["rate"] . '.0 |
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
						<i class="starsRating fa fa-star-o stars"></i>
					</div>';
						break;
					case 4:
						echo '
						<div class="panel-footer">
							Rating: ' . $value["rate"] . '.0 |
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star-o stars"></i>
						</div>';
						break;
					case 5:
						echo '
							<div class="panel-footer">
							Rating: ' . $value["rate"] . '.0 |
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
							<i class="starsRating fa fa-star stars"></i>
						</div>';
						break;	
				
				}
			      
			        
			     echo '
			
		         </div>
	             </div>
                 </div>
	            ';
		    }
		}
		?>
		          <!-- /* ------ DIV DONDE SE MUESTRA EL MENSAJE DE QUE NO EXISTEN COMENTARIOS ----- */ -->
		<div id="noComm" class="noComments"></div>

	</div>
</div>


<div class="clearfix"></div>

			                
					

<!-- /* -------------------------------------------------------------------------- */
 /*                             ARTICULOS RELACIONADOS                        */
 /* -------------------------------------------------------------------------- */ -->

<div class="container-fluid well well-sm barProducts">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 titleSectionProducts">
				<h1>RELATED PRODUCTS</h1>
			</div>
			<div class=" col-xs-0">

			</div>
		</div>
	</div>
</div>
<hr>
<div class="container-fluid products">

	<div class="container">

		<div class="row">

			<!-- /* -------------------------------------------------------------------------- */
		   /*                       LISTA DE PRODUCTOS                    */
		   /* -------------------------------------------------------------------------- */ -->

			<ul class="listProducts">

				<?php
				$orderBy = "id";
				// Nos devuelve el numero de la catetoria, subcategoria y ruta  para buscar productos similares
				$valueRow = $descritionProduct["id_category"];
				$valueRow2 = $descritionProduct["id_subCat"];
				$valueRow3 = $descritionProduct["rute"];

				$products = ProductsController::showProductsRelated($valueRow, $valueRow2, $valueRow3, $orderBy);

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
				<h5>' . $value["name"] . '<br><br></h5>	
				<!-- estrellas -->
				<div class="rating">
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
				</div>';

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
/*             LLAMADA A LA FUNCION DEL MENSAJE DE NO COMENTARIOS             */
/* -------------------------------------------------------------------------- */ -->
<script>
window.onload=noComment();
</script>

