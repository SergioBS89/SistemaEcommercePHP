


<?php

$StaticUrlAdmin = StaticRute::RuteAdministrator();
$StaticUrl = StaticRute::rute();
?> 

<!-- /* -------------------------------------------------------------------------- */
/*                         BARRA SUPERIOR DE PRODUCTOS                        */
/* -------------------------------------------------------------------------- */ -->

<div class="container-fluid well well-sm barProducts">

	<div class="container">
		
		<div class="row">

			<div class="col-xs-12 viewProducts">	
				

				
				<div class=" col-xs-6">	
					  
					<!-- /* -------------------------------------------------------------------------- */
					/*                                 BREADCRUMBS                                */
					/* -------------------------------------------------------------------------- */ -->
						<ul class="text-uppercase" style="margin: 0;">			            	
			            	<li class="bread"><a style="color: red;" href="<?php echo $StaticUrl;?>">HOME</a></li>
			            	<li class="bread"><?php echo "<span>/</span> $valueURL"?></li>            
			            	<li class="bread"><?php
							if(isset($ruteArray[2])){echo " <span>/</span> $ruteArray[2]";}?></li>                   
			            </ul>
			    </div>
				<div  class="col-xs-6 titleSectionProducts">
					 <button type="button" class="btn btn-default firstColors pull-right dropdown-toggle" data-toggle="dropdown">

					  Order products <span class="caret"></span></button>

					  <ul class="dropdown-menu pull-right " role="menu">

					  <?php
					  	// Concatenamos dos varibles para el href
						echo '<li><a href="'.$StaticUrl.$ruteArray[0].'/1/new">New products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/old">Old products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/cheaper">Cheaper products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/expensive">Expensive products</a></li>
							
							  ';

						?>

					  </ul>
				</div>		    

			</div>
		</div>
	</div>
</div>

<!-- /* -------------------------------------------------------------------------- */
/*                            LISTADO DE PRODUCTOS                            */
/* -------------------------------------------------------------------------- */ -->

<div class="container-fluid products">

	<div class="container">
		
		<div class="row">

		

			<?php

			
	 /* -------------------------------------------------------------------------- */
	 /*        LISTAR PRODUCTOS EN FUNCION DE CATEGORIAS O BOTONES SEE MORE       */
	 /* -------------------------------------------------------------------------- */

			// Si la url es OnOffer
			if($valueURL == "onOffer"){

				$rowProduct = "offer" ;
				$valueRow = 1;
				$order = "priceOnOffer";
			
            // Si url es top sales
			}else if($valueURL == "topsales"){

				$rowProduct = null;
				$valueRow= null;
				$order = "numSells";
			
            // Si url es mostViewed
			}else if($valueURL == "mostViewed"){

				$rowProduct = null;
				$valueRow = null;
				$order= "numViews";		

			}else{
        

			// COMPROBAMOS QUE EXISTEN LAS RUTAS DE LOS PRODUCTOS EN LA DB
			$row="rute";
			$valueURL=$ruteArray[0];
            $order="id";
			$isCategory = ProductsController::controllerCategoriesExisting($row,$valueURL);
            
			// si la UR no es de categorias, buscamos las coincidencias del id Subcat 
			if(! $isCategory){

				$isSubCategory = ProductsController::controllerSubCategoriesExisting($row,$valueURL);

				$valueRow=$isSubCategory[0]["id"];
				$rowProduct="id_subCat";

			//  Si la URL es de categorias
			}else{
				$valueRow=$isCategory["id"];
				$rowProduct="id_category";
			}
			// Si la URL es una categorias y subca, toma estos valores
			// $order="id";	
            // $mode="DESC";		
            }

            /*=============================================
			LLAMADO DE PAGINACIÓN
			=============================================*/

			if( isset($ruteArray[1])){
				
				        // Si hay una ruta [2] que coincide, ordena de una u otra forma
                            if(isset($ruteArray[2])){
    
                    	    	if($ruteArray[2] == "old"){            
                    	    		$mode = "ASC";
									$_SESSION['order']=$mode;
                                //    probando
                                   $order="id";								
				                                                     
                    	    	}else if($ruteArray[2] == "expensive"){
                    	    		$mode = "DESC";
									$_SESSION['order']=$mode;
                    	    		$order="price";
								
                    	    	}else if($ruteArray[2] == "cheaper"){
                    	    		$mode="ASC";
									$_SESSION['order']=$mode;
                    	    		$order="price";
									
                    	    	}else if($ruteArray[2] == "new"){            
                    	    		$mode = "DESC";
									$_SESSION['order']=$mode;
                                    $order="id";
								
                    	    	}
                        // Si no existe ninguna ruta [2], el modo de orden es descendente
                            } else{    
                                
							//  $mode=	$_SESSION['order'];
							 $mode=	"DESC";
							
							 
                            }
                // Valores del LIMIT sql
                $numProducts=12;
				// Calculo de la pagina en funcion del numero que hay en la url
                $page = ($ruteArray[1]-1) * $numProducts;
			
			}else{
                //Si no tenemos ninguna paginacion en la url, por defecto siempre se mostrara la primera pagina
				$ruteArray[1]=1;
                // Valores del LIMIT sql
				$numProducts=12;
				$page=0;
				$mode="DESC";              
				}           


		
	
            //  LLamada para listar los productos
			 $listOfProducts = ProductsController::showProductsList($rowProduct,$valueRow,$numProducts,$order,$mode,$page);	 
			
				// Llamada para contador de la paginacion
			$numTotalProducts = ProductsController::countProducts($rowProduct,$valueRow,$order);

			// var_dump(count($numTotalProducts));
		


			if(!$listOfProducts){

				echo '<div class="col-xs-12 error404 text-center">

						 <h1><small>¡Ooops!</small></h1>

						 <h2>There are no products in this section...</h2>

					</div>';

			}else{

				echo '<ul class="listProducts">';

					foreach ($listOfProducts as $key => $value) {
					
						echo '
					
			<li class="col-md-3 col-sm-4 col-xs-6">
			<div class="containerImgProduct">					
				<a href="'.$StaticUrl.$value["rute"].'" class="pixelProducto">						
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
				<h5>'.$value["name"].'<br><br></h5>	';
					/* -------------------------------------------------------------------------- */
				/*                             ESTRELLAS DINAMICAS                            */
				/* -------------------------------------------------------------------------- */
				
					// Parametros para mandar a la base de datos
					$productId = $value["id"];
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
							<div class="rating">							
							<i class=" starsRating fa fa-star stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<i class=" starsRating fa fa-star-o stars"></i>
							<span>  ('.$quanRates.')</span>
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
								<span> ('.$quanRates.')</span>
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
							<span>  ('.$quanRates.')</span>
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
								<span> ('.$quanRates.')</span>
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
								<span> ('.$quanRates.')</span>
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
				
				if($value["offer"]==1){
					echo'
					<div class="col-sm-12 col-xs-12 price offer">					
					<span class="oldPrice">'.$value["price"].'</span><h2>'.$value['priceOnOffer'].'	<span>€</span></h2>
					';					
				}
				else{
					echo '
					<div class="col-xs-12 price ">					
					<h2>'.$value["price"].'<span>€</span></h2>
					';
				}
			echo '
			</div>
			</div>

		</li>';	
				}
		echo '</ul>';
		
			}
			?>
			<!-- posciona el paginador -->
			<div class="clearfix"></div>
			<center>



             <!-- /* -------------------------------------------------------------------------- */
             /*                                 PAGINACION                                 */
             /* -------------------------------------------------------------------------- */ -->
             <?php 
			
			
			if(count($numTotalProducts)>0){
     
				// Calculamos el numero de paginas TOTALES en el paginador, redondeando para arriba los decimales
				$numPag = ceil(count($numTotalProducts)/$numProducts);
				// Variable para modificar las vistas de la paginacion(a partir de ese valor, se muestra la vista completa)
				$show = 3;
				// Numero de productos que mostramos por pagina 
				$numProducts=12;
				
				/* ----------------- SI LA PAGINACION TIENE MAS DE 3 PAGINAS (VISTA PAGINACION COMPLETA) ---------------- */
                if($numPag >= $show){
                     
					/* -------------- SI LA URL[posicion 1 del array] TIENE EL NUMERO 1 DE LA PAGINACION MUESTRA ESTO 
					(SOLO ES FUNCIONAL EL NUMREO 1)-------------- */
					if($ruteArray[1]==1){
                
				//Imprimo la paginacion desde la primera pagina en adelante
				echo'<ul class="pagination">';

				for($i=1;$i<=$show;$i++){
					//agrego la ruta estatica delante para evitar duplicar la url
					echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'">'.$i.'</a></li>';
				}

				echo '
				<li class="disabled"><a>...</a></li>
				<li><a href="'.$StaticUrl.$ruteArray[0].'/'.$numPag.'">'.$numPag.'</a></li>
				<li><a href="'.$StaticUrl.$ruteArray[0].'/'.($ruteArray[1]+1).'">Next</i></a></li>

				</ul>';
				
				}
				
                //SI LA URL TIENE LOS NUMEROS DEL (2 AL MAXIMO-3) HABILITA LOS NUMEROS DEL 2 AL NUMERO MAXIMO - 3
				else if($ruteArray[1]!=1 && $ruteArray[1]!=$numPag && $ruteArray[1]<$numPag/2 && $ruteArray[1]<$numPag-2){
                    
					// pagina actual
					$thisNumPage = $ruteArray[1];

					echo'<ul class="pagination">
					<li><a href="'.$StaticUrl.$ruteArray[0].'/'.($thisNumPage-1).'">Back</i></a></li>';

					for($i=$thisNumPage; $i<=($thisNumPage+2); $i++){
						echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'">'.$i.'</a></li>';
					}
	
					echo '
					<li class="disabled"><a>...</a></li>
					<li><a href="'.$StaticUrl.$ruteArray[0].'/'.$numPag.'">'.$numPag.'</a></li>
					<li><a href="'.$StaticUrl.$ruteArray[0].'/'.($thisNumPage + 1).'">Next</i></a></li>
	
					</ul>';
				}
				 // MUESTRA EL PAGINADOR A LA INVERSA, AUNQUE NO SON FUNCIONALES LOS ULTIMOS 3 BOTONES 
				 else if($ruteArray[1]!=1 && $ruteArray[1]!=$numPag && $ruteArray[1]>=$numPag/2 && $ruteArray[1]<($numPag-2)){
                     
					  
					// pagina actual
					$thisNumPage = $ruteArray[1];

						echo'<ul class="pagination">
						<li><a href="'.$StaticUrl.$ruteArray[0].'/'.($thisNumPage-1).'">Back</i></a></li>
						<li><a href="'.$StaticUrl.$ruteArray[0].'/1">1</i></a></li>
						<li class="disabled"><a>...</a></li>
						';
						// Le sumo 2 para que me imprima las ultimas 3 posiciones del paginador
						for($i=$thisNumPage; $i<=($thisNumPage+2); $i++){
						
							echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'">'.$i.'</a></li>';
						
					}
		
						echo '
						<li><a href="'.$StaticUrl.$ruteArray[0].'/'.($thisNumPage + 1).'">Next</i></a></li>
						</ul>';
	
					}
                // HABILITAMOS LOS ULTIMOS BOTONES DE LA PAGINACION A LA INVERSA
					else{
						$thisNumPage = $ruteArray[1];

					echo'<ul class="pagination">
					<li><a href="'.$StaticUrl.$ruteArray[0].'/'.($thisNumPage-1).'">Back</i></a></li>
					<li><a href="'.$StaticUrl.$ruteArray[0].'/1">1</i></a></li>
					<li class="disabled"><a>...</a></li>
					';
                    // Le resto 2 para que me imprima las ultimas 3 posiciones del paginador
					for($i=($numPag-2); $i<=$numPag; $i++){
						echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'">'.$i.'</a></li>';
					}
	
					echo '
					
					</ul>';

				}
					
				}
				/* -------------- SI LA PAGINACION TIENE MENOS DE 3 PAGINAS(VISTA PAGINACION SIMPLE) -------------- */
				else{
				
				echo'<ul class="pagination">';

				for($i=1; $i<=$numPag; $i++){
					echo' <li ><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'">'.$i.'</a></li>';
				}
				echo '</ul>';
				}

				
				
			}
			?>
				
			
			
		

			

