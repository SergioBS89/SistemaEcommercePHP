

/* -------------------------------------------------------------------------- */
/*                          ELIMINAR BOTON DE ACCESO                          */
/* -------------------------------------------------------------------------- */

 // Url actual
 var url = location.pathname;
 //Separamos para crear un array
 var ruteOk = url.split("/");

if(ruteOk.pop()=='administrator'){

    $("#access-admin").remove();
}


/* -------------------------------------------------------------------------- */
/*                          TOMAR ID DE LOS PRODUCTOS  A MODIFICAR                       */
/* -------------------------------------------------------------------------- */

$(".idAdmin").click(function(){

var idproduct = $(this).attr('idProd');
$("#modalProdAdmin").val(idproduct);

})

/* -------------------------------------------------------------------------- */
/*                AL PULSAR MODIFICAR PRODUCTO ENVIO AJAX PARA VER LA INFORMACIÓN DEL PRODUCTO        */
/* -------------------------------------------------------------------------- */

$(".idAdmin").click(function(){
   
	var idProdu = $("#modalProdAdmin").val();
    var dates = new FormData();    

	dates.append("idProduct", idProdu);  
	$.ajax({

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/ajaxAdministrator.php",
		method:"POST",
		data: dates,
		cache: false,
		contentType: false,
		processData:false,
		success: function(res){
          
          var name =  JSON.parse(res).name;
          var cat =  JSON.parse(res).id_category;
          var sub =  JSON.parse(res).id_subCat;
          var des =  JSON.parse(res).description;
          var rute =  JSON.parse(res).rute;
          var price =  JSON.parse(res).price;
          var disc =  JSON.parse(res).discount;
          var priceOnOffer =  JSON.parse(res).priceOnOffer;
          var image =  JSON.parse(res).image;
          var weigth =  JSON.parse(res).weight;
          var delivery =  JSON.parse(res).deliver;

        $("#sendName").attr('value',name);        
        $("#sendCat").html(cat)       
        $("#sendSub").html(sub)     
        $("#sendDesc").html(des)
        $("#sendRute").attr('value',rute);
        $("#sendPrice").attr('value',price);
        $("#sendDisc").attr('value',disc);
        $("#sendPriceOnOffer").attr('value',priceOnOffer);
        $("#sendImage").attr('value',image);
        $("#sendWeigth").attr('value',weigth + 'Kg');
        $("#sendDelivery").attr('value',delivery);       
       
        }

	});
})

/* -------------------------------------------------------------------------- */
/*                          TOMAR ID DE LOS PRODUCTOS A ELIMINAR                    */
/* -------------------------------------------------------------------------- */

$(".idAdminRmv").click(function(){
    var idproduct = $(this).attr('idProd');
    $("#modalProdAdminRmv").val(idproduct);
    })
    
/* -------------------------------------------------------------------------- */
/*                AL PULSAR ELIMINAR PRODUCTO ENVIO AJAX PARA VER EL NOMBRE DEL PRODUCTO     */
/* -------------------------------------------------------------------------- */

$(".idAdminRmv").click(function(){
   
	var idProdu = $("#modalProdAdminRmv").val();
    var dates = new FormData();    

	dates.append("idProduct", idProdu);  
	$.ajax({

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/ajaxAdministrator.php",
		method:"POST",
		data: dates,
		cache: false,
		contentType: false,
		processData:false,
		success: function(res){
          
          var name =  JSON.parse(res).name;
        $("#ssendName").attr('value',name);        
        }

	});
})

