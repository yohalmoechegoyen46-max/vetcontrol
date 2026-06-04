<?php
class Conexion {
    public static function conectar(){
        $conexion = new mysqli("localhost","root","","vetcontrol_db");
        if($conexion->connect_error){
            die("Error de conexion" . $conexion->connect_error);
        }
        return $conexion;
    }
}
?>