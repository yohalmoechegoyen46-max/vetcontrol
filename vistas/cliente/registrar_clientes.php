<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Clientes - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h2>Registro de Clientes</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Completa el formulario para registrar un nuevo cliente</p>
            
            <form method="POST" action="index.php?accion=guardarCliente">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="nombre">Nombre </label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan" required>
                    </div>

                    <div>
                        <label for="apellido">Apellido </label>
                        <input type="text" id="apellido" name="apellido" placeholder="Ej: Pérez" required>
                    </div>
                </div>

                <label for="dui">Documento (DUI) </label>
                <input type="text" id="dui" name="dui" placeholder="Ej: 12345678-9" required>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" placeholder="Ej: +503 7123-4567">
                    </div>

                    <div>
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Ej: correo@ejemplo.com">
                    </div>
                </div>

                <div class="button-group" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-success"> Guardar Cliente</button>
                    <button type="reset" class="btn btn-outline"> Limpiar Formulario</button>
                    <a href="index.php?accion=bienvenida" class="btn btn-secondary" style="text-decoration: none; color: white;"> Volver</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
