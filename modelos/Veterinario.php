<?php
require_once __DIR__ . "/../conexion/conexion.php";

/**
 * Modelo para la entidad Veterinario.
 *
 * Permite recuperar la lista de veterinarios desde la base de datos.
 */
class Veterinario {
    /** @var mysqli */
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    /**
     * Obtiene los veterinarios registrados en la base de datos.
     *
     * @return mysqli_result
     */
    public function obtenerVeterinarios() {
        $sql = "SELECT id_veterinario, nombre, apellido FROM veterinarios";
        return $this->conexion->query($sql);
    }
}
?>