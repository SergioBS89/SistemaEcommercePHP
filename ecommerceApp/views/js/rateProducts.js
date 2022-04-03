
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

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/ajaxNumViews.php",
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
/*                TOMA EL ID DE LA VALORACION EN LA BASE DE DATOS PARA EL MODAL DE VALORACION DEL PERFIL                */
/* -------------------------------------------------------------------------- */

$(".takeId").click(function(){

	// Al pulsar el boton para el modal del rating, este captura el valor del id de la table rate
	var id = $(this).attr("idComm");
	
	// Asigno el valor al input oculto del modal para crear valoracion
	$("#idModalCreate").val(id);
	// Asigno el valor al input oculto del modal para modificar valoracion
	$("#idModalComm").val(id);
	
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

			$("#newComment").parent().before('<div style="margin-left:50px" class="alert alert-warning">No special characters are allowed to Username field</div>')

			return false;
		}
	}else{
		$("#newComment").parent().before('<div style="margin-left:50px" class="alert alert-warning">Text area is required, please write a comment</div>')
	   
		return false;
	}

	return true;
  }

  