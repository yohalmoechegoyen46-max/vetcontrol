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
    <title>Listar Clientes - Dashboard Admin</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav>
        <ul>
            <li><a href="index.php?accion=dashboardAdmin">📊 Dashboard</a></li>
            <li><a href="index.php?accion=listarClientes">👥 Clientes</a></li>
            <li><a href="index.php?accion=listarMascotas">🐾 Mascotas</a></li>
            <li><a href="index.php?accion=listarCitas">📅 Citas</a></li>
            <li><a href="index.php?accion=salir">🚪 Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div class="formulario">
            <h2>👥 Lista de Veterinarios</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Todos los veterinarios registrados en el sistema</p>

            <?php if ($veterinarios && $veterinarios->num_rows > 0): ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f0f0f0;">
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Nombre</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Apellido</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Usuario</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">DUI</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Teléfono</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($veterinario = $veterinarios->fetch_assoc()): ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["id_veterinario"] ?? $veterinario["id"] ?? ""); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["nombre"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["apellido"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["usuario"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["dui"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["telefono"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($veterinario["correo"]); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="card" style="padding: 20px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
                <p style="color: #666; margin: 0;">No hay veterinarios registrados en el sistema.</p>
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
