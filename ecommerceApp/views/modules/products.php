
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
				    	<a href="onOffer">						
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

            foreach($products as $key => $value){


			echo '
			
			<li class="col-md-3 col-sm-4 col-xs-6">
				<div class="containerImgProduct">					
					<a href="'.$value["rute"].'" class="pixelProducto">						
						<img src="'.$value["image"].'" class="img-responsive" >
					</a>
					<span class="stickerOffer"></span>	

                </div>
				
				<div class="productName">
				    <h5>'.$value["name"].'<br><br></h5>	
				    
				    <div class="rating">
				        <i class="fa fa-star starsRating"></i>
				        <i class="fa fa-star starsRating"></i>
				        <i class="fa fa-star starsRating"></i>
				        <i class="fa fa-star starsRating"></i>
				        <i class="fa fa-star starsRating"></i>
				    </div>
				 		    
				    <div class="col-sm-12 col-xs-12 price offer">					
					<span class="oldPrice">'.$value["price"].'</span><h2>'.$value['priceOnOffer'].'	<span>€</span></h2>
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
					<h1>BEST SELLER</h1>
				</div>

					<!-- /* --------------------------------- ver mas -------------------------------- */ -->
				    	<div class="col-sm-6 col-xs-6">				
				    	<a href="bestSeller">						
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
            $orderBy= "numSells";
            $products = ProductsController::showProducts($orderBy);
            foreach($products as $key => $value){
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
					<span class="oldPrice">'.$value["price"].'</span><h2>'.$value['priceOnOffer'].'	<span>€</span></h2>';					
				}
				else{
					echo '
					<div class="col-xs-12 price ">					
					<h2>'.$value["price"].'<span>€</span></h2>';
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
				    	<a href="mostViewed">						
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
            $orderBy= "numViews";
            $products = ProductsController::showProducts($orderBy);
            foreach($products as $key => $value){
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
					<span class="oldPrice">'.$value["price"].'</span><h2>'.$value['priceOnOffer'].'	<span>€</span></h2>';					
				}
				else{
					echo '
					<div class="col-xs-12 price ">					
					<h2>'.$value["price"].'<span>€</span></h2>';
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
/*                              NUEVOS PRODUCTOS                              */
/* -------------------------------------------------------------------------- */ -->
<!-- /* -------------------------------------------------------------------------- */
/*                       SECCION DE PRODUCTOS MAS VENDIDOS                       */
/* -------------------------------------------------------------------------- */  -->


<div class="container-fluid well well-sm barProducts">
	<div class="container">		
		<div class="row">			
			<div class="col-xs-12 titleSectionProducts">
				 <!-- /* --------------------------------- Titulo --------------------------------- */ -->					
					<h1>DISCOVER OUR NEW PRODUCTS</h1>
			</div>
		</div>
	</div>
</div>
<hr>
<!-- /* ---------------------------- NUEVOS PRODUCTOS ---------------------------- */ -->
<div class="container-fluid">
	<div class="container">		
		 <!--Titulo-->
		  
             <!--Contenedor de fotos-->
            <div class="containerNewProducts">
                <div class="newproducts new_A""><a href="#"><h3>Delicious protein chocolate</h3></a></div>
                <div class="newproducts new_B""><a href="#"><h3>Sugar free energy bars</h3></a></div>
                <div class="newproducts new_C""><a href="#"><h3>Organic fruit smoothie</h3></a></div>
                <div class="newproducts new_D""><a href="#"><h3>Fantastic homemade honey</h3></a></div>
                <div class="newproducts new_E""><a href="#"><h3>Best quality peanut butter</h3></a></div>
            </div>
	</div>
</div>


<!-- /* -------------------------------------------------------------------------- */
/*                            BANNER DE MOTIVACION                            */
/* -------------------------------------------------------------------------- */ -->

<div class="banner container-fluid">

	<img src="http://localhost/PROYECTOS/SistemaEcommercePHP/administrator/views/img/banner/3.jpg" width="100%">	

	<div class="textBanner textL">
		<h1 style="color:#fff">IMPOSSIBLE IS JUST A WORD</h1>
	</div>
	<img class="logoBanner" src="http://localhost/PROYECTOS/SistemaEcommercePHP/administrator/views/img/banner/logoBanner.png" alt="">

</div>

<h1>ABOUT US</h1>
<br>
<h2>
Impulsados por la experiencia de más de una década a tu servicio, caracterizada por la constante búsqueda de la excelencia, te presentamos la mejor selección de productos de nutrición deportiva y alimentación saludable del mercado, con independencia de cuál sea tu disciplina deportiva u objetivo.

Solo podemos invitarte a que compruebes las increíbles virtudes de todos nuestros productos: eficacia, sabor y textura de las fórmulas de nuestras proteínas (con Whey Protein a la cabeza) creatinas, aminoácidos de altura (como BCAA’s), productos BIO... ¡Y todo lo que tenga que ver con el interés incesante por el cuidado de la salud!

¿Cuál es nuestro objetivo? Llevar la Marca HSN a lo más alto y ofrecerte la mayor variedad de Nutrición Deportiva y Dietética Natural y, por último, pero no por eso menos importante, los mejores precios.
</h2>