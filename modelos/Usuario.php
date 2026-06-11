<?php 

require_once __DIR__ . "/../conexion/conexion.php";

/**
 * Modelo para la entidad Usuario.
 *
 * Provee la validación de acceso al sistema.
 */
class Usuario{
    /** @var mysqli */
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    /**
     * Valida credenciales de acceso.
     *
     * @param string $usuario
     * @param string $password
     * @return mysqli_result
     */
    public function validar($usuario,$password){
        $sql = "SELECT * FROM usuarios 
        WHERE usuario='$usuario' AND password='$password'";
        return $this->conexion->query($sql);    

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

}
?>