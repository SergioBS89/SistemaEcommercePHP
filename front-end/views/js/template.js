
/* --------- PETICION AJAX PARA OBTENER LOS DATOS DEL LADO SERVIDOR --------- */

//Realizamos la peticion AJAX para pode obtener los datos de ajaxStylesDinamic.php

$.ajax({

    url:"ajax/ajaxStylesDinamic.php",
    success: function(res){
    
    // El resultado que obtenemos es de tipo sting, para cambiar el tipo a json y poder manipular los datos hacemos uso de JSON.parse(),
    // asi creo las variables de cada una de las columnas de la base de datos
    
    var barraTop = JSON.parse(res).barraTop;
    var textTop = JSON.parse(res).TextTop;
    var background = JSON.parse(res).background;
    var colorText = JSON.parse(res).colorText;
    // console.log(barraTop,textTop,background,colorText);
    
    $(".backColor, .backColor a, .backColor i").css({
                                        "background": background,
                                        "color": colorText});
    
    $(".barraTop, barraTop a ").css({
                                    "background": barraTop,
                                    "color":textTop});
    
    }
})