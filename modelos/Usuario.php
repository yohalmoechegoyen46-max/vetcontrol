<?php 

require_once __DIR__ . "/../conexion/conexion.php";

class Usuario{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    //Registrar un nuevo usuario
    public function registrar($usuario, $clave, $id_rol) {
        $sql = "INSERT INTO usuarios (usuario, clave, id_rol) VALUES ('$usuario', '$clave', '$id_rol')";
        return $this->conexion->query($sql);
    }

    //Obtener el ultimo usuario registrado
    public function obtenerUltimoUsuario() {
        $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC LIMIT 1";
        return $this->conexion->query($sql);
    }
    //Validar usuario para login
    public function validar($usuario,$clave){
        $sql = "SELECT * FROM usuarios 
        WHERE usuario='$usuario' AND clave='$clave'";
        return $this->conexion->query($sql);    
    }
    //Actualizar usuario
 public function actualizar($usuario, $clave, $id_rol, $id_cliente) {
    $consulta = $this->conexion->query("SELECT id_usuario FROM clientes WHERE id_cliente = '$id_cliente'");
    $resultado = $consulta->fetch_assoc();
    $id_usuario = $resultado['id_usuario'];

    if (empty($id_usuario)) {
        $this->conexion->query("INSERT INTO usuarios (usuario, clave, id_rol) VALUES ('$usuario', '$clave', '$id_rol')");
        $nuevo_id_user = $this->conexion->insert_id;

        $sqlVinculo = "UPDATE clientes SET id_usuario = '$nuevo_id_user' WHERE id_cliente = '$id_cliente'";
        return $this->conexion->query($sqlVinculo);
    } 
    else {
        $sql = "UPDATE usuarios SET usuario = '$usuario', clave = '$clave' WHERE id_usuario = '$id_usuario'";
        return $this->conexion->query($sql);
    }
}

    //Eliminar usuario por id_usuario
   public function eliminarUsuario($id_usuario) {
    $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
    return $this->conexion->query($sql);
}



}
?>