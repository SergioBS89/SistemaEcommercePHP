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


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Articulos</title>
</head>

<body>
    <br>
    <br>
    <table class="table table-bordered table-active" style="text-align: center;">
        <tr>
            <!-- Cada boton envia por url la opcion para el orden de la lista y el numero de pagina -->
            <td class=" firstColors">Image</td>
            <td class=" firstColors"><a href="<?php echo $staticRute ?>admproducts/id/1">Id</a></td>
            <td class=" firstColors">Category</td>
            <td class=" firstColors">Subcategory</td>
            <td class=" firstColors"><a href="<?php echo $staticRute ?>admproducts/name/1">Name</a></td>
            <td class=" firstColors"><a href="<?php echo $staticRute ?>admproducts/price/1">Price</a></td>
            <td class=" firstColors"><a href="<?php echo $staticRute ?>admproducts/priceOnOffer/1">PriceOnOffer</a></td>
            <td class=' firstColors'>Change</td>
            <td class=' firstColors'>Remove</td>
        </tr>

        <?php

        $order = $ruteArray[1];
        $num = 10;
        $numPage = ($ruteArray[2] - 1) * $num;
        $page = $ruteArray[2];

        $productsAdmin = AdminController::showProductAdmin($order, $numPage, $num);

        // Traer nombres categorias

        foreach ($productsAdmin as $key => $value) {

            $idModal = $value["id"];

            echo '
                  
                  <tr>
                  <td class="td-white"><img class="img-responsive imgAdmin" src="' . $value["image"] . '"></img></td>
                  <td class="td-white">' . $value["id"] . '</td>
                  <td class="td-white">' . $value["id_category"] . '</td>
                  <td class="td-white">' . $value["id_subCat"] . '</td>
                  <td class="td-white">' . $value["name"] . '</td>
                  <td class="td-white">' . $value["price"] . '</td>
                  <td class="td-white">' . $value["priceOnOffer"] . '</td>
                  <td class="td-white">
                      <span class="btn btn-warning btn-xs">
                          <a style="color: white;" class="glyphicon glyphicon-pencil idAdmin" idProd= ' . $value["id"] . ' href="#modalAdminProducts" data-toggle="modal"></a>
                      </span>
                  </td>
                  <td class="td-white">
                      <span  class="btn btn-danger btn-xs">			
                          <a style="color: white;" class="glyphicon glyphicon-remove idAdminRmv" idProd= ' . $value["id"] . ' href="#modalAdminRemove" data-toggle="modal"></a>
                      </span>
                  </td>
              </tr>
                  ';
        }

        ?>

    </table>

    <!-- /* -------------------------------------------------------------------------- */
        	/*                                  PAGINADOR                                 */ -->
    <!-- /* -------------------------------------------------------------------------- * -->


    <nav aria-label="Page navigation example" style="text-align: center;">
        <ul class="pagination">
            <!-- Si la pagina es menor o igual a 1 se agrega la propiedad disabled al boton-->
            <li class="page-item  <?php echo $ruteArray[2] <= 1 ? 'disabled' : '' ?> ">
                <!-- obtenemos con get el numero de pagina y de orden con get desde la url (para el boton anterior) -->
                <a class="page-link" href="<?php echo $staticRute . $ruteArray[0] . '/' . $ruteArray[1] . '/' . $page - 1 ?>">Back</a>
            </li>

            <!-- Si la pagina es mayor al total de paginas se agrega la propiedad disabled al boton-->
            <li class="page-item <?php echo $ruteArray[2] >= 100 ? 'disabled' : '' ?>">
                <!-- obtenemos con get el numero de pagina y de orden con get desde la url (para el boton siguiente) -->
                <a class="page-link" href="<?php echo $staticRute . $ruteArray[0] . '/' . $ruteArray[1] . '/' . $page + 1 ?>">Next</a>
            </li>
        </ul>
    </nav>
</body>

</html>



<!-- /* -------------------------------------------------------------------------- */
/*                          VENTANA MODAL ACTUALIZAR PRODUCTO                       */
/* -------------------------------------------------------------------------- */ -->
<div id="modalAdminProducts" class="modal fade modalForm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">UPDATE PRODUCT</h2>
               
                

<!-- // Traer nombres categorias -->


            </div>
            <div class="modal-body modAdminProducts">

                <form method="POST" id="formProductsAdmin">

                    <!-- INPUTS INVISIBLES PARA CONSEGUIR EL ID DEL PRODUCTO -->
                    <input type="hidden" value="" id="modalProdAdmin" name="idProduct">
                    <div class="containerInputs admintext">

                    <!-- /* -------------------------------------------------------------------------- */
                    /*           TRAIGO DINAMICAMENTE DESDE JS LOS CAMPOS DE LOS INPUTS           */
                    /* -------------------------------------------------------------------------- */ -->
                            <!--nombre -->
                            <h5>Name of product:</h5>
                            <input class="formInput" id="sendName" value="" type="text" placeholder="" name="nameProduct" required>
                            <br>
                            
                             <h5>id_Category: <span id="sendCat"></span><span>  Choose the same!</span></h5>                            
                            <select id="sendCat"  name="cat" class="form-control" required>
                                <option value="1">Articles 1-4</option>
                                <option value="2">Wear 5-8</option>
                                <option value="3">Accesories 9-12</option>
                                <option value="4">Supplements 13-16</option>
                                <option value="5">Footwear 17-20</option>
                                <option value="6">Machines 21-24</option>
                            </select>                             
                          
                             <!--subcat-->
                              <h5>Subcategory: <span id="sendSub"></span><span>  Choose the same!</span></h5> 
                            <select name="subcat" class="form-control" required>
                                <option value="1">Discs 1</option>
                                <option value="2">Bars 2</option>
                                <option value="3">Dumbells 3</option>
                                <option value="4">Others articles 4</option>
                                <option value="5">Men's wear 5</option>
                                <option value="6">Women's wear 6</option>
                                <option value="7">Caps 7</option>
                                <option value="8">Special wear 8</option>
                                <option value="9">Mats 9</option>
                                <option value="10">Gloves 10</option>
                                <option value="11">Bags 11</option>
                                <option value="12">Watches 12</option>
                                <option value="13">Protein 13</option>
                                <option value="14">Energizers 14</option>
                                <option value="15">Fat burners 15</option>
                                <option value="16">Recuperators 16</option>
                                <option value="17">Men's footwear 17</option>
                                <option value="18">Women's footwear 18</option>
                                <option value="19">Sandals 19</option>
                                <option value="20">Socks 20</option>
                                <option value="21">Bench 21</option>
                                <option value="22">Abs bench 22</option>
                                <option value="23">Multistation 23</option>
                                <option value="24">Others machines 24</option>
                            </select>    
                             <!--Description-->
                             <h5>Description Product:</h5>
                            <textarea id="sendDesc" value="" required style="width: 100%; padding: 10px;" name="description" rows="4" maxlength="250"></textarea>
                            <br>  
                             <!--ruta -->
                             <h5>Rute url: (Rute to show in the url)</h5>
                            <input id="sendRute" value="" class="formInput" type="text" name="rute" required>
                            <br>
                             <!--offer -->
                             <h5>Offer: </h5>
                             <select name="offer" class="form-control" required>
                                <option value="0">No offer</option>
                                <option value="1">On offer</option>
                            </select>                                
                           <!--price-->
                             <h5>Price:</h5>
                            <input id="sendPrice" class="formInput" type="text" name="price" required >
                            <br>
                            <h5>Disccount:</h5>
                            <input id="sendDisc" class="formInput" type="text" name="disccount" required >
                            <br>
                            <h5>Price on offer:</h5>
                            <input id="sendPriceOnOffer" class="formInput" type="text" name="priceOnOffer" required >
                            <br>
                            <h5>Rute Image: Change just the file name (name.PNG)</h5>
                            <!-- <h6>COPY: http://localhost/PROYECTOS/SistemaEcommercePHP/administrator</h6>
                            <h6>/views/img/products/CATEGORY/Name_picture.PNG</h6> -->
                            <input id="sendImage" class="formInput" type="text" name="image" required>
                            <br>
                            <h5>Weigth:</h5>
                            <input id="sendWeigth" class="formInput" type="text" name="weigth" required>
                            <br>
                            <h5>Days to deliver:</h5>
                            <input id="sendDelivery" class="formInput" type="text" name="deliver" required>
                            <br>
                            <!--    Boton crear cuenta-->
                            <button id="updateProduct" class="logIn pull-left" style="margin-top: 20px;">Update</button>
                        </div>
            </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>
<!-- 
/* -------------------------------------------------------------------------- */
/*                      LLAMADA A LA FUNCION DE ACTUALIZAR                     */
/* -------------------------------------------------------------------------- */ -->
<?php 
$update = new AdminController;
$update -> updateProduct();

?>
<!-- /* -------------------------------------------------------------------------- */
/*                          VENTANA MODAL ELIMINAR PRODUCTO                       */
/* -------------------------------------------------------------------------- */ -->
<div id="modalAdminRemove" class="modal fade modalForm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">REMOVE PRODUCT</h2>               

            </div>
            <div class="modal-body modAdminProducts"  style="height: 300px;">

                <form method="POST" id="formProductsAdmin">

                    <!-- INPUTS INVISIBLES PARA CONSEGUIR EL ID DEL PRODUCTO -->
                    <input type="hidden" value="" id="modalProdAdminRmv" name="idRemove">
                    <div class="containerInputs admintext">
                            <!--nombre -->
                            <h5>Name of product:</h5>
                            <input class="formInput" id="ssendName" value="" type="text" placeholder="" name="nameRemove" required>
                            <br>
                            <h5>Are you sure?</h5>
                            <!--    Boton crear cuenta-->
                            <button id="removeProduct" class="logIn pull-left" style="margin-top: 20px;">Remove</button>
                        </div>
            </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>
<!-- /* -------------------------------------------------------------------------- */
/*                      LLAMADA A LA FUNCION DE ACTUALIZAR                     */
/* -------------------------------------------------------------------------- */  -->
<?php 
$remove = new AdminController;
$remove -> removeProduct();

?>