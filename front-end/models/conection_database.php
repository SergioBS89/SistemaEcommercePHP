<?php 

/* -------------------------------------------------------------------------- */
/*                           CONEXION CREANDO OBJETO                          */
/* -------------------------------------------------------------------------- */
class Conection{

    static public function conectDB(){

        $link = new PDO("mysql:host=localhost;dbname=sistema_ecommerce",
        "root",
         "",
         //Array para poder usar todos los caracteres especiales del español (ñ - tildes...)
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        return $link;

    }
}
?>