<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["usuario"]) || $_SESSION["id_rol"] != 1){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevos Clientes - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h2>Nuevos Clientes</h2>
            
            <form method="POST" action="index.php?accion=guardarCliente">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="nombre">Nombre </label>
                        <input type="text" id="nombre" name="nombre" placeholder="Juan" required>
                    </div>

                    <div>
                        <label for="apellido">Apellido </label>
                        <input type="text" id="apellido" name="apellido" placeholder="Pérez" required>
                    </div>
                     <div>
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" placeholder="juanperez" required>
                    </div>

                    <div>
                        <label for="clave">Contraseña</label>
                        <input type="password" id="clave" name="clave" placeholder="*****" required>
                    </div>
                    <div>
                        <label for="dui">Documento (DUI) </label>
                        <input type="text" id="dui" name="dui" placeholder="Ej: 12345678-9" required>
                    </div>
                     <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" placeholder="+503 7123-4567">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com">
                    </div>

                </div>
               

                <div class="button-group" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="index.php?accion=listarClientes" class="btn btn-secondary" style="text-decoration: none; color: white;"> Regresar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>