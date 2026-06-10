<?php
require_once __DIR__ . "/../conexion/conexion.php";

class Veterinario {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function obtenerVeterinarios() {
        $sql = "SELECT id_veterinario, nombre, apellido FROM veterinarios";
        return $this->conexion->query($sql);
    }
}
?>