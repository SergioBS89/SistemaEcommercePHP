
/* -------------------------------------------------------------------------- */
/*                                 PAGINACION                                 */
/* -------------------------------------------------------------------------- */

/* -------------- AGREGANDO LA CLASE ACTIVE PARA LA PAGINACION -------------- */

var pagUrl = window.location.href; //Creamos un array tomando la url 

var index = pagUrl.split("/"); // Separamos cada posicion del array con una barra 

    //agregamos la clase activa al <a> con el numero de la pagina actual
    $("#numPag"+index.pop()).addClass("pagActive");



