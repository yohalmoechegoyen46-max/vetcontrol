<?php
require_once "modelos/Usuario.php";

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
                $_SESSION["usuario"] = $usuario;
                header("Location: index.php?accion=bienvenida");
                exit;
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }
    //VALIDAR USUARIOS
        if($usuario && password_verify($clave, $usuario["clave"])) {
            $_SESSION["id_usuario"] = $usuario["id"];
            $_SESSION["usuario"] = $usuario["usuario"];
            $_SESSION["rol"] = $usuario["id_rol"];
             
            if($usuario["id_rol"] == 1) {
                header("Location: index.php?accion=bienvenida");
            } elseif($usuario["id_rol"] == 3) {
                header("Location: index.php?accion=bienvenida");
            }
        } else {
            echo "Usuario o contraseña incorrectos";
        }
        exit();

    }

    //REGISTRAR USUARIOS
    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $clave = password_hash($_POST["clave"], PASSWORD_DEFAULT);
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

        require_once "vistas/bienvenida.php";
    }

    public function salir() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>