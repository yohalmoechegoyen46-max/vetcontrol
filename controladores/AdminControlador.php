<?php
require_once "modelos/Admin.php";
require_once "modelos/Cliente.php";
require_once "modelos/Mascota.php";
require_once "modelos/Cita.php";

class AdminControlador {
    
    public function dashboardAdmin() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        require_once __DIR__ . "/../vistas/admin/dashboard.php";
    }
    //Listar clientes
    public function listarClientes() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Cliente();
        $clientes = $modelo->obtenerClientes();
        
        require_once __DIR__ . "/../vistas/admin/lista_clientes.php";
    }
    //Mostrar vista de nuevo cliente
    public function nuevoC() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        require_once __DIR__ . "/../vistas/admin/nuevo_cliente.php";
    }
    //Guardar nuevo cliente
    public function guardarC() {
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

            $modelo = new Admin();
            $modelo->nuevoC($nombre,$apellido,$usuario,$clave,$dui,$telefono,$correo,$id_usuario);

            header("Location: index.php?accion=listarClientes");
            exit;
        }

    }

     //Actualizar cliente
        public function actualizarC() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];
    $nombre     = $_POST["nombre"];
    $apellido   = $_POST["apellido"];
    $usuario    = $_POST["usuario"]; 
    $clave      = $_POST["clave"];   
    $dui        = $_POST["dui"];
    $telefono   = $_POST["telefono"];
    $correo     = $_POST["correo"];

    require_once "modelos/Usuario.php";
    $modeloUsuario = new Usuario();
    $modeloUsuario->actualizar($usuario, $clave, 3, $id_cliente);
    
    $modeloAdmin = new Admin();
    $modeloAdmin->actualizarC($id_cliente, $nombre, $apellido, $usuario, $clave, $dui, $telefono, $correo);

    header("Location: index.php?accion=listarClientes");
    exit();
}
    else {
        $id_cliente = $_GET["id_cliente"];

        $modeloAdmin = new Admin();
        $cliente = $modeloAdmin->obtenerClientePorId($id_cliente);

        require_once "vistas/admin/actualizar_cliente.php";
    }


}

    //Eliminar cliente
    public function eliminarC() {
    // Capturamos el id_cliente que viaja en la URL (?id_cliente=X)
    if (isset($_GET["id_cliente"])) {
        $id_cliente = $_GET["id_cliente"];

        $modeloAdmin = new Admin();
        
        // 1. Usamos tu función del modelo para traer los datos actuales antes de borrarlo
        $clienteData = $modeloAdmin->obtenerClientePorId($id_cliente);
        $id_usuario = $clienteData['id_usuario'];

        // 2. Eliminamos el registro de la tabla clientes
        $modeloAdmin->eliminarC($id_cliente);

        // 3. Si tenía una cuenta de usuario asignada, la borramos también
        if (!empty($id_usuario)) {
            require_once "modelos/Usuario.php";
            $modeloUsuario = new Usuario();
            $modeloUsuario->eliminarUsuario($id_usuario);
        }

        // Redireccionamos a la lista limpia para ver los cambios reflejados
        header("Location: index.php?accion=listarClientes");
        exit();
    }
}

//-------------------------------------MASCOTAS---------------------------------------------
    public function listarMascotas() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Mascota();
        $mascotas = $modelo->obtenerMascotas();
        
        require_once __DIR__ . "/../vistas/admin/lista_mascotas.php";
    }
//--------------------VETERINARIOS--------------------------------------------

    //Listar veterinarios
    public function listarVeterinarios() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Admin();
        $veterinarios = $modelo->obtenerVeterinarios();
        
        require_once __DIR__ . "/../vistas/admin/lista_veterinarios.php";
    }

    // Mostrar la pantalla del formulario de registro
    public function nuevoV() {
        require_once "vistas/admin/nuevo_veterinario.php";
    }

    //Nuevos veterinarios
    public function guardarV() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_veterinario = $_POST["id_veterinario"];
        $nombre         = $_POST["nombre"];
        $apellido       = $_POST["apellido"];
        $especialidad   = $_POST["especialidad"];
        $telefono       = $_POST["telefono"];

        
        $modeloAdmin = new Admin();
        $modeloAdmin->nuevoV($id_veterinario, $nombre, $apellido, $especialidad, $telefono);

        header("Location: index.php?accion=listarVeterinarios");
        exit();
    } 
}

    // Formulario de edición con los datos ya cargados
    public function editarV() {
        if (isset($_GET["id_veterinario"])) {
            $id_veterinario = $_GET["id_veterinario"];

            $modeloAdmin = new Admin();
            $veterinarioData = $modeloAdmin->obtenerVeterinarioPorId($id_veterinario);

            require_once "vistas/admin/actualizar_veterinario.php";
        }
    }

    // Formulario y actualiza la base de datos
    public function actualizarV() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_veterinario = $_POST["id_veterinario"];
            $nombre         = $_POST["nombre"];
            $apellido       = $_POST["apellido"];
            $especialidad   = $_POST["especialidad"];
            $telefono       = $_POST["telefono"];

            $modeloAdmin = new Admin();
            $modeloAdmin->actualizarV($id_veterinario, $nombre, $apellido, $especialidad, $telefono);

            header("Location: index.php?accion=listarVeterinarios");
            exit();
        }
    }

    //Eliminar veterinario
    public function eliminarV() {
    if (isset($_GET["id_veterinario"])) {
        $id_veterinario = $_GET["id_veterinario"];

        $modeloAdmin = new Admin();
        $modeloAdmin->eliminarV($id_veterinario);

        header("Location: index.php?accion=listarVeterinarios");
        exit();
    }
}



//------------------CITAS----------------------------------------------------------
    public function listarCitas() {
        if (!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1) {
            header("Location: index.php");
            exit;
        }

        $modelo = new Cita();
        $citas = $modelo->obtenerCitas();
        
        require_once __DIR__ . "/../vistas/admin/lista_citas.php";
    }

}


?>

