<?php
require_once "modelos/Cita.php";
require_once "modelos/Mascota.php";
require_once "modelos/Veterinario.php";

/**
 * Controlador para la gestión de citas.
 *
 * Provee la vista de agendado y las acciones de CRUD para citas.
 */
class CitaControlador {
    public function formulario() {
        $mascotaModel = new Mascota();
        $mascotasRes = $mascotaModel->obtenerMascotas();
        $mascotas = [];
        if ($mascotasRes) {
            while ($m = $mascotasRes->fetch_assoc()) {
                $mascotas[] = $m;
            }
        }

        $veterinarioModel = new Veterinario();
        $veterinariosRes = $veterinarioModel->obtenerVeterinarios();
        $veterinarios = [];
        if ($veterinariosRes) {
            while ($v = $veterinariosRes->fetch_assoc()) {
                $veterinarios[] = $v;
            }
        }

        require_once __DIR__ . "/../vistas/agendar_citas.php";
    }

    public function listarCitas() {
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

        require_once __DIR__ . "/../vistas/citas_agendadas.php";
    }

    public function editarCita() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header('Location: index.php?accion=citasAgendadas');
            exit;
        }

        $citaModel = new Cita();
        $citaRes = $citaModel->obtenerCita($id);
        $cita = null;
        if ($citaRes) {
            $cita = $citaRes->fetch_assoc();
        }

        $mascotaModel = new Mascota();
        $mascotasRes = $mascotaModel->obtenerMascotas();
        $mascotas = [];
        if ($mascotasRes) {
            while ($m = $mascotasRes->fetch_assoc()) {
                $mascotas[] = $m;
            }
        }

        $veterinarioModel = new Veterinario();
        $veterinariosRes = $veterinarioModel->obtenerVeterinarios();
        $veterinarios = [];
        if ($veterinariosRes) {
            while ($v = $veterinariosRes->fetch_assoc()) {
                $veterinarios[] = $v;
            }
        }

        require_once __DIR__ . "/../vistas/editar_cita.php";
    }

    public function actualizarCita() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = isset($_POST['id_cita']) ? $_POST['id_cita'] : null;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
            $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
            $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';

            if (!$id) {
                header('Location: index.php?accion=citasAgendadas');
                exit;
            }

            $modelo = new Cita();
            $res = $modelo->actualizarCita($id, $fecha, $hora, $motivo);
            if ($res) {
                header('Location: index.php?accion=citasAgendadas&msg=actualizado');
                exit;
            } else {
                $err = $modelo->getError();
                header('Location: index.php?accion=citasAgendadas&msg=error&err=' . urlencode($err));
                exit;
            }
        }
    }

    public function eliminarCitaAction() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $modelo = new Cita();
            $modelo->eliminarCita($id);
        }
        header('Location: index.php?accion=citasAgendadas');
        exit;
    }

    public function guardarCita() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_mascota = isset($_POST['id_mascota']) ? $_POST['id_mascota'] : null;
            $id_veterinario = isset($_POST['id_veterinario']) ? $_POST['id_veterinario'] : null;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
            $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
            $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';

            // Intentar obtener el id del cliente desde el formulario o la sesión.
            $id_cliente = null;
            if (isset($_POST['id_cliente'])) {
                $id_cliente = $_POST['id_cliente'];
            } elseif (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['usuario_id'])) {
                $id_cliente = $_SESSION['usuario_id'];
            } else {
                // Valor por defecto para pruebas; reemplaza con la lógica real de sesión.
                $id_cliente = 1;
            }

            $modelo = new Cita();
            $resultado = $modelo->agendarCita($id_cliente, $id_mascota, $id_veterinario, $fecha, $hora, $motivo);

            if ($resultado) {
                header("Location: index.php?accion=agendar&msg=guardado");
                exit;
            } else {
                $err = $modelo->getError();
                header("Location: index.php?accion=agendar&msg=error&err=" . urlencode($err));
                exit;
            }
        }
    }
}

?>
