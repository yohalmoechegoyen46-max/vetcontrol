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
    <title>Dashboard Admin - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- NAVEGACIÓN -->
    <nav style="background-color: #ffffff; padding: 30px 40px; font-size: 18px; border-bottom: 1px solid #dee2e6;">
        <div style="display: flex; align-items: center; justify-content: space-between; color: #ffffff;">
            <a href="#" class="navbar-brand">VetControl</a>
            <ul >
                <li class="nav-item"><a href="#" class="navbar-brand"><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
                <li class="nav-item"><a href="index.php?accion=listarClientes" class="navbar-brand"><i class="bi bi-people-fill"></i> Clientes</a></li>
                <li class="nav-item"><a href="index.php?accion=listarMascotas" class="navbar-brand"><i class="bi bi-github"></i> Mascotas</a></li>
                <li class="nav-item"><a href="index.php?accion=listarVeterinarios" class="navbar-brand" ><i class="bi bi-person-badge-fill"></i> Veterinarios</a></li>
                <li class="nav-item"><a href="index.php?accion=listarCitas" class="navbar-brand" ><i class="bi bi-calendar-check-fill"></i> Citas</a></li>
                <li class="nav-item"><a href="index.php?accion=salir" class="navbar-brand" ><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>

            </ul>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div style="padding: 20px;">
            <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 36px; margin-bottom: 50px;"> Dashboard Administrativo</h1>
            <p class="text-muted" style="margin-bottom: 30px;">Panel de control del Sistema VetControl</p>
            </div>
            <div class="card" style="margin-bottom: 20px; color: white; border-bottom: 1px solid #dee2e6; text-align: center;">
                <div class="card-header"><h2>Estadísticas Generales</h2>
                </div>
                   <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; padding: 20px;">
                    <div class="card shadow" style="padding: 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 10px;">
                        <h3 style="margin: 0; font-size: 24px;">0</h3>
                        <p style="margin: 5px 0 0 0; font-size: 14px;">Total Clientes</p>
                    </div>
                    
                    <div class="card shadow" style="padding: 20px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; border-radius: 10px;">
                        <h3 style="margin: 0; font-size: 24px;">0</h3>
                        <p style="margin: 5px 0 0 0; font-size: 14px;">Total Mascotas</p>
                    </div>
                    
                    <div class="card shadow" style="padding: 20px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; border-radius: 10px;">
                        <h3 style="margin: 0; font-size: 24px;">0</h3>
                        <p style="margin: 5px 0 0 0; font-size: 14px;">Citas</p>
                    </div>
                    
                    <div class="card shadow" style="padding: 20px; background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; border-radius: 10px;">
                        <h3 style="margin: 0; font-size: 24px;">0</h3>
                        <p style="margin: 5px 0 0 0; font-size: 14px;">Veterinarios</p>
                    </div>
                </div>
            </div>

            <!-- Opciones rápidas -->
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="color: white; border-bottom: 1px solid #dee2e6; text-align: center;">
                    <h2>Acciones Rápidas</h2>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; padding: 20px;">
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;"><i class="bi bi-people-fill"></i></h3>
                        <h3 style="margin-bottom: 10px;">Clientes</h3>
                        <p class="text-muted" style="font-size: 13px;">Gestiona los clientes</p>
                        <a href="index.php?accion=listarClientes" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;"><i class="bi bi-github" style="font-size: 2rem;"></i></h3>
                        <h3 style="margin-bottom: 10px;">Mascotas</h3>
                        <p class="text-muted" style="font-size: 13px;">Consulta todas las mascotas</p>
                        <a href="index.php?accion=listarMascotas" class="link-button">Ir</a>
                    </div>

                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;"><i class="bi bi-person-vcard"></i></h3>
                        <h3 style="margin-bottom: 10px;">Veterinarios</h3>
                        <p class="text-muted" style="font-size: 13px;">Consulta todos los veterinarios</p>
                        <a href="index.php?accion=listarVeterinarios" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;"><i class="bi bi-calendar-event"></i></h3>
                        <h3 style="margin-bottom: 10px;">Citas</h3>
                        <p class="text-muted" style="font-size: 13px;">Gestiona las citas de citas</p>
                        <a href="index.php?accion=listarCitas" class="link-button">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
        <p>Versión Admin Dashboard</p>
    </footer>
</body>
</html>
