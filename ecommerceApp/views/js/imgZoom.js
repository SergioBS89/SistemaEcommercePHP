
// cuando pasamos el mouse por encima de la imagen
$("#productDesc").mouseover(function (event) { 
    
   var srcImg = $(this).attr("src")
   
   $(".placeZoom img").attr("src",srcImg)
   $(".placeZoom").toggleClass("hideImgProduct");

   var height = document.getElementById("productDesc").clientHeight;
  document.getElementById("placeZoomId").style.height = height + "px";
    
});

// Cuando el mouse sale de la imagen
$("#productDesc").mouseout(function (event) { 
    
   var srcImg = $(this).attr("src")
   
   $(".placeZoom").toggleClass("hideImgProduct");
    
});

//Cuando desplazamos por encima

$("#productDesc").mousemove(function (event) { 
    
   var positionX = event.offsetX;
   var positionY = event.offsetY;
   $(".placeZoom img").css({
      "top":-positionY + "px",
      "left":-positionX + "px"
   })
   
    
});