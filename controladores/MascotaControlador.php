<?php
require_once "modelos/Mascota.php";
require_once "modelos/Cliente.php";

/**
 * Controlador para mascotas.
 *
 * Carga el formulario de registro y procesa el alta de nuevas mascotas.
 */
class MascotaControlador {
    /**
     * Carga los clientes desde el modelo y muestra la vista de registro de mascotas.
     */
    public function formularioMascota() {
        $clienteModel = new Cliente();
        $clientesRes = $clienteModel->obtenerClientes();
        $clientes = [];
        if ($clientesRes) {
            while ($cl = $clientesRes->fetch_assoc()) {
                $clientes[] = $cl;
            }
        }

        require_once __DIR__ . "/../vistas/registrar_mascotas.php";
    }

    /**
     * Procesa el formulario de alta de mascota.
     */
    public function guardarMascota() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre_mascota'];
            $especie = $_POST['especie'];
            $raza = $_POST['raza'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $peso = isset($_POST['peso']) ? floatval($_POST['peso']) : null;

            // Normalizar peso: NULL si no se proporciona o si es negativo.
            if ($peso === null || $peso < 0) {
                $peso = null;
            }

            $id_cliente = $_POST['id_dueño'];

            $modelo = new Mascota();
            $modelo->guardarMascota($nombre, $especie, $raza, $fecha_nacimiento, $peso, $id_cliente);

            header("Location: index.php?accion=registrarMascota");
            exit;
        }
    }
}
