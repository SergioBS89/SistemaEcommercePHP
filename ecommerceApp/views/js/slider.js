
/* -------------------------------------------------------------------------- */
/*                                   SLIDER                                   */
/* -------------------------------------------------------------------------- */

var numSlider = 0
var focus = $("#sliderPagination li span")
var circlePagintr = $("#sliderPagination li")
var next = $("#slider #nextImg")
var back = $("#slider #backImg")
var totalSlides = 5 //array de 6 elementos = 5
var colorBlack = '#333333';
var colorWhite = '#ccccff';


/* -------------------------------- PAGINADOR ------------------------------- */
// Al pulsar sobre el circulo, se genera un valor en la variable numSlider 
$(circlePagintr).click(function(){
    numSlider = $(this).attr('id')-1;
    console.log(numSlider);

    moveSlider(numSlider)
})

/* ---------------------- FUNCION PARA MOVER EL SLIDER ---------------------- */

function moveSlider(numSlider){

    // Al hacer click en los circulos, estos envian un valor a la propiedad left del #slider ul
    $('#slider ul').animate({"left": numSlider * -100 + "%"},500);

    

    $(focus).css({'color':colorWhite});

    $(focus[numSlider]).css({"color":colorBlack});
    // console.log(focus[numSlider]);
}

/* -------------------------------------------------------------------------- */
/*                             AVANCE                          */
/* -------------------------------------------------------------------------- */

$(next).click(function(){
    
$(focus).css({'color':colorWhite});
numSlider++
$(focus[numSlider]).css({"color":colorBlack});

if(numSlider>totalSlides){
numSlider=0
if(numSlider==0){
$(focus[0]).css({"color":colorBlack});
 }
}
nextSlide(numSlider)

})

/* ---------------------------- FUNCION DE AVANCE --------------------------- */
function nextSlide(numSlider){
    $('#slider ul').animate({"left": numSlider * -100 + "%"},500);

   
    // console.log(focus[numSlider]);
}

/* -------------------------------------------------------------------------- */
/*                      RETROCESO                       */
/* -------------------------------------------------------------------------- */

$(back).click(function(){
    
    $(focus).css({'color':colorWhite});
    numSlider--
    $(focus[numSlider]).css({"color":colorBlack});
    
    if(numSlider==-1){
    numSlider=totalSlides 
        if(numSlider==totalSlides){
        $(focus[totalSlides]).css({"color":colorBlack});
         }
    }
    nextSlide(numSlider)
    
    })

