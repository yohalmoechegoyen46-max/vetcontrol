<?php
session_start();

/**
 * Entry point de la aplicación.
 *
 * Aquí se manejan las rutas simples mediante el parámetro GET "accion".
 * Cada acción llama al controlador correspondiente para mostrar una vista o
 * procesar un formulario.
 */

// Mostrar errores en pantalla para facilitar la depuración temporalmente
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "controladores/LoginControlador.php";
require_once "controladores/ClienteControlador.php";
require_once "controladores/MascotaControlador.php";
require_once "controladores/CitaControlador.php";

$login = new LoginControlador();
$cliente = new ClienteControlador();
$mascota = new MascotaControlador();
$cita = new CitaControlador();

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";

// Enrutamiento básico: cada valor de accion ejecuta un método.
switch ($accion) {

    case "validar":
        $login->validarLogin();
        break;

    case "bienvenida":
        $login->bienvenida();
        break;

    case "salir":
        $login->salir();
        break;

    case "registrarCliente":
        $cliente->formulario();
        break;

    case "guardarCliente":
        $cliente->guardar();
        break;

    case "registrarMascota":
        $mascota->formularioMascota();
        break;

    case "guardarMascota":
        $mascota->guardarMascota();
        break;

    case "agendar":
    case "agendarCita":
        $cita->formulario();
        break;

    case "guardarCita":
        $cita->guardarCita();
        break;

    case "editarCita":
        $cita->editarCita();
        break;

    case "actualizarCita":
        $cita->actualizarCita();
        break;

    case "eliminarCita":
        $cita->eliminarCitaAction();
        break;

    case "citasAgendadas":
        $cita->listarCitas();
        break;

    default:
        $login->mostrarLogin();
        break;
}
?>