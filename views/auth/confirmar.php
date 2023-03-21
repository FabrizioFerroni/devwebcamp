<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <!-- <p class="auth__texto">Tu cuenta de DevWebCamp.</p> -->
    <?php
        include_once __DIR__ . '/../templates/alertas2.php';
    ?>
      <?php if(isset($alertas['exito'])) { ?>
        <div class="acciones--centrar">
            <a href="/iniciarsesion" class="acciones__enlace--confirmar">Iniciar Sesión</a>
        </div>
    <?php } ?>
</main>