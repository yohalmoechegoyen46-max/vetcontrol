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


    public function guardarMascota() {
        if($_SERVER["REQUEST_METHOD"] == "POST") { 
            $nombre = $_POST['nombre_mascota'];
            $especie = $_POST['especie'];
            $raza = $_POST['raza'] ;
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $peso = $_POST['peso'];
            $id_cliente = $_POST['id_dueño'];

            $modelo = new Mascota();
            $modelo->guardarMascota($nombre,$especie,$raza,$fecha_nacimiento,$peso,$id_cliente);
            
            header("Location: index.php?accion=registrarMascota");
            exit;
        }
    }
}
