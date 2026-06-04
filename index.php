<?php
session_start();

require_once "controladores/LoginControlador.php";
require_once "controladores/ClienteControlador.php";
require_once "controladores/MascotaControlador.php";

$login = new LoginControlador();
$cliente = new ClienteControlador();
$mascota = new MascotaControlador();

$accion = isset($_GET["accion"]) ? $_GET["accion"] : "";

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

    default:
        $login->mostrarLogin();
        break;
}
?>