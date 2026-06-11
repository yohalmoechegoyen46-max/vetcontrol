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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

       <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:  #0A5F9E; padding: 30px 40px; font-size: 18px; border-bottom: 1px solid #dee2e6;">
        <div class="container-fluid">
            <div style="diplay:flex; justify-content: space-between; width: 40%;">
            <a href="#" class="navbar-brand">VetControl</a>
            </div>
            <div style="display: flex; justify-content: flex-end; width: 60%;">
            <ul class="navbar-nav me-auto mb-4 mb-lg-0">
                <li class="nav-item"><a href="#" class="nav-link active" style="color: #0A5F9E;"><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
                <li class="nav-item"><a href="index.php?accion=listarClientes" class="nav-link"><i class="bi bi-people-fill"></i> Clientes</a></li>
                <li class="nav-item"><a href="index.php?accion=listarMascotas" class="nav-link"><i class="bi bi-github"></i> Mascotas</a></li>
                <li class="nav-item"><a href="index.php?accion=listarVeterinarios" class="nav-link" ><i class="bi bi-person-badge-fill"></i> Veterinarios</a></li>
                <li class="nav-item"><a href="index.php?accion=listarCitas" class="nav-link" ><i class="bi bi-calendar-check-fill"></i> Citas</a></li>
                <div style="display: flex; justify-content: flex-end;">
                 <li class="nav-item"><a href="index.php?accion=salir" class="btn btn-danger" style="align-content: flex-end;"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="contenido">
        <div style="padding: 20px;">
            <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 36px; margin-bottom: 50px;"> Dashboard Administrativo</h1>
            <h3><p class="text-muted" style="margin-bottom: 30px;">Panel de control del Sistema VetControl</p></h3>
            </div>
            </div>

            <!-- Opciones rápidas -->
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background-color: #0A5F9E; color: white;">
                    <h2 >Acciones Rápidas</h2>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; padding: 20px;">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3  style="margin-bottom: 30px;"><i class="bi bi-people-fill"></i></h3>
                            <h3 style="margin-bottom: 10px;">Clientes</h3>
                            <p class="text-muted" style="font-size: 13px;">Gestiona los clientes</p>
                            <a href="index.php?accion=listarClientes" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                    
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3  style="margin-bottom: 10px;"><i class="bi bi-github" style="font-size: 2rem;"></i></h3>
                            <h3 style="margin-bottom: 10px;">Mascotas</h3>
                            <p class="text-muted" style="font-size: 13px;">Consulta todas las mascotas</p>
                            <a href="index.php?accion=listarMascotas" class="btn btn-primary">Ir</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3  style="margin-bottom: 10px;"><i class="bi bi-person-vcard"></i></h3>
                            <h3 style="margin-bottom: 10px;">Veterinarios</h3>
                            <p class="text-muted" style="font-size: 13px;">Consulta todos los veterinarios</p>
                            <a href="index.php?accion=listarVeterinarios" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                    
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3 style="margin-bottom: 10px;"><i class="bi bi-calendar-event"></i></h3>
                            <h3 style="margin-bottom: 10px;">Citas</h3>
                            <p class="text-muted">Gestiona las citas de citas</p>
                            <a href="index.php?accion=listarCitas" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <br><br><br>
<br>
<br>
    <!-- FOOTER -->
     <div class="container-fluid" style="background-color: #0A5F9E; color: white; padding: 30px; text-align: center;">
          <footer>
             <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
         </footer>
     </div>
</body>
</html>
