
/* -------------------------------------------------------------------------- */
/*                                   SLIDER                                   */
/* -------------------------------------------------------------------------- */


var numSlider = 0
var focus = $("#sliderPagination li span") //Estilos del color del paginador
var next = $("#slider #nextImg")//Selector flecha de avance
var back = $("#slider #backImg")//Selector flecha de retroceso
var circlePagintr=$("#sliderPagination li")//Selector de los circulos del paginador
var totalSlides = 5 //num slides, un array de 6 elementos 
var timePush = false //Variable para corregir el tiempo que se ejecuta la animacion del slider al pulsar 
var colorBlack = '#333333';
var colorWhite = '#ccccff';


/* -------------------------------------------------------------------------- */
/*                                  PAGINADOR                                 */
/* -------------------------------------------------------------------------- */
// Al pulsar sobre el circulo, se genera un valor en la variable numSlider 
$(circlePagintr).click(function(){
    numSlider = $(this).attr('id')-1;
    console.log(numSlider);

    moveSlider(numSlider)
})


/* -------------------------------------------------------------------------- */
/*                      RETROCESO                       */
/* -------------------------------------------------------------------------- */

$(back).click(function(){
    
    // $(focus).css({'color':colorWhite});
    numSlider--
    // $(focus[numSlider]).css({"color":colorBlack});
    
    if(numSlider==-1){
    numSlider=totalSlides 
        // if(numSlider==totalSlides){
        // $(focus[totalSlides]).css({"color":colorBlack});
        //  }
    }
    // nextSlide(numSlider)
    moveSlider(numSlider)
    
    })
/* -------------------------------------------------------------------------- */
/*                             AVANCE                          */
/* -------------------------------------------------------------------------- */

$(next).click(function(){
    //AL HACER CLICK INCREMENTO LA VARIABLE 
    numSlider++
    //SI EL NUMERO DE SLIDERS ES MAYOR AL TOTAL DE IMAGENES, ESTE VALOR PASA A CERO, ASI VOLVEMOS AL INICIO
    if(numSlider>totalSlides){
    numSlider=0
    }
    moveSlider(numSlider)

    })

 setInterval(function(){
    
    //Si hemos usado el slider manualmente, la variable que esta en true pasa a false
     if(timePush){
         timePush=false
     }//Por lo tanto, ejecutas el ciclo de animacion 
     else{
    numSlider++
      if(numSlider>totalSlides){
        numSlider=0
        }
        moveSlider(numSlider)
    }
        
 },9993200)

/* ---------------------- FUNCION PARA MOVER EL SLIDER Y ANIMAR PRODUCTOS---------------------- */

function moveSlider(numSlider){

    //Al recibir un valor en la variable numSlider por parametro, esta crea un valor y lo manda a la propiedad CSS left de #slider ul
    $('#slider ul').animate({"left": numSlider * -100 + "%"},500);
    //Ponemos en blanco todos los circulos del paginador
    $(focus).css({'color':colorWhite});
    ////Pongo el foco en el paginador activo
    $(focus[numSlider]).css({"color":colorBlack});
  
     //Le indico al set interval que el usuario esta interactuando con el slider 
     timePush = true;
}






