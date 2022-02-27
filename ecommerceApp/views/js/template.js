
/* --------- PETICION AJAX PARA OBTENER LOS DATOS DEL LADO SERVIDOR --------- */

//Realizamos la peticion AJAX para pode obtener los datos de ajaxStylesDinamic.php

$.ajax({

    url:"ajax/ajaxStylesDinamic.php",
    success: function(res){
    
    // El resultado que obtenemos es de tipo sting, para cambiar el tipo a json y poder manipular los datos hacemos uso de JSON.parse(),
    // asi creo las variables de cada una de las columnas de la base de datos
    
    var barraTop = JSON.parse(res).barraTop;
    var textTop = JSON.parse(res).TextTop;
    var backgroundCat = JSON.parse(res).background;
    var colorText = JSON.parse(res).colorText;
    
    //Usando jqery adjunto las variables de la BD a cada una de las propiedades CSS

    
    //Clases de la barra superior(Background y color del texto)
    $(".barraTop, .barraTop a, .barraTop li ").css({
                                    "background": barraTop,
                                    "color":textTop});

    //Clases de los colores principales de la seccion categorias y carrito
    $(".firstColors, .firstColors a,button.firstColors").css({
        "background": backgroundCat,
        "color": colorText});
    
    }

})