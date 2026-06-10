<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita - Sistema Veterinario</title>
    <link rel="stylesheet" href="/vistas/css/style.css">
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h2>Editar Cita</h2>
            <?php if (!$cita): ?>
                <p>No se encontró la cita.</p>
            <?php else: ?>
                <?php
                    $fecha_hora = $cita['fecha_hora'] ?? '';
                    $dt = strtotime($fecha_hora);
                    $fecha = $dt ? date('Y-m-d', $dt) : '';
                    $hora = $dt ? date('H:i', $dt) : '';
                ?>
                <form method="POST" action="/index.php?accion=actualizarCita">
                    <input type="hidden" name="id_cita" value="<?php echo htmlspecialchars($cita['id_cita']); ?>">

                    <label for="id_mascota">Mascota </label>
                    <select id="id_mascota" name="id_mascota" disabled>
                        <?php foreach ($mascotas as $m): ?>
                            <?php $mid = $m['id_mascota']; ?>
                            <option value="<?php echo $mid; ?>" <?php echo ($mid == ($cita['id_mascota'] ?? '')) ? 'selected' : ''; ?>><?php echo htmlspecialchars($m['nombre'] ?? ($m['nombre_mascota'] ?? 'Mascota')); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class="grid-2">
                        <div>
                            <label for="fecha">Fecha de la Cita</label>
                            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" required>
                        </div>

                        <div>
                            <label for="hora">Hora de la Cita</label>
                            <input type="time" id="hora" name="hora" value="<?php echo $hora; ?>" required>
                        </div>
                    </div>

                    <label for="veterinario">Veterinario Asignado</label>
                    <select id="veterinario" name="id_veterinario" disabled>
                        <?php foreach ($veterinarios as $v): ?>
                            <?php $vid = $v['id_veterinario']; ?>
                            <option value="<?php echo $vid; ?>" <?php echo ($vid == ($cita['id_veterinario'] ?? '')) ? 'selected' : ''; ?>><?php echo htmlspecialchars(trim(($v['nombre'] ?? '') . ' ' . ($v['apellido'] ?? ''))); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="motivo">Motivo de la Consulta</label>
                    <textarea id="motivo" name="motivo" required><?php echo htmlspecialchars($cita['motivo'] ?? ''); ?></textarea>

                    <div class="button-group">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        <a href="/index.php?accion=citasAgendadas" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
