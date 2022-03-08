

<!-- /* -------------------------------------------------------------------------- */
/*              PLANTILLA QUE RECOJE TODOS LOS HTML DEL PROYECTO              */
/* -------------------------------------------------------------------------- */ -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>ECOMMERCE PHP</title>
    
    <!-- Cambio dinamico del icono de la pestaña superior -->

    <?php 
    $iconDinamic = TemplateController::controllerStyleTemplate();

    echo ' <link rel="icon" href="'.$iconDinamic['icon'].'">';


    /* -------------------- RUTA FIJA URL PARA CONSERVAR ESTILOS Y FUNCIONALIDAD JS------------------- */  

     //Llamo al modelo, al archivo static_rute.php para conseguir la ruta fija que sera el inicio de la ruta de nuestro proyecto
    //  http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/

     $ruteStatc=StaticRute::rute();        

   
    ?>


   <!-- Agregamos la variable $ruteStatc a todos los links y scripts del documento-->
    
    <!-- Estilos de css -->
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/general.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/header.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/slider.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/productos.css">
    
    <!-- Vinculamos las librerias de bootstrap y jquery -->
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/plugins/font-awesome.min.css">
    <script src="<?php echo $ruteStatc;?>views/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $ruteStatc;?>views/js/plugins/bootstrap.min.js"></script>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php 
    
     /* -------------------------------------------------------------------------- */
     /*                           VISTAS DE LA PLANTILLA                           */
     /* -------------------------------------------------------------------------- */

    include "modules/header.php";    

    /* -------------------------------------------------------------------------- */
    /*              MANEJO DE CATEGORIAS Y SUBCATEGORIAS CON LAS URLS             */
    /* -------------------------------------------------------------------------- */

     //Todos los productos que se vayan agregando a partir de la URL FIJA ( http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/),
    // no crearan ningun conflicto con las hojas de estilo CSS ni con JS. Lo siguiente es transformar la nueva url en un array para
    // poder manipular esos datos.
    //Un ejemplo de como funciona seria: 
    //RUTA FIJA--> http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ RUTA VARIABLE($_GET["rute"])-->ropa-hombre/camiseta/...
    //con el metodo explode(), podemos conseguir que que la url varible quede asi-->[ropa-hombre,camiseta,...];

    $ruteArray = array();

//htaccess manda al index un dato get y comprobamos que existe, si no existe se muestra el Slider con un else mas abajo
if(isset($_GET["rute"])){

    //La función explode de php se encarga de dividir o separar una cadena en función de un delimitador($_GET["RUTE"])
    //es decir, divide la cadena en partes (creando un array, separando cada posicion por la / barra) justo donde se 
    // produce el carácter delimitador.
    $ruteArray= explode("/", $_GET["rute"]);
    
    //primer valor despues de la url fija
    $valueURL = $ruteArray[0];     
    //Columna de la BD de los productos
    $ruteProduct = "rute";    
     
    /* ------------------------------- CATEGORIAS ------------------------------- */

    //Llamo a la funcion del controlador para verificar que existe la categoria en la BD
    $existProductCategory = ProductsController::controllerCategoriesExisting($ruteProduct,$valueURL);
    $existProductSubCategories = ProductsController::controllerSubCategoriesExisting($ruteProduct,$valueURL);
    
    //Varible con valor nulo que cambia en funcion del valor devuelto de la BD
    $ruteOkay = null;    
    
    //Pregunto si el resultado devuelto de la BD es un array y si el valor ruta es igual al valor de la url
    if(is_array($existProductCategory) && $existProductCategory["rute"]==$valueURL){
        
        $ruteOkay=$value; //Si el valor coincide, la variable deja de ser null
    } 
    /* ------------------------------ SUBCATEGORIAS ----------------------------- */
    //Llamo a la funcion del controlador para verificar que existe la categoria en la BD
    $existProductSubCategories = ProductsController::controllerSubCategoriesExisting($ruteProduct,$valueURL);

// var_dump($existProductSubCategories["rute"]) A diferencia de las categorias, con las subcat no lo puedo usar porque lanza error
// debido a que la BD devuelve varios registros al usar fetchAll();

//Por ello tenemos que recorrer el array con FOR EACH

foreach($existProductSubCategories as $key => $val){
    
    if(is_array($existProductSubCategories) && $val["rute"]==$valueURL){
        
        $ruteOkay=$ruteArray[0]; //Si el valor coincide, la variable deja de ser null
    } 
}

/* -------------------------------------------------------------------------- */
/*          REDIRECCION A LOS ARCHIVOS DE PRODUCTOS SI EXISTEN O NO EXISTEN         */
/* -------------------------------------------------------------------------- */
    
    //Si la varible $ruteOkay, definida arriba, es diferente a null significa que se encontro la categoria en la BD     
    if($ruteOkay !=null){

        include "modules/existing_products.php";
    }

    else {
    include "modules/error_noProduct.php";
 
    }    
} 
//SI NO EXISTE $_GET["rute"], hacemos que se muestre el slider en nuestra pagina principal
else{
   include "modules/slider.php";
   include "modules/destacados.html.php";

}
    ?>
<script src="<?php echo $ruteStatc;?>views/js/header.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/template.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/slider.js"></script>
<!-- /* -------------------------------------------------------------------------- */
/*                                ATRIBUCIONES                                */
/* -------------------------------------------------------------------------- */ -->
<!-- clipart humano PNG diseñado por hublot90 de  <a href="https://es.pngtree.com">Pngtree.com</a> -->
<!-- <a href='https://www.freepik.es/psd/logo'>Psd de Logo creado por freepik - www.freepik.es</a> -->
<!-- <a href='https://www.freepik.es/vectores/fondo'>Vector de Fondo creado por starline - www.freepik.es</a> -->
<!-- <a href='https://www.freepik.es/vectores/fondo'>Vector de Fondo creado por starline - www.freepik.es</a> -->
<!-- <a href='https://www.freepik.es/fotos/fondo'>Foto de Fondo creado por freepik - www.freepik.es</a> -->
</body>
</html>