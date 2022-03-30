
<?php 

//Requerimos una vez la pagina con la funcion conection()
require_once "conection_database.php";

class UsersModel{

    /* -------------------------------------------------------------------------- */
    /*                     METODO PARA REGISTRAR A UN USUARIO                     */
    /* -------------------------------------------------------------------------- */
    public static function signUpUsersModel($table,$dates){

        $stmt=Conection::conectDB()->prepare("INSERT INTO $table(username,email,password,picture,whises)
        VALUES( :username, :email, :password, :picture, :whises)");
        $stmt -> bindParam(":username",$dates["username"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $dates["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $dates["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":picture", $dates["picture"], PDO::PARAM_STR);
		$stmt -> bindParam(":whises", $dates["whises"], PDO::PARAM_STR);
         
        if($stmt->execute()){
            return "okay";
        }else{
            return "error";
        }
        
      
        $stmt = null;
    }
    /* -------------------------------------------------------------------------- */
    /*                       METODO PARA VALIDAR EL INICIO DE SESION                      */
    /* -------------------------------------------------------------------------- */

    public static function valSignInModel($table,$dates,$dat){

        $stmt =Conection::conectDB()->prepare("SELECT * FROM $table WHERE username = :username AND password = :pass ");
        $stmt ->bindParam(":username",$dates,PDO::PARAM_STR);
        $stmt ->bindParam(":pass",$dat, PDO::PARAM_STR);

        $stmt -> execute();

		return $stmt -> fetch();
        
		$stmt = null;
    }


    
    /* -------------------------------------------------------------------------- */
    /*                    METODO PARA VERIFICAR EMAIL REPETIDO USUARIO EN LINEA                    */
    /* -------------------------------------------------------------------------- */
    public static function checkEmailModel($table,$value){

        $stmt=Conection::conectDB()->prepare("SELECT * FROM $table WHERE email = :value");
        $stmt -> bindParam(":value", $value, PDO::PARAM_STR);
    
		$stmt -> execute();

		return $stmt -> fetch();
        
		$stmt = null;
    }

     /* -------------------------------------------------------------------------- */
    /*                    METODO PARA MOSTRAR LAS COMPRAS DEL USUARIO                   */
    /* -------------------------------------------------------------------------- */
    public static function showOrderModel($table,$row,$valueRow){

        $stmt=Conection::conectDB()->prepare("SELECT * FROM $table WHERE $row = :value ");
        $stmt -> bindParam(":value", $valueRow, PDO::PARAM_STR);
    
		$stmt -> execute();

		return $stmt -> fetchAll();
        
		$stmt = null;
    }

       /* -------------------------------------------------------------------------- */
    /*                    METODO PARA MOSTRAR LAS CALIFICACIONES DE LOS PRODUCTOS                  */
    /* -------------------------------------------------------------------------- */
    public static function showRatesModel($table,$idProduct,$idUser){

        if($idUser == null){

        $stmt=Conection::conectDB()->prepare("SELECT * FROM $table WHERE id_product = :value");
        $stmt -> bindParam(":value", $idProduct, PDO::PARAM_STR);
        
    
		$stmt -> execute();

		return $stmt -> fetchAll();
        
		$stmt = null;

    }else{
        $stmt=Conection::conectDB()->prepare("SELECT * FROM $table WHERE id_product = :value AND id_user = :value2 ");
        $stmt -> bindParam(":value", $idProduct, PDO::PARAM_STR);
        $stmt -> bindParam(":value2",$idUser, PDO::PARAM_STR);
    
		$stmt -> execute();

		return $stmt -> fetchAll();
        
		$stmt = null;
    }
    }
    /* -------------------------------------------------------------------------- */
    /*                         METODO PARA MOSTRAR NOMBRE                         */
    /* -------------------------------------------------------------------------- */

    public static function showNameModel($table,$id){

        $stmt=Conection::conectDB()->prepare("SELECT username FROM $table WHERE id = :value ");
        $stmt -> bindParam(":value", $id, PDO::PARAM_STR);
    
		$stmt -> execute();

		return $stmt -> fetch();
        
		$stmt = null;
    }
}
?>