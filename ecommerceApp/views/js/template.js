
// Traigo la ruta estatica desde template.php
var ruteStatic = $("#ruteStatic").val();

/* --------- PETICION AJAX PARA OBTENER LOS DATOS DEL LADO SERVIDOR --------- */

//Realizamos la peticion AJAX para pode obtener los datos de ajaxStylesDinamic.php

$.ajax({

    url: ruteStatic + "ajax/ajaxStylesDinamic.php",
    success: function(res){
    
    // El resultado que obtenemos es de tipo sting, para cambiar el tipo a json y poder manipular los datos hacemos uso de JSON.parse(),
    // asi creo las variables de cada una de las columnas de la base de datos
    
    var barraTop = JSON.parse(res).barraHeader;
    var textTop = JSON.parse(res).TextHeader;
    var background = JSON.parse(res).bgButtons;
    var colorText = JSON.parse(res).colorTextContrast;
    
    /* -------------------------------------------------------------------------- */
    /*                      CON JQUERY CAMBIO ALGUNOS ESTILOS                     */
    /* -------------------------------------------------------------------------- */    

    //Clases de la barra superior del header
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
    
        /* -------------------------------------------------------------------------- */
        /*             AQUI CAMBIO DINAMICAMENTE LAS VARIBLES GLOBALES CSS            */
        /* -------------------------------------------------------------------------- */
    document.documentElement.style.setProperty('--main-bg-colorTop', barraTop);
    document.documentElement.style.setProperty('--main-bg-color', background);
    document.documentElement.style.setProperty('--color-text-contrast', colorText);
    document.documentElement.style.setProperty('--color-text-header', textTop);
    }  
   

})

