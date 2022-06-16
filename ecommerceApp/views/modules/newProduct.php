<?php
$StaticUrlAdmin = StaticRute::RuteAdministrator();
$staticRute = StaticRute::rute();


//  VALIDACION DE USUARIO 
if (!isset($_SESSION["session"])) {

    echo '    
    <script>
    window.location="' . $staticRute . '";
    </script>';

    exit();
}
?>


<br>
<br>
<br>
<div class="container-fluid">
    <div class="container">

        <!-- <div class="row" > -->

            <div class="col-md-6 col-sm-12 contNewProduct">

                <form method="POST" id="formCreateAdmin">

                    <!-- INPUTS INVISIBLES PARA CONSEGUIR EL ID DEL PRODUCTO -->
                    <!-- <input type="hidden" value="" id="modalProdAdmin" name="idProduct"> -->
                    <div class="containerInputs admintext">
                        <!--nombre -->
                        <h5>Name of product:</h5>
                        <input class="formInput"value="" type="text" placeholder="" name="nProduct" required>
                        <br>

                        <h5>id_Category:</h5>
                        <select name="cat" class="form-control" required>
                            <option value="1">Articles 1-4</option>
                            <option value="2">Wear 5-8</option>
                            <option value="3">Accesories 9-12</option>
                            <option value="4">Supplements 13-16</option>
                            <option value="5">Footwear 17-20</option>
                            <option value="6">Machines 21-24</option>
                        </select>

                        <!--subcat-->
                        <h5>Subcategory: </h5>
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
                        <textarea value="" required style="width: 100%; padding: 10px;" name="description" rows="4" maxlength="250"></textarea>
                        <br>
                        <!--ruta -->
                        <h5>Rute url: (Rute to show in the url)</h5>
                        <input value="" class="formInput" type="text" name="rute" required>
                        <br>
                        <!--offer -->
                        <h5>Offer: </h5>
                        <select name="offer" class="form-control" required>
                            <option value="0">No offer</option>
                            <option value="1">On offer</option>
                        </select>
                        <!--price-->
                        <h5>Price:</h5>
                        <input class="formInput" type="text" name="price" required>
                        <br>
                        <h5>Disccount:</h5>
                        <input class="formInput" type="text" name="disccount" required>
                        <br>
                        <h5>Price on offer:</h5>
                        <input class="formInput" type="text" name="priceOnOffer" required>
                        <br>
                        <h5>Rute Image: </h5>
                        <h6>COPY: http://localhost/PROYECTOS/SistemaEcommercePHP/administrator</h6>
                        <h6>/views/img/products/CATEGORY/----Name_picture.PNG----</h6>
                        <input class="formInput" type="text" name="image" required>
                        <br>
                        <h5>Weigth:</h5>
                        <input id="sendWeigth" class="formInput" type="text" name="weigth" required>
                        <br>
                        <h5>Days to deliver:</h5>
                        <input class="formInput" type="text" name="deliver" required>
                        <br>
                        <!--    Boton crear cuenta-->
                        <button id="updateProduct" class="logIn pull-left" style="margin-top: 20px;">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- LLAMADA A LA FUNCION DE CREAR DATOS PARA ENVIO DE DATOS POST -->

<?php 

$new = new AdminController();
$new->newProduct();
?>