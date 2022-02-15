

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

    echo ' <link rel="icon" href="'.$iconDinamic['icon'].'">'
    ?>
   
    
    <!-- Estilos de css -->
    <link rel="stylesheet" href="views/css/template.css">
    <link rel="stylesheet" href="views/css/header.css">
    
    <!-- Vinculamos las librerias de bootstrap y jquery -->
    <link rel="stylesheet" href="views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/plugins/font-awesome.min.css">
    <script src="views/js/plugins/jquery.min.js"></script>
    <script src="views/js/plugins/bootstrap.min.js"></script>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php 
    //Llamamos a las vistas en la carpeta modulos

    include "modules/header.php";
    
    ?>
<script src="views/js/header.js"></script>
<script src="views/js/template.js"></script>
    
</body>
</html>