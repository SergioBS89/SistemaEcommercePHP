
/* -------------------------------------------------------------------------- */
/*                DEVUELVE EL TOTAL DE VISTAS DE LOS PRODUCTOS                */
/* -------------------------------------------------------------------------- */
var counter = 0;

$(window).on("load",function(){
    
    var numViews=$("#viewsProducts").html();
    counter = Number(numViews) + 1;
    //Incremento dinamico del valor de vistas
    $("#viewsProducts").html(counter);
	console.log(numViews);

/* -------- Uso de ajax para actualizar el valor en la base de datos ------- */
    
    // Url actual
    var url = location.pathname;
    //Separamos para crear un array
	var rute = url.split("/");

	var dates = new FormData();    

	dates.append("counter", counter);
    // Ultimo elemento de la url
	dates.append("rute", rute.pop());


	$.ajax({

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/ajaxProducts.php",
		method:"POST",
		data: dates,
		cache: false,
		contentType: false,
		processData:false,
		success: function(res){
        console.log("Result:",res);
        }

	});

});


/* -------------------------------------------------------------------------- */
/*    TOMA EL ID DE LOS PRODUCTOS PARA CREAR VALORACION   */
/* -------------------------------------------------------------------------- */

$(".takeId").click(function(){

	// variables de crear valoraciones 
	var id = $(this).attr("idProdProd");
	var idUser = $(this).attr("idUserUser");

	
	// Asigno el valor al input oculto del modal para crear valoracion para pasarlo por POST
	$("#idModalCreate").val(id);
	$("#idModalCreate2").val(idUser);


	//Variable de modificar las valoraciones
	var idComment = $(this).attr("idComment");
	
	// Asigno el valor al input oculto del modal para crear valoracion para pasarlo por POST
	
	$("#idModalModyf").val(idComment);
	console.log(idComment);
	console.log(id);
	console.log(idUser);
		
})

/* -------------------------------------------------------------------------- */
/*                             MOSTRAR COMENTARIO                             */
/* -------------------------------------------------------------------------- */

$("#showComment").click(function(){
	$(".commentHide").toggleClass("hidden")
})

/* -------------------------------------------------------------------------- */
  /*                          VALIDACION DEL COMENTARIO                         */
  /* -------------------------------------------------------------------------- */

  function valComment(){

	var newComment = $("#newComment").val();

	if(newComment != ""){

		var exReg = /^[^$%&|<>#]*$/;
		if(!exReg.test(newComment)){

			$("#newComment").parent().before('<div class="alert alert-warning">No special characters are allowed to Username field</div>')

			return false;
		}
	}else{
		$("#newComment").parent().before('<div class="alert alert-warning">Text area is required, please write a comment</div>')
	   
		return false;
	}

	return true;
  }

/* -------------------------------------------------------------------------- */
/*      TOMA EL VALOR DEL ID DE LOS PRODUCTOS PARA MANDARLO POR AJAX Y ELIMINAR PRODUCTO LISTA DESEOS*/
/* -------------------------------------------------------------------------- */

$(".takeIdProduct").click(function(){

	// Al pulsar el boton para el modal del rating, este captura el valor del id de la table rate
	var id = $(this).attr("idProd");

	// Asigno el valor al input oculto del modal para eliminar producto pasando por Post el valor
	$("#idModalWish").val(id);	
	
})

/* -------------------------------------------------------------------------- */
/*                AL PULSAR BOTON DE AGREGAR A LISTA DE DESEOS                */
/* -------------------------------------------------------------------------- */

$("#addWishes").click(function(){

   
	var idProduct =	$("#addWishes").attr("idProd")
	var idUser =	$("#addWishes").attr("idUser")
    var dates = new FormData();    

	dates.append("idProduct", idProduct);
	dates.append("idUser", idUser);
  
	$.ajax({

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/ajaxproducts.php",
		method:"POST",
		data: dates,
		cache: false,
		contentType: false,
		processData:false,
		success: function(res){
        // console.log("Result:",res);
        }

	});
	location.reload()	 
		
})


