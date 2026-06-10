<?php
require_once "modelos/Usuario.php";
require_once "modelos/Cliente.php";
require_once "modelos/Admin.php";

class LoginControlador {

    public function mostrarLogin() {
        require_once "vistas/login.php";
    }

    public function validarLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];

            $modelo = new Usuario();
            $resultado = $modelo->validar($usuario, $clave);

            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["id_rol"] = $fila["id_rol"];
                
                // Redireccionar según el rol
                if ($fila["id_rol"] == 1) {
                    // Admin
                    header("Location: index.php?accion=dashboardAdmin");
                } elseif ($fila["id_rol"] == 3) {
                    // Cliente
                    header("Location: index.php?accion=bienvenida");
                }
                exit;
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }
    }

    //REGISTRAR USUARIOS
    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $id_rol = $_POST["id_rol"];

            $modelo = new Usuario();
            $modelo->registrar($usuario, $clave, $id_rol);

            header("Location: index.php?accion=mostrarLogin");
            exit;
        }
    }


    public function bienvenida() {
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

        require_once "vistas/cliente/bienvenida.php";
    }

    public function salir() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>