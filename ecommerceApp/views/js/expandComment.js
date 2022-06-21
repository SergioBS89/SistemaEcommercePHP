$("#buttonExpand").click(function(){

    $("#contExpand").toggleClass("expand")
    if($("#contExpand").hasClass("expand")){
        $("#buttonExpand").html("SHOW LESS")
    }else{
        $("#buttonExpand").html("SHOW MORE")
    }
})

