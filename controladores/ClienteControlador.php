<?php
require_once "modelos/Cliente.php";
require_once "modelos/Usuario.php";
require_once "modelos/Cita.php";

class ClienteControlador {
  public function formulario() {
      
        require_once __DIR__ . "/../vistas/cliente/registrar_clientes.php";
    }
  

    public function guardar() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $id_rol = 3;
            $dui = $_POST["dui"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];

            $modeloUsuario = new Usuario();
            $modeloUsuario->registrar($usuario, $clave, $id_rol);
            $ultimoUsuario = $modeloUsuario->obtenerUltimoUsuario()->fetch_assoc();
            $id_usuario = $ultimoUsuario['id_usuario'];

            $modelo = new Cliente();
            $modelo->guardar($nombre,$apellido,$usuario,$clave,$dui,$telefono,$correo,$id_usuario);

            header("Location: index.php?accion=mostrarLogin");
            exit;
        }

    }
        public function perfilCliente() {
        if (!isset($_SESSION["usuario"])) {
            header("Location: index.php");
            exit;
        }
        
        $modelo = new Cliente();
        $resultado = $modelo->obtenerPorUsuario($_SESSION["usuario"]);
        
        if ($resultado->num_rows > 0) {
            $perfil = $resultado->fetch_assoc();
        } else {
            $perfil = null;
        }
        
        require_once __DIR__ . "/../vistas/cliente/perfil_cliente.php";
        
    }

    public function agendarCita() {
        if (!isset($_SESSION["usuario"])) {
            header("Location: index.php");
            exit;
        }

        require_once __DIR__ . "/../vistas/cliente/agendar_citas.php";
    }

    public function guardarCita() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_cliente = $_POST["id_cliente"];
            $id_mascota = $_POST["id_mascota"];
            $fecha = $_POST["fecha"];
            $hora = $_POST["hora"];
            $descripcion = $_POST["descripcion"];

            $modelo = new Cita();
            $modelo->guardar($id_cliente, $id_mascota, $fecha, $hora, $descripcion);

            header("Location: index.php?accion=bienvenida");
            exit;
        }
    }

}