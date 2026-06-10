<?php
// Partial: footer
// If $hide_footer is set and truthy, do not render the footer (used by login view)
if (!empty($hide_footer)) {
    return;
}
?>
<footer class="site-footer">
    <div class="contenido">
        <div class="footer-inner">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>🏥 Sobre VetControl</h3>
                    <p>Sistema integral de gestión para clínicas veterinarias. Administra clientes, mascotas y citas de forma eficiente.</p>
                </div>
                
                <div class="footer-section">
                    <h3>🔗 Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="/index.php">Inicio</a></li>
                        <li><a href="/index.php?accion=registrarCliente">Registrar Cliente</a></li>
                        <li><a href="/index.php?accion=agendar">Agendar Cita</a></li>
                        <li><a href="/index.php?accion=citasAgendadas">Ver Citas</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>📞 Contacto</h3>
                    <ul>
                        <li>📧 Email: info@vetcontrol.com</li>
                        <li>📱 Teléfono: +34 900 123 456</li>
                        <li>🕐 Horario: Lun-Vie 8:00-20:00</li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>⚖️ Legal</h3>
                    <ul>
                        <li><a href="#">Términos de Servicio</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2026 Sistema VetControl — Gestión Veterinaria Profesional. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>
