<?php 

require_once __DIR__ . "/../conexion/conexion.php";

class Usuario{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function registrar($usuario, $clave, $id_rol) {
        $sql = "INSERT INTO usuarios (usuario, clave, id_rol) 
        VALUES ('$usuario', '$clave', '$id_rol')";
        return $this->conexion->query($sql);
    }

    public function validar($usuario,$clave){
        $sql = "SELECT * FROM usuarios 
        WHERE usuario='$usuario' AND clave='$clave'";
        return $this->conexion->query($sql);    
    }


}
?>