<?php

$staticUrlAdmin = StaticRute::ruteAdministrator();
$StaticUrl = StaticRute::rute();
?> 


<div class="container-fluid well well-sm barProducts">

	<div class="container">
		
		<div class="row">								
			
		    <div  class="col-xs-12 titleSectionProducts">
		    	<h1>PRODUCT INFORMATION</h1>
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
			
			<div class="col-xs-5">
			    <h4 class="pull-right">	
					<a href="#" class="backStore">						
					ADD TO WISHES <span></span> <i class="fa fa-solid fa-heart"></i>
					</a>			      
				</h4>
			</div>
			
			<div class="clearflix"></div>
		</div>
	</div>
</div>
	
<hr>


<?php 

$rute=$ruteArray[0];
$descritionProduct=ProductsController::descriptionProduct($rute);
?>
<!-- 
 /* -------------------------------------------------------------------------- */
 /*                       SECCION INFORMACION DEL PRODUCO                      */
 /* -------------------------------------------------------------------------- */ -->

 <div class="container-fluid">
     <div class="container">
        <div class="row contProductZoom">

            <div class="col-md-5 col-sm-6 col-xs-12 zoomImg">                
			    
				 <img id="productDesc" class="img-thumbnail" src="<?php echo $descritionProduct['image'] ?>" alt="what happen">
                
            </div>
			            <!-- /* ------------------------ DESCRIPCION DEL PRODUCTO ------------------------ */ -->
			<div class="col-md-7 col-sm-6 col-xs-12">
				<div class="col-md-12 textDescription">
			        <!-- NOMBRE -->
                    <h1><?php echo $descritionProduct["name"]; ?></h1>
					<!-- VALORACION -->
					<div class="ratingDescription">
					<i class="fa fa-star starsRatingDescription"></i>
					<i class="fa fa-star starsRatingDescription"></i>
					<i class="fa fa-star starsRatingDescription"></i>
					<i class="fa fa-star starsRatingDescription"></i>
					<i class="fa fa-star starsRatingDescription"></i>
				    </div>
			        <!-- DESCRIPTION -->
			        <h4><?php echo $descritionProduct["description"] ; ?></h4>
					
					 <!--PRECIO -->
			        <!-- Mostramos la oferta de precio en funcion del producto -->
			        <?php if($descritionProduct["offer"]==0){
			      	echo'					
			      	<div class="priceDescription">
			      	<h2>'.$descritionProduct["price"].'<span>€</span></h2>				
			      	</div>
			      	';
			        }
			        else{					
			        	echo '					
			        <div class="priceDescription spacePrice">
					<span  class="percent">'.$descritionProduct["discount"].' % OFF!</span>	
			        <span class="oldPrice">'.$descritionProduct["price"].'</span>
			        <h2>'.$descritionProduct['priceOnOffer'].'<span>€</span></h2>
			        </div>
			        	';
			        }?>
				</div>
			    <div class="col-md-3 col-xs-6">    
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
				</div>
				<div class="col-md-6 col-xs-12">			        	
			    <button class="btn btn-default btn-block btn-lg firstColors">
                    <a href="#">
			            <small>ADD TO CART</small><i class="fa fa-shopping-cart col-md-0"></i>
                    </a>
			    </button>
			    </div>
			    <h4 style="margin-top: 20px;" class="col-md-12 col-sm-0 col-xs-0">
			    	<span class="label label-default infoProduct">
			    		<i class="fa fa-clock-o" style="margin-right:5px"></i>
			    		<?php echo $descritionProduct["deliver"] ?> days to delivery | 
			    		<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
			    		<?php echo$descritionProduct["numSells"]; ?> times sold |
			    		<i class="fa fa-eye" style="margin:0px 5px"></i>
			    		viewed by <span><?php echo $descritionProduct["numViews"] ?></span> persons
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
		 
		<div class="row" id="navComments">
		
		    <ul class="nav nav-pills">
				<li class="firstColors"><a href="#">3 comments</a></li>
				<li class=""><a href="#">see more</a></li>
				<li class="pull-right"><a href="#">
				Media rating: 4.0 |
				<i class="starsRating fa fa-star stars"></i>
				<i class="starsRating fa fa-star stars"></i>
				<i class="starsRating fa fa-star stars"></i>
				<i class="starsRating fa fa-star stars"></i>
				<i class="starsRating fa fa-star-o stars"></i>
				</a></li>
				

			</ul>
		</div>
		<hr>
		<!-- LISTA DE COMENTARIOS -->
		<div class="row">
			<div class="panel-group col-xs-12">
			    <div class="panel panel-default">
				      
				    <div class="panel-heading text-uppercase userBar">
				        <img class="img-circle pull-left" src="<?php echo $staticUrlAdmin ?>views/img/users/default/sos.png">
				    	<span>Sergio Berdiell</span>
				    </div>
				     
				    <div class="panel-body comment">
				         <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.
				    	  Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.</h5>
				    </div>

				    <div class="panel-footer">
				        Rating: 4.5 |
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star-half-o stars"></i>
			        </div>
		        </div>	 
	        </div>
	    </div>
		<!--  -->
		<div class="row">
			<div class="panel-group col-xs-12">
			    <div class="panel panel-default">
				      
				    <div class="panel-heading text-uppercase userBar">
				        <img class="img-circle pull-left" src="<?php echo $staticUrlAdmin ?>views/img/users/default/as.png">
				    	<span>Monica Perez Lopez</span>
				    </div>
				     
				    <div class="panel-body comment">
				         <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.
				    	  Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.</h5>
				    </div>

				    <div class="panel-footer">
				        Rating: 4.5 |
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star-half-o stars"></i>
			        </div>
		        </div>	 
	        </div>
	    </div>
		<!--  -->
		<div class="row">
			<div class="panel-group col-xs-12">
			    <div class="panel panel-default">
				      
				    <div class="panel-heading text-uppercase userBar">
				        <img class="img-circle pull-left" src="<?php echo $staticUrlAdmin ?>views/img/users/default/bi.png">
				    	<span>Robert Fernand</span>
				    </div>
				     
				    <div class="panel-body comment">
				         <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.
				    	  Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eius distinctio
				    	 assumenda adipisci voluptatum totam laboriosam nesciunt officia nihil, dolores perferendis nulla cupiditate cumque
				    	  ducimus dolorum deleniti, odit accusantium fugit.</h5>
				    </div>

				    <div class="panel-footer">
				        Rating: 4.5 |
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star stars"></i>
				        <i class="starsRating fa fa-star-half-o stars"></i>
			        </div>
		        </div>	 
	        </div>
	    </div>
		
		
    </div>
</div>

<div class="clearfix"></div>

<!-- /* -------------------------------------------------------------------------- */
 /*                             ARTICULOS RELACIONADOS                        */
 /* -------------------------------------------------------------------------- */ -->
 
 <div class="container-fluid well well-sm barProducts">

	<div class="container">
		
		<div class="row">								
			
		    <div  class="col-xs-12 titleSectionProducts">
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
		   /*                       LISTA DE PRODUCTOS RELACIONADOS                      */
		   /* -------------------------------------------------------------------------- */ -->
    
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