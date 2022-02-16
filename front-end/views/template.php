

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


    /* -------------------- Mantenemos la ruta fija de la url ------------------- */  

    //Llamo al modelo, al archivo static_rute.php para conseguir la ruta fija

    $ruteStatc=StaticRute::rute();    
    ?>


   <!-- Agregamos la variable $ruteStatc a todos los links y scripts del documento sin modificar los estilos ni el js -->
    
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


    //CONVERTIMOS EN ARRAY LA URL, QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO Y AYUDANDONOS DE LA BARRA "/" 
    // PARA SEPARAR LAS POSICIONES DEL ARRAY  EJEMPLO: ropa-hombre/camiseta/oferta50% 
                                                    // [ropa-hombre,camiseta,ofertas50%]

    $ruteArray= array();

    if(isset($_GET["rute"])){

         $ruteArray= explode("/", $_GET["rute"]);
        var_dump($ruteArray);
    }  

    
    ?>
<script src="<?php echo $ruteStatc;?>views/js/header.js"></script>
<script src="<?php echo $ruteStatc;?>views/js/template.js"></script>
    
</body>
</html>