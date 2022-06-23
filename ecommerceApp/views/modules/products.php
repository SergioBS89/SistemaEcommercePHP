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


<!-- 
/* -------------------------------------------------------------------------- */
/*                        SECCION IMAGEN BEST PRODUCTS                      */
/* -------------------------------------------------------------------------- */ -->

<div class="container contImgBest">
	<img src="<?php echo $StaticUrlAdmin . 'views/img/banner/best.png' ?>" alt="">
</div>

<!-- 
/* -------------------------------------------------------------------------- */
/*               SECCION DE COMENTARIOS Y LIKES DE LA PAGINA WEB              */
/* -------------------------------------------------------------------------- */ -->


<br>
<br>
<br>

<div class="container">
	<!-- Container para insertar comentario -->
	<div>
		<h1>COMMENTS</h1>

		<?php

		if (isset($_SESSION["session"])) {

			echo '
		
		<p>Leave a comment about your experience using this App.
		</p>
		<form method="POST">
		    <input type="text" hidden value="' . $_SESSION["userId"] . '" name="idReview">
			<input type="text" placeholder="Write here..." style=" padding-left:20px; width: 100%; height: 50px; margin-bottom: 10px;" name="comment">
			<button type="submit" class="btn btn-default firstColors">CONFIRM</button>
		</form>
	
		';
		} else {
			echo '
		<p>Leave a comment about your experience using this App.
		</p>
		<form method="POST">
			<input disabled type="text" placeholder="Write here..." style=" padding-left:20px; width: 100%; height: 50px; margin-bottom: 10px;" name="comment">
			<button disabled class="btn btn-default firstColors">START SESSION</button>
		</form>
		';
		}
		/* -------------------------------------------------------------------------- */
		/*              LLAMADA A LA FUNCION PARA EJECUTAR ENVIO DE DATOS             */
		/* -------------------------------------------------------------------------- */
		$com = new UsersController();
		$com->newReview();
		?>
	</div>
	<!-- 
/* -------------------------------------------------------------------------- */
/*                             ZONA DE COMENTARIOS                            */
/* -------------------------------------------------------------------------- */ -->
	<div id="contExpand" class="contCommentsUsers">
		<div class="panel panel-default panelComments">

			<?php
			// $idUser = $_SESSION["userId"];

			$comments = UsersController::showCommentsLikes();

			foreach ($comments as $key => $value) {

				// Conocemos el nombre de cada usuario que puso una valoracion
				$username = UsersController::showName($value["id_user"]);
				// Retorno la imagen del usuario que puso la valoración
				$imgProfile = UsersController::imgProfile($value["id_user"]);


				echo '
			<form method = "POST">
			<div class="panel-body">
				<img style="width: 58px; height: 58px;" class="img-circle pull-left" src="' . $imgProfile["picture"] . '">
				<h2>' . $username["username"] . '</h2>
				<h4>' . $value["date"] . '</h4>
			</div>
			<div class="panel-body" style="padding-top:0">
				<p>' . $value["comment"] . '</p>';

				/* -------------------------------------------------------------------------- */
				/*                        SI EL USUARIO ESTA CONECTADO                        */
				/* -------------------------------------------------------------------------- */

				// SI HAY UN USER CONECTADO, SE CREA EL INPUT CON EL VALOR DEL USUARIO EN LINEA
				if (isset($_SESSION["userId"])) {
					echo '
					<input type="text" hidden value="' . $_SESSION["userId"] . '" name="id">				
					<input type="text" hidden value="' . $value["id"] . '" name="idComm">					
					<input type="text" hidden value="' . $value["likes"] . '" name="numLikes">';

					/* ----------------- PREGUNTO SI EL USUARIO YA DIO LIKE O NO ---------------- */

					// Usuario en linea
					$idUser = $_SESSION["userId"];
					// id del comentario
					$idComm = $value["id"];
					$dates = array(
						"id" => $idUser,
						"idComm" => $idComm
					);
					$checkLike = UsersController::checkLike($dates);
				    // Asigno un valor booleano a la varible para imprimir una u otra cosa
					$bool = false;

					// Recorro el resultado de la base de datos 
					foreach ($checkLike as $key => $value2) {
                         
						// Si existe un like en el comentario, este cambia a true
						if($value2["numLikes"]>=1){
							$bool = true;
						}
						}
		
						if ($bool == true) {

							echo '		
							</div>
							<div class="panel-footer">
								<span class="pull-rigth">' . $value["likes"] . '</span><span class="spanComm" style="margin-left:0"> LIKES</span>				
								<i class="fa fa-thumbs-up pressLike" style="color:red;"></i>			    
							</div>
							<hr>
							</form>';				
						}
						

						if($bool == false){
							echo '	</div>
							<div class="panel-footer">
								<span class="pull-rigth">' . $value["likes"] . '</span><span style="margin-left:0"> LIKES</span>				
								<button class="reloadButton"><i class="fa fa-thumbs-up"></i></button>			    
							</div>
							<hr>
							</form>';				
				
						}				
				}
				
				else{
					echo '					
				</div>
				<div class="panel-footer">
					<span class="pull-rigth">' . $value["likes"] . '</span><span style="margin-left:0"> LIKES</span>						    
				</div>
				<hr>
				</form>';
				}
			}
			// Llamada para enviar datos
			$like = new UsersController();
			$like->addLike();
			?>
		</div>

	</div>
	<button id="buttonExpand" class="showMoreComm" style="width: 100%;">SHOW MORE</button>

</div>