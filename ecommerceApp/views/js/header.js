
/* -------------------------------------------------------------------------- */
/*                             BOTON DE CATEGORIAS                      */
/* -------------------------------------------------------------------------- */

// Funcion para desplegable de categorias

$('#btnCategories').click(function (e) { 
    
    // Si la pantalla tiene un ancho menor a 768px se despliega debajo del bloque categorias
    if(window.matchMedia("(max-width:767px)").matches){

		$('#btnCategories').after($("#categories").slideToggle("fast"))
     
         // Si la pantalla tiene un ancho mayor a 768px se despliega debajo del header
	}else{

		$("#header").after($("#categories").slideToggle("fast"))
		
	}
});