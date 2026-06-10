<?php

require_once __DIR__ . "/../conexion/conexion.php";

class Cita {
    /** @var mysqli Conexión a la base de datos */
    private $conexion;
    private $lastQuery = '';

    /**
     * Crea la instancia y abre la conexión a la base de datos.
     */
    public function __construct(){
        $this->conexion = Conexion::conectar();
    }

    public function getError(){
        return $this->conexion->error;
    }

    public function getLastQuery(){
        return $this->lastQuery;
    }

    public function obtenerSiguienteId(){
        $sql = "SELECT COALESCE(MAX(id_cita), 0) + 1 AS next_id FROM citas";
        $this->lastQuery = $sql;
        $resultado = $this->conexion->query($sql);
        if (!$resultado) {
            return 1;
        }
        $fila = $resultado->fetch_assoc();
        return $fila['next_id'] ?? 1;
    }

    /**
     * Inserta una nueva cita en la base de datos.
     *
     * @param int $id_cliente
     * @param int $id_mascota
     * @param string $fecha Formato 'YYYY-MM-DD'
     * @param string $hora Formato 'HH:MM'
     * @param string $motivo
     * @return bool|mysqli_result True si se insertó correctamente o resultado del query
     */
    public function agendarCita($id_cliente, $id_mascota, $id_veterinario, $fecha, $hora, $motivo){
        $id_cita = $this->obtenerSiguienteId();
        $fecha_hora = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
        $motivo_e = $this->conexion->real_escape_string($motivo);
        $id_veterinario = $id_veterinario ?: 'NULL';
        $sql = "INSERT INTO citas(id_cita, fecha_hora, estado, id_mascota, id_veterinario, id_cliente, motivo) VALUES ('$id_cita', '$fecha_hora', 'Pendiente', '$id_mascota', " . ($id_veterinario === 'NULL' ? 'NULL' : "'$id_veterinario'") . ", '$id_cliente', '$motivo_e')";
        $this->lastQuery = $sql;
        return $this->conexion->query($sql);
    }

    /**
     * Devuelve todas las citas.
     * @return mysqli_result
     */
    public function obtenerCitas(){
        $sql = "SELECT * FROM citas";
        return $this->conexion->query($sql);
    }

    /**
     * Devuelve una cita por su id.
     * @param int $id
     * @return mysqli_result
     */
    public function obtenerCita($id){
        $sql = "SELECT * FROM citas WHERE id_cita='$id'";
        return $this->conexion->query($sql);
    }

    /**
     * Devuelve todas las citas de un cliente.
     * @param int $id_cliente
     * @return mysqli_result
     */
    public function obtenerCitasPorCliente($id_cliente){
        $sql = "SELECT * FROM citas WHERE id_cliente='$id_cliente'";
        return $this->conexion->query($sql);
    }

    /**
     * Actualiza el estado de una cita (por ejemplo: programada, atendida, cancelada).
     * @param int $id
     * @param string $estado
     * @return bool|mysqli_result
     */
    public function actualizarEstado($id, $estado){
        $sql = "UPDATE citas SET estado='$estado' WHERE id_cita='$id'";
        return $this->conexion->query($sql);
    }

    /**
     * Actualiza los datos principales de una cita.
     * @param int $id
     * @param string $fecha
     * @param string $hora
     * @param string $motivo
     * @return bool|mysqli_result
     */
    public function actualizarCita($id, $fecha, $hora, $motivo){
        $fecha_hora = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
        $motivo_e = $this->conexion->real_escape_string($motivo);
        $sql = "UPDATE citas SET fecha_hora='$fecha_hora', motivo='$motivo_e' WHERE id_cita='$id'";
        return $this->conexion->query($sql);
    }

    /**
     * Elimina una cita por su id.
     * @param int $id
     * @return bool|mysqli_result
     */
    public function eliminarCita($id){
        $id_e = $this->conexion->real_escape_string($id);
        $sql = "DELETE FROM citas WHERE id_cita='$id_e'";
        return $this->conexion->query($sql);
    }
}
?>
