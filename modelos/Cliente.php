<?php
require_once __DIR__ . "/../conexion/conexion.php";
class Cliente {
    private $conexion;

    public function __construct(){
        $this->conexion = Conexion::conectar();
    }
    public function guardar($nombre,$apellido,$dui,$telefono,$correo){
        $sql = "INSERT INTO clientes(nombre,apellido,dui,telefono,correo) 
        VALUES ('$nombre','$apellido','$dui','$telefono','$correo')";
        return $this->conexion->query($sql);
    }
    public function obtenerClientes() {
        $sql = "SELECT * FROM clientes";
        return $this->conexion->query($sql);
    }
    
}
?>