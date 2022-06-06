<!-- 
/* -------------------------------------------------------------------------- */
/*                          COMPROBACION DE USUARIO                           */
/* -------------------------------------------------------------------------- */  -->

<?php
$StaticUrlAdmin = StaticRute::RuteAdministrator();
$staticRute = StaticRute::rute();

if (!isset($_SESSION["session"])) {

    echo '
    
    <script>
    window.location="' . $staticRute . '";
    </script>';

    exit();
}
?>




<!-- CODIGO HTML -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">


</head>

<body>
    <br>
    <br>

    <div class="container ">
        <div class="container-fluid">
            <div class="row colorAdmin">
                <div class="header-name titleSectionProducts barProducts col-xs-12">
                    <h1>SECTION ADMINISTRATOR</h1>
                </div>
                <div class="col-xs-6 contBtnAdm">
                    <a href="<?php echo $staticRute?>admproducts/name/1">
                        <button class="btn btn-default firstColors">Products</button>
                    </a>
                </div>
                <div class="col-xs-6 contBtnAdm">
                    <a href="<?php echo $staticRute ?>admusers">
                        <button class="btn btn-default firstColors">Users</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>