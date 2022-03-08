
/* --------- PETICION AJAX PARA OBTENER LOS DATOS DEL LADO SERVIDOR --------- */

//Realizamos la peticion AJAX para pode obtener los datos de ajaxStylesDinamic.php

$.ajax({

    url:"ajax/ajaxStylesDinamic.php",
    success: function(res){
    
    // El resultado que obtenemos es de tipo sting, para cambiar el tipo a json y poder manipular los datos hacemos uso de JSON.parse(),
    // asi creo las variables de cada una de las columnas de la base de datos
    
    var barraTop = JSON.parse(res).barraHeader;
    var textTop = JSON.parse(res).TextHeader;
    var background = JSON.parse(res).bgButtons;
    var colorText = JSON.parse(res).colorTextContrast;
    
    //Usando jqery adjunto las variables de la BD a cada una de las propiedades CSS

    
    //Clases de la barra superior
    $(".barraTop, .barraTop a, .barraTop li ").css({
                                    "background": barraTop,
                                    "color":textTop});

    //Clases de los colores principales de la seccion categorias, carrito, botones
    $(".firstColors, .firstColors a, button.firstColors").css({
        "background": background,
        "color": colorText});    
    
     // Otras clases y fuentes
     $(".arrow, .titleSectionProducts h1").css({
        "color": colorText});    
    }
    
   

})