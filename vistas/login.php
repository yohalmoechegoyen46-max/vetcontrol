<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Veterinario</title>
    <link rel="stylesheet" href="/vistas/css/style.css">
</head>
<body class="contenedor-login">
    <div class="contenedor">
        <h2 class="sistema-title">🐾 Sistema Veterinario</h2>
        <p class="text-center login-subtitle">Inicia sesión en tu cuenta</p>

        <form class="login-form" method="POST" action="/index.php?accion=validar">
            <div>
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>

            <div>
                <label for="clave">Contraseña</label>
                <input type="password" id="clave" name="clave" placeholder="Ingresa tu contraseña" required>
            </div>

            <button type="submit">Ingresar</button>
        </form>

    </div>
</body>
</html>