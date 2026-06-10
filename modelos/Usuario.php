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
    }
}
?>