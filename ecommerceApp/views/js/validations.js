/* -------------------------------------------------------------------------- */
/*            FUNCION QUE TOMA EL VALOR DE LA URL AL INICIAR SESION           */
/* -------------------------------------------------------------------------- */

var rute = location.href;

$(".logIn").click(function(){

	localStorage.setItem("ruteJS", rute);

})
/* -------------------------------------------------------------------------- */
/*                               EMAIL REPETIDO                               */
/* -------------------------------------------------------------------------- */

var emailRepeat = false;

$("#emailUP").change(function(){

	var email = $("#emailUP").val();

	var dates = new FormData();
	dates.append("emailRep", email);


	// envio de datos al lado servidor
	$.ajax({

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/validations.php",
		method: "POST",
		data: dates,
		cache: false,
		contentType: false,
		processData: false,
		success:function(res){
			console.log("respuesta",res);
			
			// Si la consulta devuelve un valor mayor a 20 caracteres(existe un usuario)
			if(res.length<20){

				$(".alert").remove();
				emailRepeat = false;

			}else{				

				$("#emailUP").parent().before('<div class="alert alert-warning"><strong>This email account already exist</strong></div>')

					emailRepeat = true;
			}

		}

	})

})

/* -------------------------------------------------------------------------- */
/*                            REGISTRO DE USUARIOS                            */
/* -------------------------------------------------------------------------- */

function signUp() { 

    /* ---------------------- VALIDACION DE NOMBRE USUARIO ---------------------- */
    var name = $("#nameUP").val();

	if(name != ""){

		var exReg = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
		if(!exReg.test(name)){

			$("#nameUP").parent().before('<div class="alert alert-warning">No numbers or special characters are allowed to Username field</div>')

			return false;

		}

	}else{

		$("#nameUP").parent().before('<div class="alert alert-warning"><strong>Name field is required<strong></div>')

		return false;
	}
  /* --------------------------- VALIDACION DE EMAIL -------------------------- */

	var email = $("#emailUP").val();

	if(email != ""){

		var exReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!exReg.test(email)){

			$("#emailUP").parent().before('<div class="alert alert-warning"><strong>Please, write a correct email</strong></div>')

			return false;

		}

		if(emailRepeat){

			$("#emailUP").parent().before('<div class="alert alert-warning"><strong>This email account already exist</strong></div>')

			return false;

		}

	}else{

		$("#emailUP").parent().before('<div class="alert alert-warning"><strong>Email field is required</strong></div>')

		return false;
	}

	/* ------------------------- VALIDACION DE PASSWORD ------------------------- */
	var pass = $("#passUP").val();
	var repeatPass=$("#repeatPass").val();

	if(pass != ""){

		var expReg = /^[a-zA-Z0-9]*$/;

		if(!expReg.test(pass)){

			$("#passUP").parent().before('<div class="alert alert-warning"><strong>No special characters are allowed to password field </strong></div>')

			return false;

		}
	else if( repeatPass != pass){
		$("#passUP").parent().before('<div class="alert alert-warning"><strong>Passwords are different</strong></div>')

			return false;
			
	}

	}else{

		$("#passUP").parent().before('<div class="alert alert-warning"><strong>Password field is required</strong></div>')

		return false;
	}
 }

/* -------------------------------------------------------------------------- */
/*                         LIMPIAR MENSAJES DE ALERTA                         */
/* -------------------------------------------------------------------------- */
$("input").focus(function(){

	$(".alert").remove();
})
/* -------------------------------------------------------------------------- */
/*                         LIMPIAR MENSAJES DE ALERTA                         */
/* -------------------------------------------------------------------------- */
$("textarea").focus(function(){

	$(".alert").remove();
})



