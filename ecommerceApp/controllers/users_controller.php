
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
                "picture" => "",
                "whises" => ""
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

    public static function valSignIn(){

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

                // CREO LAS VARIABLES DE SESIONES 
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

    public static function showOrder($row,$valueRow){

        $table="orders";
        $res=UsersModel::showOrderModel($table,$row,$valueRow);
        return $res;
    }

    /* -------------------------------------------------------------------------- */
    /*             METODO PARA MOSTRAR LAS CALIFICACIONES DE PRODUCTOS            */
    /* -------------------------------------------------------------------------- */
    
    public static function showRates($idProduct,$idUser){
        $table="rating";

        $res=UsersModel::showRatesModel($table,$idProduct,$idUser);
        return $res;
    }

    /* -------------------------------------------------------------------------- */
    /*                  METODO PARA MOSTRAR EL NOMBRE DEL USUARIO                 */
    /* -------------------------------------------------------------------------- */
    public static function showName($id){
        $table="user";

        $res=UsersModel::showNameModel($table,$id);
        return $res;
    }

}

?>