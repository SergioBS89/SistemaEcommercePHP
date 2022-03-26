

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