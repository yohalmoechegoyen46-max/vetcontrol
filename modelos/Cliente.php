<?php
require_once __DIR__ . "/../conexion/conexion.php";

/**
 * Modelo para la entidad Cliente.
 *
 * Contiene operaciones de base de datos relacionadas con clientes.
 */
class Cliente {
    /** @var mysqli */
    private $conexion;

    public function __construct(){
        $this->conexion = Conexion::conectar();
    }

    /**
     * Inserta un nuevo cliente en la base de datos.
     *
     * @param string $nombre
     * @param string $apellido
     * @param string $dui
     * @param string $telefono
     * @param string $correo
     * @return bool|mysqli_result
     */
    public function guardar($nombre, $apellido, $dui, $telefono, $correo){
        $sql = "INSERT INTO clientes(nombre,apellido,dui,telefono,correo) 
        VALUES ('$nombre','$apellido','$dui','$telefono','$correo')";
        return $this->conexion->query($sql);
    }

    /**
     * Recupera todos los clientes registrados.
     *
     * @return mysqli_result
     */
    public function obtenerClientes() {
        $sql = "SELECT * FROM clientes";
        return $this->conexion->query($sql);
    }
}
?>