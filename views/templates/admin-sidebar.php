<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/tablero" class="dashboard__enlace <?php echo pagina_actual('/tablero') ? 'dashboard__enlace--activo' : ''; ?>">
            <!-- <i class="fas fa-tachometer"></i> -->
            <i class="fa-solid fa-gauge-high dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Tablero
            </span>
        </a>

        <a href="/admin/ponentes" class="dashboard__enlace <?php echo pagina_actual('/ponentes') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ponentes
            </span>
        </a>

        

        <a href="/admin/eventos" class="dashboard__enlace <?php echo pagina_actual('/eventos') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-calendar-days dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Eventos
            </span>
        </a>

        <a href="/admin/usuarios-registrados" class="dashboard__enlace <?php echo pagina_actual('/usuarios-registrados') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Usuarios Registrados
            </span>
        </a>

        <a href="/admin/regalos" class="dashboard__enlace <?php echo pagina_actual('/regalos') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Regalos
            </span>
        </a>
    </nav>
</aside>