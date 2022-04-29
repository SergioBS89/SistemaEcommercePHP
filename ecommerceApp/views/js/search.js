
/* -------------------------------------------------------------------------- */
/*                             BUSCADOR DEL HEADER                            */
/* -------------------------------------------------------------------------- */


$("#search a").click(function(){

	if($("#search input").val() == ""){

		$("#search a").attr("href", "");

	}

})


$("#search input").change(function(){

	// Eliminamos los espacios de la cadena en el input
	var searching = $("#search input").val().trim().split(" ").join("");

	var regExpression = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;

	if(!regExpression.test(searching)){

		$("#search input").val("");

	}else{

		var proofSearch = searching.replace(/[áéíóúÁÉÍÓÚ ]/g, "_");

		var rute = $("#search a").attr("href");

		if($("#search input").val() != ""){

			$("#search a").attr("href", rute+"/"+ proofSearch);

		}

	}

})

/*=============================================
BUSCADOR CON ENTER
=============================================*/
$("#search input").focus(function(){

	$(document).keyup(function(event) {

		event.preventDefault();

		if(event.keyCode == 13 && $("#search input").val() != ""){

			var ruteSearch = $("#search a").attr("href");

			window.location.href = ruteSearch;

		}

	})

})