<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav>
        <ul>
            <li><a href="index.php" class="active"> Inicio</a></li>
            <li><a href="index.php?accion=registrarCliente"> Registrar Clientes</a></li>
            <li><a href="index.php?accion=registrarMascota"> Registrar Mascotas</a></li>
            <li><a href="index.php?accion=agendar"> Agendar Citas</a></li>
            <li><a href="index.php?accion=salir"> Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div class="formulario text-center">
            <h1 style="font-size: 36px; margin-bottom: 15px;">Bienvenido al Sistema VetControl</h1>
            
            <div class="card">
                <p style="font-size: 16px; color: #666; line-height: 1.8; margin-bottom: 20px;">
                    Sistema desarrollado para la gestión integral de clínica veterinaria.
                </p>
                
                <hr>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin: 30px 0;">
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;">👥</h3>
                        <h3 style="margin-bottom: 10px;">Clientes</h3>
                        <p class="text-muted" style="font-size: 13px;">Registra y gestiona clientes</p>
                        <a href="index.php?accion=registrarCliente" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;">🐾</h3>
                        <h3 style="margin-bottom: 10px;">Mascotas</h3>
                        <p class="text-muted" style="font-size: 13px;">Registra mascotas de clientes</p>
                        <a href="index.php?accion=registrarMascota" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;">📅</h3>
                        <h3 style="margin-bottom: 10px;">Citas</h3>
                        <p class="text-muted" style="font-size: 13px;">Agenda citas para mascotas</p>
                        <a href="index.php?accion=agendar" class="link-button">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
        <p>Todos los derechos reservados</p>
    </footer>
</body>
</html>