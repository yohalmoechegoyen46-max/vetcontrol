<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
</head>
<body class="contenedor-login">
    <div class="contenedor">
        <h2>🐾 Sistema Veterinario</h2>
        <p class="text-center" style="color: #666; margin-bottom: 30px; font-size: 14px;">Inicia sesión en tu cuenta</p>

        <form method="POST" action="index.php?accion=validar">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>

            <label for="clave">Contraseña</label>
            <input type="password" id="clave" name="clave" placeholder="Ingresa tu contraseña" required>

            <button type="submit">Ingresar</button>
        </form>

        <hr style="margin: 25px 0; opacity: 0.5;">
        <p class="text-center" style="color: #666; font-size: 12px;">© 2026 Sistema Veterinario VetControl</p>
    </div>
</body>
</html>