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

<<<<<<< HEAD
=======
        <hr style="margin: 25px 0; opacity: 0.5;">
        
        <div style="margin-bottom: 20px;">
            <a href="index.php?accion=registrarCliente" class="btn btn-primary" style="display: block; text-align: center; padding: 12px; background-color: #27ae60; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">Crear Cuenta</a>
        </div>
        
        <p class="text-center" style="color: #666; font-size: 12px;">© 2026 Sistema Veterinario VetControl</p>
>>>>>>> cc24656b60874b9b678e7c6d89efec09eebf26ab
    </div>
</body>
</html>