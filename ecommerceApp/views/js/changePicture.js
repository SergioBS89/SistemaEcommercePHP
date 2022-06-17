
$('.picProf').click(function (e) { 
    // Reinicio los valores del background
    $('.picProf').css('background-color','initial')
    // Agrego el color al seleccionado
    $(this).css('background-color','blue')
    
    var src = $(this).attr('src')
    $('#btnPicture').attr('sendSRC',src)
});