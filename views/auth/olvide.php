<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu acceso a DevWebCamp</p>
    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form action="/olvide-clave" method="POST" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" id="email" name="email" class="formulario__input" placeholder="Ingresa tu correo electrónico"  autocomplete="off" focus>
        </div>
        <input type="submit" class="formulario__submit" value="Recuperar clave">
    </form>
    <div class="acciones">
        <span>¿Ya tenes cuenta? <a href="/iniciarsesion" class="acciones__enlace">Iniciar sesión</a></span>
    </div>
</main>