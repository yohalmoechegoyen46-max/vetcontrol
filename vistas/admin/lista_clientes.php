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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- NAVEGACIÓN -->
    <nav>
        <ul>
            <li><a href="index.php?accion=dashboardAdmin">Dashboard</a></li>
            <li><a href="index.php?accion=listarClientes" class="active">Clientes</a></li>
            <li><a href="index.php?accion=listarMascotas">Mascotas</a></li>
            <li><a href="index.php?accion=listarCitas">Citas</a></li>
            <li><a href="index.php?accion=salir"> Cerrar Sesión</a></li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div>
            <div>
                <h2>Lista de Clientes</h2>
                <p class="text-muted" style="margin-bottom: 20px;">Todos los clientes registrados en el sistema</p>
           <div class="mb-3" style="margin-bottom: 30px;">
                <a class="btn btn-success"  href="index.php?accion=nuevoCliente"><i class="bi bi-person-plus-fill"></i>  Nuevo</a>
            </div>
            <div class="mb-3" style="margin-bottom: 30px;">
                <a href="index.php?accion=dashboardAdmin" class="btn btn-primary" ><i class="bi bi-box-arrow-left"></i>  Volver</a>
            </div>
            <div class="mb-3" style="margin-bottom: 30px;">
                <a href="index.php?accion=dashboardAdmin" class="btn btn-info" ><i class="bi bi-arrow-clockwise"></i>  Actualizar</a>
            </div>
            <div class="mb-3" style="margin-bottom: 30px;">
                <a href="" class="btn btn-danger" ><i class="bi bi-person-dash-fill"></i> Eliminar</a>
            </div>

            <?php if ($clientes && $clientes->num_rows > 0): ?>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #1e1bce;">
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">ID</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Nombre</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Apellido</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Usuario</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Contraseña</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">DUI</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Teléfono</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($cliente = $clientes->fetch_assoc()): ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["id_cliente"] ?? $cliente["id"] ?? ""); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["nombre"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["apellido"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["usuario"]); ?></td>
                             <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["clave"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["dui"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["telefono"]); ?></td>
                            <td style="padding: 12px;"><?php echo htmlspecialchars($cliente["correo"]); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="card" style="padding: 20px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
                <p style="color: #666; margin: 0;">No hay clientes registrados en el sistema.</p>
            </div>
            <?php endif; ?>


        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
    </footer>
</body>
</html>
