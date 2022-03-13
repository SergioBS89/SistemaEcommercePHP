


<?php

$servidor = StaticRute::RuteAdministrator();
$StaticUrl = StaticRute::rute();
?> 

<!--=====================================
BARRA PRODUCTOS
======================================-->

<div class="container-fluid well well-sm barProducts">

	<div class="container">
		
		<div class="row">

			<div class="col-xs-12 viewProducts">	
				

				
				<div class=" col-xs-6">	
					  
						<!--=====================================
			            BREADCRUMB O MIGAS DE PAN
			            ======================================-->
            
			            <ul class="text-uppercase">
			            	
			            	<li><a href="<?php echo $StaticUrl;  ?>">HOME</a></li>
			            	<li class="active pagActiva"><?php echo $valueURL ?></li>            
			            </ul>
			    </div>
				<div  class="col-xs-6 titleSectionProducts">
					 <button type="button" class="btn btn-default firstColors pull-right dropdown-toggle" data-toggle="dropdown">

					  Ordenar Productos <span class="caret"></span></button>

					  <ul class="dropdown-menu pull-right firstColors" role="menu">

					  <?php
					  	// Concatenamos dos varibles para el href
						echo '<li><a href="'.$StaticUrl.$ruteArray[0].'/1/new">New products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/old">Old products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/cheap">Cheaper products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/expensive">Expensive products</a></li>
							  ';

						?>

					  </ul>
				</div>
			    

			</div>
			
            
			           
		</div>
		
</div>

</div>

<!--=====================================
LISTAR PRODUCTOS
======================================-->

<div class="container-fluid products">

	<div class="container">
		
		<div class="row">

		

			<?php

			/*=============================================
			LLAMADO DE PAGINACIÓN
			=============================================*/
            
			// Si la ruta url es igual a 1
			// if(isset($ruteArray[1])){

			// 	    if(isset($ruteArray[2])){
    
			// 	    	if($ruteArray[2] == "old"){
    
			// 	    		$modo = "ASC";
			// 	    		$orderBy = "id";
			// 	    		// $_SESSION["ordenar"] = "ASC";
    
			// 	    	}else if($ruteArray[2] == "expensive"){
			// 	    		$modo="DESC";
			// 	    		$orderBy="price";
			// 	    	}else if($ruteArray[2] == "cheap"){
			// 	    		$modo="ASC";
			// 	    		$orderBy="price";
			// 	    	}
			// 	    	else{
    
			// 	    		$modo = "DESC";
			// 	    		$orderBy = "price";
			// 	    		// $_SESSION["ordenar"] = "DESC";
			// 	    	}
    
			// 	    } else{        
			// 	        	$modo = "DESC";
				        
			// 	        }

			// 	$base = ($ruteArray[1] - 1)*12;
			// 	$tope = 12;

			// }else{

			// 	$ruteArray[1] = 1;
			// 	$base = 0;
			// 	$tope = 12;
			// 	$modo = "DESC";
			// }

			/*=============================================
			LLAMADA DE PRODUCTOS DE CATEGORÍAS, SUBCATEGORÍAS Y DESTACADOS
			=============================================*/

			if($valueURL == "onOffer"){

				$rowProduct = "offer" ;
				$valueRow = 1;
				$orderBy = "id";
				$modeOrder="ASC";

			}else if($valueURL == "bestSeller"){

				$rowProduct = null;
				$valueRow= null;
				$orderBy = "numSells";
				$modeOrder="ASC";

			}else if($valueURL == "mostViewed"){

				$rowProduct = null;
				$valueRow = null;
				$orderBy = "numViews";
				$modeOrder="ASC";

			}else{
        

			// COMPROBAMOS QUE EXISTEN LOS PRODUCTOS EN LA URL
			$row="rute";
			$valueURL=$ruteArray[0];
			$isCategory = ProductsController::controllerCategoriesExisting($row,$valueURL);
            
			// si la URL no es de categorias
			if(! $isCategory){

				$isSubCategory = ProductsController::controllerSubCategoriesExisting($row,$valueURL);

				$valueRow=$isSubCategory[0]["id"];
				$rowProduct="id";
			//  Si la URL es de subcategorias
			}else{
				$valueRow=$isCategory["id"];
				$rowProduct="id_category";
			}
			// Si la URL es una categorias y subca, toma estos valores
			$orderBy="id";
			$modeOrder="DESC";
			
            }
			$numProducts=6;
			$page=0;
         	
		   
			
            //  LLamada para listar los productos
			 $listOfProducts = ProductsController::showProductsPaginator($rowProduct,$valueRow,$numProducts);	 
			
				// Llamada para contador de la paginacion
			// $numTotalProductos = ProductsController::countProducts($orderBy, $row, $valueRow);
		


			if(!$listOfProducts){

				echo '<div class="col-xs-12 error404 text-center">

						 <h1><small>¡Oops!</small></h1>

						 <h2>Aún no hay productos en esta sección</h2>

					</div>';

			}else{

				echo '<ul class="listProducts">';

					foreach ($listOfProducts as $key => $value) {
					
						echo '
					
			<li class="col-md-3 col-sm-4 col-xs-6">
			<div class="containerImgProduct">					
				<a href="'.$value["rute"].'" class="pixelProducto">						
					<img src="'.$value["image"].'" class="img-responsive" >
				</a>
			';
			if($value["offer"]==1){
				echo '	<span class="stickerOffer"></span>';  
			}
			echo '
			</div>
			  <!-- Nombre del producto -->
			<div class="productName">
				<h5>'.$value["name"].'<br><br></h5>	
				<!-- estrellas -->
				<div class="rating">
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
					<i class="fa fa-star starsRating"></i>
				</div>';
				
				if($value["offer"]==1){
					echo'
					<div class="col-sm-12 col-xs-12 price offer">					
					<span class="oldPrice">'.$value["price"].'</span><h2>'.$value['priceOnOffer'].'	<span>€</span></h2>
					<br>
					<h2>'.$value["id"].'</h2>';					
				}
				else{
					echo '
					<div class="col-xs-12 price ">					
					<h2>'.$value["price"].'<span>€</span></h2>
					<br>
					<h2>'.$value["id"].'</h2>';
				}
			echo '
			</div>
			</div>

		</li>';	
				}
		echo '</ul>';

		
			}

			?>

			<div class="clearfix"></div>

			<center>




			<!--=====================================
			PAGINACIÓN
			======================================-->
			
			<!-- <?php 
			
			
			// if(count($numTotalProductos)>0){
			// 	echo '<h1>eiiii</h1>';
			// }
			?> -->

			

