<?php
require_once __DIR__ . "/../conexion/conexion.php";
class Mascota {
    private $conexion;

    public function __construct(){
        $this->conexion = Conexion::conectar();
    }
    public function guardarMascota($nombre,$especie,$raza,$fecha_nacimiento,$peso,$id_cliente){
        $sql = "INSERT INTO mascotas(nombre,especie,raza,fecha_nacimiento,peso,id_cliente)
        VALUES ('$nombre','$especie','$raza','$fecha_nacimiento','$peso','$id_cliente')";
        return $this->conexion->query($sql);
    }
    public function obtenerMascotas() {
        $sql = "SELECT * FROM mascotas";
        return $this->conexion->query($sql);
    }
}