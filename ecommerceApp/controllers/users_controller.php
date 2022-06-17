
<?php
class UsersController
{
    /* -------------------------------------------------------------------------- */
    /*                       METODO PARA REGISTRO DE USUARIO                      */
    /* -------------------------------------------------------------------------- */

    public static function signUpUsers()
    {

        if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {

            $enc = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $dates = array(
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "password" => $enc,
                "picture" => ""
            );
            $table = "user";

            $res = UsersModel::signUpUsersModel($table, $dates);
        }
    }


    /* -------------------------------------------------------------------------- */
    /*                   METODO PARA VALIDAR EMAIL             */
    /* -------------------------------------------------------------------------- */


    public static function checkEmail($dates)
    {

        $table = "user";

        $res = UsersModel::checkEmailModel($table, $dates);

        return $res;
    }



    /* -------------------------------------------------------------------------- */
    /*                          METODO PARA INICIO SESION                         */
    /* -------------------------------------------------------------------------- */

    public static function valSignIn()
    {

        if (isset($_POST["user"]) && isset($_POST["pass"])) {

            $table = "user";
            $dates = $_POST["user"];
            $dat = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


            $res = UsersModel::valSignInModel($table, $dates, $dat);
            // echo $res;
            // var_dump($res);      

            if ($res == false) {

                echo "<script>
                    alertify
                    .alert('THIS ACCOUNT DOES NOT EXIST! ','Please, try another account.',
                     function(){
                        $('#myModalIn').modal('show')
                     });
                    </script>";
            } else {
                echo "
                    <script>
                    window.location = localStorage.getItem('ruteJS');       
                           
                    </script>";

                // CREO LAS VARIABLES DE SESIONES DANDOLES LOS VALORES DEVUELTOS DE LA BASE DE DATOS
                $_SESSION["session"] = 1;
                $_SESSION["userId"] = $res["id"];
                $_SESSION["username"] = $res["username"];
                $_SESSION["email"] = $res["email"];
                $_SESSION["password"] = $res["password"];
                $_SESSION["picture"] = $res["picture"];
                $_SESSION["whises"] = $res["whises"];
            }
        }
    }
    /* -------------------------------------------------------------------------- */
    /*             METODO PARA MOSTRAR LA LISTA DE COMPRAS DEL USUARIO EN EL PERFIL          */
    /* -------------------------------------------------------------------------- */

    public static function showOrder($row, $valueRow)
    {

        $table = "orders";
        $res = UsersModel::showOrderModel($table, $row, $valueRow);
        return $res;
    }
     /* -------------------------------------------------------------------------- */
    /*             METODO PARA MOSTRAR LA LISTA DE DESEOS DEL USUARIO EN EL PERFIL          */
    /* -------------------------------------------------------------------------- */

    public static function showWhises($row, $valueRow)
    {

        $table = "wishes";
        $res = UsersModel::showWhisesModel($table, $row, $valueRow);
        return $res;
    }

     /* -------------------------------------------------------------------------- */
    /*                       METODO PARA REGISTRO DE VALORACION                 */
    /* -------------------------------------------------------------------------- */

    public static function newRate()
    {

        if (isset($_POST["produc"]) && isset($_POST["comment"]) && isset($_POST["stars"]) && $_POST["produc"] > 0) {

         
            $dates = array(
                "idRate" => $_POST["produc"],
                "idUser" => $_POST["user"],
                "comment" => $_POST["comment"],
                "stars" => $_POST["stars"]
            );

            $table = "rating";

            $res = UsersModel::newRateModel($table, $dates);

            // return var_dump($dates);

            if ($res == "ok") {

                echo "<script>
                alertify
                .alert('THANK YOU!','Your calification was successfully uploaded',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
           });
                
                </script>";
            }
            else{
                echo "<script>
                alertify
                .alert('ERROR','Something was wrong!',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
           });
                
                </script>";

            }
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                       METODO PARA MODIFICAR DE VALORACION                 */
    /* -------------------------------------------------------------------------- */

    public static function modifRate()
    {

        if (isset($_POST["idComment"]) && $_POST["idComment"] > 0) {

         
            $dates = array(
                "idComment" => $_POST["idComment"],
                "comment" => $_POST["comment"],
                "stars" => $_POST["stars"]
            );

            $table = "rating";

            $res = UsersModel::modifRateModel($table, $dates);

            // return var_dump($dates);

            if ($res == "ok") {

                echo "<script>
                alertify
                .alert('THANK YOU!','Your calification was successfully uploaded',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
           });
                
                </script>";
            }
            else{
                echo "<script>
                alertify
                .alert('ERROR','Something was wrong!',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
           });
                
                </script>";

            }
        }
    }
    
    /* -------------------------------------------------------------------------- */
    /*             METODO PARA MOSTRAR LAS CALIFICACIONES DE PRODUCTOS            */
    /* -------------------------------------------------------------------------- */

    public static function showRates($idProduct, $idUser)
    {

        $table = "rating";
        $res = UsersModel::showRatesModel($table, $idProduct, $idUser);
   
        return $res;
        }

    /* -------------------------------------------------------------------------- */
    /*             METODO PARA AGREGAR A LISTA DE DESEOS         */
    /* -------------------------------------------------------------------------- */

    public static function addProductListWish($dates)
    {   

        $table = "wishes";
        $res = UsersModel::addProductListWishModel($table,$dates);
        // return json_encode($dates);
        return $res;

    }
     /* -------------------------------------------------------------------------- */
    /*             METODO PARA COMPROBAR SI EXISTE UN PRODUCTO EN LA LISTA DE DESEOS         */
    /* -------------------------------------------------------------------------- */

    public static function checkWishList($dates){
    

        $table = "wishes";
        $res = UsersModel::checkWishListModel($table,$dates);
        
        return $res;
    }

     /* -------------------------------------------------------------------------- */
    /*                       METODO ELIMINAR PRODUCTO LISTA DE DESEOS              */
    /* -------------------------------------------------------------------------- */

    public static function removeWish()
    {

        if (isset($_POST["idProdWish"])) {

        // ES NECESARIO INSTANCIAR LA CLASE EN EL HTML PARA EL USO DE VARIABLES DE SESION DESDE EL CONTROLADOR
            $dates = array(
                "idUser" => $_SESSION["userId"],
                "idProd" => $_POST["idProdWish"]               
            );

            $table = "wishes";

            $res = UsersModel::removeWishModel($table,$dates);

            if ($res == "okay") {

                echo "<script>
                alertify
                .alert('OPERATION SUCCESSFUL','The product was removed',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
           });
                
                </script>";
            }
            else{
                echo "<script>
                alertify
                .alert('ERROR REMOVING PRODUCT','Something was wrong!',
                function(isConfirm){
                    if (isConfirm) {	   
                      history.back();
                     } 
           });
                
                </script>";

            }
        }
    }   
    



    /* -------------------------------------------------------------------------- */
    /*                  METODO PARA MOSTRAR EL NOMBRE DEL USUARIO                 */
    /* -------------------------------------------------------------------------- */
    public static function showName($id)
    {
        $table = "user";

        $res = UsersModel::showNameModel($table, $id);
        return $res;
    }


    /* -------------------------------------------------------------------------- */
    /*                          METODO PARA CREAR ORDERS                          */
    /* -------------------------------------------------------------------------- */

    public static function createOrder($dates){
        $table = "orders";
        $res = UsersModel::createOrderModel($table, $dates);
        return $res;    
    }

    /* -------------------------------------------------------------------------- */
    /*                 METODO PARA COMPROBAR USUARIO ADMINISTRADOR                */
    /* -------------------------------------------------------------------------- */

    public static function checkAdmin($id){
        $table ="user";
        $res = UsersModel::checkAdminModel($table, $id);
        return $res;
    }
  


    /* -------------------------------------------------------------------------- */
    /*                METODO PARA CAMBIAR IMAGEN DE PERFIL USUARIO                */
    /* -------------------------------------------------------------------------- */

    public static function changePicture($dates){
        $table ="user";
        $res = UsersModel::changePictureModel($table,$dates);
        return $res;
    }

    /* -------------------------------------------------------------------------- */
    /*                METODO QUE RETORNA LA IMAGEN DE USUARIO             */
    /* -------------------------------------------------------------------------- */

    public static function imgProfile($value){
        $table ="user";
        $res = UsersModel::imgProfileModel($table,$value);
        return $res;
    }

}


?>