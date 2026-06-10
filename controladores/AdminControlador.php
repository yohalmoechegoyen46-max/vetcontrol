<?php
require_once "modelos/Admin.php";
require_once "modelos/Cliente.php";
require_once "modelos/Mascota.php";
require_once "modelos/Cita.php";

class AdminControlador {
    
    public function dashboardAdmin() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        require_once __DIR__ . "/../vistas/admin/dashboard.php";
    }

    public function listarClientes() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Cliente();
        $clientes = $modelo->obtenerClientes();
        
        require_once __DIR__ . "/../vistas/admin/lista_clientes.php";
    }
    public function nuevoCliente() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        require_once __DIR__ . "/../vistas/admin/nuevo_cliente.php";
    }



    public function listarMascotas() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Mascota();
        $mascotas = $modelo->obtenerMascotas();
        
        require_once __DIR__ . "/../vistas/admin/lista_mascotas.php";
    }

    public function listarVeterinarios() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Admin();
        $veterinarios = $modelo->obtenerVeterinarios();
        
        require_once __DIR__ . "/../vistas/admin/lista_veterinarios.php";
    }

    public function listarCitas() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Cita();
        $citas = $modelo->obtenerCitas();
        
        require_once __DIR__ . "/../vistas/admin/lista_citas.php";
    }
}
?>

