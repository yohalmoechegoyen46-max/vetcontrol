<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascotas - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h2>🐾 Registro de Mascotas</h2>
            <p class="text-muted" style="margin-bottom: 20px;">Completa el formulario para registrar una nueva mascota</p>
            
            <form method="POST" action="index.php?accion=guardarMascota">
                <label for="id_cliente">Propietario (DUI o ID)</label>
                <input type="text" id="id_cliente" name="id_dueño" placeholder="Ej: 12345678-9" required>

                <label for="nombre_mascota">Nombre de la Mascota</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" placeholder="Ej: Firulais" required>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
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

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>

                    <div>
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="peso" name="peso" placeholder="Ej: 25.5" step="0.1">
                    </div>
                </div>

                <div class="button-group" style="margin-top: 25px;">
                    <button type="submit" class="btn btn-success">Guardar Mascota</button>
                    <button type="reset" class="btn btn-outline">Limpiar Formulario</button>
                    <a href="index.php?accion=bienvenida" class="btn btn-secondary" style="text-decoration: none; color: white;">Volver</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

