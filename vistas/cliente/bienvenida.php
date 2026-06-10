<?php
 if (session_status() == PHP_SESSION_NONE){
    session_start ();
 }
 //SEGURIDAD POR SI NO INICIO SESION
if(!isset($_SESSION["usuario"])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido (a)- Sistema Veterinario</title>
    <link rel="stylesheet" href="vistas/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <style>
        body { background-color:  #1A3D63 !important; }
        .contenido h1 { color: #e7eaed !important; font-weight: 700; }
        .contenido .card { background: #e7eaed !important; border-radius: 24px !important; padding: 50px 40px !important; border: none !important; }
        .contenido .card .card.shadow { background: #1A3D63 !important; border: none !important; border-radius: 18px !important; width: 260px !important; transition: all 0.3s ease !important; text-align: center !important; }
        .contenido .card .card.shadow:hover { transform: translateY(-8px) !important; }
        .contenido .card .card.shadow h3 { color: #eaebed !important; }
        .contenido .card .card.shadow .link-button { background-color: #B3CFE5 !important; color: #161515 !important; font-weight: 600 !important; border-radius: 12px !important; display: inline-block !important; width: 100% !important; padding: 10px 0 !important; text-decoration: none !important; }
        .contenido .card .card.shadow .link-button:hover { background-color: #e7eaed !important; }

        

        /* 3. El contenedor central con la imagen "DOC" y la capa azul encima */
        .contenido .card {
            background: linear-gradient(rgba(240, 242, 245, 0.88), rgba(11, 67, 139, 0.88)), 
                        url('vistas/cliente/DOC.png') no-repeat center center !important; 
            background-size: cover !important; 
            border-radius: 24px !important;
            padding: 60px 40px !important;
            box-shadow: 0 15px 35px rgba(236, 239, 243, 0.3) !important;
            border: none !important;
            margin-top: 30px !important;
        }

        

        

        
    </style>
</head>
<body>
    <!-- NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">VetControl</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=registrarMascota"> Registrar Mascotas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=agendar"> Agendar Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=perfilCliente">Ver Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?accion=salir"> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

            
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="contenido">
        <div>
            <h1 style="font-size: 36px; margin-bottom: 15px;">Bienvenido (a) <?php echo htmlspecialchars($perfil["nombre"] . " " . $perfil["apellido"]); ?>!</h1>
            
            <div class="card">
                <p style="font-size: 20px; color: #020206; font-weight: bold !important; line-height: 1.8; margin-bottom: 20px;">
                    Sistema desarrollado para la gestión integral de clínica veterinaria.
                </p>
                
                <hr>
                <div style="display: flex; justify-content: center; gap: 30px; margin-top: 20px;">    
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;"></h3>
                        <h3 style="margin-bottom: 10px;">Mascotas</h3>
                        <p style="font-size: 13px; color: #eaeaf1; class="text-muted" style="font-size: 13px;">Registra mascotas de clientes</p>
                        <a href="index.php?accion=registrarMascota" class="link-button">Ir</a>
                    </div>
                    
                    <div class="card shadow">
                        <h3 style="margin-bottom: 10px;"></h3>
                        <h3 style="margin-bottom: 10px;">Citas</h3>
                        <p style="font-size: 13px; color: #eaeaf1; class="text-muted" style="font-size: 13px;">Agenda citas para mascotas</p>
                        <a href="index.php?accion=agendarCita" class="link-button">Ir</a>
                    </div>

                </div>
            </div>
            
          <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
    
    <div class="col-md-9 mb-4">
        <div class="contenedor-mapa" style="padding: 20px;">
            <h3 style="font-size: 20 px; color: #eaeaf1; class="titulo-mapa"><i class="bi bi-geo-alt-fill me-2"></i>Nuestra Ubicación</h3>
            
            <div style="width:90%; border-radius: 10px; overflow: hidden; border: 1px solid #cbd5e1;">
                
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.6378415729743!2d-88.87195482529323!3d13.496468493136893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7cad583626e2ef%3A0x46fdca325be69c4c!2sITCA%20Zacatecoluca!5e0!3m2!1ses-419!2ssv!4v1717985000000!5m2!1ses-419!2ssv"  
                    style="width: 100% !important; min-width: 100% !important; height: 450px; border: 0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="contenedor-mapa" style="height: 100%; padding: 20px;"> 
            <h3  style="font-size: 20 px; color: #eaeaf1; class="titulo-mapa"><i class="bi bi-chat-square-heart-fill me-2"></i>Contáctanos</h3>
            
            <p style="color: #eef1f6 !important; font-weight: bold !important; font-size: 16px; margin-top: 15px;">
                Síguenos en redes
            </p>
            
            <div style="margin-top: 25px;">
                <a href="https://www.facebook.com/share/1Gwu7BVYqT/?mibextid=wwXIfr" target="_blank" style="display: block; margin-bottom: 20px; color: #1877F2; font-weight: bold; text-decoration: none; font-size: 18px;">
                    <i class="bi bi-facebook me-2" style="font-size: 24px;"></i> Facebook
                </a>
                
                <a href="https://www.instagram.com/vetc.ontrol?igsh=MWtpdzlwYzExYTlmbA%3D%3D&utm_source=qr" target="_blank" style="display: block; color: #E1306C; font-weight: bold; text-decoration: none; font-size: 18px;">
                    <i class="bi bi-instagram me-2" style="font-size: 24px;"></i> Instagram
                </a> 
                <br>
                <a href="https://web.whatsapp.com/" target="_blank" style="display: block; color: #25D366; font-weight: bold; text-decoration: none; font-size: 18px;">
                    <i class="bi bi-whatsapp me-2" style="font-size: 24px;"></i> WhatsApp
                </a>
                <a href="https://x.com/Vet_Control" target="_blank" style="display: block; margin-top: 20px; color: #000000; font-weight: bold; text-decoration: none; font-size: 18px;">
                <i class="bi bi-twitter-x me-2" style="font-size: 24px;"></i> X
                </a>
            </div>
        </div>
    </div>

</div>
</div>

    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Sistema VetControl - Gestión Veterinaria Profesional</p>
        <p>Todos los derechos reservados</p>
    </footer>
</body>
</html>