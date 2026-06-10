<?php
session_start();

require_once "controladores/LoginControlador.php";
require_once "controladores/ClienteControlador.php";
require_once "controladores/MascotaControlador.php";
require_once "controladores/AdminControlador.php";

$login = new LoginControlador();
$cliente = new ClienteControlador();
$mascota = new MascotaControlador();
$admin = new AdminControlador();

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
    
    case "agendarCita":
        $cliente->agendarCita();
        break;

    case "guardarCita":
        $cliente->guardarCita();
        break;


    case "perfilCliente":
        $cliente->perfilCliente();
        break;

     //ADMIN ----(!!NO TOCAR!!)----

    case "dashboardAdmin":
        $admin->dashboardAdmin();
        break;

    case "listarClientes":
        $admin->listarClientes();
        break;

    case "nuevoCliente":
        $admin->nuevoCliente();
        break;

    case "listarMascotas":
        $admin->listarMascotas();
        break;

    case "listarVeterinarios":
        $admin->listarVeterinarios();
        break;

    case "listarCitas":
        $admin->listarCitas();
        break;

    default:
        $login->mostrarLogin();
        break;
}
?>