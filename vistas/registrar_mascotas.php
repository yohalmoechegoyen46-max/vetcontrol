<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascotas - Sistema Veterinario</title>
    <link rel="stylesheet" href="/vistas/css/style.css">
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h2>🐾 Registro de Mascotas</h2>
            <p class="text-muted">Completa el formulario para registrar una nueva mascota</p>
            
            <form method="POST" action="/index.php?accion=guardarMascota">
                <label for="id_cliente">Propietario</label>
                <select id="id_cliente" name="id_dueño" required>
                    <option value="">Selecciona propietario</option>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cl): ?>
                            <?php $cid = $cl['id_cliente']; $cname = htmlspecialchars(($cl['nombre'] ?? '') . ' ' . ($cl['apellido'] ?? '')); ?>
                            <option value="<?php echo $cid; ?>"><?php echo $cname; ?> (DUI: <?php echo htmlspecialchars($cl['dui'] ?? ''); ?>)</option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay propietarios registrados</option>
                    <?php endif; ?>
                </select>

                <label for="nombre_mascota">Nombre de la Mascota</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" placeholder="Ej: Firulais" required>

                <div class="grid-2">
                    <div>
                        <label for="especie">Especie </label>
                        <select id="especie" name="especie" required>
                            <option value="">Selecciona una especie</option>
                            <option value="Perro"> Perro</option>
                            <option value="Gato"> Gato</option>
                            <option value="Conejo"> Conejo</option>
                            <option value="Pajaro"> Pájaro</option>
                            <option value="Hamster"> Hámster</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>

                    <div>
                        <label for="raza">Raza</label>
                        <input type="text" id="raza" name="raza" placeholder="Ej: Labrador Retriever">
                    </div>
                </div>

                <div class="grid-2">
                    <div>
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>

                    <div>
                        <label for="peso">Peso</label>
                        <div class="inline-fields">
                            <input type="number" id="peso_kilos" name="peso_kilos" placeholder="kg" step="1" min="0" oninput="onKgLbsChange()">
                            <input type="number" id="peso_libras" name="peso_libras" placeholder="lb" step="1" min="0" oninput="onKgLbsChange()">
                        </div>
                        <input type="hidden" id="peso" name="peso" value="">
                    </div>
                </div>

                <!-- combined display removed; kilos + libras used and hidden peso sent -->

                <div class="button-group">
                    <button type="submit" class="btn btn-success">Guardar Mascota</button>
                    <button type="reset" class="btn btn-outline" onclick="setTimeout(resetPesoFields,0)">Limpiar Formulario</button>
                    <a href="/index.php?accion=bienvenida" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
    <?php include __DIR__ . '/partials/footer.php'; ?>
    <script>

        function onKgLbsChange(){
            const kilosInput = document.getElementById('peso_kilos');
            const lbsInput = document.getElementById('peso_libras');
            let kilos = parseInt(kilosInput.value, 10);
            let lbs = parseInt(lbsInput.value, 10);
            if (isNaN(kilos) || kilos < 0) kilos = 0;
            if (isNaN(lbs) || lbs < 0) lbs = 0;
            // convert lbs to kg
            const lbsToKg = lbs / 2.20462;
            const totalKg = kilos + lbsToKg;
            // set hidden peso with 2 decimals
            document.getElementById('peso').value = totalKg ? totalKg.toFixed(2) : '';
        }
        function resetPesoFields(){
            document.getElementById('peso_kilos').value = '';
            document.getElementById('peso_libras').value = '';
            document.getElementById('peso').value = '';
            // no combined display to reset
        }
        // Initialize on load if value present
        document.addEventListener('DOMContentLoaded', function(){ onKgLbsChange(); });
    </script>
</body>
</html>

