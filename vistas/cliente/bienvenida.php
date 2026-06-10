<?php
 if (session_status() == PHP_SESSION_NONE){
    session_start ();
 }
 //SEGURIDAD POR SI NO INICIO SESION
if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido (a)- Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">VetControl</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=registrarMascota"> Registrar Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=agendar"> Agendar Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=perfilCliente">Ver Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=salir"> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

            
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div>
            <h1 style="font-size: 36px; margin-bottom: 15px;">Bienvenido (a) <?php echo htmlspecialchars($perfil["nombre"] . " " . $perfil["apellido"]); ?>!</h1>
            
            <div class="card">
                <p style="font-size: 16px; color: #666; line-height: 1.8; margin-bottom: 20px;">
                    Sistema desarrollado para la gestión integral de clínica veterinaria.
                </p>
                
                <hr>
                <div style="display: flex; justify-content: center; gap: 30px; margin-top: 20px;">    
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
                        <a href="index.php?accion=agendarCita" class="link-button">Ir</a>
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