
<?php 


class UsersController{


// METODO PARA REGISTRO DE USUARIO

 public static function signUpUsers(){   

    if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){

        $dates = array(
            "username"=>$_POST["username"],
            "email"=>$_POST["email"],
            "password"=>$_POST["password"],
            "picture"=>"",
            "whises"=>""
        );
        $table="user";
        
       $res= UsersModel::signUpUsersModel($table,$dates);

    }

 }


/* -------------------------------------------------------------------------- */
/*                   METODO PARA MOSTRAR EL USUARIO EN LINEA                  */
/* -------------------------------------------------------------------------- */


public static function checkEmail($dates){

    $table ="user";
   
    $res = UsersModel::checkEmailModel($table,$dates);

    echo json_encode($res);
}



/* -------------------------------------------------------------------------- */
/*                          METODO PARA INICIO SESION                         */
/* -------------------------------------------------------------------------- */

public static function valSignIn(){

    if(isset($_POST["user"]) && isset($_POST["pass"])){

            $table = "user";
            $dates = $_POST["user"];
            $dat = $_POST["pass"];

            $res = UsersModel::valSignInModel($table,$dates,$dat);
            // echo $res;
            // var_dump($res);      

                if($res == false){

                    echo"<script>
                    alertify
                    .alert('THIS ACCOUNT DOES NOT EXIST! ','Please, try another account.',
                     function(){
                        $('#myModalIn').modal('show')
                     });
                    </script>";

                }else{
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
}

?>