<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Sistema Veterinario</title>
    <link rel="stylesheet" href="/vistas/css/style.css">
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav>
        <ul>
            <li><a href="/index.php" class="active"> Inicio</a></li>
            <li><a href="/index.php?accion=registrarCliente"> Registrar Clientes</a></li>
            <li><a href="/index.php?accion=registrarMascota"> Registrar Mascotas</a></li>
            <li><a href="/index.php?accion=agendar"> Agendar Citas</a></li>
            <li><a href="/index.php?accion=salir"> Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div class="formulario text-center">
            <h1 class="hero-title">🐾 Bienvenido al Sistema VetControl</h1>
            
            <div class="card">
                <p class="text-muted">Sistema desarrollado para la gestión integral de clínica veterinaria.</p>
                
                <hr>
                
                <div class="card-grid">
                    <div class="card shadow">
                        <h3>👥</h3>
                        <h3>Clientes</h3>
                        <p class="text-muted">Registra y gestiona clientes</p>
                        <a href="/index.php?accion=registrarCliente" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3>🐾</h3>
                        <h3>Mascotas</h3>
                        <p class="text-muted">Registra mascotas de clientes</p>
                        <a href="/index.php?accion=registrarMascota" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3>📅</h3>
                        <h3>Citas</h3>
                        <p class="text-muted">Agenda citas para mascotas</p>
                        <a href="/index.php?accion=agendar" class="link-button">Ir</a>
                    </div>

                    <div class="card shadow">
                        <h3>🗂️</h3>
                        <h3>Citas Agendadas</h3>
                        <p class="text-muted">Ver las citas ya programadas</p>
                        <a href="/index.php?accion=citasAgendadas" class="link-button">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>