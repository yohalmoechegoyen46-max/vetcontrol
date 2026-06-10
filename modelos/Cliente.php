<?php
require_once __DIR__ . "/../conexion/conexion.php";
class Cliente {
    private $conexion;

    public function __construct(){
        $this->conexion = Conexion::conectar();
    }
    public function guardar($nombre,$apellido,$usuario,$clave,$dui,$telefono,$correo,$id_usuario) {
        $sql = "INSERT INTO clientes(nombre,apellido,usuario,clave,dui,telefono,correo,id_usuario) 
        VALUES ('$nombre','$apellido','$usuario','$clave','$dui','$telefono','$correo','$id_usuario')";
        return $this->conexion->query($sql);
    }
    public function obtenerClientes() {
        $sql = "SELECT * FROM clientes";
        return $this->conexion->query($sql);
    }
    
    public function obtenerPorUsuario($usuario) {
        $sql = "SELECT * FROM clientes WHERE usuario='$usuario'";
        return $this->conexion->query($sql);
    }
    
}