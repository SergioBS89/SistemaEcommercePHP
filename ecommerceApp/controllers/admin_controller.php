
<?php
class AdminController
{

    /* -------------------------------------------------------------------------- */
    /*                 METODO PARA COMPROBAR USUARIO ADMINISTRADOR                */
    /* -------------------------------------------------------------------------- */

    public static function checkAdmin($id){
        $table ="user";
        $res = UsersModel::checkAdminModel($table, $id);
        return $res;
    }
  /* -------------------------------------------------------------------------- */
    /*            METODO PARA LISTAR TODOS LOS PRODUCTOS           */
    /* -------------------------------------------------------------------------- */

    public static function showProductAdmin($order,$numPage,$num){

        $table = "products";
    
        $res = AdminModel::showProductsAdminModel($table,$order,$numPage,$num);
    
        return $res;
      }
       /* -------------------------------------------------------------------------- */
    /*            METODO PARA ACTUALIZAR PRODUCTO       */
    /* -------------------------------------------------------------------------- */

    public static function updateProduct(){

      if(isset($_POST["nameProduct"]) && isset($_POST["cat"])){

        $dates = array(
          "idProd"=> $_POST["idProduct"],
          "name"=> $_POST["nameProduct"],
          "cat"=> $_POST["cat"],
          "subcat"=>$_POST["subcat"],
          "description"=>$_POST["description"],
          "rute"=>$_POST["rute"],
          "offer"=>$_POST["offer"],
          "price"=>$_POST["price"],
          "disccount"=>$_POST["disccount"],
          "priceOnOffer"=>$_POST["priceOnOffer"],
          "image"=>$_POST["image"],
          "weigth"=>$_POST["weigth"],
          "delivery"=>$_POST["deliver"],
          "numViews"=> "0",
          "numSells"=> "0"
        );
       
      //  return var_dump( $dates);
      $table = "products";
      $res = AdminModel::updateProductsModel($table,$dates);
      
      
      if ($res == "ok") {

        echo "<script>
        alertify
        .alert('OPERATION SUCCESSFUL','The product was updated',
        function(isConfirm){
            if (isConfirm) {	   
              history.back();
             } 
   });
        
        </script>";
     
    }if($res == "error"){
      echo "<script>
      alertify
      .alert('ERROR','Something was wrong!...Please repeat the process',
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
    /*              METODO PARA MOSTRAR LOS DATOS DE UN PRODUCTO DENTRO DE LOS INPUTS DEL MODAL(AJAX)             */
    /* -------------------------------------------------------------------------- */
    public static function modalProductAdmin($dates){

      if($dates == 'ei'){       
      }else{
      $table = "products";
      $id = $dates["idProduct"];      
      $res = AdminModel::modalProductAdminModel($table,$id);
      return $res;    
    }
  }

 /* -------------------------------------------------------------------------- */
    /*              METODO PARA ELIMINAR PRODUCTO DE LA APP           */
    /* -------------------------------------------------------------------------- */
    public static function removeProduct(){
      
      if(isset($_POST["idRemove"])){
      $table = 'products';
      $dates= array(
        "id"=>$_POST["idRemove"],
      );

      $res = AdminModel::removeProductModel($table,$dates);    

      if ($res == "ok") {

        echo "<script>
        alertify
        .alert('OPERATION SUCCESSFUL','The product was removed',
        function(isConfirm){
            if (isConfirm) {	   
              history.back();
             } 
   });
        
        </script>";
     
    }if($res == "error"){
      echo "<script>
      alertify
      .alert('ERROR','Something was wrong!...Please repeat the process',
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
    /*            METODO PARA CREAR NUEVO PRODUCTO       */
    /* -------------------------------------------------------------------------- */

    public static function newProduct(){

      if(isset($_POST["nProduct"])){

        $dates = array(
          
          "name"=> $_POST["nProduct"],
          "cat"=> $_POST["cat"],
          "subcat"=>$_POST["subcat"],
          "description"=>$_POST["description"],
          "rute"=>$_POST["rute"],
          "offer"=>$_POST["offer"],
          "price"=>$_POST["price"],
          "disccount"=>$_POST["disccount"],
          "priceOnOffer"=>$_POST["priceOnOffer"],
          "image"=>$_POST["image"],
          "weigth"=>$_POST["weigth"],
          "delivery"=>$_POST["deliver"],
          "numViews"=> "0",
          "numSells"=> "0"
        );
       
      //  return var_dump( $dates);
      $table = "products";
      $res = AdminModel::newProductsModel($table,$dates);
      
      
      if ($res == "ok") {

        echo "<script>
        alertify
        .alert('OPERATION SUCCESSFUL','The product was created successfull',
        function(isConfirm){
            if (isConfirm) {	   
              history.back();
             } 
   });
        
        </script>";
     
    }
    }
    }
    
  }
?>