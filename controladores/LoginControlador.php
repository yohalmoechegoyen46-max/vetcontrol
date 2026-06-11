<?php
require_once "modelos/Usuario.php";
require_once "modelos/Cita.php";
require_once "modelos/Mascota.php";
require_once "modelos/Veterinario.php";

/**
 * Controlador de autenticación y panel principal.
 */
class LoginControlador {

    /**
     * Muestra la pantalla de login.
     */
    public function mostrarLogin() {
        require_once "vistas/login.php";
    }

    /**
     * Valida el usuario y contraseña ingresados.
     */
    public function validarLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $password = $_POST["clave"];

            $modelo = new Usuario();
            $resultado = $modelo->validar($usuario, $password);

            if ($resultado->num_rows > 0) {
                $_SESSION["usuario"] = $usuario;
                header("Location: index.php?accion=bienvenida");
                exit;
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }
    }

    /**
     * Muestra la página de bienvenida cuando el usuario está autenticado.
     */
    public function bienvenida() {
        if (!isset($_SESSION["usuario"])) {
            header("Location: index.php");
            exit;
        }

        $citaModel = new Cita();
        $citasRes = $citaModel->obtenerCitas();
        $citas = [];
        if ($citasRes) {
            while ($c = $citasRes->fetch_assoc()) {
                $citas[] = $c;
            }
        }

        $mascotaModel = new Mascota();
        $mascotasRes = $mascotaModel->obtenerMascotas();
        $mascotasMap = [];
        if ($mascotasRes) {
            while ($m = $mascotasRes->fetch_assoc()) {
                $mascotasMap[$m['id_mascota']] = $m['nombre'] ?? ($m['nombre_mascota'] ?? 'Mascota');
            }
        }

        $veterinarioModel = new Veterinario();
        $veterinariosRes = $veterinarioModel->obtenerVeterinarios();
        $veterinariosMap = [];
        if ($veterinariosRes) {
            while ($v = $veterinariosRes->fetch_assoc()) {
                $veterinariosMap[$v['id_veterinario']] = trim(($v['nombre'] ?? '') . ' ' . ($v['apellido'] ?? ''));
            }
        }

        require_once "vistas/bienvenida.php";
    }

    /**
     * Cierra la sesión y redirige al login.
     */
    public function salir() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>