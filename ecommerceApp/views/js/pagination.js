
/* -------------------------------------------------------------------------- */
/*                                 PAGINACION                                 */
/* -------------------------------------------------------------------------- */

/* -------------- AGREGANDO LA CLASE ACTIVE PARA LA PAGINACION -------------- */

var pagUrl = window.location.href; //Creamos un array tomando la url 

var index = pagUrl.split("/"); // Separamos cada posicion del array con una barra 

console.log(index);

// Para que el paginador funcione cuando estamos ordenando productos o usando el buscador
var actlPage= index[7];

if(index[7]!=null){
    //agregamos la clase activa al <a> con el numero de la pagina actual
    $("#numPag"+ actlPage).addClass("pagActive");
}else{
    $("#numPag"+ index.pop()).addClass("pagActive");
}




