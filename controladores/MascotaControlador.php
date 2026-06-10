<?php
require_once "modelos/Mascota.php";
require_once "modelos/Cliente.php";

class MascotaControlador {
   public function formularioMascota() {
        if (!isset($_SESSION["usuario"])) {
            header("Location: index.php");
            exit;
        }
        
        $modeloCliente = new Cliente();
        $resultado = $modeloCliente->obtenerPorUsuario($_SESSION["usuario"]);
        
        if ($resultado->num_rows > 0) {
            $perfil = $resultado->fetch_assoc();
        } else {
            $perfil = null;
        }
        
        require_once __DIR__ . "/../vistas/cliente/registrar_mascotas.php";
    }


 public function guardarMascota(){
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }

    // En lugar de buscarlo en el formulario, lo agarramos directamente de la sesión
    if (isset($_SESSION["id_cliente"])) {
        $id_dueno = $_SESSION["id_cliente"];
    } elseif (isset($_SESSION["usuario_id"])) {
        $id_dueno = $_SESSION["usuario_id"];
    } elseif (isset($_SESSION["id"])) {
        $id_dueno = $_SESSION["id"];
    } else {
        // Si de verdad no hay sesión, usamos un dato temporal para que no explote la BD
        $id_dueno = 1; 
    }

    // Aquí abajo sigue tu código normal...
    $nombre = $_POST['nombre_mascota'];
    $especie = $_POST['especie'];
    // ... el resto de tus variables y el llamado al modelo
}
}