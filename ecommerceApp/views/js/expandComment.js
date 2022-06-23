
/* -------------------------------------------------------------------------- */
/*        SECCION COMENTARIOS-EXPANSION DEL CONTNEDOR PARA MOSTRAR MAS        */
/* -------------------------------------------------------------------------- */
$("#buttonExpand").click(function(){

    $("#contExpand").toggleClass("expand")
    if($("#contExpand").hasClass("expand")){
        $("#buttonExpand").html("HIDE")
    }else{
        $("#buttonExpand").html("SHOW MORE")
    }
})



