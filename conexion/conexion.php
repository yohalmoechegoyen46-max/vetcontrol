<?php
/**
 * Clase de conexión a la base de datos.
 *
 * Provee una conexión mysqli reutilizable para los modelos.
 */
class Conexion {
    /**
     * Establece la conexión con la base de datos MySQL.
     *
     * @return mysqli
     */
    public static function conectar(){
        try {
            $conexion = new mysqli("127.0.0.1", "root", "", "vetcontrol_db");
        } catch (mysqli_sql_exception $e) {
            die("Error de conexion: " . $e->getMessage());
        }

        if ($conexion->connect_error) {
            die("Error de conexion: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>