
<?php  

class SliderController{

public static function sliderStyle(){

//asignamos el valor de la tabla de la base de datos
$table = "slider";

//El controlador le pide 
$res = SliderModel::modelSliderStyle($table);

return $res;
}
}