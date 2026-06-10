<?php
require_once "modelos/Cliente.php";

/**
 * Controlador para la gestión de clientes.
 *
 * Este controlador muestra el formulario de registro y procesa
 * el envío para guardar clientes en la base de datos.
 */
class ClienteControlador {
    /**
     * Carga la vista de registro de clientes.
     */
    public function formulario() {
        require_once __DIR__ . "/../vistas/registrar_clientes.php";
    }

    /**
     * Procesa el formulario de cliente y guarda el registro.
     */
    public function guardar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dui = $_POST["dui"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];

            $modelo = new Cliente();
            $modelo->guardar($nombre, $apellido, $dui, $telefono, $correo);

            header("Location: index.php?accion=registrarCliente");
            exit;
        }
    }
}