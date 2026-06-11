<?php
 require_once __DIR__ . "/../conexion/conexion.php";
class Admin {
    private $conexion;

    public function __construct(){
        $this->conexion = Conexion::conectar();
    }

//--------------CLIENTES-------------------
    //Registrar cliente
    public function nuevoC($nombre,$apellido,$usuario,$clave,$dui,$telefono,$correo,$id_usuario) {
        $sql = "INSERT INTO clientes(nombre,apellido,usuario,clave,dui,telefono,correo,id_usuario) 
        VALUES ('$nombre','$apellido','$usuario','$clave','$dui','$telefono','$correo','$id_usuario')";
        return $this->conexion->query($sql);
    }
    //Obtener clientes
    public function obtenerC() {
        $sql = "SELECT * FROM clientes";
        return $this->conexion->query($sql);
    }
    //Actualizar cliente
public function actualizarC($id_cliente, $nombre, $apellido, $usuario, $clave, $dui, $telefono, $correo) {
    $sql = "UPDATE clientes 
            SET nombre = '$nombre', apellido = '$apellido', dui = '$dui', telefono = '$telefono', correo = '$correo' 
            WHERE id_cliente = '$id_cliente'";
            
    return $this->conexion->query($sql);
}

public function obtenerClientePorId($id_cliente) {
    $sql = "SELECT c.*, u.usuario, u.clave 
            FROM clientes c 
            LEFT JOIN usuarios u ON c.id_usuario = u.id_usuario 
            WHERE c.id_cliente = '$id_cliente'";
            
    $resultado = $this->conexion->query($sql);
    return $resultado->fetch_assoc(); 
}

//Eliminar cliente
public function eliminarC($id_cliente) {
    $sql = "DELETE FROM clientes WHERE id_cliente = '$id_cliente'";
    return $this->conexion->query($sql);
}


//------------------------------VETERINARIOS-------------------------------------------
    //Registrar veterinario
    public function nuevoV($id_veterinario, $nombre, $apellido, $especialidad, $telefono) {
    $sql = "INSERT INTO veterinarios (id_veterinario, nombre, apellido, especialidad, telefono) 
            VALUES ('$id_veterinario', '$nombre', '$apellido', '$especialidad', '$telefono')";
            
    return $this->conexion->query($sql);
}

    //Obtener veterinarios
    public function obtenerVeterinarios() {
        $sql = "SELECT * FROM veterinarios";
        return $this->conexion->query($sql);
    }

// Obtener los datos de un veterinario para ponerlos en los inputs
    public function obtenerVeterinarioPorId($id_veterinario) {
        $sql = "SELECT * FROM veterinarios WHERE id_veterinario = '$id_veterinario'";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_assoc();
    }

    // Modificar el registro en la base de datos
    public function actualizarV($id_veterinario, $nombre, $apellido, $especialidad, $telefono) {
        $sql = "UPDATE veterinarios 
                SET nombre = '$nombre', apellido = '$apellido', especialidad = '$especialidad', telefono = '$telefono' 
                WHERE id_veterinario = '$id_veterinario'";
                
        return $this->conexion->query($sql);
    }

    // Eliminar veterinario
    public function eliminarV($id_veterinario) {
    $sql = "DELETE FROM veterinarios WHERE id_veterinario = '$id_veterinario'";
    return $this->conexion->query($sql);
}

}

