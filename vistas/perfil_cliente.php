<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Cliente - Sistema Veterinario</title>
    <link rel="stylesheet" href="/vistas/css/style.css">
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav>
        <ul>
            <li><a href="/index.php">Inicio</a></li>
            <li><a href="/index.php?accion=registrarCliente">Registrar Clientes</a></li>
            <li><a href="/index.php?accion=registrarMascota"> Registrar Mascotas</a></li>
            <li><a href="/index.php?accion=agendar">Agendar Citas</a></li>
            <li><a href="/index.php?accion=salir">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div class="formulario">
            <h2> Perfil del Cliente</h2>
            <p class="text-muted">Información del cliente registrado</p>

            <div class="card">
                <div class="card-header">Datos Personales</div>
                <div class="card-body">
                    <div class="grid-2">
                        <div>
                            <label class="text-primary">Nombre:</label>
                            <p class="small-text">Información aquí</p>
                        </div>
                        <div>
                            <label class="text-primary">Apellido:</label>
                            <p class="small-text">Información aquí</p>
                        </div>
                        <div>
                            <label class="text-primary">Documento (DUI):</label>
                            <p class="small-text">Información aquí</p>
                        </div>
                        <div>
                            <label class="text-primary">Teléfono:</label>
                            <p class="small-text">Información aquí</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="text-primary">Correo Electrónico:</label>
                        <p class="small-text">Información aquí</p>
                    </div>
                </div>
            </div>

            <div class="button-group">
                <a href="/index.php" class="btn btn-primary">← Volver</a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>