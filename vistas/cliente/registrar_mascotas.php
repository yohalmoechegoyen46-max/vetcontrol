<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
}
?>
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
                <label>Propietario</label>
                <input type="text" disabled value="<?php echo htmlspecialchars($perfil["nombre"] . " " . $perfil["apellido"]); ?>" placeholder="Propietario" style="background-color: #f0f0f0;">

                <label for="nombre_mascota">Nombre de la Mascota</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" placeholder="Firulais" required>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="especie">Especie </label>
                        <select id="especie" name="especie" required>
                            <option value="">-- Selecciona --</option>
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
                        <input type="text" id="raza" name="raza" placeholder="Labrador Retriever">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>

                    <div>
                        <label for="peso">Peso (lb)</label>
                        <input type="decimal" id="peso" name="peso" placeholder="00.0" step="0.1">
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

