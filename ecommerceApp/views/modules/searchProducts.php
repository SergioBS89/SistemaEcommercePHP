

<?php

$StaticUrlAdmin = StaticRute::RuteAdministrator();
$StaticUrl = StaticRute::rute();
?> 
<!-- /* -------------------------------------------------------------------------- */
/*                       BARRA SUPERIOR DE LOS PRODUCTOS                      */
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
			            	<li class="bread"><a href="<?php echo $StaticUrl;?>">HOME<span>/</span></a></li>
			            	<li class="bread"><?php echo $valueURL ?> <span>/</span></li>            
			            	<li class="bread"><?php echo $ruteArray[2]?><span>/</span></li>            
			            	<li class="bread"><?php echo $ruteArray[3]?></li>            
			            </ul>
			    </div>
				<div  class="col-xs-6 titleSectionProducts">
					 <button type="button" class="btn btn-default firstColors pull-right dropdown-toggle" data-toggle="dropdown">

					  Order products <span class="caret"></span></button>

					  <ul class="dropdown-menu pull-right " role="menu">

					  <?php
					  	// Concatenamos las rutas para crear la URL 
						echo '<li><a href="'.$StaticUrl.$ruteArray[0].'/1/new/'.$ruteArray[3].'">New products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/old/'.$ruteArray[3].'">Old products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/cheaper/'.$ruteArray[3].'">Cheaper products</a></li>
							  <li><a href="'.$StaticUrl.$ruteArray[0].'/1/expensive/'.$ruteArray[3].'">Expensive products</a></li>
							
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

		

        /* -------------------------------------------------------------------------- */
        /*                              ORDENAR PRODUCTOS                             */
        /* -------------------------------------------------------------------------- */

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
                                
							 $mode=	$_SESSION['order'];
							
							 
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
				$order="id";            
				}          
				
				// Declaramos nulas estas variables para que en la pagina del buscador no se listen productos hasta que no haya una busqueda
				// exitosa
				$listOfProducts=null;
				$numTotalProducts=null;
			
                
				//Si en la URL posicion 3 hay alguna palabra, busca coincidencias en la base de datos
				if(isset($ruteArray[3])){

					$searchProduct= $ruteArray[3];
                 
					$listOfProducts = ProductsController::searchingProducts($searchProduct,$numProducts,$order,$mode,$page);	 
					$numTotalProducts = ProductsController::countProductsSearch($searchProduct);
				}      
			
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
					(SOLO ES FUNCIONAL EL NUMRER 1 DE LA PAGINACION)-------------- */
					if($ruteArray[1]==1){
                
				
				echo'<ul class="pagination">';

				for($i=1;$i<=$show;$i++){
					//agrego la ruta estatica delante para evitar duplicar la url y concateno la ruta url 
					echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'/'.$ruteArray[2].''.$ruteArray[3].'">'.$i.'</a></li>';
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
						echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'/'.$ruteArray[2].''.$ruteArray[3].'">'.$i.'</a></li>';
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
						
							echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'/'.$ruteArray[2].''.$ruteArray[3].'">'.$i.'</a></li>';
						
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
					<li><a href="'.$StaticUrl.$ruteArray[0].'/1/'.$ruteArray[2].''.$ruteArray[3].'">1</i></a></li>
					<li class="disabled"><a>...</a></li>
					';
                    // Le resto 2 para que me imprima las ultimas 3 posiciones del paginador
					for($i=($numPag-2); $i<=$numPag; $i++){
						echo' <li><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'/'.$ruteArray[2].'/'.$ruteArray[3].'">'.$i.'</a></li>';
					}
	
					echo '
					
					</ul>';

				}
					
				}
				/* -------------- SI LA PAGINACION TIENE MENOS DE 3 PAGINAS(VISTA PAGINACION SIMPLE) -------------- */
				else{
				
				echo'<ul class="pagination">';

				for($i=1; $i<=$numPag; $i++){
					echo' <li ><a id="numPag'.$i.'" href="'.$StaticUrl.$ruteArray[0].'/'.$i.'/'.$ruteArray[2].'/'.$ruteArray[3].'">'.$i.'</a></li>';
				}
				echo '</ul>';
				}

				
				
			}
			?>