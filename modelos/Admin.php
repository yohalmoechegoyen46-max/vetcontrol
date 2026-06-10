<?php
 require_once __DIR__ . "/../conexion/conexion.php";
class Admin {
    
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function nuevoCliente($nombre,$apellido,$usuario,$clave,$dui,$telefono,$correo,$id_usuario) {
        $sql = "INSERT INTO clientes(nombre,apellido,usuario,clave,dui,telefono,correo,id_usuario) 
        VALUES ('$nombre','$apellido','$usuario','$clave','$dui','$telefono','$correo','$id_usuario')";
        return $this->conexion->query($sql);
    }
}
