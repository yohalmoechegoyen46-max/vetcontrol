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
    <title>Listar Citas - Dashboard Admin</title>
    <link rel="stylesheet" href="vistas/css/style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- NAVEGACIÓN -->
   <!-- NAVEGACIÓN -->
    <nav style="background-color: #ffffff; padding: 30px 40px; font-size: 18px; border-bottom: 1px solid #dee2e6;">
        <div style="display: flex; align-items: center; justify-content: space-between; color: #ffffff;">
            <a href="#" class="navbar-brand">VetControl</a>
            <ul >
                <li class="nav-item"><a href="index.php?accion=dashboardAdmin" class="navbar-brand"><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
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
        <div class="formulario">
            <h2>📅 Lista de Citas</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Todas las citas registradas en el sistema</p>

            <?php if ($citas && $citas->num_rows > 0): ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f0f0f0;">
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID Cita</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Fecha y Hora</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Estado</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID Mascota</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID Veterinario</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID Cliente</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($cita = $citas->fetch_assoc()): ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cita["id_cita"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cita["fecha_hora"]); ?></td>
                            <td style="padding: 12px;">
                                <span style="padding: 5px 10px; border-radius: 3px; font-size: 12px; 
                                    <?php 
                                        if ($cita["estado"] == "Pendiente") echo "background-color: #fff3cd; color: #856404;";
                                        elseif ($cita["estado"] == "Atendida") echo "background-color: #d4edda; color: #155724;";
                                        elseif ($cita["estado"] == "Cancelada") echo "background-color: #f8d7da; color: #721c24;";
                                    ?>">
                                    <?php echo htmlspecialchars($cita["estado"]); ?>
                                </span>
                            </td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cita["id_mascota"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cita["id_veterinario"] ?? "N/A"); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cita["id_cliente"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cita["motivo"] ?? ""); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="card" style="padding: 20px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
                <p style="color: #666; margin: 0;">No hay citas registradas en el sistema.</p>
            </div>
            <?php endif; ?>

            <div class="button-group" style="margin-top: 25px;">
                <a href="index.php?accion=dashboardAdmin" class="btn btn-primary" style="text-decoration: none; color: white;">← Volver al Dashboard</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
    </footer>
</body>
</html>
