
$('.picProf').click(function (e) { 
    // Reinicio los valores del background
    $('.picProf').css('background-color','initial')
    // Agrego el color al seleccionado
    $(this).css('background-color','red')
    
    var src = $(this).attr('src')
    $('#btnPicture').attr('sendSRC',src)
});


// ENVIO DE VALOR SRC IMAGEN A BBDD

$('#btnPicture').click(function(){
    
    var src = $(this).attr('sendSRC')
    var id = $(this).attr('sendID')

    var dates = new FormData();    

	dates.append("srcImg", src );
	dates.append("idUser", id );

    $.ajax({

		url:"http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ajax/changePicture.php",
		method:"POST",
		data: dates,
		cache: false,
		contentType: false,
		processData:false,
		success: function(res){
        
            if(res){

                alertify
                .alert('OPERATION SUCCESSFUL','The image was updated',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
                     
                     
            })}

       }
    })
})

