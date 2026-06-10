<?php

require_once __DIR__ . "/../conexion/conexion.php";

class Cita {
    private $conexion;
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

    
    public function agendarCita($id_cliente, $id_mascota, $id_veterinario, $fecha, $hora, $motivo){
        $id_cita = $this->obtenerSiguienteId();
        $fecha_hora = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
        $motivo_e = $this->conexion->real_escape_string($motivo);
        $id_veterinario = $id_veterinario ?: 'NULL';
        $sql = "INSERT INTO citas(id_cita, fecha_hora, estado, id_mascota, id_veterinario, id_cliente, motivo) VALUES ('$id_cita', '$fecha_hora', 'Pendiente', '$id_mascota', " . ($id_veterinario === 'NULL' ? 'NULL' : "'$id_veterinario'") . ", '$id_cliente', '$motivo_e')";
        $this->lastQuery = $sql;
        return $this->conexion->query($sql);
    }

    public function obtenerCitas(){
        $sql = "SELECT * FROM citas";
        return $this->conexion->query($sql);
    }

    public function obtenerCita($id){
        $sql = "SELECT * FROM citas WHERE id_cita='$id'";
        return $this->conexion->query($sql);
    }

    public function obtenerCitasPorCliente($id_cliente){
        $sql = "SELECT * FROM citas WHERE id_cliente='$id_cliente'";
        return $this->conexion->query($sql);
    }

    public function actualizarEstado($id, $estado){
        $sql = "UPDATE citas SET estado='$estado' WHERE id_cita='$id'";
        return $this->conexion->query($sql);
    }

    public function actualizarCita($id, $fecha, $hora, $motivo){
        $fecha_hora = date('Y-m-d H:i:s', strtotime("$fecha $hora"));
        $motivo_e = $this->conexion->real_escape_string($motivo);
        $sql = "UPDATE citas SET fecha_hora='$fecha_hora', motivo='$motivo_e' WHERE id_cita='$id'";
        return $this->conexion->query($sql);
    }

   
    public function eliminarCita($id){
        $sql = "DELETE FROM citas WHERE id='$id'";
        return $this->conexion->query($sql);
    }
}
?>
