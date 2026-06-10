<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas Agendadas - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="active">Inicio</a></li>
            <li><a href="index.php?accion=registrarCliente">Registrar Clientes</a></li>
            <li><a href="index.php?accion=registrarMascota">Registrar Mascotas</a></li>
            <li><a href="index.php?accion=agendar">Agendar Citas</a></li>
            <li><a href="index.php?accion=salir">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div class="contenido">
        <div class="formulario">
            <h2>Citas Agendadas</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Aquí puedes ver todas las citas agendadas en el sistema.</p>
            <table>
                <thead>
                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Mascota</th>
                        <th>Veterinario</th>
                        <th>Motivo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($citas)): ?>
                        <?php foreach ($citas as $c): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($c['fecha_hora'] ?? ''); ?></td>
                                <td><?php $mid = $c['id_mascota'] ?? ''; echo htmlspecialchars($mascotasMap[$mid] ?? $mid); ?></td>
                                <td><?php $vid = $c['id_veterinario'] ?? ''; echo htmlspecialchars($veterinariosMap[$vid] ?? $vid); ?></td>
                                <td><?php echo htmlspecialchars($c['motivo'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($c['estado'] ?? ''); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center" style="padding: 20px;">No hay citas agendadas</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
    </footer>
</body>
</html>
