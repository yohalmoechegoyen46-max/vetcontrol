<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Cliente - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php?accion=registrarCliente">Registrar Clientes</a></li>
            <li><a href="index.php?accion=registrarMascota"> Registrar Mascotas</a></li>
            <li><a href="index.php?accion=agendar">Agendar Citas</a></li>
            <li><a href="index.php?accion=salir">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div class="formulario">
            <h2> Perfil del Cliente</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Información del cliente registrado</p>

            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">Datos Personales</div>
                <div style="padding: 20px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div>
                            <label class="text-primary">Nombre:</label>
                            <p style="font-size: 14px; margin-top: 5px;">Información aquí</p>
                        </div>
                        <div>
                            <label class="text-primary">Apellido:</label>
                            <p style="font-size: 14px; margin-top: 5px;">Información aquí</p>
                        </div>
                        <div>
                            <label class="text-primary">Documento (DUI):</label>
                            <p style="font-size: 14px; margin-top: 5px;">Información aquí</p>
                        </div>
                        <div>
                            <label class="text-primary">Teléfono:</label>
                            <p style="font-size: 14px; margin-top: 5px;">Información aquí</p>
                        </div>
                    </div>
                    <div>
                        <label class="text-primary" style="display: block; margin-top: 15px;">Correo Electrónico:</label>
                        <p style="font-size: 14px; margin-top: 5px;">Información aquí</p>
                    </div>
                </div>
            </div>

            <div class="button-group" style="margin-top: 25px;">
                <a href="index.php" class="btn btn-primary" style="text-decoration: none; color: white;">← Volver</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
    </footer>
</body>
</html>