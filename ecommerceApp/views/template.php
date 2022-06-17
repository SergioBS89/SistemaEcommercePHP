

<!-- /* -------------------------------------------------------------------------- */
/*              PLANTILLA QUE RECOJE TODOS LOS HTML DEL PROYECTO              */
/* -------------------------------------------------------------------------- */ -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>SBS FITNESS STORE</title>
    

    <?php 
    // Inicio de sesion para poder usar variables session en todo el proyecto
    session_start();

    
    // Cambio dinamico del logo de la pestaña superior 

    $iconDinamic = TemplateController::controllerStyleTemplate();

    echo ' <link rel="icon" href="'.$iconDinamic['icon'].'">';


    /* -------------------- RUTA FIJA URL PARA CONSERVAR ESTILOS Y FUNCIONALIDAD JS------------------- */  

     //Llamo al modelo, al archivo static_rute.php para conseguir la ruta fija que sera el inicio de la ruta de nuestro proyecto
    //  http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/

     $ruteStatc=StaticRute::rute();        

   
    ?>


   <!-- Agregamos la variable $ruteStatc a todos los links y scripts del documento para no tener conflicto con las rutas-->
    
    <!-- Estilos de css -->
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/general.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/header.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/slider.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/products.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/productDescription.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/comments.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/profile.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/shoppingCart.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/footer.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/administrator.css">
   
    <!-- IMPORTANTE CARGAR EL RESPONSIVE COMO ULTIMO ARCHIVO  -->
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/responsive.css">
    
    <!-- Vinculamos las librerias de bootstrap,jquery,font awesome -->
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/plugins/font-awesome.min.css">
    <!-- <script src="https://kit.fontawesome.com/46bd5c4726.js" crossorigin="anonymous"></script> -->    
    <script src="<?php echo $ruteStatc;?>views/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $ruteStatc;?>views/js/plugins/bootstrap.min.js"></script>


    <!-- /* -------------------------------------------------------------------------- */
    /*                                  ALERTIFY                                  */
    /* -------------------------------------------------------------------------- */ -->
  
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>


   

    
  
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Merienda+One&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>



    
    <?php 
    
     /* -------------------------------------------------------------------------- */
     /*                           VISTAS DE LA PLANTILLA                           */
     /* -------------------------------------------------------------------------- */

    include "modules/header.php";    

/* -------------------------------------------------------------------------- */
    /*                           VISTA DEL ADMINISTRADOR                          */
    /* -------------------------------------------------------------------------- */

    if(isset($_SESSION["userId"])){

    $userIdInSession = $_SESSION["userId"];
    $userAdmin=0;
    $userAdmin = UsersController::checkAdmin($userIdInSession);

    if($userAdmin["admin"] == 1){

        echo '      
        <a href="'.$StaticUrl.'administrator">  
            <button id="access-admin" class="btn btn-default firstColors btnAdmin">
            Access to administrator
            </button>
        </a>
         <br>
         <br>
        ';
    }
    }
    
  
    /* -------------------------------------------------------------------------- */
    /*              MANEJO DE LAS RUTAS AMIGABLES PARA LAS CATEGORIAS Y SUBCATEGORIAS           */
    /* -------------------------------------------------------------------------- */

    /*Todos los productos que se vayan agregando a partir de la URL FIJA ( http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/),
    no crearan ningun conflicto con las hojas de estilo CSS ni con JS. Lo siguiente es transformar la nueva url en un array para
    poder manipular esos datos.
    Un ejemplo de como funciona seria: 
    RUTA FIJA--> http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ RUTA VARIABLE($_GET["rute"])-->ropa-hombre/camiseta/...
    con el metodo explode(), podemos conseguir que que la url varible quede asi-->[ropa-hombre,camiseta,...];*/
    
    /* -------------------------------------------------------------------------- */
    /*                 VARIBLE SUPER IMPORTANTE PARA LAS RUTAS URL                */
    /* -------------------------------------------------------------------------- */
    $ruteArray = array();
   
    //htaccess manda al index un dato get y comprobamos que existe, si no existe se muestra el Slider con un else mas abajo
    if(isset($_GET["rute"])){

    /*La función explode de php se encarga de dividir o separar una cadena en función de un delimitador($_GET["RUTE"])
    es decir, divide la cadena en partes (creando un array, separando cada posicion por la / barra) justo donde se 
    produce el carácter delimitador.*/
    $ruteArray= explode("/", $_GET["rute"]);
    
    //primer valor despues de la url fija
    $valueURL = $ruteArray[0];    

    //Columna de la BD de los productos
    $ruteProduct = "rute";    

    //VARIABLE NULL QUE CAMBIARA EN FUNCION DE SI EXISTE O NO UN PRODUCTO O CATEGORIA
    $ruteCatOkay = null;    
    $ruteProductOkay =null;
     
    /* ------------------------------- CATEGORIAS ------------------------------- */

    //Llamo a la funcion del controlador para verificar que existen las categorias en la BD
    $existProductCategory = ProductsController::controllerCategoriesExisting($ruteProduct,$valueURL);
   
    
    //Pregunto si el resultado devuelto de la BD es un array y si el valor ruta es igual al valor de la url
    if(is_array($existProductCategory) && $existProductCategory["rute"]==$valueURL){
        
        $ruteCatOkay=$value; //Si el valor coincide, la variable deja de ser null
    } 
    /* ------------------------------ SUBCATEGORIAS ----------------------------- */
    
    //Llamo a la funcion del controlador para verificar que existe la categoria en la BD
    $existProductSubCategories = ProductsController::controllerSubCategoriesExisting($ruteProduct,$valueURL);

    /*var_dump($existProductSubCategories["rute"]) A diferencia de las categorias, con las subcat no lo puedo usar porque lanza error
    debido a que la BD devuelve varios registros al usar fetchAll();
    
    Por ello tenemos que recorrer el array con FOR EACH */

   foreach($existProductSubCategories as $key => $val){
    
    if(is_array($existProductSubCategories) && $val["rute"]==$valueURL){
        
        $ruteCatOkay=$ruteArray[0]; //Si el valor coincide, la variable deja de ser null
    } 
}

    /* -------------------------------------------------------------------------- */
    /*              MANEJO DE LAS RUTAS DE LOS PRODUCTOS           */
    /* -------------------------------------------------------------------------- */
    //Llamo a la funcion del controlador para verificar que existe la ruta del producto en la BD
    $existProduct =ProductsController::showProductDescription($ruteProduct,$valueURL);

    if(is_array($existProduct) && $existProduct["rute"]==$valueURL){
        
        $ruteProductOkay=$value; //Si el valor coincide, la variable deja de ser null
    } 



/* -------------------------------------------------------------------------- */
/*          REDIRECCION A LOS ARCHIVOS DE PRODUCTOS SI EXISTEN O NO EXISTEN         */
/* -------------------------------------------------------------------------- */
    
    //Si $ruteOkay, definida arriba, ES DIFERENTE A NULL significa que se encontro la ruta el registro de la ruta
    //Ademas, al pulsar en los botones de SEE MORE mando a la pagina de lista productos   
    if($ruteCatOkay !=null || $valueURL == "onOffer" || $valueURL == "topsales" || $valueURL =="mostViewed"){

        include "modules/listProducts.php";      
    }  
    elseif($ruteProductOkay != null){
        include "modules/productDescription.php";
    }
    // elseif($ruteArray[0]=="newProducts"){
    //     include "modules/descriptionNewproducts.php";
    // }
    elseif($ruteArray[0]=="SearcH"){
        include "modules/searchProducts.php";      
    }
    elseif($ruteArray[0]=="shoppingCart"){
        include "modules/shoppingCart.php";        
    }
    elseif($valueURL == "exit" ){
        include "modules/exit.php";
    }
    elseif($valueURL == "profile" ){
        include "modules/profile.php";
    }
    elseif($valueURL == "rate"){
        include "modules/ratingProduct.php";
    }    
    elseif($valueURL == "administrator"){
        include "modules/administrator.php";
    }
    elseif($valueURL == "admproducts"){
        include "modules/admin_products.php";
    }
    elseif($valueURL == "admusers"){
        include "modules/admin_users.php";
    }
    elseif($ruteArray[0]=="newProduct"){
        include "modules/newProduct.php";      
    }
    else {
    include "modules/error_noProduct.php"; 
    }    
} 
//SI NO EXISTE $_GET["rute"], hacemos que se muestre el slider, los productos en nuestra pagina principal
else{
   include "modules/slider.php";
   include "modules/products.php";
   include "modules/footer.php";
}
    ?>
<!-- Ruta estitica para manejarla desde JS -->
<input type="hidden" value="<?php echo $ruteStatc;?>" id="ruteStatic">


<script src="<?php echo $ruteStatc;?>views/js/header.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/template.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/slider.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/pagination.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/search.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/imgZoom.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/rateProducts.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/login.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/validations.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/shoppingCart.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/administrator.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/changePicture.js"></script>

</body>
</html>