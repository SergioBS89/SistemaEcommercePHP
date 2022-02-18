

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

    //Posteriormente, todos los productos que se vayan agregando a partir de la URL FIJA, no crearan ningun conflicto con las hojas de 
    //estilo CSS ni con JS. Lo siguiente es transformar la nueva url en un array para poder manipular esos datos
    //Un ejemplo de como funciona seria: 
    //RUTA FIJA--> http://localhost/PROYECTOS/SistemaEcommercePHP/ecommerceApp/ RUTA VARIABLE($_GET["rute"])-->ropa-hombre/camiseta/ofertas
    //con el metodo explode(), podemos conseguir que que la url varible quede asi-->[ropa-hombre,camiseta,ofertas];

    $ruteArray = array();
    if(isset($_GET["rute"])){

    //La función explode de php se encarga de dividir o separar una cadena en función de un delimitador($_GET["RUTE"])
    //es decir, divide la cadena en partes (creando un array) justo donde se 
    // produce el carácter delimitador.
    $ruteArray= explode("/", $_GET["rute"]);
    }    
    ?>


   <!-- Agregamos la variable $ruteStatc a todos los links y scripts del documento-->
    
    <!-- Estilos de css -->
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/template.css">
    <link rel="stylesheet" href="<?php echo $ruteStatc;?>views/css/header.css">
    
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
    //Llamamos a las vistas en la carpeta modulos

    include "modules/header.php";    
    // var_dump($ruteArray);
    ?>
<script src="<?php echo $ruteStatc;?>views/js/header.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/template.js"></script>
    
</body>
</html>