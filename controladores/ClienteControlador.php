<?php
require_once "modelos/Cliente.php";

class ClienteControlador {
  public function formulario() {
      
        require_once __DIR__ . "/../vistas/registrar_clientes.php";
    }

    public function guardar() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dui = $_POST["dui"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];

            $modelo = new Cliente();
            $modelo->guardar($nombre,$apellido,$dui,$telefono,$correo);

            header("Location: index.php?accion=registrarCliente");
            exit;
        }
    }
}