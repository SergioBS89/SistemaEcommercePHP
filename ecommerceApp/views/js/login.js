/* -------------------------------------------------------------------------- */
/*                         MOSTRAR U OCULTAR PASSWORD                         */
/* -------------------------------------------------------------------------- */

// Cambia el tipo del input password a texto
function showPassword() {
    $("#passIN").attr('type', 'text');
   
}
// Cambia el tipo a password
function hidePassword() {
 
    $("#passIN").attr('type', 'password'); 
   
}

var passShowNumber = 0;

$("#eye").click(function (e) { 

    if (passShowNumber == 0) {
        passShowNumber = 1;
        showPassword();

    } else {
        passShowNumber = 0;
        hidePassword();
    }
   
});



