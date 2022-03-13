<!-- 
/* -------------------------------------------------------------------------- */
/*                               SLIDER                              */
/* -------------------------------------------------------------------------- */ -->

       
<div class="container-fluid" id="slider">

    <div class="row">

        <ul>

          <!-- /* -------------------------------------------------------------------------- */
          /*                              SLIDERS DINAMICOS                             */
          /* -------------------------------------------------------------------------- */ -->
        <?php 
            
            //creamos el objeto slider y llamamos a la funcion que devuelve desde la base de datos todos los estilos de nuestro slider
            $slider = SliderController::sliderStyle(); 
            
            foreach ($slider as $key => $value){
           
            //Todos aquellos registros almacenados en json, son necesarios convertirlos en arrays para poder manipular la informacion    
            $jsonProductStyles=json_decode($value["styleProduct"],true);
            $jsonH1Styles = json_decode($value["colorText"],true);
            $jsonH2Styles = json_decode($value["colorTextH2"],true);
            $jsonText= json_decode($value["textH1"],true);
            $jsonButton= json_decode($value["button"],true);

            //Imprimo uno por uno, todos los registros de la base de datos (6 sliders) y aplico a cada uno las respectivas clases y estilos
             echo '
             <li>
             <img class="imgSlider" src="http://localhost/PROYECTOS/SistemaEcommercePHP/administrator/'.$value["background"].'" alt="">
             <div class ="'.$value["positionProduct"].'">

                 <img src="http://localhost/PROYECTOS/SistemaEcommercePHP/administrator/'.$value["product"].'"
                  alt="" style="width:'.$jsonProductStyles["width"].';top:'.$jsonProductStyles["top"].';">

                 <div class="'.$jsonText["positionText"].' textSlider  TextSli1">                 

                    <h1 style="color:'.$jsonH1Styles["color"].'; font-size:'.$jsonH1Styles["size"].'">'.$jsonText["content"].'</h1>

                     <h2 style="color:'.$jsonH2Styles["color"].';font-size:'.$jsonH2Styles["size"].'">'.$value["textH2"].'</h2>
                     <a href="'.$jsonButton["urlButton"].'">
                         <button class="btn btn-default firstColors '.$jsonButton["positionButton"].' ">SEE PRODUCT <span class="glyphicon glyphicon-play"></span></button>
                     </a>
                 </div>
             </div>
         </li>';
            }
            ?>          
          
        </ul>
        <!-- /* -------------------------------------------------------------------------- */
        /*                                   FLECHAS AVANCE RETROCESO                               */
        /* -------------------------------------------------------------------------- */ -->
        <div class="arrow" id="nextImg"><span class="glyphicon glyphicon-chevron-right"></span></div>
        <div class="arrow" id="backImg"><span class="glyphicon glyphicon-chevron-left"></span></div>

         <!-- /* -------------------------------------------------------------------------- */
        /*                                 PAGINADOR DEL SLIDER                          */
        /* -------------------------------------------------------------------------- */ -->
        <ol class="pagination" id="sliderPagination">
            <li id="1"><span class="fa fa-circle"></span></li>
            <li id="2"><span class="fa fa-circle"></span></li>
            <li id="3"><span class="fa fa-circle"></span></li>
            <li id="4"><span class="fa fa-circle"></span></li>
            <li id="5"><span class="fa fa-circle"></span></li>
            <li id="6"><span class="fa fa-circle"></span></li>
        </ol>

    </div>
</div>
<hr>
