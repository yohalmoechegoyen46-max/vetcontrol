<?php
require_once __DIR__ . "/../conexion/conexion.php";

/**
 * Modelo para la entidad Mascota.
 *
 * Contiene las operaciones de base de datos relacionadas con mascotas.
 */
class Mascota {
    /** @var mysqli */
    private $conexion;

    /** @var string Última consulta ejecutada */
    private $lastQuery = '';

    public function getError(){
        return $this->conexion->error;
    }

    public function getLastQuery(){
        return $this->lastQuery;
    }

    public function __construct(){
        $this->conexion = Conexion::conectar();
    }

    /**
     * Inserta una nueva mascota en la base de datos.
     *
     * Convierte el peso a NULL si no se proporciona y devuelve 0 si es negativo.
     * Si el cliente se pasa como DUI, busca su id_cliente en la tabla clientes.
     *
     * @param string $nombre
     * @param string $especie
     * @param string $raza
     * @param string $fecha_nacimiento
     * @param float|null $peso
     * @param mixed $id_cliente
     * @return bool|mysqli_result
     */
    public function guardarMascota($nombre, $especie, $raza, $fecha_nacimiento, $peso, $id_cliente){
        // Si el identificador del cliente viene como DUI (no numérico), buscar id_cliente
        if (!is_numeric($id_cliente)) {
            $query = "SELECT id_cliente FROM clientes WHERE dui='" . $this->conexion->real_escape_string($id_cliente) . "' LIMIT 1";
            $this->lastQuery = $query;
            $res = $this->conexion->query($query);
            if ($res && $fila = $res->fetch_assoc()) {
                $id_cliente = $fila['id_cliente'];
            } else {
                $id_cliente = 'NULL';
            }
        }

        // Generar id_mascota si la tabla no tiene AUTO_INCREMENT
        $resId = $this->conexion->query("SELECT COALESCE(MAX(id_mascota),0) + 1 AS next_id FROM mascotas");
        $nextId = 1;
        if ($resId) {
            $f = $resId->fetch_assoc();
            $nextId = $f['next_id'] ?? 1;
        }

        $nombre_e = $this->conexion->real_escape_string($nombre);
        $especie_e = $this->conexion->real_escape_string($especie);
        $raza_e = $this->conexion->real_escape_string($raza);

        // Prepare peso: allow NULL or numeric (no negatives)
        if ($peso === null || $peso === '') {
            $peso_sql = 'NULL';
        } else {
            $peso_val = floatval($peso);
            if ($peso_val < 0) $peso_val = 0;
            $peso_sql = "'" . $this->conexion->real_escape_string(number_format($peso_val, 2, '.', '')) . "'";
        }

        $sql = "INSERT INTO mascotas(id_mascota,nombre,especie,raza,peso,id_cliente) VALUES ('" . $nextId . "','" . $nombre_e . "','" . $especie_e . "','" . $raza_e . "'," . $peso_sql . "," . ($id_cliente==='NULL' ? 'NULL' : "'".$this->conexion->real_escape_string($id_cliente)."'") . ")";
        $this->lastQuery = $sql;
        return $this->conexion->query($sql);
    }

    /**
     * Devuelve todas las mascotas registradas.
     *
     * @return mysqli_result
     */
    public function obtenerMascotas() {
        $sql = "SELECT * FROM mascotas";
        return $this->conexion->query($sql);
    }
}
