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
            
            <form method="POST" action="index.php?accion=guardarCita">
                <label for="id_mascota">Mascota </label>
                <select id="id_mascota" name="id_mascota" required>
                    <option value="">Selecciona mascota</option>
                    <option value="1">Ejemplo Mascota 1</option>
                    <option value="2">Ejemplo Mascota 2</option>
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
                <select id="veterinario" name="veterinario" required>
                    <option value="">Selecciona veterinario</option>
                    <option value="Dr. Juan López">Dr. Juan López</option>
                    <option value="Dra. María García">Dra. María García</option>
                    <option value="Dr. Carlos Rodríguez">Dr. Carlos Rodríguez</option>
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

            <hr style="margin: 30px 0;">
            
            <h3>Próximas Citas Agendadas</h3>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mascota</th>
                        <th>Veterinario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center" style="padding: 20px;">No hay citas agendadas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
