<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Citas - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h2>Agendar Cita Veterinaria</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Completa el formulario para agendar una cita</p>
            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'guardado'): ?>
                <div style="padding:10px; background:#d4edda; color:#155724; border-radius:4px; margin-bottom:12px;">Cita guardada correctamente.</div>
            <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'error'): ?>
                <div style="padding:10px; background:#f8d7da; color:#721c24; border-radius:4px; margin-bottom:12px;">Error al guardar: <?php echo htmlspecialchars($_GET['err'] ?? ''); ?></div>
            <?php endif; ?>
            
            <form method="POST" action="index.php?accion=guardarCita">
                <input type="hidden" name="id_cliente" value="1">
                <label for="id_mascota">Mascota </label>
                <select id="id_mascota" name="id_mascota" required>
                    <option value="">Selecciona mascota</option>
                    <?php if (!empty($mascotas)): ?>
                        <?php foreach ($mascotas as $m): ?>
                            <?php $id = htmlspecialchars($m['id_mascota']); $nombre = htmlspecialchars($m['nombre'] ?? ($m['nombre_mascota'] ?? 'Mascota')); ?>
                            <option value="<?php echo $id; ?>"><?php echo $nombre; ?> (ID <?php echo $id; ?>)</option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay mascotas registradas</option>
                    <?php endif; ?>
                </select>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="fecha">Fecha de la Cita</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>

                    <div>
                        <label for="hora">Hora de la Cita</label>
                        <input type="time" id="hora" name="hora" required>
                    </div>
                </div>

                <label for="veterinario">Veterinario Asignado</label>
                <select id="veterinario" name="id_veterinario" required>
                    <option value="">Selecciona veterinario</option>
                    <?php if (!empty($veterinarios)): ?>
                        <?php foreach ($veterinarios as $v): ?>
                            <?php $vid = htmlspecialchars($v['id_veterinario']); $vname = htmlspecialchars(trim(($v['nombre'] ?? '') . ' ' . ($v['apellido'] ?? ''))); ?>
                            <option value="<?php echo $vid; ?>"><?php echo $vname; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay veterinarios registrados</option>
                    <?php endif; ?>
                </select>

                <label for="motivo">Motivo de la Consulta</label>
                <textarea id="motivo" name="motivo" placeholder="Describe el motivo de la consulta" required></textarea>

                <label for="observaciones">Observaciones Adicionales</label>
                <textarea id="observaciones" name="observaciones" placeholder="Notas adicionales"></textarea>

                <div class="button-group" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-success"> Agendar Cita</button>
                    <button type="reset" class="btn btn-outline"> Limpiar Formulario</button>
                    <a href="index.php?accion=bienvenida" class="btn btn-secondary" style="text-decoration: none; color: white;"> Volver</a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
