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
    <title>Nuevos Veterinarios - Sistema Veterinario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <!---NAVEGACION-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:  #0A5F9E; padding: 30px 40px; font-size: 18px; border-bottom: 1px solid #dee2e6;">
        <div class="container-fluid">
            <div style="diplay:flex; justify-content: space-between; width: 40%;">
            <a href="index.php?accion=dashboardAdmin" class="navbar-brand">VetControl</a>
            </div>
            <div style="display: flex; justify-content: flex-end; width: 60%;">
            <ul class="navbar-nav me-auto mb-4 mb-lg-0">
                <li class="nav-item"><a href="index.php?accion=dashboardAdmin" class="nav-link active" ><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
                <li class="nav-item"><a href="index.php?accion=listarClientes" class="nav-link" style="color: #0A5F9E;"><i class="bi bi-people-fill"></i> Clientes</a></li>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <br><br>
    <div class="container-fluid">
        <h1>Nuevos Veterinarios</h1>
        <br><br>
        <div class="row">
            <div class="col-md-10">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos del veterinario</b></h3>
                    </div>
                    <div class="card-body">
                        <form action="index.php?accion=guardarV" method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                     </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                                     </div>
                                </div>
                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="especialidad">Especialidad:</label>
                                        <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                                     </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                     </div>
                                </div>
                           <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Guardar</button>
                                    <a href="index.php?accion=listarVeterinarios" class="btn btn-secondary"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                                </div>
                            </div>
                        </form>
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